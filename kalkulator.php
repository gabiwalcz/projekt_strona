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

    <div id="kalk">
        <h1>KALKULATOR PROWADZENIA KONTA</h1><br>
        <form>
            <br>
                <h3>Częstotliwość wstawiania postów:</h3>
                <br>
                <input type="radio" name="czest" id="jedendziennie"> 1 raz dziennie <br>
                <input type="radio" name="czest" id="jedentyg"> 1 raz tygodniowo <br>
                <input type="radio" name="czest" id="jedenmies"> 1 raz na miesiąc <br>
                <input type="radio" name="czest" id="czesciej"> 2 razy dziennie <br>
                <br>
                Podaj ilość postów: <input type="number" value=1 max=60 min=1 id="ile">
                <br><br>
                <input type="button" value="KALKULACJA" onclick="liczenie()">
			    <input type="reset" value="RESET" onclick="clean()">
                <br><br>
                <p>Koszt: <span id="cena">__</span> zł</p><br>
        </form>
        <script src="kalk.js"></script>
    </div>

</main>

<footer>
    <p>Dziś jest: <span id="dataiczas"></span></p>
    <script src="data.js"></script>
</footer>
</body>
</html>

    
    