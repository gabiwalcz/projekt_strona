
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="styl.css">
    <title>TEST | Logowanie</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="regist.php" method="post">
                <h2>Zarejestruj się!</h2>
                <input type="text" name="username" placeholder="Nazwa użytkownika" required>
                <input type="email" name="mail" placeholder="Email" required>
                <input type="password" name="password" placeholder="Hasło" required>
                <button>Zarejestruj się</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="log.php" method="post">
                <h2>Zaloguj się!</h2>
                <input type="text" name="username" placeholder="Nazwa użytkownika" required>
                <input type="password" name="password" placeholder="Hasło" required>
                <button type="submit">Zaloguj się</button>
            </form>
        </div>
        <button id="hidd" class="hidcss">Zaloguj się tutaj!</button>
        <button id="hidd2" class="hidcss">Zarejestruj się tutaj!</button>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Masz już konto?</h1>
                    <p>Witamy ponownie!</p>
                    <button class="hidden" id="login">Zaloguj się</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Nie masz jeszcze konta?</h1>
                    <p>To nie problem!</p>
                    <button class="hidden" id="register">Zarejestruj się</button>
                </div>
            </div>
        </div>
    </div>
    <script src="script2.js"></script>
</body>
</html>