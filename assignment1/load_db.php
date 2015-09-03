<?php
//Name: Sudha Mallavarapu
// Program description: This is a php script to load a table called users and 
//                      load it with data from api.randomuser.me 

//################################################################
//creating a variable to store the host name password and dbname and printing it
$dbinfo = json_decode(file_get_contents("/home/smallavarapu/5303-Database-Sudha/db.config.json"));
print_r($dbinfo);

//code to connect to the database 
$db = new mysqli($dbinfo->host,$dbinfo->user,$dbinfo->password,$dbinfo->dbname);

// if there is a connection error display this error
if($db->connect_errno > 0)
{
    die('Unable to connect to database [' . $db->connect_error . ']');
}

// Gets 1000 users from the randomuser api, and loads it into a variable called $json
$json = file_get_contents("http://api.randomuser.me/?results=1000");
print_r($json);

// This turns the variable into a PHP object
$json_array = json_decode($json);
print_r($json_array);
echo "<pre>";

//Accessing the values in the Db
for($i=0;$i<sizeof($json_array->results);$i++)
{
    $g = $json_array->results[$i]->user->gender;
	$t = $json_array->results[$i]->user->name->title;
	$f = $json_array->results[$i]->user->name->first;
	$l = $json_array->results[$i]->user->name->last;
	$s = $json_array->results[$i]->user->location->street;
	$c = $json_array->results[$i]->user->location->city;
	$st = $json_array->results[$i]->user->location->state;
	$z = $json_array->results[$i]->user->location->zip;
	$e = $json_array->results[$i]->user->email;
	$u = $json_array->results[$i]->user->username;
	$p = $json_array->results[$i]->user->password;
	$d = $json_array->results[$i]->user->dob;
	$ph = $json_array->results[$i]->user->phone;
	$pic = $json_array->results[$i]->user->picture->large;

//printing the values retrieved from the json array
echo "<pre>";
echo "$g,$t,$f,$l,$s,$c,$st,$z,$e,$u,$p,$d,$ph,$pic";	
$sql = "
    SELECT *
    FROM users
	WHERE email = '{$e}'"; 
	if(!$result = $db->query($sql))
	{
		die('There was an error running the query [' . $db->error . ']');
	}
	if(!$result->num_rows>0)
	{
		//inserting the values into the database
		$sql = "INSERT INTO users
				VALUES ('$g','$t','$f','$l','$s','$c','$st','$z','$e','$u','$p','$d','$ph','$pic')";

	if(!$result = $db->query($sql))
	{
		echo( '[' . $db->error . ']');		
	}
}
}	
