<?php
//Name: saboor,sudha,shweta
//Description: script for pushing data into purchase table
//sudha mallavarapu's database was used to do the scripts for the credentials
//################################################################



//code to connect to the database 
$db = new mysqli('localhost','smallavarapu','smallavarapu2015','smallavarapu');

// if there is a connection error display this error
if($db->connect_errno > 0)
{
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$json = file_get_contents("http://api.randomuser.me/?results=150");
//print_r($json);
$json_array = json_decode($json);

$prid=1;
$serial=1;

//print_r($json_array->results);
for($i=0;$i<sizeof($json_array->results);$i++)
{
        
        $sql = "
		SELECT *
		FROM users
		WHERE uuid = '{$prid}';
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
                    //echo $row["rid"]."\n";
                    if($rid==1)
                    {
                    //echo $row["rid"]."\n";
                    $start = strtotime("2010-10-01 00:00:00");
                    $end =  strtotime("2012-12-31 23:59:59");
                    $randomDate = date("Y-m-d H:i:s", rand($start, $end));
        
                    //$d=date("Y-m-d h:i:sa");
                    $date=$randomDate;
                    $priceid=rand(1,200);
                    $sql2 = "
                        SELECT *
                        FROM mediaPrice
                        WHERE mediaPriceId = '{$priceid}';
                        ";
                        $value=$db->query($sql2);
                        while($row2 = $value->fetch_assoc())
                        {
                        $pricesetdate=$row2["date"];
                        //echo $pricesetdate."\n";

                        }
                        $count=rand(0,10);
                        $mediaid=rand(1,25);
      
                    $sql1 = "
                        INSERT INTO purchase
                        VALUES('$serial','$date','$uuid','$count','$mediaid')";
                        $serial=$serial+1;
                        if(!$result1 = $db->query($sql1))
                        {
                            echo('['.$db->error.']');           
                        }
                    }                   
                }       
        }
        $prid=$prid+1;            
}