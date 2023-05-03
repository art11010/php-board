<!--
    1. 만약에 파라미터 idx의 값이 존재하면 데이터를 뿌려준다. -> 수정
    2. 파라미터가 없다면 등록
    - idx를 통해서 데이터를 가져온다.
        쿼리를 짜야한다. select 조건문
        가져온 데이터를 뿌려준다.
    - idx가 없다면 등록
 -->

<?php
    $idx = $_GET['idx'];
    if($idx){
        include_once ("./db/db.php");
        $sql = "SELECT * FROM post WHERE idx = {$idx}";
        // stmh : Statement Handle
        $stmh = $pdo -> prepare($sql);
        // prepare() 메소드는 SQL 쿼리를 미리 컴파일하여 실행 계획을 준비하는 역할, 이를 통해 SQL 쿼리를 반복적으로 실행할 때 매번 컴파일하는 비용을 절감하고 성능 향상
        $stmh -> execute();
        // execute() 메소드는 prepare() 메소드로 생성한 PDOStatement 객체에서 실행할 SQL 쿼리를 실행하는 역할, execute() 메소드를 실행하면 실행 결과를 가져오기 전까지는 데이터베이스와 연결이 유지
        $result = $stmh -> fetch(PDO::FETCH_ASSOC);
        // fetch() 메소드는 PDOStatement 객체에서 실행 결과를 가져오는 역할, fetch() 메소드는 실행 결과가 없을 때 false를 반환
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>글쓰기</title>
</head>
<body>
    <form action="write_ok.php" method="post">
        <input type="hidden" name="idx" value="<?=$result['idx']?>">
        <input type="hidden" name="type" value="edit">
        <label>
            제목
            <input type="text" name="title" value="<?=$result['title']?>">
            <!-- <input type="text" name="title"> -->
        </label>
        <label>
            작성자
            <input type="text" name="author" value="<?=$result['author']?>">
        </label>
        <label>
            내용
            <textarea cols="30" rows="10" name="content"><?=$result['content']?></textarea>
        </label>
        <?php
            if($idx){
                echo "<button type='submit'>수정하기</button>";
            }
            else{
                echo "<button type='submit'>작성하기</button>";
            }
        ?>
    </form>
</body>
</html>