
<?php
include("includes/config.php"); 
include("includes/classes/Account.php"); 
include("includes/classes/Constants.php"); 

$account = new Account($connection);

include("includes/handlers/register-handler.php") ;
include("includes/handlers/login-handler.php") ;

function getInputValue($name) 
{
    if(isset($_POST[$name]))
    {
        echo $_POST[$name];
    }
}

?>

<html>
<head> 
    <title>SpotifyClone</title>

    <link rel="stylesheet" href="assets/css/register.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="assets/js/register.js"></script>
</head>
<body>

    <?php 
    
        if(isset($_POST['registerButton']))
        {
            echo '<script>
            $(document).ready(function()
            {
                $("#loginForm").hide();
                $("#registerForm").show();              
            });
            </script>';
        }else
        {
            echo '<script>
            $(document).ready(function()
            {
                $("#loginForm").show();
                $("#registerForm").hide();              
            });
            </script>';
        }

    ?>


    <div id="background">

        <div id="loginContainer">

            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Zaloguj się do swojego konta</h2>
                    <p>
                    <?php echo $account->getError(Constants::$loginFailure); ?>
                        <label for="loginUsername">Nazwa użytkownika</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="Twoja nazwa" value="<?php getInputValue('loginUsername'); ?>" required>
                    </p>
                    <p>
                        <label for="loginPassword">Twoje hasło</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="********" required>
                    </p>

                        <button type="submit" name="loginButton">Zaloguj się</button>

                        <div class="hasAccount" class="">
                            <span id="hideLogin">Nie posiadasz jeszcze konta? Zarejestruj się tutaj.</span>
                        </div>
                </form>

                <form id="registerForm" action="register.php" method="POST">
                    <h2>Stwórz swoje darmowe konto</h2>
                    <p>
                        <?php echo $account->getError(Constants::$usernameRequirements); ?>
                        <?php echo $account->getError(Constants::$usernameExists); ?>
                        <label for="username">Nazwa użytkownika</label>
                        <input id="username" name="username" type="text" placeholder="Twoje nazwa" value="<?php getInputValue('username'); ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$nameRequirements); ?>
                        <label for="firstName">Imię</label>
                        <input id="firstName" name="firstName" type="text" placeholder="Twoje imię"  value="<?php getInputValue('firstName'); ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$lastnameRequirements); ?>
                        <label for="lastName">Nazwisko</label>
                        <input id="lastName" name="lastName" type="text" placeholder="Twoje nazwisko"  value="<?php getInputValue('lastName'); ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                        <?php echo $account->getError(Constants::$emailIsValid); ?>
                        <?php echo $account->getError(Constants::$emailExists); ?>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="Twój email"  value="<?php getInputValue('email'); ?>" required>
                    </p>
                    <p>
                        <label for="emailconfirm">Potwierdzenie Emaila</label>
                        <input id="emailconfirm" name="emailconfirm" type="email" placeholder="Ten sam email" value="<?php getInputValue('emailconfirm'); ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$passworsdDoNotMatch); ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                        <?php echo $account->getError(Constants::$passwordRequirements); ?>
                        <label for="password">Hasło</label>
                        <input id="password" name="password" type="password" placeholder="********" value="<?php getInputValue('password'); ?>" required>
                    </p>

                    <p>
                        <label for="passwordconfirm">Potwierdzenie hasła</label>
                        <input id="passwordconfirm" name="passwordconfirm" type="password" placeholder="********" value="<?php getInputValue('passwordconfirm'); ?>" required>
                    </p>

                        <button type="submit" name="registerButton">Zarejestruj się</button>

                        <div class="hasAccount" class="">
                            <span id="hideRegister">Czy posiadasz już konto? Zaloguj się tutaj :)</span>
                        </div>

                </form>
            </div>

            <div id="loginText">
            <img src="assets/images/Spotify_logo.png">
                <h1>Odkryj nowe uniwersum muzyki z serwisem Spotify</h1>
                <h2>Słuchaj w zupełności za darmo!</h2>
                <ul>
                    <li><i class="fas fa-check" style="color: #07d159;"></i> Odkryj największe hity dekady</li>
                    <li><i class="fas fa-check" style="color: #07d159;"></i> Stwórz własne playlisty</li>
                    <li><i class="fas fa-check" style="color: #07d159;"></i> Dostęp z każdego miejsca na twoim urządzeniu</li>
                </ul>
            </div>
        </div>
    </div>
</body>
<html>