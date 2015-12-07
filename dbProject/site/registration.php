<?php
	error_reporting(1);
	$db = new mysqli("localhost", "smallavarapu", "smallavarapu2015", "smallavarapu");

	if ($db->connect_errno) {
		echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<script src="js/jquery.min.js"></script>
    <title>Registration for Media Website</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <!-- Fonts -->
	 <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
			

</head>

<body>
<div class="brand">Online Media Sharing Website</div>
<div class="address-bar">Upload or Pay to download media</div>

<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
        <a class="navbar-brand" href="index.html">Business Casual</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="login.php">Login</a>
            </li>
            <li>
                <a href="search.php">Search</a>
            </li>
            <li>
                <a href="checkout.html">Checkout</a>
            </li>
			<li>
                <a href="about.html">About</a>
            </li>
            <li>
                <a href="login.php">logout</a>
            </li>
        </ul>
    </div>
<!-- /.navbar-collapse -->
<!-- /.container -->
</nav>
<!--<form action="" method="post" role="login" id="login-form" class="form-signin"> --> 
<div class = "container">
<div class="wrapper">
<form class="form-signin" role="form" id="login-form" method="post">     
	<h3 class="form-signin-heading">Welcome, Please register Here!</h3>
	<hr class="colorgraph"><br>
<div class="form-group">
		<input type="text" name="firstname" id="firstname" class="form-control input-lg" placeholder="First Name">
	</div>
<div class="form-group">
		<input type="text" name="lastname" id="lastname" class="form-control input-lg" placeholder="Last Name">
	</div>
<div class="form-group">
		<input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
	</div>
<div class="form-group">
		<input type="text" name="password" id="password" class="form-control input-lg" placeholder="password">
	</div>
<div class="form-group">
		<input type="text" name="street" id="street" class="form-control input-lg" placeholder="street">
	</div>
<div class="form-group">
		<input type="text" name="city" id="city" class="form-control input-lg" placeholder="city">
	</div>
<div class="form-group">
		<input type="text" name="state" id="state" class="form-control input-lg" placeholder="state">
	</div>
<div class="form-group">
		<input type="text" name="zipcode" id="zipcode" class="form-control input-lg" placeholder="zipcode">
	</div>
<div class="form-group">
		<input type="text" name="phonenumber" id="phonenumber" class="form-control input-lg" placeholder="phonenumber">
	</div>

    <input class="btn btn-lg btn-primary btn-block" type="button" name="register" 
    id="register" value="register" >
</form>			
</div>
</div>

<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; mediasharing.com 2015</p>
                </div>
            </div>
        </div>
</footer>

    <script src="js/jquery.min.js"></script>
    
    
    <script>    
    $(function(){
		console.log( "ready!" );
		$( "#register" ).click(function(e){
			e.preventDefault()
			var data = $( "#login-form" ).serialize();
			$.post( "register_back.php", data)
            window.top.location.href = "login.php"; 
			  
		});
	});
   
   
   
   
   </script>


</body>
</html>
	        
            
            
     