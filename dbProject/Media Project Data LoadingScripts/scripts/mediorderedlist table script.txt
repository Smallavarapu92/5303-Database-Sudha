<?php
//Name: saboor,sudha,shweta
//Description: script for pushing data into mediaordered list table
//sudha mallavarapu's database was used to do the scripts for the credentials
//################################################################


//code to connect to the database 
$db = new mysqli('localhost','smallavarapu','smallavarapu2015','smallavarapu');

// if there is a connection error display this error
if($db->connect_errno > 0)
{
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$json = file_get_contents("http://api.randomuser.me/?results=5");
//print_r($json);
$json_array = json_decode($json);


$moid=1;
$serial=1;
//print_r($json_array->results);
for($i=0;$i<sizeof($json_array->results);$i++)
{
             
                    $va=rand(1,5);
                        for($j=1;$j<=$va;$j++)
                        {
                            $empty="";
                            
                            $sel=rand(1,25);
                            $sql11 = "
                            SELECT *
                            FROM mediaCategory
                            WHERE categoryId = '{$sel}';
                            ";
                            $value1=$db->query($sql11);
                            while($row1 = $value1->fetch_assoc()) 
                            {
                                $categoryname=$row1["categoryName"];
                                $genre=$row1["genre"];
                            }
                            $sql1 = "
                            INSERT INTO mediaOrderList
                            VALUES('$moid','$j','$empty','$categoryname','$genre')";
                            if(!$result1 = $db->query($sql1))
                            {
                                echo('['.$db->error.']');           
                            } 
                        }                         
        $moid=$moid+1;            
}