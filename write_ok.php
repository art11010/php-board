<?php
    include_once ("./db/db.php");

    // print_r($_POST);

    $idx = $_POST['idx'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    // type 1
    // $del = $_GET['idx'];
    // type 2
    $type = $_POST['type'];

    if($type == "edit"){
        $sql = "UPDATE post SET title = '{$title}', content = '{$content}', author = '{$author}' WHERE post.idx = '{$idx}'";
        $txt = "수정";
        $url = "view.php?idx={$idx}";
        $page = "게시글로";
    } else if ($type == "delete"){
        $sql = "DELETE FROM post WHERE idx = {$idx}";
        $txt = "삭제";
        $url = "index.php";
        $page = "목록으로";
    } else {
        $sql = "INSERT INTO post(title, author, content, created_at) VALUES('{$title}', '{$author}', '{$content}', current_timestamp())";
        $txt = "등록";
        $url = "index.php";
        $page = "목록으로";
    }
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
    <title>글쓰기 완료</title>
</head>
<body>
    <?= $txt ?> 완료! <br>
    <a href="<?= $url ?>"><?= $page ?></a>
</body>
</html>