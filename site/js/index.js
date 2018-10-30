
//----------------------SUCCESS FUNCTION-----------------------------------
var generalInsert = function(msg) {
    msg.error ? alert(msg.error) : alert(msg.success);
}

var selectForm = function(rows) {
    if(rows.error) {
        alert(rows.error)
    }else{
		var i = 0;
        for (row of rows){
            var form = rows[0]['fillForm'];
            $row = $('<tr/>').attr('class',form);

            for(prop in row){
                $row.append( $('<td/>').append($('<input/>').val(row[prop])) );
            }
            $row.append( $('<td/>').append($('<button>modifica</button>')) );
            $row.append( $('<td/>').append($('<button>elimina</button>').attr('class','elimina')) );
			if(i>0){
				$('#ricercati').append($row);
			}
			i++;
        }
    }
}

//success of fillSelect
var fillForm = function (rows) {
    var form = rows[0]['fillForm'];
    var skip = 0;
    console.log('ciao')
    for (row of rows) {
		if(skip == 0){
            $('select[name*='+form+']').append('<option value=' + row[form] + '>' + row[form] +'</option>');
            skip++;
		}
    }
}
//-------------------------------------------------------------------------

//function used for fill select forms
function fillSelect (forms) {
    for(var form of forms) {
        let id = form.id;

        if(!!id){
            let type = $('.type').val();
            let url = '../script/' + id + '.php';
            let json = {'type':type,'fillForm':form.name};
            let success = fillForm;

            callAjax(json,url,success,form);
        }
    }
}

//function used for insert or remove or select rows from db
function buttonClick() {
    let type = $('.type').val();
    let forms = $('.form-control');
    let formClick = $(this)[0];
    let id = formClick.id;
    let url = '../script/' + id + '.php';
    let json = {'type':type,'fillForm':'none'};
    let success = generalInsert;

    for (var form of forms)
        json[form.name] = form.value;

    if( id.indexOf('seleziona') > -1 )
        success= selectForm;

    callAjax(json,url,success);
}

//general call ajax
function callAjax (json,url,success) {
    console.log('ciao');
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

    var initSelect = $('select');

    //to initializate select forms
    if( initSelect.length > 0 )
        fillSelect(initSelect);

    //on click button we do different function
    $('.btn').on('click',buttonClick);

});