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
    $type = $_POST['type'];

    require_once 'controller/Controller.php';
    $controller = new Controller();
    $controller -> completePost();
    ?>
</body>
</html>