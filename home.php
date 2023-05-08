<?php

 @include 'config.php';
 session_start();
     if(!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])){
     header('location:index.php');
    }  
 ?>
<!DOCTYPE html>
<html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Home page </title>
     <link rel = "stylesheet" href = "home.css">
 </head>
 <body>
        <div class="header">
            <img src="images_folder/logo.png" alt="Logo">
            <h1 class="header-center">Welcome <?php echo $_SESSION['user_name'];?> to our eBookstore!</h1>
            <div class="header-btns">
                <a href="cart.php" class="btn">Cart</a>
                <a href="logout.php" class="btn">Logout</a>
            </div>
        </div>

      <div class="items">
         <?php
            $sql = "SELECT * FROM `product_table` WHERE `quantity`>0;";
            $result = mysqli_query($conn, $sql);
            
            while($product = mysqli_fetch_assoc($result)) {
                $id = $product['id'];
                $name = $product['name'];
                $photo = $product['photo'];
                $price = $product['price'];
                ?>
                     
                <div class="item"> 
                    <img class="item_img" src="images_folder/<?php echo $photo; ?>">
                    <div class="item_cont">
                        <h3><?php echo $name; ?></h3>
                        <br><p><?php echo $price;?> SAR</p>
                    </div>
                    <div class="item_info">
                        <div >
                            <a class="item_link" href="product.php?id=<?php echo $id ?>">More information</a>
                        </div>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    </body>
</html>