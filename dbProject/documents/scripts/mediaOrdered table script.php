<?php
//Name: saboor,sudha,shweta
//Description: script for pushing data into mediaOrder table
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

$moid=1;
$serial=1;
for($i=0;$i<sizeof($json_array->results);$i++)
{
       
        $sql = "
		SELECT *
		FROM users
		WHERE uuid = '{$moid}';
		";
        $value=$db->query($sql);
                
        //echo "'$sql'";
        if ($value->num_rows > 0) 
        {
            // output data of each row
            while($row = $value->fetch_assoc()) 
                {
                    $rid=$row["rid"];
                    $uuid=$row["uuid"];
                    if($rid==3)
                    {
                        $uuid=$row["uuid"];
                        $start = strtotime("2015-9-01 00:00:00");
                        $end =  strtotime("2015-10-31 23:59:59");
                        $randomDate = date("Y-m-d H:i:s", rand($start, $end));
        
                        //$d=date("Y-m-d h:i:sa");
                        $dateordered=$randomDate;
                        $start = strtotime("2015-10-01 00:00:00");
                        $end =  strtotime("2015-12-31 23:59:59");
                        $randomDate = date("Y-m-d H:i:s", rand($start, $end));
        
                        //$d=date("Y-m-d h:i:sa");
                        $datereceived=$randomDate;
                        $totalcost=rand(1000,10000);
                        $listid=rand(1,5);
                        if($listid%2==0)
                        {
                        $status="n";
                        }
                        else
                        {
                        $status="y";
                        }
                        $sql1 = "
                        INSERT INTO mediaOrder
                        VALUES('$serial','$uuid','$dateordered','$datereceived','$totalcost','$listid','$status')";
                         $serial=$serial+1;
                        if(!$result1 = $db->query($sql1))
                        {
                            echo('['.$db->error.']');           
                        }
                    
                    }
               
                    
                }
        }        
           $moid=$moid+1;         
}