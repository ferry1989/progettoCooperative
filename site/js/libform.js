
//----------------------SUCCESS FUNCTION-----------------------------------
var messageResponse = function(msg,response) {
    $('.response-message').html('');
    $('.response-message').append('<label class="response">'+msg[response].toUpperCase()+'</label>');
    $('.response-message').addClass(response);
    let topOffset = $('.response-message').top;
    $('html, body').animate({
        scrollTop: topOffset - 25
    },0);
    setTimeout(function(){ 
        $('.response-message').html(''); 
        $('.response-message').removeClass(response); 
    },3000);
}

var generalInsert = function(msg) {
    (msg.error) ? messageResponse(msg,'error') : messageResponse(msg,'success');
}

var selectForm = function(rows) {
    if(rows.error) {
        alert(rows.error)
    }else{
        $('.results').html('');
        var skip = 0;
        var lines = 0;
        let file = rows[0].fillForm;
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
            let url = '../script/' + id + '.php';
            let json = {'fillForm':form.name};
            let success = fillForm;

            callAjax(json,url,success,form);
        }
    }
}

//function used for insert or remove or select rows from db
function buttonClick() {
    let formClick = $(this)[0];
    let id = formClick.id;
    let forms,labels;
    let url = '../script/' + id + '.php';
    let json = {};
    let success = generalInsert;

    if( ( id.indexOf('insert') > -1 ) || ( id.indexOf('seleziona') > -1 ) ) {

        if( id.indexOf('seleziona') > -1 ){
            let file = $('.'+id).find('.file')[0].value;
            forms = $('.'+id).find('input,select');
            json = {'fillForm':file};
            success= selectForm;
            title(file);
        }

        if( id.indexOf('insert') > -1 ){
            forms = $('.form-group').find('input,select');
            labels = $('.form-group').find('label');
            let checkRequiredFields = checkMandatoryFields(forms,labels);
            if(!checkRequiredFields){
                return false;
            }
        }

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
            let file = $(this)[0].id.split("_")[1];
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

//title for select form in dashboard
function title(title) {
    if( title == 'progetto'){
        $('.title').html('');
        $('.title').append('<th>ID Progetto</th>'+
                            '<th>Titolo</th>'+
                            '<th>Anno Bando</th>'+
                            '<th>ID Ente</th>'+
                            '<th>Settore Prevalente</th>'+
                            '<th>Altro Settore</th>'+
                            '<th>Sedi di Attuazione</th>'+
                            '<th>No. Volontari</th>'+
                            '<th>No. gg. Servizio</th>'+
                            '<th>No. h ore Settimanali</th>'+
                            '<th>24 sett</th>'+
                            '<th>28 sett</th>'+
                            '<th>36 sett</th>'+
                            '<th>Modifica</th>'+
                            '<th>Elimina</th>');
    }
    if(title == 'volontario'){
        $('.title').html('');
        $('.title').append('<th>ID Volontario</th>'+
                            '<th>Nome</th>'+
                            '<th>Cognome</th>'+
                            '<th>Cod. Fiscale</th>'+
                            '<th>Sesso</th>'+
                            '<th>Titolo Studio</th>'+
                            '<th>Stato</th>'+
                            '<th>Giorni di servizio</th>'+
                            '<th>Nome olp</th>'+
                            '<th>Cognome olp</th>'+
                            '<th>Cod. Iban</th>'+
                            '<th>Provinicia Nazione Nascita</th>'+
                            '<th>Estero Residenza</th>'+
                            '<th>Comune Estero Residenza</th>'+
                            '<th>Indirizzo Residenza</th>'+
                            '<th>No. Civico Residenza</th>'+
                            '<th>CAP Residenza</th>'+
                            '<th>Provincia Domicilio</th>'+
                            '<th>Comune Domicilio</th>'+
                            '<th>Indirizzo Domicilio</th>'+
                            '<th>ID Sede Progetto</th>'+
                            '<th>No. Civico Domicilio</th>'+
                            '<th>CAP Domicilio</th>'+
                            '<th>ID Contratto</th>'+
                            '<th>Modifica</th>'+
                            '<th>Elimina</th>');
    }
    if(title == 'ente'){
        $('.title').html('');
        $('.title').append('<th>ID Ente</th>'+
                            '<th>Telefono</th>'+
                            '<th>Denominazione</th>'+
                            '<th>Cod. Fiscale</th>'+
                            '<th>Tipo</th>'+
                            '<th>Rapp. Legale</th>'+
                            '<th>Cod</th>'+
                            '<th>Web</th>'+
                            '<th>Email</th>'+
                            '<th>Pec</th>'+
                            '<th>Fax</th>'+
                            '<th>Modifica</th>'+
                            '<th>Elimina</th>');
    }
    if(title == 'sede'){
        $('.title').html('');
        $('.title').append('<th>ID Sede</th>'+
                            '<th>ID Ente</th>'+
                            '<th>Indirizzo</th>'+
                            '<th>Denominazione</th>'+
                            '<th>Numero Volontari</th>'+
                            '<th>Provincia</th>'+
                            '<th>Comune</th>'+
                            '<th>No. Civico</th>'+
                            '<th>Cap Sede</th>'+
                            '<th>Telefono</th>'+
                            '<th>Fax</th>'+
                            '<th>Titolo Giuridico</th>'+
                            '<th>Sito Web</th>'+
                            '<th>Email Ordinaria</th>'+
                            '<th>Modifica</th>'+
                            '<th>Elimina</th>');
    }
}