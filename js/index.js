$(document).ready(function() {
	$(window).load(function(){
	   $.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/seleziona_utenti.php",
			async: false,
			contentType: "application/json",
			success: function (users) {
				for (i in users){
				  $('.regione select[name*="id_utente"]').append('<option value=' + users[i].id_utente + '>' + users[i].user + '</option>');
				}           
			}
		});
	});  
	
	
	$("#insertUtente").click(function() {
		var user = $('.utente input[name*="user"]').val();
		var password = $('.utente input[name*="password"]').val();
		var utente = {
			"user": user,
			"password":password
		};
		$.ajax({
			type: "POST",
			dataType: 'jsonp',
			url: "script/insert_utente.php",
			async: false,
			data : JSON.stringify(utente),
			contentType: "application/json; charset=utf-8",
			success: function (msg) {
				alert('utente inserito con successo');                
			}
		});
	});
	
	$("#insertregione").click(function() {
		var ragioneSociale = $('.regione input[name*="ragioneSociale"]').val();
		var piva = $('.regione input[name*="piva"]').val();
		var tel = $('.regione input[name*="tel"]').val();
		var id_utente = $('.regione select[name="id_utente"] option:selected').val();
		var regione = {
			"ragioneSociale": ragioneSociale,
			"piva":piva,
			"tel":tel,
			"id_utente":id_utente
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/insert_regione.php",
			async: false,
			data : JSON.stringify(regione),
			contentType: "application/json",
			success: function (msg) {
				alert('regione inserita con successo');
			}
		});
	});
	
	$("#insertEnte").click(function() {
		var telefono = $('.ente input[name*="telefono"]').val();
		var regione = $('.ente select[name*="regione"]').val();
		var utente = $('.ente select[name*="utente"]').val();
		var nomeEnte = $('.ente input[name*="nomeEnte"]').val();
		var ente = {
			"nomeEnte": nomeEnte,
			"telefono": telefono,
			"regione":regione,
			"utente":utente
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/insert_ente.php",
			async: false,
			data : JSON.stringify(ente),
			contentType: "application/json",
			success: function (msg) {
				console.log(ente);
				if(msg.error){
					alert(msg.error);
				}
				else{
					alert(msg.success);
				}
			}
		});
	});
	
	$("#insertSede").click(function() {
		var indirizzo = $('.sede input[name*="indirizzo"]').val();
		var ente = $('.sede select[name*="ente"]').val();
		var sede = {
			"indirizzo": indirizzo,
			"ente": ente
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/insert_sede.php",
			async: false,
			data : JSON.stringify(sede),
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