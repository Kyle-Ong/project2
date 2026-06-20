<?php

require_once("settings.php");

$conn = mysqli_connect($host, $user, $pwd, $Newbie_db);

if(!$conn)
{
    die("Database connection failed: " . mysqli_connect_error());
}

?>