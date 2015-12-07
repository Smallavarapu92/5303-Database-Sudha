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

    <title>Search Media Website</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" />
	 <!--<link rel="stylesheet" href="css/main.css" />--> 

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


<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center"> 
                
<div class="wrapper">
<table id="usersTable" class="display" cellspacing="0" width="80%">
        <thead>
            <tr>
                <th>mediaType</th>
                <th>genre</th>
                <th>artist</th>
                <th>mediaTitle</th>
                <th>year</th>
                <th>saleType</th>
                <th>price</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>mediaType</th>
                <th>genre</th>
                <th>artist</th>
                <th>mediaTitle</th>
                <th>year</th>
                <th>saleType</th>
                <th>price</th>
            </tr>
        </tfoot>
        <tbody>

        
        
        

<?php
//Php will poluate each table row
$query = "select mc.categoryName as categoryname,mc.genre as genre,m.artist as artist,m.mediaTitle as mediaTitle,m.year as year,m.saleType as saleType,mp.price as price  
from media m
join mediaCategory mc
on m.categoryId=mc.categoryId
join mediaPrice mp
on m.mediaId=mp.mediaId";
$result = $db->query($query);
if($result) {
	while ($row = $result->fetch_assoc()) {
		echo"<tr>";
		echo"<td>{$row['categoryname']}</td>\n";
		echo"<td>{$row['genre']}</td>\n";
		echo"<td>{$row['artist']}</td>\n";
		echo"<td>{$row['mediaTitle']}</td>\n";
		echo"<td>{$row['year']}</td>\n";
        echo"<td>{$row['saleType']}</td>\n";
        echo"<td>{$row['price']}</td>\n";
		//echo"<td>";
		//echo"<a href=\"{$row['picture']}\"><i class=\"fa fa-picture-o\"></i></a> ";
		//echo"<a href=\"edit_user.php?UUID={$row['UUID']}\"><i class=\"fa fa-pencil-square-o\"></i></a>";
		//echo"</td>\n";
		echo"</tr>";
	 }
}
?>
</tbody>
</table>
 
</div>
    </div>

                </h2>
            </div>
        </div>
    </div>   

</div>


  
  <<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; mediasharing.com 2015</p>
                </div>
            </div>
        </div>
    </footer>

    
  
  
  
  
  
  
		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script>
			$(function() {
			
			

				$('#usersTable').DataTable();
				//$('#coursesTable').DataTable();

				
			});
			</script>


    

</body>
</html>
