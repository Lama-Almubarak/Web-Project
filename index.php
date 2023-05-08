<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $sql = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['email'] = $row['email'];
         header('location:home.php');
   } else
      $error[] = 'Incorrect email or password!';
 };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Log in form </title>
    <!-- Link to css file -->
    <link rel = "stylesheet" href = "product.css">
</head>
<body>
<div class="header">
  <img src="images_folder/logo.png" alt="Logo">
  <h1 class="header-center">Bookstore</h1>
  </div>
    <div class = "form_container">
        <form action = "" method = "post">
           <h3> Log in </h3>
           <?php
           if (isset($error)) {
            foreach ($error as $error)
              echo '<span class = "error_message"> '.$error. ' </span>';
           };
           ?>
           <input type = "email" name = "email" required placeholder = "Enter your email">
           <input type = "password" name = "password" required placeholder = "Enter your password">
           <input type = "submit" class = "form_btn" name = "submit" value = "Log in">
           <p> Do not have an account? 
              <a href = "register.php"> Join us and register! </a>
           </p>
        </form> 
    </div>
</body>
</html>