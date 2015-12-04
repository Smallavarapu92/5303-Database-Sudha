<?php
//Name: saboor,sudha,shweta
//Description: script for pushing data into crAssigned table
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
$json = file_get_contents("http://api.randomuser.me/?results=44");
//print_r($json);
$json_array = json_decode($json);
//print_r($json_array->results);

$asid=1;
$serial=1;
for($i=0;$i<sizeof($json_array->results);$i++)
{
       $sql = "
		SELECT *
		FROM purchase
		WHERE purchaseId = '{$asid}';
		";
        $value=$db->query($sql);
                
        //echo "'$sql'";
        if ($value->num_rows > 0) 
        {
            // output data of each row
            while($row = $value->fetch_assoc()) 
                {
                $purchaseid=$row["purchaseId"];
                   
                    $ran=rand(1,64);
                    //echo $uuid;
                    
                    
                    $sql1 = "
                        SELECT *
                        FROM customerRepresentative
                        WHERE crid = '{$ran}';
                        ";
                        $value1=$db->query($sql1);
                        //$row1 = $value1->fetch_assoc();
                        
                        while($row1 = $value1->fetch_assoc())
                        {
                        $custrepid=$row1["custRepId"];
                        //echo $pricesetdate."\n";

                        }
                        
                   
                        $sql1 = "
                        INSERT INTO crAssigned
                        VALUES('$asid','$purchaseid','$custrepid')";
                         $serial=$serial+1;
                        if(!$result1 = $db->query($sql1))
                        {
                            echo('['.$db->error.']');           
                        }
                    //}                   
                }       
        }
           $asid=$asid+1;         
}