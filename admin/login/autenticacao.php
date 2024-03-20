<?php
session_start();
if(!$_SESSION['nome']) {
    header('Location: ../login/pag_login.php');
    exit();
}
?>