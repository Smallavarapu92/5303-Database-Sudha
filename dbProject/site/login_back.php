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
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];
    $phonenumber=$_POST['phonenumber'];

    $query = "select password from users where emailID='{$email}' and rid=1";    
    $result = $db->query($query);
    if($result)
    {
        $row_cnt = $result->num_rows;
		if($row_cnt > 0)
        {
             while($row = $result->fetch_assoc()) 
                {
                    $pwd=$row["password"];
                    if($pwd==$password)
                    {
                        $json = json_encode(array("login"=>true));
                    }
                }
		}
        else
        {
			$json =  json_encode(array("login"=>false,"reason"=>"Authentication Failed"));
			file_put_contents('log.txt',$error);
		}
    }
    else
    {
        $json =  json_encode(array("login"=>false,"reason"=>"Authentication Failed"));
        file_put_contents('log.txt',$error);
    }
    echo $json;                   