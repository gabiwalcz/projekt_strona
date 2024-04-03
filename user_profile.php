<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIOLEK | Strona główna</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/9047391fe2.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar">
    <div class="logo">MIOLEK</div>
    <ul class="nav-links">
    <li><a href="index.php">Strona główna</a></li>
        <li><a href="news.php">Najnowsze posty</a></li>
        <li><a href="kalkulator.php">Kalkulator</a></li>
        <li> <?php
        session_start();
        error_reporting(0);
        if($_SESSION['user'])
        {
            ?>

            <a href="my_account.php"><i class="fa-solid fa-user"></i></a> </li>
           <li><a href="wyloguj.php">Wyloguj się</a></li>
<?php
        }
        else{
    ?>
            <li><a href="login.php"><i class="fa-solid fa-user"></i></a></li>
            <?php
        }
        ?>
    </ul>
    <button class="hamburger"><i class="fa-solid fa-bars"></i></button>
</nav>
<script src="script.js"></script>
<main>
<div id="profile-info">
        <?php
        $conn = new mysqli('localhost', 'root', '', 'projekt');
        $nazwa = $_GET['nazw'];

        $zdjecie="SELECT * from users where nick='$nazwa'";
        $result = $conn->query($zdjecie);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $photo_path = "users/" . $row['photo'];
        } else {
            $photo_path = "users/user.jpg"; 
        }
        ?>

        <img src="<?php echo htmlspecialchars($photo_path); ?>" alt="User Photo">
        <div id="description">
            
            <h1><?php echo $nazwa ?></h1>
            <p> <?php 
                
                $stmt = "SELECT * FROM users WHERE nick = '$nazwa'";   
                $result = $conn->query($stmt);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['description'];
                }
                
            ?> </p>
        </div>
    </div>
<?php

$sql = "SELECT posts.id_post, posts.photo AS post_photo, posts.tresc, users.nick, users.photo AS user_photo FROM posts JOIN users ON posts.id_uzyt = users.id where users.nick='$nazwa' ORDER BY posts.id_post DESC";

$posts_result = $conn->query($sql);


if ($posts_result->num_rows > 0) {
    while ($post = $posts_result->fetch_assoc()) {

        $userPhoto = !empty($post['user_photo']) ? $post['user_photo'] : 'user.jpg';

        echo "<div class='poscik'>";
        echo "<div class='content'>";
        echo "<div class='us'>";
        echo "<img src='users/" . htmlspecialchars($userPhoto) . "' alt='User Photo'>";
        echo "<h3 class='usernam'>  ". htmlspecialchars($post["nick"]) . "</h3>";
        echo "</div>";
        echo "<div class='zdjecie'>";
        echo "<img src='" . htmlspecialchars($post["post_photo"]) . "' alt='Post Photo'>";
        echo "</div>";
        echo "<p class='com'>" . htmlspecialchars($post["tresc"]) . "</p> <br>";
        echo "</div>"; 

        $comments_sql = "SELECT komentarze.tresc, users.nick, users.photo AS comment_user_photo FROM komentarze JOIN users ON komentarze.id_uzyt = users.id WHERE komentarze.id_post = " . intval($post["id_post"])." ORDER BY komentarze.id DESC";
        $comments_result = $conn->query($comments_sql);

        echo "<div class='commentss'>";
        if ($comments_result->num_rows > 0) {
            while ($comment = $comments_result->fetch_assoc()) {

                $commentUserPhoto = !empty($comment['comment_user_photo']) ? $comment['comment_user_photo'] : 'user.jpg';
                echo "<div class='komentarze'>";
                    echo "<div class='commentx'>";
                        echo "<div class='commentuser'>";
                            echo "<img src='users/" . htmlspecialchars($commentUserPhoto) . "' alt='User Photo'>";
                            echo "<h4><a href='user_profile.php?nazw=" . urlencode($comment["nick"]) . "'>" . htmlspecialchars($comment["nick"]) . "</a></h4>";
                        echo "</div>";
                        echo "<p>" . htmlspecialchars($comment["tresc"]) . "</p>";
                    echo "</div>"; 
                echo "</div>";
                
            }
        } else {
            echo "<p class='brak'>Brak komentarzy do wyświetlenia.</p>";
        }
        
        echo "</div>"; 

        if($_SESSION['user'])
        {
        ?>
           <div class="dodawanie">
                    <form action="addcomment.php" method="post">
                        <input type="hidden" name="id_post" value="<?php echo $post['id_post']; ?>">
                        <input type="text" name="komentarz" placeholder="Napisz komentarz">
                        <button type="submit">></button>
                    </form>
                </div>     
<?php
        }
        else echo "<div class='niezalog'><a href='login.php'>Zaloguj się aby dodać komentarz!</a></div>";
        echo "</div>"; 
        
    }
} else {
    echo "<p>Brak postów do wyświetlenia.</p>";
}

$conn->close();


?>
       
    
</main>

<footer>
    <p>Dziś jest: <span id="dataiczas"></span></p>
    <script src="data.js"></script>
</footer>
</body>
</html>

    
    