<?php

@include 'config.php';
session_start();
if(!isset($_SESSION['admin_name']) || empty($_SESSION['admin_name'])){
 header('location:admin.php');
 }
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
       <link rel = "stylesheet" href = "dashboard.css">
</head>
<body >
<div class="header">
  <img src="images_folder/logo.png" alt="Logo">
  <h1 class="header-center">Bookstore</h1>
  <div class="header-btns">
    <a href="logout.php" class="logout-btn">Logout</a>
  </div>
</div>
<div class="dashboard-container">
  <div style="display: flex; justify-content: center;">
    <a href="addProduct.php" class="btn add-product-btn">Add Product</a>
    <a href="viewOrders.php" class="btn view-orders-btn">View Orders</a>
  </div>
</div>
</body>
</html>