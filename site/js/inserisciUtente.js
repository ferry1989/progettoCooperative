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
				  $('.utente').find('select[name*="regione"]').append('<option value=' + regioni[i].id_regione + '>' + regioni[i].ragioneSociale + '</option>');
				}                       
			}
		});
		
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "../script/seleziona_enti.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (enti) {
				for (i in enti){
				  $('.utente').find('select[name*="ente"]').append('<option value=' + enti[i].id_ente + '>' + enti[i].nomeEnte + '</option>');
				}                       
			}
		});
	});
	
	
	$("#inserisci_utente").on('click', function() {
		var user = $('.utente').find('input[name*="user"]').val();
		var password = $('.utente').find('input[name*="password"]').val();
		var id_regione = $('.utente').find('select[name*="regione"]').val();
		var id_ente = $('.utente').find('select[name*="ente"]').val();
		var password = $('.utente input[name*="password"]').val();
		
		var utente = {
			"user": user,
			"password":password,
			'id_regione':id_regione,
			'id_ente':id_ente
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "../script/insert_utente.php",
			async: false,
			data : JSON.stringify(utente),
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