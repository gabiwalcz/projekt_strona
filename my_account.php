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

        $conn=new mysqli('localhost', 'root', '', 'projekt');
        if($_SESSION['user'])
        {
            ?>

            <a href="my_account.php"><i class="fa-solid fa-user"></i></a> <li><a href="wyloguj.php">Wyloguj się</a></li>
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
        $nick=$_SESSION['user'];
        $zdjecie="SELECT * from users where nick='$nick'";
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
            
            <h1><?php echo $_SESSION['user'] ?></h1>
            <p> <?php 
                if (isset($_SESSION['user'])) {
                    $stmt = $conn->prepare("SELECT description FROM users WHERE nick = ?");
                    $stmt->bind_param("s", $_SESSION['user']);
                    $stmt->execute();
                    
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row['description'];
                    }
                }
            ?> </p>
        </div>
        <div id="edit">
            <div id="addpost">
                <a href="dodajpost.php"><button class="editBtn">Dodaj nowy post</button></a>
            </div>
            <div class="editProf">
                <a href="edytujprofil.php"><button class="editBtn">Edytuj profil</button></a>
            </div>
        </div>
    </div>
    <div id="photos">
        <?php
            $stmt = $conn->prepare("SELECT id FROM users WHERE nick = ?");
            $stmt->bind_param("s", $_SESSION['user']);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $id_uzyt = $row['id']; 

                $sql = ("SELECT * FROM posts WHERE id_uzyt = $id_uzyt ORDER BY id_post DESC");
                $posts_result = $conn->query($sql);

                while($post = $posts_result->fetch_assoc()) {
                    echo "<div class='post'>";
                    echo "<img src='" . htmlspecialchars($post['photo']) . "' alt='post" . htmlspecialchars($post['id_post']) . "'>";
                    echo "<a href='delete_post.php?id_post=" . $post['id_post'] . "' onclick='return confirm(\"Czy na pewno chcesz usunąć ten post?\");'>Usuń post</a>";
                    echo "</div>";
                }
            }
        ?>
    </div>
</main>

<footer>
    <p>Dziś jest: <span id="dataiczas"></span></p>
    <script src="data.js"></script>
</footer>
</body>
</html>

    
    