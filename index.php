
<!--

************************************************************************************
A simple webhook example.
Just add this to any php server and copy the URL to fullfilment section of API.ai. 
No authentication needed if its available on web.
************************************************************************************

-->


<?php

//Reads request from API.ai or any platform you are using it for.
$input = file_get_contents('php://input');
//Convert the request to JSON object so its easy to read in code.
$jsonInput = json_decode($input);
//Default responese
$response = array("displayText" => "Sorry, Not able to cook");

//Keyword in the JSON you want to read. To get to this better print the jsonInput and then create it. 
//Below is just a sample
$arrayOfRecipe = $jsonInput->result->parameters->recipe;


//Write any logic you want. Anything you put on $response will be sent to the API.ai etc.
if(count($arrayOfRecipe) > 0 ){
	foreach ($arrayOfRecipe as $key => $value) {
		sleep(10);
		$response = array("displayText" => "Webhook: Samantha will cook ".$value . " for you now");
	}
}

header('Content-Type: application/json');
echo json_encode($response);

?>