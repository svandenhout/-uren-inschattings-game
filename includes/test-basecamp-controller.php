<?php
include "settings.php";


switch($_POST['action_type']){
case 'get-todo-lists-for-project':
	
	$response = getTodoListsForProject($_POST['project_id']);
break;
}

echo json_encode($response)
?>