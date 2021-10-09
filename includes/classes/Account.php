<?php 
    class Account{

        private $errorArray;

        //Funkcja zostanie wyświetlona jeśli instnieje odnośnik do klasy
        public function __construct()    
        {
            $this->errorArray = array();
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
                //Dodaj do bazy
                return true;
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

        private function validateUsername($un)
        {
            if(strlen($un) > 30 || strlen($un) < 5)
            {
                array_push($this ->errorArray, Constants::$usernameRequirements); //klasa odwołująca się do stałych zmiennych
                return;
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
        }

        private function validatePasswords($pw, $pwc)
        {
            if($pw != $pwc)
            {
                array_push($this ->errorArray, Constants::$passworsdDoNotMatch);
                return;
            }

            if(preg_match('/[A-Za-z0-9]/', $pw))
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