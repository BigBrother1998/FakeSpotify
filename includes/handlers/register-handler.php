<?php 

function sanitizeFormUsername($inputText) {

    $inputText = strip_tags($inputText);   //Każda przerwa podczas uzupełniana formularzu zostanie usunięta
    $inputText = str_replace(" ","", $inputText);
    return $inputText;
}

function sanitizeFormPassword($inputText) {

    $inputText = strip_tags($inputText);  
    return $inputText;
}

function sanitizeFormString($inputText) {

    $inputText = strip_tags($inputText);   
    $inputText = str_replace(" ","", $inputText);
    $inputText = ucfirst(strtolower($inputText)); //Pierwsza litera zawszę będzie duża
    return $inputText;
}

if(isset($_POST['registerButton'])){

    $username = sanitizeFormUsername($_POST['username']);
 
    $firstName = sanitizeFormString($_POST['firstName']);

    $lastName = sanitizeFormString($_POST['lastName']);

    $email = sanitizeFormString($_POST['email']);

    $emailconfirm = sanitizeFormString($_POST['emailconfirm']);

    $password = sanitizeFormPassword($_POST['password']);

    $passwordconfirm = sanitizeFormPassword($_POST['passwordconfirm']);

    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $emailconfirm, $password, $passwordconfirm);

    if($wasSuccessful == true)
    {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }

}

?>
