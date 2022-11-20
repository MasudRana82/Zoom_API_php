<?php 

 
 
include_once 'Zoom_Api.php';
session_start();

$zoom_meeting = new Zoom_Api();

$data = array();
$data['topic'] 		= 'Zoom Meeting';
$data['start_date'] = date("Y-m-d h:i:s", strtotime('tomorrow'));
$data['duration'] 	= 30;
$data['type'] 		= 2;
$data['password'] 	= "123456";

try {
	$response = $zoom_meeting->createMeeting($data);
	
	// echo "<pre>";
	// print_r($response);
	// echo "<pre>";
	
	echo "Meeting ID: ". $response->id;
	echo "<br>";
	echo "Topic: "	. $response->topic;
	echo "<br>";
	echo "Meeting Password: " . $response->password;
	echo "<br>";
	echo "Join URL: ". $response->join_url ."<a href='". $response->join_url . "'> <h3>Start The Class</h3> </a>";
	echo "<br>";
	$_SESSION['url']= $response->join_url;
	
    
	
} catch (Exception $ex) {
    echo $ex;
}


?>