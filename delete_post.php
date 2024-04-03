<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'projekt');

if (!isset($_SESSION['user'])) {
    echo "Musisz się zalogować, aby usunąć post.";
    exit;
}

if (isset($_GET['id_post'])) {
    $id_post = $conn->real_escape_string($_GET['id_post']);
    
    // Sprawdź, czy zalogowany użytkownik jest właścicielem posta lub ma uprawnienia do usunięcia
    // Tu należy dodać odpowiednie sprawdzenie

    // Usuń post
    $query = "DELETE FROM posts WHERE id_post = '{$id_post}'";
    if ($conn->query($query)) {
        echo "Post został usunięty.";
    } else {
        echo "Wystąpił błąd przy usuwaniu posta: " . $conn->error;
    }
} else {
    echo "Nie określono posta do usunięcia.";
}

$conn->close();
header('Location: my_account.php'); 
exit;
?>