<?php
error_reporting(1);


file_put_contents('log.txt'.print_r($_POST,true));
	$db = new mysqli("localhost", "smallavarapu", "smallavarapu2015", "smallavarapu");

	if ($db->connect_errno) {
		echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	}

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $street=$_POST['street'];
    $street=$_POST['street'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];
    $phonenumber=$_POST['phonenumber'];

     $query = "INSERT INTO users(`firstname`, `lastname`, `emailID`, `password`, `street`, `city`, `state`, `zipcode`, `phoneNumber`,rid) VALUES
              ('{$firstname}','{$lastname}', '{$email}', '{$password}', '{$street}', '{$city}', '{$state}', '{$zipcode}', '{$phonenumber}',1)";
    
    
    $result = $db->query($query);
?>
                   
                   
        
        
        