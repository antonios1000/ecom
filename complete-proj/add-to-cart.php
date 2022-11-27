<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "product_details";
    $conn = new mysqli($servername, $username, $dbpassword, $dbname); 
    if ($conn->connect_error){ 
        die("Connection failed: " . $conn->connect_error); 
    } 
?>

<?php
  if (isset($_POST['submit'])) {
    $cus_username = $_POST['cus_username'];
    $itemName = $_POST['itemName'];
    $price = $_POST['price'];
    $tlt_price = $_POST['price'];
    $image = $_POST['image'];
    
    $user = $_SESSION["cus_username"];
    $mail = $_SESSION["mail_reg"];
    $pass1 = $_SESSION["pass1_reg"];
    $pass2 = $_SESSION["pass2_reg"];

    $quantity = 1;
    
    $sql = "INSERT INTO `$cus_username`(itemName, price, image, cus_username, email, password1, password2, quantity, totalPrice) 
    VALUES ('$itemName', '$price', '$image', '$user', '$mail', '$pass1', '$pass2', '$quantity', '$tlt_price')";
    if ($conn->query($sql) === TRUE) {
      echo "<script type='text/javascript'>document.location.href='https://proj-onestop-electronics.000webhostapp.com/accessories_store.php';</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
?>