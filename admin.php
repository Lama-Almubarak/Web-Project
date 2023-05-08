<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $pass = md5($_POST['password']);
    $sql = "SELECT * FROM admin_form WHERE password = '$pass' ";
    $result = mysqli_query($conn, $sql);
    

    if($name === 'admin' && $pass === md5('admin123')){
        header('location:adminRegister.php');

    }

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $_SESSION['admin_name'] = $row['name'];
      header('location:dashboard.php');
    }
    else
      $error[] = 'Incorrect email or password!';
 };
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Log in </title>
    <!-- Link to css file -->
    <link rel = "stylesheet" href = "product.css">
</head>


<script>
    
</script>

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
           <input type = "text" name = "name" required placeholder = "Enter your name">
           <input type = "password" name = "password" required placeholder = "Enter your password">
           <input type = "submit" class = "form_btn" onclick="" name = "submit" value = "Log in">
           <p> Do not have an account? 
           <a href = "adminRegister.php"> Register </a>
           </p>
        </form> 
    </div>
</body>
</html>