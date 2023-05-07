<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>게시글</title>
</head>
<body>
    <?php
    $idx = $_GET['idx'];

    require_once 'controller/Controller.php';
    $controller = new Controller();
    $controller -> viewPost($idx);
    ?>
</body>
</html>