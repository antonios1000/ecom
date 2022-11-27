<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <title>One Stop Electronics</title>
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
              <a class="active" href="index.php">
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
    <div class="home-container">
      <!--  LEFT-CONTAINER  -->
      <div class="half-box left-container">
        <h2 class="logo-container">OSE</h2>
        <h1>Tech Floor '22</h1>
        <a href="#learn-more" class="learn-more">Learn More</a>
      </div>
      <!--  RIGHT-CONTAINER  -->
      <div class="half-box right-container">
        <a href="accessories_store.php" class="accessories">Accessories</a>
        <a href="desk_chairs_page.php" class="desk-chairs">Desk & Chairs</a>
        <a href="#computer_parts_page.php" class="computer-parts">Computer Parts</a>
        <a href="#computers.php" class="computers">Computers</a>
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