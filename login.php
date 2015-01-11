<?php
  include 'core/init.php';
  include 'includes/overall/header.php';

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
      $errors[] = 'username/password is incorrrect';
    } else {

      $_SESSION['user_id'] = $login;
      header('Location: index.php');
      exit();
    }
  }
    print_r($errors);
}

  include 'includes/overall/footer.php';
?>
