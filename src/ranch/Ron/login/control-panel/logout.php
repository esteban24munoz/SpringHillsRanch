<?php

session_start();

//Removes all data ssociated  with $_SESSION
session_destroy();

header("Location: ../login.php");

?>
