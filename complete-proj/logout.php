<?php
  if(!isset($_SESSION)) {
    session_start();
  }
?>

<?php
  session_unset();
  session_destroy();
  echo "<script type='text/javascript'>document.location.href='https://proj-onestop-electronics.000webhostapp.com/index.php';</script>";
?>