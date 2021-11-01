<?php 
    class Artist {

        private $connection;
        private $id;

        //Funkcja zostanie wyświetlona jeśli instnieje odnośnik do klasy
        public function __construct($connection, $id)    
        {
            $this->connection = $connection;
            $this->id = $id;
        }

        public function getName()
        {
            $artistQuery = mysqli_query($this->connection, "SELECT name FROM artists WHERE id='$this->id'");
            $artist = mysqli_fetch_array($artistQuery);
            return $artist['name'];
        }

    }

?>