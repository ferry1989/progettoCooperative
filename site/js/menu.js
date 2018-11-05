
//----------------------SUCCESS FUNCTION-----------------------------------

//success of fillSelect
var fillForm = function (rows) {
    var form = rows[0]['fillForm'];
    var skip = 0;

    for (row of rows) {
		if(skip > 0){
			let values = '';
			$.each(row, function(k, v) {
				values += v+' ';
			});
            $('select[name*='+form+']').append('<option value=' + row[form] + '>' + values +'</option>');
        }else{
            skip++;
        }
    }
}

var showForms = function (json) {

    //logic for insert
    if (/*Se questo è un inserimento*/1==1) {
        for (row in json) {
            let startJson = json[row];
            $('.containerforms').html('');
            $('.containerforms').append('<div class="row"><div class="col-lg-12"><h2 class="page-header text-primary">'+row+'</h2></div></div>');
        
            for(form in startJson) {

                let formvalue = startJson[form];
                //if it's a select form
                if(typeof formvalue === 'object'){
                    $('.containerforms').append('<div class="form-group"><label>'+formvalue['title']+'</label><select class="form-control" name="'+form+'"></select></div>');
                    //print empty value
                    $('select[name='+form+']').append('<option></option>');
                    //iterate and print all option values
                    for(option in formvalue){
                        let optionvalue = formvalue[option];
                        if(option.indexOf('option') > -1)
                            $('select[name='+form+']').append('<option>'+optionvalue+'</option>');
                    }
                //if it's a input form
                }else{
                    $('.containerforms').append('<div class="form-group"><label>'+formvalue+'</label><input type="text" class="form-control" name="'+form+'"></div>');
                }
            }
        }
        $('.containerforms').append('<button type="submit" class="btn btn-info" id="insert">SALVA E CONFERMA</button>');
    }else{
        //this logic is for search
    }
}

//-------------------------------------------------------------------------

//function used for fill select forms
function fillSelect (forms) {
    for(var form of forms) {
        let id = form.id;

        if(!!id){
            let url = '../scripts/' + id + '.php';
            let json = {'type':id,'fillForm':form.name};
            let success = fillForm;

            callAjax(json,url,success,form);
        }
    }
}

function initForms() {
    let name = $(this)[0].name;
    let url = '../../json/inserisciEnte.json';
    let success = showForms;

    console.log($(this)[0]);

    callAjax({},url,success);

    var initSelect = $('select');

    //to initializate select forms
    if( initSelect.length > 0 )
        fillSelect(initSelect);
}

//general call ajax
function callAjax (json,url,success) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: url,
        async: false,
        data : JSON.stringify(json),
        contentType: "application/json",
        success: success
    });
}

$(document).ready(function() {

    //on click button we do different function
    $(document).on('click','.dataform',initForms);

});