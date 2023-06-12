<?php

session_start();
unset($_SESSION["registro"]);
session_destroy();

header("location:login.php");

?>