
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#insertUtente").click(function() {
		var utente = {
			"user": "ciccio",
			"password":"12223",
		};
		$.ajax({
			type: "POST",
			dataType: 'jsonp',
			url: "script/insert_utente.php",
			async: false,
			data : JSON.stringify(utente),
			contentType: "application/json; charset=utf-8",
			success: function (msg) {
				console.log(msg);                
			}
		});
	});
});
</script>
</head>
<body>
<div class="utente">
	<table>
		<tr>
			<td>user</td>
			<td>password</td>
		</tr>
		<tr>
			<td><input name='user' /></td>
			<td><input type='password' name='password' /></td>
		</tr>
		<tr>
			<td></td>
			<td><button id="insertUtente">inserisci</button></td>
		</tr>
		
	</table>
</form>
</body>
</html>
