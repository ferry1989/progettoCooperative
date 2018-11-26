$(document).ready(function() {
	
	$("#seleziona_progetti").change(function() {
		var id_progetto = $('#seleziona_progetti').val();
		$('#seleziona_sedi_progetti').html('<option value="-1">-</option>');
		var filtri = {
			"id_progetto" : id_progetto
		};
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "../script/seleziona_sedi_progetti_volontario.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (data) {
				if(data.error){
					alert(data.error);
				}
				else{
					for (i in data){
					  if(i>0) $('#seleziona_sedi_progetti').append('<option value=' + data[i].id_sede + '>' + data[i].denominazione + '</option>');
					}   
				}               
			}
		});
	});
	
});