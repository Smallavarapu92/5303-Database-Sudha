<?php
//Name: saboor,sudha,shweta
//Description: script for pushing data into priceassigned table
//sudha mallavarapu's database was used to do the scripts for the credentials
//################################################################
//code to connect to the database 
$db = new mysqli('localhost','smallavarapu','smallavarapu2015','smallavarapu');

// if there is a connection error display this error
if($db->connect_errno > 0)
{
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$json = file_get_contents("http://api.randomuser.me/?results=200");
//print_r($json);
$json_array = json_decode($json);

$paid=1;

//print_r($json_array->results);
for($i=0;$i<sizeof($json_array->results);$i++)
{
        
        $sql = "
		SELECT *
		FROM price
		WHERE priceId = '{$paid}';
		";
        $value=$db->query($sql);
                
        //echo "'$sql'";
        if ($value->num_rows > 0) 
        {
            // output data of each row
            while($row = $value->fetch_assoc()) 
                {
                    $priceid=$row["priceId"];
                    $priceSetDate=$row["priceSetDate"];
                    //echo $row["rid"]."\n";
                    $purchaseid=rand(1,44);
                    $sql1 = "
                        INSERT INTO priceAssigned
                        VALUES('$paid','$priceid','$priceSetDate','$purchaseid')";
                        if(!$result1 = $db->query($sql1))
                        {
                            echo('['.$db->error.']');           
                        }                  
                }       
        }
        $paid=$paid+1;            
}