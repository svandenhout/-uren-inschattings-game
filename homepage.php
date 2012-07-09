<html>
<head>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var loginToken = <?php echo json_encode($_COOKIE['login_token_cookie'])?>;

	if(loginToken!= null && loginToken!= "") {
		
	} else {
		location.href = 'index.php';
	}
</script>
	
</head>
<body onload="onBodyLoad()">
	<div id="ultra-container">
	<button id="estimations-btn" class="estimations-btn" onclick="onClickEstimations()"></button>
	<button id="leaderboard-btn" class="leaderboard-btn" onclick="onClickLeaderboard()"></button>
	<button id="profile-btn" class="profile-btn" onclick="onClickProfile()"></button>
	<button id="trophy-btn" class="trophy-btn" onclick="createTodoList()"></button>

	<div id="container" style="display: none;"></div>
	<div id="loading-div"><img id="loading" src="img/ajax-loading.gif"/></div>
	</div>
		
</body>
<footer>
<script type="text/javascript" src="js/globals.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/buttons.js"></script>
<script type="text/javascript" src="js/ajax-functions.js"></script>
</footer>
</html>