<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 2/8/19
 * Time: 11:07 AM
 */

include 'Connect/database.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">

</div>
 <div class="col-sm-4 col-sm-offset-4">

     <?php

     if (isset($_POST['submit'])){
         include 'Connect/database.php';

         $name = $_POST['name'];
         $username = $_POST['username'];
         $email = $_POST['email'];
         $password = $_POST['password'];


         if (empty($name)){
             echo "Name is required";
         }elseif (empty($username)){
             echo "Username is required";
         }elseif (empty($email)){
             echo "Email is required";
         }elseif (empty($password)){
             echo "Password is required";
         }else{
             $hash = password_hash($password, PASSWORD_DEFAULT);
             $query = "INSERT INTO `user`( `Name`, `Usename`, `email`, `password`) VALUES ('".$name."', '".$username."',
                  '".$email."', '".$hash."')";

             if (mysqli_query($conn, $query)){
                 echo "Sign Up successful";
             }else{
                 echo "Error " . mysqli_error($conn);
             }
         }

     }
     ?>
     <form action="" method="post">
         <div class="form-group">
             <label for="Name">Name:</label>
             <input type="text" class="form-control" name="name" id="name">
         </div>
         <div class="form-group">
             <label for="username">Username:</label>
             <input type="text" class="form-control" name="username" id="username">
         </div>
         <div class="form-group">
             <label for="email">Email address:</label>
             <input type="email" class="form-control" name="email" id="email">
         </div>
         <div class="form-group">
             <label for="pwd">Password:</label>
             <input type="password" class="form-control" name="password" id="pwd">
         </div>
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
     </form>
 </div>
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
