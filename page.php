<?php
   include('include/session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="description" content="Morales Jimsssell">
	<meta name="author" content="GothamBullies.html">
	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><strong class="blue">HOT WEB</strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="">Welcome <?php echo $login_session;?></a></li>
        <li><a href ="logout.php">Sign Out</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
	<div class="row">
 	<?php 
 		if($type_session == "visitor"){
 			echo '
				<div class="col-md-6 col-md-offset-3">
					<div style="background: #09afdf;color: white;">
						<h2 class="text-center" style="padding: 70px;">Visitor</h2>
					</div>
				</div> 				
 			';
 		}elseif($type_session == "paid"){
 			echo '
				<div class="col-md-6 col-md-offset-3">
					<div style="background: #09afdf;color: white;">
						<h2 class="text-center" style="padding: 70px;">Paid</h2>
					</div>
				</div> 	
 			';
 		}elseif($type_session == "free"){
 			echo '
				<div class="col-md-6 col-md-offset-3">
					<div style="background: #09afdf;color: white;">
						<h2 class="text-center" style="padding: 70px;">free</h2>
					</div>
				</div> 	
 			';
 		}
 	?>

	</div>
</div>
</body>
</html>