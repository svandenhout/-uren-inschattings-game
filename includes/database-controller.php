<?php
include_once 'settings.php';

$connection = new mysqli($server, $username, $password, $database_name);
if ($connection->connect_errno) {
    $response = "Failed to connect to MySQL: " . $connection->connect_error;
}

switch($_POST['action_type']) {
case 'insert-new-todo-list':
	$query = "INSERT INTO  `uren_inschattingsgame`.`inschattingen` (
	`TODO_list_id` ,
	`user_id` ,
	`project_id` ,
	`estimate` ,
	`actual` ,
	`date` ,
	`project_manager`
	)
	VALUES (
	" . $_POST['todo_list_id'] . ", NULL , " . $_POST['project_id'] . " , NULL , NULL , NOW() , NULL
	);";

	$res = $connection->query($query);
break;

case 'select-todo-list':
	$query = sprintf("SELECT TODO_list_id, user_id, project_id, estimate, actual FROM inschattingen");
break;

case 'get-todo-lists-from-database':
	$todoIdArr = array();
	
	$res = $connection->query("SELECT TODO_list_id FROM inschattingen");
	while ($row = $res->fetch_array()) {
		array_push($todoIdArr ,$row[0]);
	}
	
	$response = $todoIdArr;
break;

default:
	$response = "NO_VALID_ACTION";
break;
}

function print_r_html ($arr) {
    ?><pre><?
    print_r($arr);
    ?></pre><?
}

echo json_encode($response);
$connection->close();
?>