<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
      <h1 class="header-center">Shopping cart</h1>
      <div class="header-btns">
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

    if(isset($_POST['add_to_cart'])){
      if(isset($_SESSION['cart'][$_POST['name']])){
        $_SESSION['cart'][$_POST['name']] += 1;
      }
      else{
        $_SESSION['cart'][$_POST['name']] = 1;
      }
    } 
    else {
      if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
      }
      // if(!isset($_SESSION['cart'][$_POST['name']])){
      //   $_SESSION['cart'][$_POST['name']] = 1;
      // }
    }

    if(isset($_POST['remove'])){
      $name = $_POST['remove'];
      unset($_SESSION['cart'][$name]);
      header('Location: cart.php');
    }

    $total_price = 0;
    echo "<table>";
    echo "<tr>";
    echo "<th>Product Name</th>";
    echo "<th>Quantity</th>";
    echo "<th>Price</th>";
    echo "</tr>";

    foreach($_SESSION['cart'] as $name => $quantity){
      $sql = "SELECT price FROM product_table WHERE name='$name'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $price = $row['price'];
          $total_price += $price * $quantity;
          
          echo "<tr>";
          echo "<td>$name</td>";
          echo "<td>$quantity</td>";
          echo "<td>".($price * $quantity)." SAR</td>";
          echo "<td>";
          echo "<form action='cart.php' method='post'>";
          echo "<input class='removeB' type='hidden' name='remove' value='$name'>";
          echo "<input type='submit' value='Remove'>";
          echo "</form>";
          echo "</td>";
          echo "</tr>";
        }
      }
    }

    echo "<tr>";
    echo "<th>Total</th>";
    echo "<th></th>";
    echo "<th>".$total_price." SAR</th>";
    echo "</tr>";
    echo "</table>";

    echo "<form action='ordered.php' method='post' style='text-align:center'>";
    echo "<input type='hidden' name='total_price' value='$total_price'>";
    echo "<input class='Pbtn' value='Place Order' name='place_order' type='submit' style='margin:20px auto;display:block'>";
echo "</form>";

$conn->close();
?>

</body>
</html>
