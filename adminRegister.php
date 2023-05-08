<?php

@include 'config.php';
if (isset($_POST['submit'])) {
    $pass = $_POST['password'];
    $cpass = $_POST['confirm_password'];
    $hash = md5($pass);
    $sql = "SELECT * FROM admin_form WHERE password = '$hash' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exist!';
    }
    else {
        $insert = "INSERT INTO admin_form(name, password) VALUES('admin','$hash')";
        mysqli_query($conn, $insert);
        header('location:admin.php');
       }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin register </title>
    <!-- Link to css file -->
    <link rel = "stylesheet" href = "product.css">
    <script src="PassVal.js" defer> </script>

</head>


<body>
<div class="header">
  <img src="images_folder/logo.png" alt="Logo">
  <h1 class="header-center">Bookstore</h1>
  </div>
    <div class = "form_container">
        <form action = "" method = "post" onsubmit="return passValidation()">
           <h3> Register </h3>
           <?php
           if (isset($error)) {
            foreach ($error as $error)
              echo '<span class = "error_message"> '.$error. ' </span>';
           };
           ?>
           <h2 class="change"> Change your password</h2>
           <p id="Error" > Password did not match, please try again </p> 
           <input id="pass" type = "password" name = "password" required placeholder = "Enter your password">
           <input id="Cpass" type = "password" name = "confirm_password" required placeholder = "Confirm your password">
           <input id = "submit" type = "submit" class = "form_btn"  name = "submit" value = "Register">
           <p> Already have an account?
              <a href = "admin.php"> Log in </a>
           </p>
        </form> 
    </div>
</body>
</html>