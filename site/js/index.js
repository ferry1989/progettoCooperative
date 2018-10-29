
//----------------------SUCCESS FUNCTION-----------------------------------
var generalInsert = function(msg) {
    msg.error ? alert(msg.error) : alert(msg.success);
}

 var selectForm = function(msg) {
    if(msg.error) {
        alert(msg.error)
    }else{
        for (i in enti){
//             $row = $('<tr/>').attr('id',enti[i].id_ente);
//             $tel = $('<td/>').append($('<input/>').val(enti[i].telefono));
//             $nomeEnte = $('<td/>').append($('<input/>').val(enti[i].nomeEnte));
//             $codfis = $('<td/>').append($('<input/>').val(enti[i].codfis));
//             $tipo = $('<td/>').append($('<input/>').val(enti[i].tipo));
//             $rapplegale = $('<td/>').append($('<input/>').val(enti[i].rapplegale));
//             $cod = $('<td/>').append($('<input/>').val(enti[i].cod));
//             $web = $('<td/>').append($('<input/>').val(enti[i].web));
//             $email = $('<td/>').append($('<input/>').val(enti[i].email));
//             $pec = $('<td/>').append($('<input/>').val(enti[i].pec));
//             $fax = $('<td/>').append($('<input/>').val(enti[i].fax));
//             $modifica = $('<td/>').append($('<button>modifica</button>'));
//             $elimina = $('<td/>').append($('<button>elimina</button>').attr('class','elimina'));
    
//             $row.append($tel);
//             $row.append($nomeEnte);
//             $row.append($codfis);
//             $row.append($tipo);
//             $row.append($rapplegale);
//             $row.append($cod);
//             $row.append($web);
//             $row.append($email);
//             $row.append($pec);
//             $row.append($fax);
//             $row.append($modifica);
//             $row.append($elimina);
//             $('#enti_ricercati').append($row);
        }
    }
}

//DA AGGIUSTARE ASSOLUTAMENTE
var fillForm = function (rows) {
    var form = rows[0]['fillForm'];
    for (row of rows) {
        $('select[name*='+form+']').append('<option value=' + row[form] + '>' + row[form] +'</option>');
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
        success= null;

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
    $('.btn').on('click',buttonClick);

});