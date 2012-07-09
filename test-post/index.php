<?php
$basecamp_url = 'https://ijsfonteininteractive.basecamphq.com/';

//username is momenteel een authentication token die iedereen in de applicatie in zal moeten voeren
$username = 'bac407a86331d86314cbcbc53b85f27343494b97';
$password = 'x';

    require('includes/Basecamp.class.php');
	
	/*
	 * simplexml modus zorgt voor een nettere response array waarin alle waarden specefiek kunnen worden aangesproken 
	 */
    $bc = new Basecamp($basecamp_url,$username,$password,'simplexml');
    
    /*
	 * functie aanroepen om nieuw project aan te maken
	 * NIET UNCOMMENTEN (hij doet het echt!)
	 */
   	//$response = $bc->createProject('TEST PROJECT (voor intern ijsfontein project)');
    
    $project_id = "9700484";
    $person_id = "9103088";
	
	//datum format is andersom
    $date = "2012-05-22";
	$hours = "5";
	$description = "werken aan een test";
    $name = "een nieuwe TODO list!!!";
	
	//$timeEntries = $bc->getTimeEntriesForProject($project_id,$page=0);
	
	$people = $bc->getPeople();
	
    //$response = $bc->createTodoListForProject($project_id, $name, $description=null, $milestone_id=null, $private=null, $tracked=null);
    
	//$response = $bc->createTimeEntryForProject($project_id, $person_id, $date, $hours, $description);
	
    //$response = $bc->getTimeEntriesForProject('9700484',$page=0);
    
    
function print_r_html ($arr) {
    ?><pre><?
    print_r($arr);
    ?></pre><?
}

print_r_html($people);
?>
