$(document).ready(function() {
	$(window).on('load', function(){
		var filtri = [];
		if($('select[name*="regione"]').length > 0){ //se esiste la select con nome regione
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
		}
		if($('select[name*="utente"]').length > 0){
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
		}
	});
	
	
	$("#inserisci_ente").on('click', function() {
		var nomeEnte = $('.ente').find('input[name*="nomeEnte"]').val();
		var telefono = $('.ente').find('input[name*="telefono"]').val();
		var id_regione = $('.ente').find('select[name*="regione"]').val();
        var id_utente = $('.ente').find('select[name*="utente"]').val();
        var codfis = $('.ente').find('input[name*="codfis"]').val();
        var tipo = $('.ente').find('input[name*="tipo"]').val();
        var rapplegale = $('.ente').find('input[name*="rapplegale"]').val();
        var cod = $('.ente').find('input[name*="cod"]').val();
        var web = $('.ente').find('input[name*="web"]').val();
        var email = $('.ente').find('input[name*="email"]').val();
        var pec = $('.ente').find('input[name*="pec"]').val();
        var fax = $('.ente').find('input[name*="fax"]').val();
        
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
	
	$("#ricerca_ente").on('click', function() {
		var denominazione = $('.ente').find('input[name*="denominazione"]').val();
		var codFisc = $('.ente').find('input[name*="codFisc"]').val();
		var email = $('.ente').find('input[name*="email"]').val();
		var pec = $('.ente').find('input[name*="pec"]').val();
		var filtri = {
			"denominazione": denominazione,
			"codFisc": codFisc,
			"email": email,
			"pec": pec
		};
		var _enti;
		
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "../script/seleziona_enti.php",
			async: false,
			data : JSON.stringify(filtri),
			contentType: "application/json",
			success: function (enti) {
				if(enti.error){
					alert(enti.error);
				}
				else{
					for (i in enti){
						$row = $('<tr/>').attr('id',enti[i].id_ente);
						$tel = $('<td/>').append($('<input/>').val(enti[i].telefono));
						$nomeEnte = $('<td/>').append($('<input/>').val(enti[i].nomeEnte));
						$codfis = $('<td/>').append($('<input/>').val(enti[i].codfis));
						$tipo = $('<td/>').append($('<input/>').val(enti[i].tipo));
						$rapplegale = $('<td/>').append($('<input/>').val(enti[i].rapplegale));
						$cod = $('<td/>').append($('<input/>').val(enti[i].cod));
						$web = $('<td/>').append($('<input/>').val(enti[i].web));
						$email = $('<td/>').append($('<input/>').val(enti[i].email));
						$pec = $('<td/>').append($('<input/>').val(enti[i].pec));
						$fax = $('<td/>').append($('<input/>').val(enti[i].fax));
						$modifica = $('<td/>').append($('<button>modifica</button>'));
						$elimina = $('<td/>').append($('<button>elimina</button>').attr('class','elimina'));

						$row.append($tel);
						$row.append($nomeEnte);
						$row.append($codfis);
						$row.append($tipo);
						$row.append($rapplegale);
						$row.append($cod);
						$row.append($web);
						$row.append($email);
						$row.append($pec);
						$row.append($fax);
						$row.append($modifica);
						$row.append($elimina);
						$('#enti_ricercati').append($row);
						
					}
				}               
			}
		});
	});
	
	
	$(document).on( 'click', '.elimina', function() {
		console.log($(this).parent('td').parent('tr').attr('id'));
	});
	
	
	function eliminaEnte(el){
		console.log(el);
	}
	
	
});