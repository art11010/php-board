<?php
    include_once ("./db/db.php");

    $search_option = $_POST['search_option'];
    $search = $_POST['search'];

    $sql = "SELECT * FROM post WHERE {$search_option} LIKE '%{$search}%'";

    $stmh = $pdo -> prepare($sql);
    $stmh -> execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>검색 결과</title>
</head>
<body>
    <h2>검색 결과</h2>
    <table>
        <colgroup>
            <col width="10%" />
            <col width="50%" />
            <col width="20%" />
            <col width="20%" />
        </colgroup>
        <thead class="thead">
            <tr>
                <th>번호22</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일</th>
                <!-- <th>조회수</th> -->
            </tr>
        </thead>
        <tbody class="tbody">
            <?php
                while($result = $stmh -> fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td>
                    <a href="view.php?idx=<?=$result['idx']?>" class="title">
                        <?php echo $result["idx"]; ?>
                    </a>
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
    <a href="index.php">목록</a>
</body>
</html>