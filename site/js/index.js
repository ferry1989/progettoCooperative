$(document).ready(function() {

    //on click button we do different function
    $('.btn').on('click',mainFunct);

});

function mainFunct() {
    var id = $(this).id;
    var url = '../script/' + id + '.php';
    var json = '';
    var success = function(msg) {msg.error ? alert(msg.error) : alert(msg.success);}

    callAjax(json,url,success);
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