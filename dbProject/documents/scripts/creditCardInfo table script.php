<?php
//Name: saboor,sudha,shweta
//Description: script for pushing data into creditCardinfo table
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

$uuid=1;

//print_r($json_array->results);
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
    $cell=$json_array->results[$i]->user->cell;
	$picture=$json_array->results[$i]->user->picture->medium;    
    //checking the email if present in the table
    //echo "'$dob'"."\n";
        //echo $uuid."\n";
        
        $sql = "
		SELECT *
		FROM users
		WHERE uuid = '{$uuid}';
		";
        $value=$db->query($sql);
                
        //echo "'$sql'";
        if ($value->num_rows > 0) 
        {
            // output data of each row
            while($row = $value->fetch_assoc()) 
                {
                    $rid=$row["rid"];
                    //echo $row["rid"]."\n";
                    if($rid==1)
                    {
                    //echo $row["rid"]."\n";
                    
                    $c1=rand(1000,2000);
                    $c2=rand(2001,3000);
                    $c3=rand(3001,4000);
                    $c4=rand(4001,5000);
                    //$cardno=$c1.$c2.$c3.$c4;
                    //$cardno=rand(1,100);
                    //echo $cardno."\n";
                    $month=rand(1,12);
                    $expdate=rand(2016,2020);
                    $cvv=rand(111,999);
      
                    $sql1 = "
                        INSERT INTO creditCardInfo
                        VALUES('$cell','$month','$expdate','$cvv','$uuid')";
                        if(!$result1 = $db->query($sql1))
                        {
                            echo('['.$db->error.']');           
                        }
                    }                   
                }       
        }
        $uuid=$uuid+1;            
}