<?php
//Name: saboor,sudha,shweta
//Description: script for pushing data into userPreference table
//sudha mallavarapu's database was used to do the scripts for the credentials
//################################################################

//creating a variable to store the host name password and dbname and printing it

//code to connect to the database 
$db = new mysqli('localhost','smallavarapu','smallavarapu2015','smallavarapu');

// if there is a connection error display this error
if($db->connect_errno > 0)
{
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$json = file_get_contents("http://api.randomuser.me/?results=1000");
//print_r($json);
$json_array = json_decode($json);
//print_r($json_array->results);

$preid=1;
for($i=0;$i<sizeof($json_array->results);$i++)
{
	$gender=$json_array->results[$i]->user->gender;
	$title=$json_array->results[$i]->user->name->title;
	$first=$json_array->results[$i]->user->name->first;
	$last=$json_array->results[$i]->user->name->last;
	$street=$json_array->results[$i]->user->location->street;
	$city=$json_array->results[$i]->user->location->city;
	$state=$json_array->results[$i]->user->location->state;
	$zip=$json_array->results[$i]->user->location->zip;
	$email=$json_array->results[$i]->user->email;
	$username=$json_array->results[$i]->user->username;
	$password=$json_array->results[$i]->user->password;
	$dob=$json_array->results[$i]->user->dob;
	$phone=$json_array->results[$i]->user->phone;
	$picture=$json_array->results[$i]->user->picture->medium;    
    //checking the email if present in the table
    //echo "'$dob'"."\n";
    $j=$phone;
    //echo "hello:"."'$j[4]'"."\n";
    if($j[1]>=0)
    {
    if($j[1]<=9)
    {
    //echo "hello:"."'$j[1]'"."\n";
    }
    
    }
	//echo "'$sql'"."\n";		
    //killing the sql with an error
	   
        //$j0= rand(0,1000);
        $j1=$j[1]+rand(1,40);
        $j2=$j[2]+rand(1,40)+1;
        //$j3=$j[3]+rand(0,50)+2;
        
        $start = strtotime("2012-10-01 00:00:00");
        $end =  strtotime("2012-12-31 23:59:59");
        $randomDate = date("Y-m-d H:i:s", rand($start, $end));
        
        //$d=date("Y-m-d h:i:sa");
        $d=$randomDate;
       $sql1 = "
			INSERT INTO userPreference
			VALUES('$preid','$j1','$j2','$d')";
            
		#echo $sql1."\n";	
        //throwing the error
		if(!$result1 = $db->query($sql1))
		{
			echo('['.$db->error.']');
        }
        $preid=$preid+1;
}