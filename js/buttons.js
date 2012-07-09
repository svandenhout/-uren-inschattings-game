//TODO: MAKE RADIO BUTTONS

$('#estimations-btn').click(function() {
	$('.estimations-btn').addClass('estimations-btn-active');
	$('.leaderboard-btn').removeClass('leaderboard-btn-active');
	$('.profile-btn').removeClass('profile-btn-active');
	$('.trophy-btn').removeClass('trophy-btn-active');
});

$('#leaderboard-btn').click(function() {
	$('.estimations-btn').removeClass('estimations-btn-active');
	$('.leaderboard-btn').addClass('leaderboard-btn-active');
	$('.profile-btn').removeClass('profile-btn-active');
	$('.trophy-btn').removeClass('trophy-btn-active');
});

$('#profile-btn').click(function() {
	$('.estimations-btn').removeClass('estimations-btn-active');
	$('.leaderboard-btn').removeClass('leaderboard-btn-active');
	$('.profile-btn').addClass('profile-btn-active');
	$('.trophy-btn').removeClass('trophy-btn-active');
});

$('#trophy-btn').click(function() {
	$('.estimations-btn').removeClass('estimations-btn-active');
	$('.leaderboard-btn').removeClass('leaderboard-btn-active');
	$('.profile-btn').removeClass('profile-btn-active');
	$('.trophy-btn').addClass('trophy-btn-active');
});
