<?php

@include 'config.php';

session_start();
if(!isset($_SESSION['admin_name']) || empty($_SESSION['admin_name'])){
 header('location:admin.php');
} 

if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_description = $_POST['product_description'];
   $product_quantity = $_POST['product_quantity'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'images_folder/'.$product_image;

   if (empty($product_name) || empty($product_price) || empty($product_description) || empty($product_quantity) || empty($product_image)) {
      $message[] = 'Please fill the empty boxes!';
   }
   else {
      $insert = "INSERT INTO product_table(name, price, description, quantity, photo) VALUES('$product_name', '$product_price', ' $product_description', '$product_quantity', '$product_image')";
      $upload = mysqli_query($conn, $insert);
      if ($upload) {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'New product added successfully';
      } 
      else {
         $message[] = 'Could not add the product';
      }
   }
};

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add product page </title>
    <link rel = "stylesheet" href = "product.css">
</head>
<body>
<div class="header">
  <img src="images_folder/logo.png" alt="Logo">
  <h1 class="header-center">Bookstore</h1>
  <div class="header-btns">
    <a href="logout.php" class="logout-btn">Logout</a>
    <a href="dashboard.php" class="logout-btn">dashboard</a>

  </div>


</div>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class = "add_product_container">

   <div class = "inner_add_product_container">

      <form action = "<?php $_SERVER['PHP_SELF']?>" method = "post" enctype = "multipart/form-data">
         <h3> Add a new product </h3>
         <input type = "text" class = "box" name = "product_name" placeholder = "Enter product name">
         <input type = "number" class = "box" name = "product_price" placeholder = "Enter product price">
         <input type = "text" class = "box" name = "product_description" placeholder = "Enter product description">
         <input type = "number" class = "box" name="product_quantity" placeholder = "Enter product quantity">
         <input type = "file" class = "box"  name = "product_image" placeholder = "Enter product image" accept = "image/png, image/jpeg, image/jpg">
         <input type = "submit" class = "add_product_btn" name = "add_product" value = "Add product">
      </form>
   </div>

<?php 
   $select = mysqli_query($conn, "SELECT * FROM product_table");
   ?>
   <div class = "display_product">
      <table class = "display_product_table">
         <thead>
         <tr>
            <th> Product Name </th>
            <th> Product Price </th>
            <th> Product Photo </th>
            <th> Product Description </th>
            <th> Product Quantity </th>

         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
         <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['price']; ?> SR</td>
            <td><img src = "images_folder/<?php echo $row['photo']; ?>" height="120" alt=""></td>
            <td> <?php echo $row['description']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
      <?php } ?>
      </table>
   </div>

</div>
</body>
</html>