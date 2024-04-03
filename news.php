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
<?php
    $conn = new mysqli('localhost', 'root', '', 'projekt');

    $zap = "SELECT posts.photo, users.nick FROM posts JOIN users ON posts.id_uzyt = users.id ORDER BY posts.id_post DESC LIMIT 5";
    $wyn = mysqli_query($conn,$zap);
    $wyn2 = mysqli_query($conn,$zap);
    $y=mysqli_fetch_assoc($wyn2);
?>

<main>   
        
    <form method="post">
        <?php
        
        $i=1;
            while($x = mysqli_fetch_assoc($wyn))
            {
                ?>

                <input type="hidden" name="zdj<?php echo $i; ?>" id="zdj<?php echo $i; ?>" value="<?php echo htmlspecialchars($x['photo']); ?>">
                <input type="hidden" name="nick<?php echo $i; ?>" id="nick<?php echo $i; ?>" value="<?php echo htmlspecialchars($x['nick']); ?>">

<?php
                $i++;
            }

        ?>
    </form>
    <h1 style="text-align:center;margin-top:20px;">Ostatnie 5 postów</h1>
    <div id="slid">
        
        <img src="<?php echo $y['photo']; ?>" alt="zdj" id="IMG">
        <br>
        <button type="button" onclick="powrot()" class="slider-btn left"> <i class="fa-solid fa-arrow-left"></i> </button>
        <button type="button" onclick="dalej()" class="slider-btn right"> <i class="fa-solid fa-arrow-right"></i> </button>

        <div id="kropki">
            <i class="fa-solid fa-circle kropka" id="dot1"></i>
            <i class="fa-solid fa-circle kropka" id="dot2"></i>
            <i class="fa-solid fa-circle kropka" id="dot3"></i>
            <i class="fa-solid fa-circle kropka" id="dot4"></i>
            <i class="fa-solid fa-circle kropka" id="dot5"></i>
        </div>

        <p><a href="user_profile.php?nazw=<?php echo urlencode($y['nick']); ?>" id="pnick"><?php echo htmlspecialchars($y['nick']); ?></a></p>
    </div>
</main>
<script src="slider.js"></script>
<footer>
    <p>Dziś jest: <span id="dataiczas"></span></p>
    <script src="data.js"></script>
</footer>
</body>
</html>

    
    