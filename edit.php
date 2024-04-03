<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['user'])) {
    echo "Musisz się zalogować";
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'projekt');

if (isset($_POST["submit"])) {
    $nick = $_SESSION['user'];

    if(empty($_POST['tresc']))
    {
        $query = "SELECT description FROM users WHERE nick = '$nick'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $description = $row['description']; // Używamy obecnej wartości
        } else {
            $description = ""; // W przypadku, gdy zapytanie nie zwróci wyników, możemy ustawić domyślną wartość
        }
    }
    else{
        $description = $conn->real_escape_string($_POST['tresc']);
    }
    
    
    if (!empty($_FILES["photo"]["name"])) {
        $target_dir = "users/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $photo = basename($_FILES["photo"]["name"]);
        } else {
            echo "Przepraszamy, wystąpił błąd podczas przesyłania pliku.";
            exit;
        }
    } else {

        $photo_query = $conn->query("SELECT photo FROM users WHERE nick = '$nick'");
        if ($photo_query->num_rows > 0) {
            $row = $photo_query->fetch_assoc();
            $photo = $row['photo'];
        } else {
            $photo = ''; 
        }
    }


    $update = $conn->query("UPDATE users SET description = '$description', photo = '$photo' WHERE nick = '$nick'");
    
    if ($update) {
        include("my_account.php");
    } else {
        echo "Błąd przy aktualizacji profilu: " . $conn->error;
    }
}

$conn->close();
?>