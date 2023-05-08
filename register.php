<?php
@include 'config.php';
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['confirm_password']);
    $sql = "SELECT * FROM user_form WHERE email = '$email' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    }
    else {
          $insert = "INSERT INTO user_form(name, email, password) VALUES('$name','$email','$pass')";
          mysqli_query($conn, $insert);
          header('location:index.php');
      }
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register form </title>
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
        <form name = "regForm" id = "regForm" action = "" method = "post" onsubmit="return passValidation()">
           <h3> Join us and register! </h3>
           <?php
           if (isset($error)) {
            foreach ($error as $error)
              echo '<span class = "error_message"> '.$error. ' </span>';
           };
           ?>
           <p id="Error" > Password did not match, please try again </p> 
           <input type = "text" name = "name" required placeholder = "Enter your name">
           <input type = "email" name = "email" required placeholder = "Enter your email">
           <input type = "password" id = "pass" name = "password" required placeholder = "Enter your password">
           <input type = "password" id = "Cpass" name = "confirm_password" required placeholder = "Confirm your password">
           <span  id = "match" name = "match"></span> <br>
           <input id="submit" type = "submit" class = "form_btn" name = "submit" value = "Register">
           <p> Already have an account?
              <a href = "index.php"> Log in </a>
        </form> 
    </div>
</body>
</html>