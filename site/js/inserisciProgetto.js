$(document).ready(function() {

    var filtriProgetti = {
        'type': 'project'
    };

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "../script/seleziona_enti.php",
        async: false,
        data : JSON.stringify(filtriProgetti),
        contentType: "application/json",
        success: function (enti) {
            for (i in enti){
                $('.progetto').find('select[name*="ente"]').append('<option value=' + enti[i].id_ente + '>' + enti[i].nomeEnte + ' ' + enti[i].codfis + '</option>');
            }                       
        }
    });

    var filtriSedi = [];

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "../script/seleziona_sedi.php",
        async: false,
        data : JSON.stringify(filtriSedi),
        contentType: "application/json",
        success: function (sedi) {
            for (i in sedi){
                $('.progetto').find('select[name*="sede"]').append('<option value=' + sedi[i].id_sede + '>' + sedi[i].indirizzo + '</option>');
            }                       
        }
    });

    //fare la logica per selezionare i valori dal menu a tendina
    //prima però bisogna creare una nuova entità settprev per il quale dopo bisogna passare come array al json
    //da capire con jacopo come gestire questi record che vengono salvati
    //$('select[').val()

    $("#insertProgetto").click(function() {
        var ente = $('.progetto select[name*="annobando"]').val();
		var titolo = $('.progetto input[name*="titolo"]').val();
        var annobando = $('.progetto input[name*="annobando"]').val();
        var settprev = $('.progetto input[name*="settprev"]').val();
        var altrosett = $('.progetto input[name*="altrosett"]').val();
        var sedi = $('.progetto select[name*="sedi" .selected]').val();
        
		var progetto = {
            "ente": ente,
            "titolo": titolo,
            "annobando": annobando,
            "settprev": settprev,
            "altrosett": altrosett,
            "sedi": sedi
        };
        
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/insert_progetto.php",
			async: false,
			data : JSON.stringify(progetto),
			contentType: "application/json",
			success: function (msg) {
				if(msg.error){
					alert(msg.error);
				}
				else{
					alert(msg.success);
				}
			}
		});
    });
});