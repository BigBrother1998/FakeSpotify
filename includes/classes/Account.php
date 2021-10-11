<?php 
    class Account{

        private $connection;
        private $errorArray;

        //Funkcja zostanie wyświetlona jeśli instnieje odnośnik do klasy
        public function __construct($connection)    
        {
            $this->connection = $connection;
            $this->errorArray = array();
        }

        public function login($un, $pw)
        {
            $pw = md5($pw);

            $query = mysqli_query($this->connection, "SELECT * FROM users WHERE username='$un' AND password='$pw'");

            if(mysqli_num_rows($query) == 1)
            {
                return true;
            }else
            {
                array_push($this->errorArray, Constants::$loginFailure);
                false;
            }
        }

        //Walidacja

        public function register($un ,$fn, $ln, $em, $emc, $pw, $pwc) 
        {
            $this->validateUsername($un);
            $this->validateFirstname($fn);
            $this->validateLastName($ln);
            $this->validateEmails($em, $emc);
            $this->validatePasswords($pw, $pwc);

            if(empty($this->errorArray))
            {
                return $this->InsertUserDetails($un, $fn, $ln, $em, $pw);
            }
            else
            {
                return false;
            }
        }

        public function getError($error)
        {
            if(!in_array($error, $this->errorArray))
            {
                $error = "";
            }
         
            return "<span class='errorMessage'>$error</span>";
        }

        private function InsertUserDetails($un, $fn, $ln, $em, $pw)
        {
            $encryptedPW = md5($pw);
			$profilePicture = "assets/images/profile-pics/head_emerald.png";
			$date = date("Y-m-d");

			$result = mysqli_query($this->connection, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPW', '$date', '$profilePicture')");

			return $result;
        }

        private function validateUsername($un)
        {
            if(strlen($un) > 30 || strlen($un) < 5)
            {
                array_push($this ->errorArray, Constants::$usernameRequirements); //klasa odwołująca się do stałych zmiennych w tym przypadku klasy Constants
                return;

                $checkUsernameQuery = mysqli_query($this->connection, "SELECT username FROM users WHERE username='$un'");
                if(mysqli_num_rows($checkUsernameQuery) !=0)
                {
                    array_push($this ->errorArray, Constants::$usernameExists);
                    return;
                }
            }
        }

        private function validateFirstname($fn)
        {
            if(strlen($fn) > 30 || strlen($fn) < 2)
            {
                array_push($this ->errorArray, Constants::$nameRequirements);
                return;
            }
        }

        private function validateLastName($ln)
        {
            if(strlen($ln) > 30 || strlen($ln) < 2)
            {
                array_push($this ->errorArray, Constants::$lastnameRequirements);
                return;
            }
        }

        private function validateEmails($em, $emc)
        {
            if($em != $emc)
            {
                array_push($this ->errorArray, Constants::$emailsDoNotMatch);
                return;
            }

            if(!filter_var($em, FILTER_VALIDATE_EMAIL))
            {
                array_push($this ->errorArray, Constants::$emailIsValid);
                return;
            }

            $checkEmailQuery = mysqli_query($this->connection, "SELECT email FROM users WHERE email='$em'");
            if(mysqli_num_rows($checkEmailQuery) !=0)
            {
                array_push($this ->errorArray, Constants::$emailExists);
                return;
            }
        }

        private function validatePasswords($pw, $pwc)
        {
            if($pw != $pwc)
            {
                array_push($this ->errorArray, Constants::$passworsdDoNotMatch);
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/', $pw))
            {
                array_push($this ->errorArray, Constants::$passwordNotAlphanumeric);
                return;
            }

            if(strlen($pw) > 50 || strlen($pw) < 8)
            {
                array_push($this ->errorArray, Constants::$passwordRequirements);
                return;
            }

        }


    }
?>