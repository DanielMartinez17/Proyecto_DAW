<?php
session_start();

session_unset();
session_destroy();


if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
} else {

}
?>