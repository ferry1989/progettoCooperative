function insertUtente(user,password){
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
					return utente;
				}               
			}
		});
}