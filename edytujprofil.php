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
        <li><a href="news.html">Najnowsze posty</a></li>
        <li><a href="kalkulator.php">Kalkulator</a></li>
        <li> <?php
        session_start();
        error_reporting(0);
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
    <form action="edit.php" method="post" enctype="multipart/form-data">
        Opis profilu:
        <textarea name="tresc" id="tresc" rows="4" cols="50"></textarea>
        <br>
        Wybierz zdjęcie profilowe:
        <input type="file" name="photo" id="photo">
        <br>
        <input type="submit" value="Prześlij zdjęcie" name="submit">
    </form>
</main>

<footer>
    <p>Dziś jest: <span id="dataiczas"></span></p>
    <script src="data.js"></script>
</footer>
</body>
</html>
