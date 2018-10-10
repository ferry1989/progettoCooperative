$(document).ready(function() {
	
	$("#selectUtenti").click(function() {
		var id_utente = $('.utente input[name*="id_utente"]').val();
		var user = $('.utente input[name*="user"]').val();
		var password = $('.utente input[name*="password"]').val();
		var isAdmin = $('.utente select[name*="isAdmin"]').val();
		var filtri = {
			"id_utente": id_utente,
			"user": user,
			"password":password,
			"isAdmin":isAdmin
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/seleziona_utenti.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (msg) {
				if(msg.error){
					alert(msg.error);
				}
				else{
					console.log(msg);
					//$('#my-final-table').dynatable({
					//dataset: {
					//	records: JSON.parse(msg);
					//}
				}               
			}
		});
	});

	$("#selectEnti").click(function() {
		var id_ente = $('.ente input[name*="id_ente"]').val();
		var telefono = $('.ente input[name*="telefono"]').val();
		var nomeEnte = $('.ente input[name*="nomeEnte"]').val();
		var id_regione = $('.ente input[name*="id_regione"]').val();
		var id_utente = $('.ente input[name*="id_utente"]').val();
		var filtri = {
			"id_ente": id_ente,
			"telefono": telefono,
			"nomeEnte": nomeEnte,
			"id_regione": id_regione,
			"id_utente": id_utente
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/seleziona_enti.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (msg) {
				if(msg.error){
					alert(msg.error);
				}
				else{
					console.log(msg);
				}               
			}
		});
	});
	
	$("#selectPresenze").click(function() {
		var id_presenza = $('.presenza input[name*="id_presenza"]').val();
		var operatorDataInizio = $('.presenza select[name*="operatorDataInizio"]').val();
		var dataOraInizio = $('.presenza input[name*="dataOraInizio"]').val();
		var operatorDataFine = $('.presenza select[name*="operatorDataFine"]').val();
		var dataOraFine = $('.presenza input[name*="dataOraFine"]').val();
		var isApprovata = $('.presenza select[name*="isApprovata"]').val();
		var id_volontario = $('.presenza input[name*="id_volontario"]').val();
		var id_progetto = $('.presenza input[name*="id_progetto"]').val();
		var filtri = {
			"id_presenza": id_presenza,
			"operatorDataInizio": operatorDataInizio,
			"dataOraInizio": dataOraInizio,
			"operatorDataFine": operatorDataFine,
			"dataOraFine": dataOraFine,
			"isApprovata": isApprovata,
			"id_volontario": id_volontario,
			"id_progetto": id_progetto
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/seleziona_presenze.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (msg) {
				if(msg.error){
					alert(msg.error);
				}
				else{
					console.log(msg);
				}               
			}
		});
	});

	$("#selectProgetti").click(function() {
		var id_progetto = $('.progetto input[name*="id_progetto"]').val();
		var titolo = $('.progetto input[name*="titolo"]').val();
		var filtri = {
			"id_progetto": id_progetto,
			"titolo": titolo
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/seleziona_progetti.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (msg) {
				if(msg.error){
					alert(msg.error);
				}
				else{
					console.log(msg);
				}               
			}
		});
	});

	$("#selectRegioni").click(function() {
		var id_regione = $('.regione input[name*="id_regione"]').val();
		var ragioneSociale = $('.regione input[name*="ragioneSociale"]').val();
		var piva = $('.regione input[name*="piva"]').val();
		var telefono = $('.regione input[name*="telefono"]').val();
		var id_utente = $('.regione input[name*="id_utente"]').val();
		var filtri = {
			"id_regione": id_regione,
			"ragioneSociale": ragioneSociale,
			"piva": piva,
			"telefono": telefono,
			"id_utente": id_utente
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/seleziona_regioni.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (msg) {
				if(msg.error){
					alert(msg.error);
				}
				else{
					console.log(msg);
				}               
			}
		});
	});

	$("#selectRegioniProgetti").click(function() {
		var id_regione = $('.regioneprogetto input[name*="id_regione"]').val();
		var id_progetto = $('.regioneprogetto input[name*="id_progetto"]').val();
		var filtri = {
			"id_regione": id_regione,
			"id_progetto": id_progetto
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/seleziona_regioni_progetti.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (msg) {
				if(msg.error){
					alert(msg.error);
				}
				else{
					console.log(msg);
				}               
			}
		});
	});
	
	$("#selectSedi").click(function() {
		var id_sede = $('.sede input[name*="id_sede"]').val();
		var id_ente = $('.sede input[name*="id_ente"]').val();
		var indirizzo = $('.sede input[name*="indirizzo"]').val();
		var filtri = {
			"id_sede": id_sede,
			"id_ente": id_ente,
			"indirizzo": indirizzo
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/seleziona_sedi.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (msg) {
				if(msg.error){
					alert(msg.error);
				}
				else{
					console.log(msg);
				}               
			}
		});
	});

	$("#selectVolontari").click(function() {
		var id_volontario = $('.volontario input[name*="id_volontario"]').val();
		var nome = $('.volontario input[name*="nome"]').val();
		var cognome = $('.volontario input[name*="cognome"]').val();
		var operatorDataNascita = $('.volontario select[name*="operatorDataNascita"]').val();
		var dataNascita = $('.volontario input[name*="dataNascita"]').val();
		var codFiscale = $('.volontario input[name*="codFiscale"]').val();
		var id_ente = $('.volontario input[name*="id_ente"]').val();
		var filtri = {
			"id_volontario": id_volontario,
			"nome": nome,
			"cognome": cognome,
			"operatorDataNascita": operatorDataNascita,
			"dataNascita": dataNascita,
			"codFiscale": codFiscale,
			"id_ente": id_ente
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/seleziona_volontari.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (msg) {
				if(msg.error){
					alert(msg.error);
				}
				else{
					console.log(msg);
				}               
			}
		});
	});
	
});