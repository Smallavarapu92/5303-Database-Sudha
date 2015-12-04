<?php
//Name: saboor,sudha,shweta
//Description: script for pushing data into cart table.
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
$json = file_get_contents("http://api.randomuser.me/?results=50");
//print_r($json);
$json_array = json_decode($json);
//print_r($json_array->results);

$caid=1;
$serial=1;
for($i=0;$i<sizeof($json_array->results);$i++)
{
       
                        
                        $ran=rand(1,30);
                        $mid=$ran;
                          $start = strtotime("2015-10-01 00:00:00");
                        $end =  strtotime("2015-12-31 23:59:59");
                        $randomDate = date("Y-m-d H:i:s", rand($start, $end));
                        
                        //$d=date("Y-m-d h:i:sa");
                        $date=$randomDate;
                        $uid=rand(1,1000);
                        
                        $sql1 = "
                        INSERT INTO cart
                        VALUES('$caid','$mid','$date','$uid')";
                         $serial=$serial+1;
                        if(!$result1 = $db->query($sql1))
                        {
                            echo('['.$db->error.']');           
                        }      
           $caid=$caid+1;         
}