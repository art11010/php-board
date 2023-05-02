<?php
    $idx = $_GET['idx'];
    if($idx){
        include_once ("db.php");
        $sql = "SELECT * FROM post WHERE idx = {$idx}";
        $stmh = $pdo -> prepare($sql);
        $stmh -> execute();
        $result = $stmh -> fetch(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>상세</title>
</head>
<body>
    <table>
        <colgroup>
            <col width="10%" />
            <col width="*" />
        </colgroup>
        <tbody class="tbody">
            <tr>
                <th class="thead" width="100">제목</th>
                <td>
                    <?= $result['title']; ?>
                </td>
            </tr>
            <tr>
                <th class="thead" width="100">작성자</th>
                <td>
                    <?= $result['author']; ?>
                </td>
            </tr>
            <tr>
                <th class="thead" width="100">작성일</th>
                <td>
                    <?= $result['created_at']; ?>
                </td>
            </tr>
            <tr>
                <th class="thead" width="100">내용</th>
                <td>
                    <?= $result['content']; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="index.php">목록</a>
    <a href="write.php?idx=<?=$result['idx']?>" class="modify">수정</a>
</body>
</html>