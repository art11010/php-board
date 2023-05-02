<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "member";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); // DB 연결
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // 에러 모드 설정

        echo "DB 연결 성공";
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    try{
        $sql = "INSERT INTO myguests(firstname, lastname, email) VALUES('John', 'Doe', 'john@example.com')";  // 쿼리문
        $conn->exec($sql);  // 쿼리 수행문

        echo "데이터 입력 성공";
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    $conn = null;
?>