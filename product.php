
<html>
<head>
<meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Information</title>
    <link rel = "stylesheet" href = "product.css">
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
if(!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])){
 header('location:index.php');
} 

$id = $_GET['id'];
$sql = "SELECT name, photo, price, description, quantity FROM product_table WHERE id=$id";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $name = $row['name'];
    $photo = $row['photo'];
    $price = $row['price'];
    $description = $row['description'];
    $quantity = $row['quantity'];

    echo "<div class='product-info'>";
    echo "<h2>$name</h2>";
    echo "<img src='images_folder/" . $photo . "' alt='Product photo'><br>";
    echo "<p>$description</p>";
    echo "<p>Price: $price SAR";
    if($quantity<5){echo"<span>, Only ".$quantity." items remaining</span>";}
    echo"</p>";

    if (isset($_SESSION['cart'][$name])) {
      $cart_quantity = $_SESSION['cart'][$name];
    } else {
      $cart_quantity = 0;
    }

    if ($cart_quantity < $quantity) {
      
      echo "<form action='Cart.php' method='post'>";
      echo "<input type='hidden' name='id' value='$id'>";
      echo "<input type='hidden' name='name' value='$name'>";
      echo "<input type='hidden' name='price' value='$price'>";
      echo "<input value='add to cart' name='add_to_cart' type='submit' >";
      echo "</form>";
    } else {
      echo "Sorry! this book out of Stock";
    }
  }
} else {
  echo "0 results";
}
echo "</div>";
$conn->close();
?>
  </div>
</body>
</html>



