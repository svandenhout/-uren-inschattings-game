<?php
$basecamp_url = 'https://ijsfonteininteractive.basecamphq.com/';

//username is momenteel een authentication token die iedereen in de applicatie in zal moeten voeren
$username = 'bac407a86331d86314cbcbc53b85f27343494b97';
$password = '';

//$loadedXML = simplexml_load_file('text.xml');

$body = array('request' => 
	array('todo-item'=>array(
    'content'=>'een nieuwe TODO!!!',
    	)
	)
);

$request = "<todo-item>
  			<content>#een nieuwe TODO!!!</content>
			</todo-item>";

// $xml_body = new SimpleXMLElement;

// CURLOPT_URL kan adhv de api referentie: http://developer.37signals.com/basecamp/ de juiste xml bestanden ophalen vanuit basecamp

$session = curl_init();

curl_setopt($session, CURLOPT_URL, $basecamp_url.'todo_lists/#20065255/todo_items/new.xml');

curl_setopt($session, CURLOPT_POSTFIELDS, $body);
curl_setopt($session, CURLOPT_POST, 1);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Accept: application/xml', 'Content-Type: application/xml'));
 
curl_setopt($session,CURLOPT_USERPWD,$username . ":" . $password);
 
if(ereg("^(https)",$request)) curl_setopt($session,CURLOPT_SSL_VERIFYPEER,false);
 
$response = curl_exec($session);
curl_close($session);

print_r($response) ;
?>

<?php
$session = curl_init();
 
$basecamp_url = 'https://ijsfonteininteractive.basecamphq.com/';

//username is momenteel een authentication token die iedereen in de applicatie in zal moeten voeren
$username = 'bac407a86331d86314cbcbc53b85f27343494b97';
$password = '';

//CURLOPT_URL kan adhv de api referentie: http://developer.37signals.com/basecamp/ de juiste xml bestanden ophalen vanuit basecamp
curl_setopt($session, CURLOPT_URL, $basecamp_url.'/projects/9700484/time_entries.xml');
curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($session, CURLOPT_HTTPGET, 1);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Accept: application/xml', 'Content-Type: application/xml'));
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
 
curl_setopt($session,CURLOPT_USERPWD,$username . ":" . $password);
 
if(ereg("^(https)",$request)) curl_setopt($session,CURLOPT_SSL_VERIFYPEER,false);
 
$response = curl_exec($session);
curl_close($session);

$output_xml = new SimpleXMLElement($response);


//formatting print_r
function print_r_html ($arr) {
        ?><pre><?
        print_r($arr);
        ?></pre><?
}


print_r_html($output_xml);
echo $output_xml['hours'];
//veel object properties gebruiken een dash
//een object property met een dash zet ik als string in een variabele
//gaarne een nette oplossing bedenken
$firstName = 'first-name';

echo "<h1>mensen</h1>";
echo "<table border='1'>";
foreach ($output_xml->person as $person) {
	//echo "ID: ".$project->id."<br />";
	echo "<tr><td>" .$person->id. "</td><td>" .$person->$firstName. "</td></tr>";
}
echo "</table>";
?>