
<?php
  //Check for existing users
  function user_exists($username) {
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
    return (mysql_result($query, 0) == 1) ? true : false;
  }
  //Check for activation
  function user_active($username) {
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1");
    return (mysql_result($query, 0) == 1) ? true : false;
  }
  //Get user id
  function user_id_from_username($username) {
    $username = sanitize($username);
    return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"), 0, 'user_id');
  }
  //Check for successful login
  function login($username, $password) {
    $user_id = user_id_from_username($username);

    $username = sanitize($username);
    $password = md5($password);

    return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `username` = '$username' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
  }
?>
