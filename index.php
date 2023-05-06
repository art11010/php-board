<!--
    * php 게시판 만들기
    1. 데이터베이스 생성 ✔️
    2. 데이터 입력 ✔️
    3. 데이터 출력 ✔️
    4. 데이터 수정 ✔️
    5. 데이터 추가 ✔️
    6. 데이터 삭제 ✔️
    7. 데이터 검색 ✔️
    8. 데이터 페이징
    9. 수정, 삭제 시 비밀번호 입력
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>게시글 목록</title>
</head>
<body>
    <?php
    require_once 'controller/Controller.php';
    $controller = new Controller();
    $controller -> listPost();
    ?>
</body>
</html>