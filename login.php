<?php
  include 'core/init.php';

  if (empty ($_POST) === false) {
    $username = $_POST['username'];
    $password = $_POST['password'];

  if (empty($username) === true || empty($password) === true) {
    $errors[] = 'You need to enter a username and password';
  } else if (user_exists($username) === false) {
    $errors[] = 'We can\'t find that username. Please register!';
  } else if (user_active($username) === false) {
    $errors[] = 'Please activate your account!';
  } else {
    $login = login($username, $password);
    if ($login === false) {
      $errors[] = "Username/password is incorrect";
    } else {
      echo 'ok';
    }
  }
    print_r($errors);
}
?>
