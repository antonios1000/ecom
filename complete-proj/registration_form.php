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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
    <title>Registration</title>
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
              <a class="active" href="#account.php">
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
    </div>
    <!-- ----------------- REGISTRATION ----------------- -->
    <div class="reg-form">
      <div class="reg-container">              
        <form action="registration_func.php" method="POST">
          <h1>Registration</h1>
          <input type="text" placeholder="Enter User Name" name="cus_username" />
          <input type="email" placeholder="Enter Email" name="email" />
          <input type="password" placeholder="Enter Password" name="password1" />
          <input type="password" placeholder="Confirm Password" name="password2" />
          <button type="submit" name="Register">Register</button>
          <p>By creating an account you agree to our <br> <a href="#">Terms & Privacy</a>.</p>
        </form>
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