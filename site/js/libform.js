
//----------------------SUCCESS FUNCTION-----------------------------------
var generalInsert = function(msg) {
    msg.error ? alert(msg.error) : alert(msg.success);
}

var selectForm = function(rows) {
    if(rows.error) {
        alert(rows.error)
    }else{
        $('.results').html('')
		var skip = 0;
        for (row of rows){
            var form = rows[0]['fillForm'];
            $row = $('<tr/>').attr('class',form);

            for(prop in row){
                $row.append( $('<td/>').append($('<input class="form-control others" name="'+row[prop]+'" value="'+row[prop]+'"/>')));
            }
            $row.append( $('<td/>').append($('<button type="submit" class="btn btn-info" id="'+'aggiorna_'+'">modifica</button>')));
            $row.append( $('<td/>').append($('<button type="submit" class="btn btn-info" id="'+''+'">elimina</button>')));
			if(skip>0){
				$('#ricercati').append($row);
			}else{
                skip++;
            }

        }
    }
}

//success of fillSelect
var fillForm = function (rows) {
    var form = rows[0]['fillForm'];
    var skip = 0;

    for (row of rows) {
		if(skip > 0){
            $('select[name*='+form+']').append('<option value=' + row[form] + '>' + row[form] +'</option>');
        }else{
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
    let formClick = $(this)[0];
    let id = formClick.id;
    let url = '../script/' + id + '.php';
    let json = {};
    let success = generalInsert;

    if( ( id.indexOf('insert') > -1 ) || ( id.indexOf('seleziona') > -1 ) ) {
        let type = $('.type').val();
        let forms = $('.form-control');
        json = {'type':type,'fillForm':'none'};
        for (var form of forms)
            json[form.name] = form.value;
    }else{
        if( id.indexOf('aggiorna') > -1 ) {
            let forms = $('.results');
            let forms2 = $('.others');
            for (var form of forms){
                json[form.name] = forms2.value;
            }
        }else{
            json['']
        }

    }

    if( id.indexOf('seleziona') > -1 )
        success= selectForm;

    callAjax(json,url,success);
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

    var initSelect = $('select');

    //to initializate select forms
    if( initSelect.length > 0 )
        fillSelect(initSelect);

    //on click button we do different function
    $(document).on('click','.btn',buttonClick);

});