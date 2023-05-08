<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you</title>
    <link rel = "stylesheet" href = "product.css">
    <style>
      table {
        margin: auto;
        text-align: center;
      }
    </style>
  </head>
  <body>

    <div class="header">
      <img src="images_folder/logo.png" alt="Logo">
      <h1 class="header-center">Bookstore</h1>
      <div class="header-btns">
        <a href="cart.php">Cart</a>
        <a href="logout.php" class="logout-btn">Logout</a>
        <a href="home.php" class="return-btn">Back to Homepage</a>
      </div>
    </div>


<?php

@include 'config.php';
session_start();

if(isset($_POST['place_order'])){
  $total_price = $_POST['total_price'];
  $email = $_SESSION['email'];
  $date = date("Y-m-d");
  
  $sql = "INSERT INTO order_table (email, date, totalPrice)
  VALUES ('$email', '$date', '$total_price')";
  
  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    
    foreach($_SESSION['cart'] as $name => $quantity){
      $sql = "SELECT * FROM product_table WHERE name='$name'";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $product_id = $row['id'];
          $quantity_left = $row['quantity'] - $quantity;
          
          $sql = "INSERT INTO product_order (orderNo, productid, quantity)
          VALUES ('$last_id', '$product_id', '$quantity')";
          
          if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE product_table SET quantity='$quantity_left' WHERE id='$product_id'";
            $conn->query($sql);
          }
        }
      }
    }
    echo "<h3 style = 'text-align: center;'>Your Order Has Been Placed</h3>";
    echo "<h3 style = 'text-align: center;'>Thank you for ordering from our Book Store</h3>";
    unset($_SESSION['cart']);
  } 
}

$conn->close();
?>
</body>
</html>