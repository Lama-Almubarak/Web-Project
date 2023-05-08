<?php
 @include 'config.php';
 session_start();
    if(!isset($_SESSION['admin_name']) || empty($_SESSION['admin_name'])){
     header('location:admin.php');
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> View Orders page </title>
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
 
        <table>
            <tr>
                <th>Order date</th>
                <th>Customer email</th>
                <th>Order No.</th>
                <th>Total price</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `order_table` ORDER BY `date` DESC ;";
                $result = mysqli_query($conn, $sql);
                $numO = mysqli_num_rows($result);

                if($numO==0){
                    echo "<h2 colspan='5' style='text-align:center; color:red;'>There is no orders yet</h2>";
                }else{

                    while($order = mysqli_fetch_assoc($result)){

                        $oDate = $order['date'];
                        $email = $order['email'];
                        $oNo = $order['orderNo'];
                        $total = $order['totalPrice'];

                        echo"<tr>
                        <td>$oDate</td>
                        <td>$email</td>
                        <td>$oNo</td>
                        <td>$total</td>
                    </tr>";
                    }
                }
                
            ?>
        </table>
    </body>
</html>