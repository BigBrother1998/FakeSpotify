<?php

    ob_start();

    $timezone = date_default_timezone_set("Europe/Warsaw");

    $connection = mysqli_connect("localhost", "root", "", "fakespotifybase");

    if(mysqli_connect_error())
    {
        echo "Błąd połączenia z bazą danych" . mysli_connect_errno();
    }

?>