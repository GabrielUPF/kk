<?php
    session_start();
    if(!isset($_SESSION['autenticado'])){
      header('location: login.php');
    }
?>
<?php require_once('header.php'); ?>
<?php require_once('footer.php'); ?>
