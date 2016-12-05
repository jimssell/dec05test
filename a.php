<!DOCTYPE html>
<html>
<head>
   <title></title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<?php
   include("include/connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $encryt = mysqli_real_escape_string($db,$_POST['password']);
      $type = mysqli_real_escape_string($db,$_POST['type']);
      $mypassword = md5($encryt); 
      
      $sql = "SELECT id FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      var_dump($row);
      $count = mysqli_num_rows($result);      
      if($count == 1) {

/*         $_SESSION['myusername']="something";
         $_SESSION['login_user'] = $myusername;
         $sqltype = "SELECT id FROM user WHERE user_type = '$type'";
         $resulttype = mysqli_query($db,$sqltype);
         $rowtype = mysqli_fetch_array($resulttype,MYSQLI_ASSOC);*/

         if($type == "paid"){
            echo "paid";
         }elseif($type == "free"){
            echo "free";
         }elseif ($type == "visitor") {
            echo "visitor";
         }else{

         }
         /*header("location: index.php");*/
      }else {
            $error = "Your Login Name or Password is invalid";         
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   
      <div align = "center">
         <div style = "width:300px; height:700px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <label>type  :</label>
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
                  <br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               
            </div>
            
         </div>
         
      </div>
</body>
</html>