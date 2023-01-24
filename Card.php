<?php

//connect.php

$host = "localhost";
$username = "root";
$password = "";
$database = "Registration";

//connect to the database
$conn = mysqli_connect($host, $username, $password, $database);

$first_name = $_POST['C_Fname'];
$last_name = $_POST['C_Lname'];
$phnum = $_POST['C_number'];
$card_nam = $_POST['card_name'];
$card_num = $_POST['card_number'];
$card_expiry_data = $_POST['card_date'];
$card_cvv_no = $_POST['card_cvv'];


$sql = "INSERT INTO card_information(`first name`, `last name`, `Phone`, `card_name`, `card_number`, `expiry`, `cvv`) VALUES ('$first_name','$last_name','$phnum','$card_nam','$card_num ','$card_expiry_data','$card_cvv_no')";

if(mysqli_query($conn, $sql)){
    echo "<script>
    window.location.href='OTP.html';
    </script>";
} else {
    echo "<script>
    alert('try again!!!');
    window.location.href='checkout.html';
    </script>";
}

mysqli_close($conn);

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
?>