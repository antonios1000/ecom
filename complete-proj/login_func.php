<?php
    session_start();
    ob_start();
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
    $cus_username = $_POST["cus_username"];
    $password1 = $_POST["password"];

    $table_name = $_POST["cus_username"];

    $query = "SHOW TABLES";
    $result = mysqli_query($conn, $query);
    $tables = array();
        while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }
    for ($i = 0; $i < count($tables); $i++) {
        echo $tables[$i] . "<br>";
    }
    if (!in_array($_POST['cus_username'], $tables)) {
        echo "<script type='text/javascript'>document.location.href='https://proj-onestop-electronics.000webhostapp.com/login_form.php';</script>";
    }
    if (!empty($password1)) {
        if(in_array($_POST['cus_username'], $tables)) {
            $query = "SELECT * FROM $table_name WHERE password1 = '$password1'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            if($row["password1"] == $password1){
                // echo "yes";
                session_start();
                $_SESSION['cus_username'] = $cus_username;
                echo "<script type='text/javascript'>document.location.href='https://proj-onestop-electronics.000webhostapp.com/index.php';</script>";
            }
            else {
                echo "<script type='text/javascript'>document.location.href='https://proj-onestop-electronics.000webhostapp.com/login_form.php';</script>";
            }
        }
    } else {
        echo "<script type='text/javascript'>document.location.href='https://proj-onestop-electronics.000webhostapp.com/login_form.php';</script>";
    }
?>

<?php
    $conn->close(); 
?>