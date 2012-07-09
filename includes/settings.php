<?php
include_once "basecamp.class.php";

/*
 * database
 */
$server = "localhost";
$username = "root";
$password = "";
$database_name = "uren_inschattingsgame";


/*
 * basecamp
 */
$loginToken = (string) $_COOKIE['login_token_cookie'];
$bcURL = 'https://ijsfonteininteractive.basecamphq.com/';

//simplexml zorgt dat ik een object kan returnen
$bc = new Basecamp($bcURL, $loginToken, 'x', 'simplexml');
?>