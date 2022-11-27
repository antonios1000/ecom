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

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
      <title>Computers</title>
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
                    <ul> <?php if (isset($_SESSION['cus_username'])) { ?> <li>
                        <a href="logout.php">Logout</a>
                        </li> <?php } else { ?> <li>
                        <a href="login_form.php">Login</a>
                        </li> <?php } ?> <li>
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
                    <a href="cart_page.php">
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
            <p><a href="index.php">Home</a> > Computer Parts</p>
            <h4>GPUS / MOTHERBOARDS</h4>
        </div>
    </div>
    <!-- ----------------- MAIN ----------------- -->
    <div class="acc-container">
        <div class="acc-nav">
          <h1>Shop Category</h1>
          <a href="#">Monitors</a><br>
          <a href="#">Input Devices</a><br>
          <a href="#">Keyboards & Mice</a><br>
          <a href="#">Headsets, Speakers & Soundboards</a><br>
          <a href="#">Power Protection</a><br>
          <a href="#">KVM Switches</a><br>
          <a href="#">Printer Ink & Toner</a><br>
          <a href="#">3D Printing</a><br>
        </div>

      <div class="acc-split">
        <div class="acc-banner acc-banner-acc">
            <p id='banner1'><</p>
            <p id='banner2'>></p>
        </div>

        <div class="acc-items">
            <div class="merchandise-accs">
                <?php
                    $sql = "SELECT id, itemName, image, price FROM product_table LIMIT 6, 6";
                    $result = $conn->query($sql);
                    $num = $result->num_rows;
                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $itemName = $row['itemName'];
                        $image = $row['image'];
                        $price = $row['price'];
                        $i++;
                        echo '<div class="item-container">';
                        echo '<img src="images/'.$image.'" />';
                        echo '<div class="item-name">'.$itemName.'</div>';
                        echo '<div class="item-price">$'.$price.'</div>';
                        echo '<form action="add-to-cart.php" method="POST">';
                        echo '<input type="hidden" name="itemName" value="'.$itemName.'">';
                        echo '<input type="hidden" name="price" value="'.$price.'">';
                        echo '<input type="hidden" name="image" value="'.$image.'">';
                        if(isset($_SESSION['cus_username'])){
                            echo '<input type="hidden" name="cus_username" value="'.$_SESSION["cus_username"].'">';
                            echo '<button type="submit" name="submit">Add To Cart</button>';
                        }
                        else{
                            echo '<p>You must be logged in to add to cart.</p>';
                        }
                        echo '</form>';
                        echo '</div>';
                    }
                ?>
          </div>
        </div>
      </div>
    </div>
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