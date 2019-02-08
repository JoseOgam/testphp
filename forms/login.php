<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 2/8/19
 * Time: 12:17 PM
 */

session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
 <div class="container-fluid">
     <div class="col-sm-4 col-sm-offset-4">
         <?php
          if (isset($_POST['login'])){

              include '../Connect/database.php';

              $username = $_POST['username'];
              $password = $_POST['password'];

              if (empty($username)){
                  echo "Username required";
              }elseif (empty($password)){
                  echo "Password required";
              }else{
                  $query = "SELECT * FROM `user` WHERE username='$username' and password='".password_hash($password,
                          PASSWORD_DEFAULT)."'";
                  $result = mysqli_query($conn,$query);

                  $row = mysqli_num_rows($result);

                  if ($row==1){

                      $_SESSION['username'] = $username;
                      // Redirect user to index.php
                      header("Location: ../home.php");
                  }else{
                      echo "Incorrect username or password";
                  }


              }
          }
         ?>
         <form action="" method="post">
             <div class="form-group">
                 <label for="username">Username:</label>
                 <input type="text" class="form-control" name="username" id="username">
             </div>
             <div class="form-group">
                 <label for="pwd">Password:</label>
                 <input type="password" class="form-control" name="password" id="pwd">
             </div>
             <button type="submit" name="login" class="btn btn-info">Submit</button>
         </form>
     </div>
 </div>
</body>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
