<?php include_once ("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>목록</title>
</head>
<body>
    <table>
        <colgroup>
            <col width="10%" />
            <col width="50%" />
            <col width="20%" />
            <col width="20%" />
        </colgroup>
        <thead class="thead">
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일</th>
                <!-- <th>조회수</th> -->
            </tr>
        </thead>
        <tbody class="tbody">
            <?php
                $sql = "SELECT * FROM post";
                $stmh = $pdo -> prepare($sql);
                $stmh -> execute();
                while($result = $stmh -> fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td>
                    <?php echo $result["idx"]; ?>
                </td>
                <td>
                    <a href="view.php?idx=<?=$result['idx']?>" class="title">
                        <?php echo $result["title"]; ?>
                    </a>
                </td>
                <td>
                    <?php echo $result["author"]; ?>
                </td>
                <td>
                    <?php echo $result["created_at"]; ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="write.php">글쓰기</a>
</body>
</html>
<!-- php 게시판 만들기
1. 데이터베이스 생성
3. 데이터 입력
4. 데이터 출력
5. 데이터 수정
6. 데이터 삭제
7. 데이터 검색
8. 데이터 정렬
9. 데이터 페이징 -->