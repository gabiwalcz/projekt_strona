<?php
session_start();

$id_post = $_POST['id_post'];
$komentarz = $_POST['komentarz'];
$nick = $_SESSION['user'];

$conn = new mysqli('localhost', 'root', '', 'projekt');

$id_post = $conn->real_escape_string($id_post);
$komentarz = $conn->real_escape_string($komentarz);

if(empty($komentarz))
{
    header('Location: index.php');
}
else{
    $user_sql = "SELECT id FROM users WHERE nick = '$nick'";
    $user_result = $conn->query($user_sql);
    if ($user_result->num_rows > 0) {
        $user_row = $user_result->fetch_assoc();
        $id_uzytkownika = $user_row['id'];

        $insert_sql = "INSERT INTO komentarze (id_post, id_uzyt, tresc) VALUES ('$id_post', '$id_uzytkownika', '$komentarz')";
        if($conn->query($insert_sql)) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            ?>
                <script>
                    alert("Błąd dodawania komentarza!");
                </script>
            <?php
        }
    } else {
        echo "Użytkownik nie został znaleziony.";
    }
}

$conn->close();
?>