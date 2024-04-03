<?php
session_start(); 
$servername = "localhost";
$dbUsername = "root"; 
$dbPassword = "";
$dbName = "projekt"; 

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = mysqli_query($conn,"SELECT * FROM users WHERE nick = '$username' and password='$password'");
    
    if(mysqli_num_rows($sql)==1)
    {
        
        $_SESSION['user'] = $username;
        header("Location: index.php");  
    } 
    else {
        
            
                include("login.php");
                ?>
                <script>
                alert("Nieprawidlowy login lub hasło!");
            </script>
        <?php
    }
    $conn->close();
}
?>