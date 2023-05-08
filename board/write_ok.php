<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>게시물 작성 완료</title>
</head>
<body>
    <?php
    $idx = $_POST['idx'];
    $storedpwd = $_POST['storedpwd'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    require_once '../controller/BoardController.php';
    $controller = new BoardController();
    $controller -> completePost($idx, $storedpwd, $title, $author, $content, $password, $type);
    ?>
</body>
</html>