<?php
  if (!file_exists ("./private/passwd")) {
    mkdir ("./private");
    $tab['login'] = "admin";
    $tab['passwd'] = hash ("whirlpool", "admin");
    $users[] = $tab;
    file_put_contents ("./private/passwd", serialize ($users));
  }
  if (!file_exists ("./database/data.csv")) {
    mkdir ("./database");
    file_put_contents ("./database/data.csv", serialize ($data));
  }
?>