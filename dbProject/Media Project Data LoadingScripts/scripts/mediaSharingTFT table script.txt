<?php
//Name: saboor,sudha,swetha
// Program description: script for pushing data into table mediaSharingTFT table
//sudha mallavarapu database was used to do the scripts so the credentials
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

$tftid=1;
$serial=1;
for($i=0;$i<sizeof($json_array->results);$i++)
{
       
        $sql = "
		SELECT *
		FROM mediaSharing
		WHERE sharingId = '{$tftid}';
		";
        $value=$db->query($sql);
                
        //echo "'$sql'";
        if ($value->num_rows > 0) 
        {
            // output data of each row
            while($row = $value->fetch_assoc()) 
                {
                    $dcount=$row["downloadCount"];
                    $upcnt=rand(1,$dcount);
                    $sharingid=rand(1,44);
                    $mediaid=rand(1,30);
                    $uid=rand(1,44);
                    
                    $sql1 = "
                    SELECT *
                    FROM mediaSharing
                    WHERE sharingId = '{$uid}';
                    ";
                    $value1=$db->query($sql);
                            
                    //echo "'$sql'";
                    if ($value1->num_rows > 0) 
                    {
                        // output data of each row
                        while($row1 = $value1->fetch_assoc()) 
                            {
                            $uuuid=$row1["uuid"];
                            
                            }
                    }
                    
                    $sql2 = "
                        INSERT INTO mediaSharingTFT
                        VALUES('$tftid','$mediaid','$sharingid','$upcnt','$uuuid')";
                         //$serial=$serial+1;
                        if(!$result2 = $db->query($sql2))
                        {
                            echo('['.$db->error.']');           
                        }
                    
                }
        }        
           $tftid=$tftid+1;         
}