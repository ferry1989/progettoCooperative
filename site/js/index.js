
//------------------------------------------------------------------------
var generalInsert = function(msg) {
    msg.error ? alert(msg.error) : alert(msg.success);
}

var regioni = function (regioni) {
    console.log('prova');
    for (i in regioni){
        console.log('prova');
        $('select[name*="id_regione"]').append('<option value=' + regioni[i].id_regione + '>' + regioni[i].ragioneSociale + '</option>');
    }                       
}
//-------------------------------------------------------------------------

//function used for fill select forms
function fillSelect (forms) {
    for(var form of forms) {
        let type = $('.type').val();
        let id = form.id;
        let url = '../script/' + id + '.php';
        let json = {'type':type};
        let success = regioni;

        console.log(success);
        callAjax(json,url,success);
    }
}

//function used for insert or remove or select rows from db
function buttonClick() {
    let forms = $('.form-control');
    let formClick = $(this)[0];
    let id = formClick.id;
    let url = '../script/' + id + '.php';
    let json = {};
    let success = generalInsert;

    for (var form of forms) {
        json[form.name] = form.value;
    }

    if( id.indexOf('seleziona') > -1 ) {
        success= null;
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
        success: success,
        error: function(msg){
            console.log(msg);
        }
    });
}

$(document).ready(function() {

    var initSelect = $('select');

    //to initializate select forms
    if( initSelect.length > 0 ){
        fillSelect(initSelect);
    }

    //on click button we do different function
    $('.btn').on('click',buttonClick);

});