
//----------------------SUCCESS FUNCTION-----------------------------------
var generalInsert = function(msg) {
    msg.error ? alert(msg.error) : alert(msg.success);
}

var selectForm = function(rows) {
    if(rows.error) {
        alert(rows.error)
    }else{
        $('.results').html('');
        var skip = 0;
        var lines = 0;
        let file = $('.file').val();
        for (row of rows){
            $row = $('<tr class=row'+lines+' />')

            for(prop in row){
                $row.append( $('<td/>').append($('<input class="form-control others row'+lines+'" name="'+prop+'" value="'+row[prop]+'"/>')));
            }
            $row.append( $('<td/>').append($('<button type="submit" class="btn btn-info" name=row'+lines+' id="'+'aggiorna_'+file+'">modifica</button>')));
            $row.append( $('<td/>').append($('<button type="submit" class="btn btn-info" name=row'+lines+' id="'+'elimina_'+file+'">elimina</button>')));
			if(skip>0){
				$('#ricercati').append($row);
			}else{
                skip++;
            }
            lines++;
        }
    }
}

//success of fillSelect
var fillForm = function (rows) {
    var form = rows[0]['fillForm'];
    var skip = 0;

    for (row of rows) {
		if(skip > 0){
			let values = '';
			$.each(row, function(k, v) {
                if( k == 'nomeEnte' || k == 'titolo' || k == 'denominazione' || k == 'nome' || k == 'user')
				    values += v+' ';
			});
            $('select[name*='+form+']').append('<option value=' + row[form] + '>' + values +'</option>');
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

//title for select form in dashboard
function title(title) {
    if( title == 'progetto'){
        $('.title').html('');
        $('.title').append('<th>Progetto</th><th>Ente Titolare</th><th>Anno Bando</th><th>Ente Titolare</th><th>Sede Attuazione</th><th>Modifica</th><th>Elimina</th>');
    }
    if(title == 'volontario'){
        $('.title').html('');
        $('.title').append('<th>Nome</th><th>Cognome</th><th>Codice Fiscale</th><th>Sesso</th><th>Nazionalita</th><th>Titolo Studio</th><th>Nome OLP</th><th>Cognome OLP</th><th>COD IBAN</th><th>Modifica</th><th>Elimina</th>');
    }
    if(title == 'ente'){
        $('.title').html('');
        $('.title').append('<th>ID</th><th>Telefono</th><th>Denominazione</th><th>Cod. Fiscale</th><th>Tipo</th><th>Rapp. Legale</th><th>Cod</th><th>Web</th><th>Email</th><th>Pec</th><th>Fax</th><th>Modifica</th><th>Elimina</th>');
    }
    if(title == 'sede'){
        $('.title').html('');
        $('.title').append('<th>Progetto</th><th>Sede</th><th>Modifica</th><th>Elimina</th>');
    }
}

//function used for insert or remove or select rows from db
function buttonClick() {
    let formClick = $(this)[0];
    let id = formClick.id;
    let divisor = $('.'+id).find('input');
    console.log(divisor);
    let type, forms;
    let url = '../script/' + id + '.php';
    let json = {};
    let success = generalInsert;

    if( ( id.indexOf('insert') > -1 ) || ( id.indexOf('seleziona') > -1 ) ) {

        if( id.indexOf('seleziona') > -1 ){
            type = divisor[1].value;
            forms = divisor.find('.form-control');
            success= selectForm;
            title(divisor[0].value);
        }

        if( id.indexOf('insert') > -1 ){
            type = $('.type').val();
            forms = $('.form-control');
        }

        json = {'type':type,'fillForm':'select'};
        for (var form of forms)
            json[form.name] = form.value;

    }else{
        if( id.indexOf('aggiorna') > -1 ) {
            let row = $(this)[0].name;
            let forms = $('.'+row);
            for (var form of forms)
                json[form.name] = form.value;
        }else{
            let row = $(this)[0].name;
            let form = $('.'+row)[1].value;
            let file = $('.file').val();
            console.log(row)
            let id_form = 'id_'+file;
            json[id_form] = form;
            $('.'+row).slideUp('slow').trigger('change');
        }
    }

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

    $('.datepicker').datetimepicker();

});