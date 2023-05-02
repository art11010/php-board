<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="board";

  // DB 연결
  try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "DB 연결 성공";
  } catch (PDOException $e){
    echo $e -> getMessage();
    exit;
  }
?>