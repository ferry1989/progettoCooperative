$(document).ready(function() {

	$(".updateUtente").click(function() {
		var idUtente = $(this).closest('tr').attr('id');
		var password = $(this).closest('tr').children().children('input[name*="password"]').val();
		var user = $(this).closest('tr').children().children('input[name*="user"]').val();
		var isAdmin = $(this).closest('tr').children().children('input[name*="isAdmin"]').val();
		var utente = {
			"idUtente": idUtente,
			"user": user,
			"password": password,
			"isAdmin":isAdmin
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/aggiorna_utente.php",
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
	
	$(".updateEnte").click(function() {
		var idEnte = $(this).closest('tr').attr('id');
		var telefono = $(this).closest('tr').children().children('input[name*="telefono"]').val();
		var nomeEnte = $(this).closest('tr').children().children('input[name*="nomeEnte"]').val();
		var ente = {
			"idEnte": idEnte,
			"telefono": telefono,
			"nomeEnte": nomeEnte
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/aggiorna_ente.php",
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
			}
		});
	});
	
	$(".updatePresenza").click(function() {
		var idPresenza = $(this).closest('tr').attr('id');
		var dataOraInizio = $(this).closest('tr').children().children('input[name*="dataOraInizio"]').val();
		var dataOraFine = $(this).closest('tr').children().children('input[name*="dataOraFine"]').val();
		var isApprovata = $(this).closest('tr').children().children('input[name*="isApprovata"]').val();
		var presenza = {
			"idPresenza": idPresenza,
			"dataOraInizio": dataOraInizio,
			"dataOraFine": dataOraFine,
			"isApprovata": isApprovata
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/aggiorna_presenza.php",
			async: false,
			data : JSON.stringify(presenza),
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

	$(".updateProgetto").click(function() {
		var idProgetto = $(this).closest('tr').attr('id');
		var titolo = $(this).closest('tr').children().children('input[name*="titolo"]').val();
		var progetto = {
			"idProgetto": idProgetto,
			"titolo": titolo
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/aggiorna_progetto.php",
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
	
	$(".updateRegione").click(function() {
		var idRegione = $(this).closest('tr').attr('id');
		var ragioneSociale = $(this).closest('tr').children().children('input[name*="ragioneSociale"]').val();
		var piva = $(this).closest('tr').children().children('input[name*="piva"]').val();
		var tel = $(this).closest('tr').children().children('input[name*="tel"]').val();
		var regione = {
			"idRegione": idRegione,
			"ragioneSociale": ragioneSociale,
			"piva": piva,
			"tel": tel
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/aggiorna_regione.php",
			async: false,
			data : JSON.stringify(regione),
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
	
	$(".updateSede").click(function() {
		var idSede = $(this).closest('tr').attr('id');
		var indirizzo = $(this).closest('tr').children().children('input[name*="indirizzo"]').val();
		var sede = {
			"idSede": idSede,
			"indirizzo": indirizzo
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/aggiorna_sede.php",
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
	
	$(".updateVolontario").click(function() {
		var idVolontario = $(this).closest('tr').attr('id');
		var nome = $(this).closest('tr').children().children('input[name*="nome"]').val();
		var cognome = $(this).closest('tr').children().children('input[name*="cognome"]').val();
		var dataNascita = $(this).closest('tr').children().children('input[name*="dataNascita"]').val();
		var codFiscale = $(this).closest('tr').children().children('input[name*="codFiscale"]').val();
		var volontario = {
			"idVolontario": idVolontario,
			"nome": nome,
			"cognome": cognome,
			"dataNascita": dataNascita,
			"codFiscale": codFiscale
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/aggiorna_volontario.php",
			async: false,
			data : JSON.stringify(volontario),
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