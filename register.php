
<?php
include("includes/config.php"); 
include("includes/classes/Account.php"); 
include("includes/classes/Constants.php"); 

$account = new Account();

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
                <?php echo $account->getError(Constants::$usernameRequirements); ?>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="bartsimp" value="<?php getInputValue('username'); ?>" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$nameRequirements); ?>
                <label for="firstName">Firstname</label>
                <input id="firstName" name="firstName" type="text" placeholder="Bart"  value="<?php getInputValue('firstName'); ?>" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$lastnameRequirements); ?>
                <label for="lastName">Lastname</label>
                <input id="lastName" name="lastName" type="text" placeholder="Simp"  value="<?php getInputValue('lastName'); ?>" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$emailIsValid); ?>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="bartsimp@gmail.com"  value="<?php getInputValue('email'); ?>" required>
            </p>
            <p>
                <label for="emailconfirm">Confirm Email</label>
                <input id="emailconfirm" name="emailconfirm" type="email" placeholder="bartsimp@gmail.com" value="<?php getInputValue('emailconfirm'); ?>" required>
            </p>

            <p>
                <?php echo $account->getError(Constants::$passworsdDoNotMatch); ?>
                <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                <?php echo $account->getError(Constants::$passwordRequirements); ?>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Twoje hasło" value="<?php getInputValue('password'); ?>" required>
            </p>

            <p>
                <label for="passwordconfirm">Password</label>
                <input id="passwordconfirm" name="passwordconfirm" type="password" placeholder="Twoje hasło" value="<?php getInputValue('passwordconfirm'); ?>" required>
            </p>

                <button type="submit" name="registerButton">Zarejestruj się</button>
        </form>
    </div>
    
</body>
<html>