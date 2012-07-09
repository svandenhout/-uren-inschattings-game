<?php
include_once 'settings.php';
header($string);
			
//name variables for access to objects with a '-'
$_eMail = "email-address";
$_firstName = "first-name";
$_lastName = "last-name";
$_todoList = "todo-list";

switch($_POST['action_type']) {

case 'get-companies':
	$companies = $bc->getCompanies();
	$response = '';
	for ($i=0; $i < count($companies['body']); $i++) { 
		$response = $response.(string) $companies['body']->company[$i]->name."<br>";
	}
break;

case 'get-projects':
	$projects = $bc->getProjects();
	$response = "<div id='estimations-container'><div id='top'></div><div class='scroll'>";
	 for ($i=0; $i < $numberOf = count($projects['body']->project); $i++) {
		$projectName = $projects['body']->project[$i]->name[0];
		$projectId = $projects['body']->project[$i]->id;
		$response = $response . "<div id='project" . (string) $i . "' class='estimations'>
		<div class='project-name'>". (string) $projectName . "</div>
		<a class='info-btn' id='" . (string) $projectId . "' onclick='onClickInfo(" . json_encode((string) $projectName) . ", " . (string) $projectId . ")'></a>
		</div>";
	}
	$response = $response . "</div><div id='bottom'></div></div>";
break;

case 'get-my-id':
	$id = $bc->getMyId();
	$response = "<div id='profile_uid'>" . (string) $id . "</div>";
break;

case 'get-my-name':
	$name = $bc->getMe();
	$firstName = $name['body']->$_firstName;
	$lastName = $name['body']->$_lastName;
	$response = "<div id='profile_name'>" . $firstName . " " . $lastName . "</div>";
break;

case 'get-leaderboard':
	$people = $bc->getPeopleForCompany($_POST['company_id']);
	$numberOf = count($people['body']);
	
	$response = "<div id='people-container'><div id='top'></div><div class='scroll'>";
	for ($i=0; $i < $numberOf; $i++) {
		$firstName = $people['body']->person[$i]->$_firstName;
		$lastName = $people['body']->person[$i]->$_lastName;
		$response = $response . "<div class='person-container'><div id='number'></div><div class='picture'></div>
		<div id='" . (string) $firstName  . "' class='person'>" . (string) $firstName . " " . (string) $lastName . "</div></div>";
	}
	$response = $response . "</div><div id='bottom'></div></div>";
break;
	
case 'get-todo-lists-array-for-project':
	$array = array();
	$todoLists = $bc->getTodoListsForProject($_POST['project_id']);
	$todoList = $todoLists['body']->$_todoList;
	for ($i=0; $i < count($todoLists['body']); $i++) {
		$todoListId = $todoList[$i]->id;
		array_push($array ,(string) $todoListId);
	}
	$response = $array;
break;

case 'get-time-entries-for-project':
		$response = $bc->getTimeEntriesForProject($_POST['project_id'], 9);
break;

case 'create-todo-list':
	$template = $bc->createTodoListForProject($_POST['project_id'], $_POST['name']);
	$response = $template;
break;

case 'get-todo-lists-for-project':
	$todoLists = $bc->getTodoListsForProject($_POST['project_id']);
	$todoList = $todoLists['body']->$_todoList;
	$response = "<div id='todo-list-container'><div id='top'><div id='estimations-header'><a id='back-btn' onclick='onClickBack()'></a><div id='project-name'></div></div></div><div class='scroll'>";
	if(count($todoList) > 0) {
		for ($i=0; $i < count($todoLists['body']->$_todoList); $i++) {
			$todoListId = $todoList[$i]->id;
			$todoListName = $todoList[$i]->name;
			$response = $response . "<div id='todo" . $i . "' class='todo-list'>  <div class='todoListId' style='display:none;'>" . $todoListId . "</div>
			<div class='todo-list-name'>" . $todoListName . "</div><div class='bewerken'></div></div>" ;
		}
		$response = $response . "<div class='todo-list' onclick='createTodoList(" . $_POST['project_id'] . ")'><button class='create-todo'></button></div></div><div id='bottom'></div></div>";
	} else {
		$response = "<div id='todo-list-container'><div id='top'><div id='estimations-header'>
		<a id='back-btn' onclick='onClickBack()'></a><div id='project-name'></div></div></div>
		<div class='scroll'><div id='todo' class='todo-list'><div class='todo-list-name'>
		Nog geen Todo-lists voor dit project</div><button class='create-todo' onclick='createTodoList(" . $_POST['project_id'] . ")'></button></div></div><div id='bottom'></div></div>";
	}
	
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
?>