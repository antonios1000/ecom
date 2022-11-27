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
  // if(isset($_SESSION['cus_username'])){
  //   $cus_username = $_SESSION['cus_username'];
  //   $sql    = "SELECT * FROM $cus_username";
  //   $result = $conn->query($sql);

  //   if ($result->num_rows > 0) {
  //       // output data of each row
  //       while($row = $result->fetch_assoc()) {
  //           echo "itemName: " . $row["itemName"]. " - Quantity: " . $row["quantity"]. " - Price: " . $row["price"]. " - Total Price: " . $row["totalPrice"]. "<br>";
  //       }
  //   } else {
  //       echo "0 results";
  //   }
  // }
?>

<?php
//   if(isset($_SESSION['cus_username'])){
//     $cus_username = $_SESSION['cus_username'];
//     $itemName     = isset($_POST['itemName']) ? $_POST['itemName'] : "";
//     $quantity     = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
//     $price        = isset($_POST['price']) ? $_POST['price'] : 0;

//     if (isset($_POST['increment'])) {
//       $quantity++;
//     } else if (isset($_POST['decrement'])) {
//       $quantity--;
//     } else if (isset($_POST['remove'])) {
//       $quantity = 0;
//     }

//     $sql    = "SELECT * FROM $cus_username WHERE itemName = '$itemName'";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         $quantity += $row['quantity'];
//         $price      = $row['price'];
//         $item_price = $quantity * $price;
//         $sql        = "UPDATE `$cus_username` SET quantity = '$quantity', totalPrice = '$item_price' WHERE itemName = '$itemName' AND quantity > 0";
//         $result     = $conn->query($sql);
//     } else {
//         $sql = "INSERT INTO `$cus_username` (itemName, quantity, price) VALUES ('$itemName', '$quantity', '$price')";
//     }
//     $result = $conn->query($sql);
//     // echo "$itemName added to cart. Quantity: $quantity. Price: $price";
//     if($quantity > 0){
//       $item_price = $quantity * $price;
//       echo "$item_price";
//       $sql    = "UPDATE `$cus_username` SET quantity = '$quantity', totalPrice = '$item_price' WHERE itemName = '$itemName'";
//       $result = $conn->query($sql);
//     }

//     $sql    = "SELECT SUM(totalPrice) as total FROM $cus_username";
//     $result = $conn->query($sql);
//     $row = $result->fetch_assoc();
//     $totalPrice = $row['total'];
//   }
?>

<?php
    if(isset($_SESSION['cus_username'])){
        if(isset($_POST['increment'])){
            $quantity = 0;
            $cus_username = $_SESSION['cus_username'];
            $itemName = $_POST['itemName'];
            $price = $_POST['price'];
            $quantity = $quantity + 1;
            $id = $_POST['id'];
            $sql = "UPDATE $cus_username SET quantity = quantity + 1 WHERE id = $id";
            $result = $conn->query($sql);
        }
        if(isset($_POST['decrement'])){
            $quantity = 0;
            $cus_username = $_SESSION['cus_username'];
            $itemName = $_POST['itemName'];
            $price = $_POST['price'];
            $quantity = $quantity - 1;
            $id = $_POST['id'];
            $sql = "UPDATE $cus_username SET quantity = quantity - 1 WHERE id = $id";
            $result = $conn->query($sql);
        }
        if(isset($_POST['remove'])){
            // $quantity = 0;
            $cus_username = $_SESSION['cus_username'];
            $itemName = $_POST['itemName'];
            $price = $_POST['price'];
            // $quantity = $_POST['quantity'];
            $id = $_POST['id'];
            $sql = "DELETE FROM $cus_username WHERE id = $id";
            $result = $conn->query($sql);
        }
    }
