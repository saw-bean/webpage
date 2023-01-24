
<?php

//connect.php

$host = "localhost";
$username = "root";
$password = "";
$database = "Registration";

//connect to the database
$conn = mysqli_connect($host, $username, $password, $database);

//check if connection was successful
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}


//take parameters as you like
$Fnamee = $_POST['Fname'];
$Lnamee = $_POST['Lname'];
$emaill = $_POST['email'];
$passwordd = $_POST['password'];
$num = $_POST['number'];

// if (isset ($_POST[ 'signup' ]))
// //  user check already exist in the database
//     $check = "SELECT * FROM `register` WHERE email= $_POST['$emaill']";
//     $result = mysqli_query($conn , $check);
//     if($result)
//     {
//         if (mysqli_num_rows($result))
//     }
//     {
//         else echo "Email already exist"
//     }


//insert data into the database
$sql = "INSERT INTO register (first_name,last_name,email,ph_no,password) VALUES ('$Fnamee','$Lnamee','$emaill','$num','$passwordd')";


if(mysqli_query($conn, $sql)){
    echo "<script>
    alert('Registered sucessfully!!!');
    window.location.href='login.html';
    </script>";
} else {
    echo "<script>
    alert('Error, Try again!!!');
    window.location.href='login.html';
    </script>";
}

mysqli_close($conn);

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

?>