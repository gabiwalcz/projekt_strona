<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'projekt'); 

if(isset($_SESSION['user'])) {
    if (isset($_POST["submit"])) {
        $target_dir = "users/"; 
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $nick=$_SESSION['user'];
       
        $stmt = "SELECT id FROM users WHERE nick = '{$_SESSION['user']}'";
        $result = $conn->query($stmt);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_uzyt = $row['id']; 
        } else {
            echo "Nie znaleziono użytkownika";
            exit();
        }

        $tresc = $conn->real_escape_string($_POST['tresc']); // Sanitacja treści posta

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO posts (id_uzyt, photo, tresc) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $id_uzyt, $target_file, $tresc);
            
            if ($stmt->execute()) {
                ?>
                    <script>alert("Post dodany!");</script>
                <?php
                header("Location: my_account.php");  
            } 
            $stmt->close();
        } else {
            echo "Wystąpił błąd podczas przesyłania pliku.";
        }
    }
} else {
    echo "Nie jesteś zalogowany!";
}

$conn->close();
?>