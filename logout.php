<?php
  session_start();
  session_destroy();
  header('Location: index.php');
  //to logout use /logout.php
?>
