
<?php
  //Check for existing users
  function user_exists($username) {
    $username = sanitize($username);
    return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'"), 0) == 1) ? true : false;
  }
  //Check for activation
  function user_active($username) {
    $username = sanitize($username);
    return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1"), 0) == 1) ? true : false;
  }

?>
