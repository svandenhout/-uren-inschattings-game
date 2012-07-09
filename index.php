<!--
De cookie staat momenteel op 10 minuten (uiteindelijk moet dit veel langer zijn)
-->
<?php
	if(isset($_COOKIE['login_token_cookie'])) {
		header("Location: homepage.php");
	}else{
		echo "<link href='stylesheet.css' rel='stylesheet' type='text/css'>";
		echo "<div id='ultra-container'>";
		echo "<div id='login-view'>";
		echo "<form name='login_form' id='login-form' method='get'>";
		echo "<input type='text' name='login_token_input' id='login-token-input'/><br>";
		echo "<input type='button' href='index.php' onclick='javascript:setCookie();' id='login-token-submit'/>";
		echo "</form>";
		echo "</div>";
		echo "</div>";
	}
?>

<script type="text/javascript">
function setCookie() {
	var name = 'login_token_cookie';
	var date = new Date();
		date.setTime(date.getTime()+(1000*60*10));//maak cookie = 10 min
	var verloopt = date.toGMTString();
	var loginToken = login_form.login_token_input.value;
	
	document.cookie = name + ' = ' + escape(loginToken)+ "; expires =" + verloopt + "; path=/;";
	
	location.href = 'homepage.php';
}
</script>