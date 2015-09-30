<?php
//Name: Sudha Mallavarapu
//Assignment 4: This is a php script to load data from api.randomuser.me
//				into random_people collection in Mongodb
//################################################################
//connect to mongo database
$m = new MongoClient();
// select a database
$db = $m->smallavarapu;
// selecting a collection
$collection = $db->random_people;
// Gets 1000 users from the randomuser api, and loads it into a variable called $json
$json = file_get_contents("http://api.randomuser.me/?results=1000");
// This turns the variable into a PHP object and stores in an array
$json_array = json_decode($json);
//adding 1000 users 
for($i=0;$i<sizeof($json_array->results);$i++)
{	
	//inserting data into the random_people collection
	$collection->insert($json_array->results[$i]);
}