<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>게시글 작성</title>
</head>
<body>
    <?php
    $idx = $_GET['idx'];

    require_once '../controller/BoardController.php';
    $controller = new BoardController();
    $controller -> writePost($idx);
    ?>

    <script>
        function validateForm() {
            const inputFields = document.querySelectorAll('input[id], textarea[id]');
            console.log(inputFields);
            for (let i = 0; i < inputFields.length; i++) {
                const inputField = inputFields[i].value;
                if (inputField === null || inputField.trim() === '') {
                    alert('입력 필드가 비어 있습니다.');
                    return false;
                }
            }
            return true;
        }
    </script>
</body>
</html>