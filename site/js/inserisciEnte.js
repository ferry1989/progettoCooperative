$(document).ready(function() {
	$(window).on('load', function(){
		var filtri = [];
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "../script/seleziona_regioni.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (regioni) {
				for (i in regioni){
				  $('.ente').find('select[name*="regione"]').append('<option value=' + regioni[i].id_regione + '>' + regioni[i].ragioneSociale + '</option>');
				}                       
			}
		});
		
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "../script/seleziona_utenti.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (utenti) {
				for (i in utenti){
				  $('.ente').find('select[name*="utente"]').append('<option value=' + utenti[i].id_utente + '>' + utenti[i].user + '</option>');
				}                       
			}
		});
	});
	
	
	$("#inserisci_ente").on('click', function() {
		var nomeEnte = $('.ente').find('input[name*="nomeEnte"]').val();
		var telefono = $('.ente').find('input[name*="telefono"]').val();
		var id_regione = $('.ente').find('select[name*="regione"]').val();
        var id_utente = $('.ente').find('select[name*="utente"]').val();
        var codfis = $('.ente').find('select[name*="codfis"]').val();
        var tipo = $('.ente').find('select[name*="tipo"]').val();
        var rapplegale = $('.ente').find('select[name*="rapplegale"]').val();
        var cod = $('.ente').find('select[name*="cod"]').val();
        var web = $('.ente').find('select[name*="web"]').val();
        var email = $('.ente').find('select[name*="email"]').val();
        var pec = $('.ente').find('select[name*="pec"]').val();
        var fax = $('.ente').find('select[name*="fax"]').val();
        
		var ente = {
            'nomeEnte':nomeEnte,
            'telefono':telefono,
			'id_regione':id_regione,
            'id_utente':id_utente,
            'codfis':codfis,
            'tipo':tipo,
            'rapplegale':rapplegale,
            'cod':cod,
            'web':web,
            'email':email,
            'pec':pec,
            'fax':fax
        };
        
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "../script/insert_ente.php",
			async: false,
			data : JSON.stringify(ente),
			contentType: "application/json",
			success: function (msg) {
				if(msg.error){
					alert(msg.error);
				}
				else{
					alert(msg.success);
				}               
            },
            error: function (msg) {
                console.log(msg)
            }
		});
	});
	
});