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
			dataType: 'json',
			url: "script/insert_utente.php",
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
				if(msg.error){
					alert(msg.error);
				}
				else{
					alert(msg.success);
				}
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
	
	$("#insertVolontario").click(function() {
		var nome = $('.volontario input[name*="nome"]').val();
		var cognome = $('.volontario input[name*="cognome"]').val();
		var dataNascita = $('.volontario input[name*="dataNascita"]').val(); //formato yyyymmdd
		var codFiscale = $('.volontario input[name*="codFiscale"]').val();
		var ente = $('.volontario select[name*="ente"]').val();
		var volontario = {
			"nome": nome,
			"cognome": cognome,
			"dataNascita": dataNascita,
			"codFiscale": codFiscale,
			"ente": ente
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/insert_volontario.php",
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
	
	$("#insertProgetto").click(function() {
		var titolo = $('.progetto input[name*="titolo"]').val();
		var idRegione = $('.progetto select[name*="regione"]').val();
		var progetto = {
			"idRegione": idRegione,
			"titolo": titolo
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
	
	$("#insertPresenza").click(function() {
		var idVolontario = $('.presenza select[name*="volontario"]').val();
		var idProgetto = $('.presenza select[name*="progetto"]').val();
		var dataOraInizio = $('.presenza input[name*="dataOraInizio"]').val(); //formato yyyymmddhhmmss (ad es 20180518200000)
		var dataOraFine = $('.presenza input[name*="dataOraFine"]').val();	//formato yyyymmddhhmmss (ad es 20180518200000)
		console.log(dataOraInizio);
		var isApprovata = $('.presenza select[name*="approvata"]').val();
		var presenza = {
			"idVolontario": idVolontario,
			"idProgetto": idProgetto,
			"dataOraInizio": dataOraInizio,
			"dataOraFine": dataOraFine,
			"isApprovata": isApprovata
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/insert_presenza.php",
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
	
	$("#insertRegioneProgetto").click(function() {
		var idProgetto = $('.regioneprogetto select[name*="progetto"]').val();
		var idRegione = $('.regioneprogetto select[name*="regione"]').val();
		var regioneprogetto = {
			"idProgetto": idProgetto,
			"idRegione": idRegione
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/insert_regioneprogetto.php",
			async: false,
			data : JSON.stringify(regioneprogetto),
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
	
	$("#insertVolontarioProgetto").click(function() {
		var idProgetto = $('.volontarioprogetto select[name*="progetto"]').val();
		var idVolontario = $('.volontarioprogetto select[name*="volontario"]').val();
		var regioneprogetto = {
			"idProgetto": idProgetto,
			"idVolontario": idVolontario
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/insert_volontarioprogetto.php",
			async: false,
			data : JSON.stringify(regioneprogetto),
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