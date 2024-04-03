<?php
session_start(); 
$servername = "localhost";
$dbUsername = "root"; 
$dbPassword = "";
$dbName = "projekt"; 

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $erro_nick=mysqli_query($conn,"SELECT * FROM users where nick='$username'");
    $erro_mail=mysqli_query($conn,"SELECT * FROM users where email='$mail'");

    if(mysqli_num_rows($erro_nick)<1)
    {
        if(mysqli_num_rows($erro_mail)<1)
        {
            $sql = mysqli_query($conn,"INSERT INTO `users`(`nick`, `email`, `password`) VALUES ('$username','$mail','$password');");
            $w = mysqli_query($conn,"SELECT * FROM users WHERE nick = '$username'");

        
            if(mysqli_num_rows($w)==1)
            {
                ?>
                <script>
                    alert("Zarejestrowano pomyślnie!");
                </script>
                <?php
                include("login.php");
            }
            else {
                        include("login.php");
                        ?>
                        <script>
                        alert("BŁąd rejestracji");
                    </script>
                <?php
            }
        }
        else
        {
            include("login.php");
            ?>
            <script>
            alert("Ten adres e-mail jest już zajęty! Zaloguj się do swojego konta");
        </script>
    <?php
        }
    }
    else
    {
        include("login.php");
        ?>
        <script>
            alert("Ta nazwa użytkownika jest zajęta! Wybierz inną!");
        </script>
        <?php
    }
    $conn->close();
}
?>