?>
<?php
    if(isset($_SESSION['cus_username'])){
        $cus_username = $_SESSION['cus_username'];
        $sql = "SELECT sum(totalPrice) as totalprice FROM $cus_username";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $sum_price = $row['totalprice'];
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <title>One Stop Electronics - Cart</title>
  </head>
  <body>
    <!-- ----------------- HEADER-TOP ----------------- -->
    <header>
      <div class="header-container">
      <div class="logo">
           <h1><a href="/">OSE</a></h1>
        </div>
        <nav>
          <ul>
            <li>
              <a href="index.php">
              <i class="bi bi-house"></i>
              </a>
            </li>
            <li>
              <a href="account.php">
              <i class="bi bi-person-circle"></i>
              </a>
              <ul>
                <?php if (isset($_SESSION['cus_username'])) { 
                ?> 
                <li>
                  <a href="logout.php">Logout</a>
                </li>
                <?php } else { 
                ?> 
                <li>
                  <a href="login_form.php">Login</a>
                </li>
                <?php } 
                ?> 
                <li>
                  <a href="registration_form.php">Register</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#contact.php">
              <i class="bi bi-headset"></i>
              </a>
            </li>
            <li>
              <a class="active" href="cart_page.php">
              <i class="bi bi-cart3"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <!-- ----------------- HEADER-BOTTOM ----------------- -->
    <div class="header-bottom">
      <div class="column">
        <a href="accessories_store.php">Accessories </a>
      </div>
      <div class="column">
        <a href="desk_chairs_page.php">Desk & Chairs</a>
      </div>
      <div class="column">
        <a href="#computer_parts_page.php">Computer Parts</a>
      </div>
      <div class="column">
        <a href="#computers.php">Computers</a>
      </div>
      <div class="search-bar">
        <form>
          <input type="search" name="search" placeholder="Search.." />
          <button type="submit">SUBMIT</button>
        </form>
      </div>
      <p><?php if (isset($_SESSION['cus_username'])) {
        echo "Welcome, " . $_SESSION['cus_username'];
        } else {
          echo "Welcome, Guest";
        }?></p>
    </div>
    <!-- ----------------- MAIN ----------------- -->   

    <?php
        if(isset($_SESSION['cus_username']) && !empty($_SESSION['cus_username'])){
            //user is logged in, show shopping cart buttons
    ?>
    <div class="cart-message">
      <h2>Your Items</h2>
    </div>
    <div class="cart-details">
        <div class="acc-items-cart">
            <div class="merchandise-accs-cart">
                <?php
                    $cus_username = $_SESSION['cus_username'];
                    $sql = "SELECT * FROM $cus_username";
                    $result = $conn->query($sql);
                    $num = $result->num_rows;
                    $row = $result->fetch_assoc();
                    $prices = [];

                    $totalPrice = 0;
                    for($i = 1; $i < $num; $i++){
                        $row = $result->fetch_assoc();
                        $prices[] = $row['price'];
                        $totalPrice = $totalPrice + $row['quantity'] * $row['price'];
                        echo '<div class="item-container-cart">
                        <img src="images/'.$row['image'].'" style="height: 100px;">
                        <div class="product-container-cart">
                        <h3>'.$row['itemName'].'</h3>
                        <p> Quantity: '.$row['quantity'].'</p>
                        <p> Item Price: $'.$row['price'].'</p>
                        <p> Total Item Price: '.$row['quantity'] * $row['price'].'</p>
                        <form action="" method="POST">
                        <input type="hidden" name="id" value="'.$row['id'].'">
                        <input type="submit" name="increment" class="increment-quantity" value="Add">
                        <input type="submit" name="remove" class="remove-quantity" value="Remove">
                        <input type="submit" name="decrement" class="decrement-quantity" value="Decrement">
                        <input type="hidden" name="itemName" value="'.$row['itemName'].'">
                        <input type="hidden" name="price">
                        </form>
                        </div>
                        </div>';
                    }
                    $totalPrice = array_sum($prices);
                    if (isset($_POST['id'])) {
                        $sql = "UPDATE $cus_username SET totalPrice = quantity * price WHERE id = $id";
                        $result = $conn->query($sql);
                    }
                ?>
            </div>
        </div>

        <div class="price-container">
            <div class="total-price-container">
                <h2>Total price: $<?php echo $sum_price;?></h2>
                <button class="checkout-button">Checkout</button>
            </div>
        </div>
    </div>
    <?php
        } else {
            //user is not logged in, show login buttons
    ?>
    <div class="cart-logged-off-container">
        <div class="cart-logged-off">
            <h1>You are not signed in.</h1>
            <h2>Want to log in to begin shopping?</h2>
            <a href="login_form.php">Sign in</a>
        </div>
    </div>
    <?php
        }
    ?>

    <!-- ----------------- FOOTER ----------------- -->
    <footer>
      <div class="footer-icons">
        <div id="facebook">
          <i class="bi bi-facebook"></i>
        </div>
        <div id="twitter">
          <i class="bi bi-twitter"></i>
        </div>
        <div id="instagram">
          <i class="bi bi-instagram"></i>
        </div>
        <div id="youtube">
          <i class="bi bi-youtube"></i>
        </div>
      </div>
      <div class="footer-text">
        <div class="contact-content">
          <li><b>About OSE</b></li>
          <br />
          <li><a href="#">Our Company</a></li>
          <li><a href="#">News</a></li>
          <li><a href="#">Smarter Technology</a></li>
          <li><a href="#">Complice</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Investors</a></li>
          <li><a href="#">Product Recycling</a></li>
          <li><a href="#">Product Security</a></li>
        </div>
      <div class="contact-content">
        <li><b>Payment Options</b></li>
        <br />
        <li><a href="#">Payment Plans</a></li>
        <li><a href="#">Lay Away</a></li>
        <li><a href="#">Lease to Own</a></li>
        <li><a href="#">Pay your bill at Citibank</a></li>
      </div>
      <div class="contact-content">
        <li><b>Rewards & Membership</b></li>
        <br />
        <li><a href="#">OSE Membership</a></li>
        <li><a href="#">My OSE</a></li>
        <li><a href="#">Member Offfers</a></li>
        <li><a href="#">View Points & Rewards</a></li>
        <li><a href="#">Buy OSE Total Tech</a></li>
      </div>
      <div class="contact-content">
        <li><b>Partnerships</b></li>
        <br />
        <li><a href="#">Affiliate Program</a></li>
        <li><a href="#">Advertise with Us</a></li>
        <li><a href="#">Developers</a></li>
        <li><a href="#">OSE Health</a></li>
        <li><a href="#">OSE Education</a></li>
        <li><a href="#">OSE Business</a></li>
      </div>
    </div>
    </footer>
  </body>
</html>