<html>
<head> 
    <title>SpotifyClone</title>
<body>
    <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
            <h2>Zaloguj się do swojego konta</h2>
            <p>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="XD" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input id="loginPassword" name="loginPassword" type="password" placeholder="Twoje hasło" required>
            </p>

                <button type="submit" name="loginButton">Zaloguj się</button>
        </form>

        <form id="registerForm" action="register.php" method="POST">
            <h2>Stwórz swoje darmowe konto</h2>
            <p>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="bartsimp" required>
            </p>
            <p>
                <label for="firstName">Firstname</label>
                <input id="firstName" name="firstName" type="text" placeholder="Bart " required>
            </p>
            <p>
                <label for="lastName">Lastname</label>
                <input id="lastName" name="lastName" type="text" placeholder="Simp" required>
            </p>
            <p>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="bartsimp@gmail.com" required>
            </p>
            <p>
                <label for="emailconfirm">Confirm Email</label>
                <input id="emailconfirm" name="emailconfirm" type="email" placeholder="bartsimp@gmail.com" required>
            </p>

            <p>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Twoje hasło" required>
            </p>

            <p>
                <label for="passwordconfirm">Password</label>
                <input id="passwordconfirm" name="passwordconfirm" type="password" placeholder="Twoje hasło" required>
            </p>

                <button type="submit" name="registerButton">Zarejestruj się</button>
        </form>
    </div>
</body>
<html>