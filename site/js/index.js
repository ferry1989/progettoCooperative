$(document).ready(function() {

    var initSelect = $('select');

    //to initializate select forms
    if( initSelect.length > 0 ){
        fillSelect(initSelect);
    }

    //on click button we do different function
    $('.btn').on('click',mainFunct);

});

function mainFunct() {
    var forms = $(this);

    for(var form in forms) {
        let id = form.id;
        let url = '../script/' + id + '.php';
        var json = '';

        //distinguere per tipologia di file, sai che se è un remove, sarà diverso da seleziona
        let success = function(msg) {msg.error ? alert(msg.error) : alert(msg.success);}

        callAjax(json,url,success);
    }
}

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

function fillSelect () {
    
}