<?php

  $servername = "localhost";
  $username = "root";
  $password = "";

  // - - - - - Insert 문으로 데이터 입력 - - - - -
  $dbname="abc";
  // DB 연결
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "DB 연결 성공";
  } catch (PDOException $e){
    echo $e -> getMessage();
  }
  // Table 입력
  try {
    $sql = "INSERT INTO MyGuests(firstname, lastname, email) VALUES('John', 'Doe', 'john@example.com')";
    $conn->exec($sql);
    echo "Table 입력 성공";
  } catch (PDOException $e){
    echo $e -> getMessage();
  }
  $conn = null;  // DB 연결 종료

  // - - - - - Mysql PDO, Table 생성 - - - - -
  // // DB 연결
  // try {
  //   $conn =  new PDO("mysql:host=$servername;dbname=abc", $username, $password);
  //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   echo "DB 연결 성공";
  // } catch (PDOException $e){
  //   echo "DB 연결 실패";
  //   echo $e -> getMessage();
  //   exit;
  // }

  // // DB 생성
  // // $sql = "CREATE DATABASE 생성할DB이름";
  // // $conn->exec($sql);

  // // Table 생성 (Table 생성 시 내부 Table 구조도 같이 만들어줘야 함)
  // try{
  //   $sql = "CREATE TABLE MyGuests (
  //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  //     firstname VARCHAR(30) NOT NULL,
  //     lastname VARCHAR(30) NOT NULL,
  //     email VARCHAR(50),
  //     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  //   )";
  //   $conn->exec($sql);
  //   echo "Table 생성";
  // } catch (PDOException $e){
  //   echo $e->getMessage();
  // }
  // $conn = null;  // DB 연결 종료


  // - - - - - php로 데이터 생성 - - - - -
  // try{
  //   $conn = new PDO("mysql:host=$servername", $username, $password);
  //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   echo "DB 연결 성공";
  // } catch (PDOException $e){
  //   echo "DB 연결 실패";
  //   echo $e -> getMessage();
  //   exit;
  // }
  // try{
  //   // $spl = "CREATE DATABASE firstdb"; // 생성
  //   // $spl ="DROP DATABASE firstdb"; // 삭제
  //   $dbname = "firstdb";  // 변수에 담아서 생성
  //   $spl = "CREATE DATABASE ". $dbname;  // 변수에 담아서 생성
  //   $conn->exec($spl);
  //   echo "firstdb 연결 생성 성공";
  // } catch (PDOException $e){
  //   echo $e->getMessage();
  // }
  // $conn = null;  // DB 연결 종료


  // - - - - - 데이터 연결 - - - - -
  // 1. MySQLi oop (객체 지향)
  // $conn = new mysqli($servername, $username, $password);
  // if($conn -> connect_error){
  //   echo "DB 연결 실패";
  //   echo $conn -> connect_error;
  //   exit;
  // }
  // echo "DB 연결 성공"

  // 2. MySQLi oop (절차 지향)
  // $conn = mysqli_connect($servername, $username, $password);
  // if(!$conn){
  //   echo "DB 연결 실패";
  //   exit;
  //   /* echo + exit = die() */
  //   die("DB 연결 실패");
  // }
  // echo "DB 연결 성공"

  // 3. PDO extension
  // try{
  //   $conn = new PDO("mysql:host=$servername", $username, $password);
  //   echo "DB 연결 성공";
  // } catch (PDOException $e){
  //   echo "DB 연결 실패";
  //   echo $e -> getMessage();
  //   exit;
  // }

  // - - - - - 설치 파일 목록 확인 - - - - -
  // phpinfo();
  // exit;
?>