$(document).ready(function() {

	$(".deleteUtente").click(function() {
		var idUtente = $(this).closest('tr').attr('id');
		var utente = {
			"idUtente": idUtente
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/elimina_utente.php",
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
	
	$(".deleteEnte").click(function() {
		var idEnte = $(this).closest('tr').attr('id');
		var ente = {
			"idEnte": idEnte
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/elimina_ente.php",
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
	
	$(".deletePresenza").click(function() {
		var idPresenza = $(this).closest('tr').attr('id');
		var presenza = {
			"idPresenza": idPresenza
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/elimina_presenza.php",
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

	$(".deleteProgetto").click(function() {
		var idProgetto = $(this).closest('tr').attr('id');
		var progetto = {
			"idProgetto": idProgetto
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/elimina_progetto.php",
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
	
	$(".deleteRegione").click(function() {
		var idRegione = $(this).closest('tr').attr('id');
		var regione = {
			"idRegione": idRegione
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/elimina_regione.php",
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
	
	$(".deleteSede").click(function() {
		var idSede = $(this).closest('tr').attr('id');
		var sede = {
			"idSede": idSede
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/elimina_sede.php",
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
	
	$(".deleteVolontario").click(function() {
		var idVolontario = $(this).closest('tr').attr('id');
		var volontario = {
			"idVolontario": idVolontario
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "script/elimina_volontario.php",
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