<?php
  $server_name = 'localhost';
  $username = 'pilo';
  $password = 'suyulin7147';
  $db_name = 'friend_fiduciary';

  // mysqli 的四個參數分別為：伺服器名稱、帳號、密碼、資料庫名稱
  $conn = new mysqli($server_name, $username, $password, $db_name);

  if ($conn->connect_error) {
    die('資料庫連線錯誤：' . $conn->connect_error);
  }
  $conn->query('SET NAMES UTF8');
  $conn->query('SET time_zone = "+8:00"');
?>