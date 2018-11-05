
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

//-------------------------------------------------------------------------

//function used for insert or remove or select rows from db
function buttonClick() {
    let formClick = $(this)[0];
    let id = formClick.id;
    let url = '../scripts/' + id + '.php';
    let first = $('.file_primary').slice("_");
    let json = {};
    let success = generalInsert;

    json[first[0]] = first[1];
    if( ( id.indexOf('insert') > -1 ) || ( id.indexOf('select') > -1 ) ) {
        let forms = $('.form-control');
        json['type'] = id;
        for (var form of forms)
            json[form.name] = form.value;

        if( id.indexOf('select') > -1 )
            success= selectForm;
    }else{
        if( id.indexOf('update') > -1 ) {
            let row = $(this)[0].name;
            let forms = $('.'+row);
            for (var form of forms)
                json[form.name] = form.value;
        }else{
            let row = $(this)[0].name;
            let form = $('.'+row)[1].value;
            let file = $('.file').val();
            let id_form = 'id_'+file;
            json[id_form] = form;
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

    //on click button we do different function
    $(document).on('click','.btn',buttonClick);

	$('.datepicker').datetimepicker();

});