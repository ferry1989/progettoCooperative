$(document).ready(function() {
	
	var filtri = {};
	$.ajax({
		type: "POST",
		dataType: 'json',
		url: "../script/seleziona_enti.php",
		async: false,
		data : JSON.stringify(filtri),
		contentType: "application/json",
		success: function (data) {
			if(data.error){
				alert(data.error);
			}
			else{
				for (i in data){
					$('#seleziona_enti').append('<option value=' + data[i].id_ente + '>' + data[i].nomeEnte + '</option>');
				}     
			}               
		}
	});
	
	$.ajax({
		type: "POST",
		dataType: 'json',
		url: "../script/seleziona_progetti.php",
		async: false,
		data : JSON.stringify(filtri),
		contentType: "application/json",
		success: function (data) {
			if(data.error){
				alert(data.error);
			}
			else{
				for (i in data){
					$('#seleziona_progetti').append('<option value=' + data[i].id_progetto + '>' + data[i].titolo + '</option>');
				}     
			}               
		}
	});
	
	$("#seleziona_enti").change(function() {
		var id_ente = $('#seleziona_enti').val();
		$('#seleziona_progetti').html('<option value="-1">-</option>');
		$('#seleziona_sedi').html('<option value="-1">-</option>');
		var filtri = {
			"id_ente": id_ente
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "../script/seleziona_sedi.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (data) {
				if(data.error){
					alert(data.error);
				}
				else{
					for (i in data){
						$('#seleziona_sedi').append('<option value=' + data[i].id_sede + '>' + data[i].denominazione + '</option>');
					}   
				}               
			}
		});
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "../script/seleziona_progetti.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (data) {
				if(data.error){
					alert(data.error);
				}
				else{
					for (i in data){
						$('#seleziona_progetti').append('<option value=' + data[i].id_progetto + '>' + data[i].titolo + '</option>');
					}   
				}               
			}
		});
	});
	
	$("#insert_progetto_sede").click(function() {
		if (!confirm("Sei sicuro di voler aggiungere il valore?"))
			return false;

		var id_sede = $('#seleziona_sedi').val();
		var id_progetto = $('#seleziona_progetti').val();
		var utente = {
			"id_sede": id_sede,
			"id_progetto":id_progetto
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "../script/insert_sedeprogetto.php",
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