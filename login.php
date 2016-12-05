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
  </div><!-- /.container-fluid -->
</nav>

<section>
<div class="space-70"></div>
	<div class="container">
	<?php
	   include("include/connection.php");
	   session_start();
	   $error = "";
	   if($_SERVER["REQUEST_METHOD"] == "POST") { 
	      $myusername = mysqli_real_escape_string($db,$_POST['username']);
	      $encryt = mysqli_real_escape_string($db,$_POST['password']);
	      $type = mysqli_real_escape_string($db,$_POST['type']);
	      $mypassword = md5($encryt); 
	      
	      $sql = "SELECT id FROM user WHERE username = '$myusername' and password = '$mypassword' and user_type = '$type'";
	      $result = mysqli_query($db,$sql);
	      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	      $count = mysqli_num_rows($result);      
	      if($count == 1) {
      		$_SESSION['myusername']="something";
         	$_SESSION['rg7'] = $myusername;
         	$_SESSION['type']="something";	
         	$_SESSION['type'] = $type;     	
	        header("location: page.php");
	      }else {
	            $error = "Your Login Name or Password is invalid";         
	      }
	   }
	?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
		<form action = "" method = "post">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Username</label>
		    <input type="text" class="form-control"  name="username" placeholder="Your username">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" name="password" placeholder="Password">
		  </div>
		  <div class="form-group">
		  <label for="exampleInputPassword1">Type</label>
            <select class="form-control" name="type">
               <?php
                $query = "SELECT * FROM user_type";
                $result  = $db->query($query);
                if($result->num_rows > 0){
                   while($row = $result->fetch_assoc()){
                      echo "<option value=". $row['user_type']." >" . $row['user_type']."</option>";
                   }
                }else {
                      echo "No result";
                   }
                  
                ?>
            </select>
		  </div>

		  <input type="submit" class="btn btn-primary" value="Submit">
		</form>  
		<div class="space-30"></div>
		<p><?php echo $error; ?></p> 
  </div>
</div>	

	</div>
</section>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>