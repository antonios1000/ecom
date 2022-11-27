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
    if(isset($_POST["cus_username"])){
        $cus_username = $_POST["cus_username"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];
        $email = $_POST["email"];

        $table_name = $_POST["cus_username"];
        
        $query = "SHOW TABLES";
        $result = mysqli_query($conn, $query);
        $tables = array();
        // Storing all table names in $tables
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }

        if(in_array($table_name, $tables)){
            echo "Username is already taken";
        } else {
            if ($password1 == $password2){
                $sql = "CREATE TABLE $table_name (
                        id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        cus_username VARCHAR(30) NOT NULL,
                        email VARCHAR(30) NOT NULL,
                        password1 VARCHAR(30) NOT NULL,
                        password2 VARCHAR(30) NOT NULL,
                        itemName VARCHAR(30) DEFAULT NULL,
                        price INT(20) DEFAULT NULL,
                        quantity INT(225) DEFAULT NULL,
                        totalPrice INT(225) DEFAULT NULL,
                        image VARCHAR(225) DEFAULT NULL,
                        reg_date TIMESTAMP
                    )";
                if ($conn->query($sql) === TRUE) {
                    $sql = "INSERT INTO $table_name (cus_username, email, password1, password2)
                            VALUES ('$cus_username', '$email', '$password1', '$password2')";
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION["tableName"] =$table_name;
                        $_SESSION["mail_reg"] =$email;
                        $_SESSION["pass1_reg"] =$pass1;
                        $_SESSION["pass2_reg"] =$pass2;
                        echo "<script type='text/javascript'>document.location.href='https://proj-onestop-electronics.000webhostapp.com/index.php';</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error creating table: " . $conn->error;
                }
            } else {
                echo "Passwords must match.";
            }
        }
    } else {
        echo "First if statement";
    }
?>
<?php
    $conn->close();
?>