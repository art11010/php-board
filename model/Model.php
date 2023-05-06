<?php
require_once 'database/Database.php';

class Model {
    private $db;

    public function __construct(){
        $this -> db = Database::getInstance() -> getPdo();
    }

    public function getPostList(){
        $sql = "SELECT * FROM post ORDER BY idx DESC";
        // stmh : Statement Handle
        $stmh = $this -> db -> prepare($sql);
        // prepare() 메소드는 SQL 쿼리를 미리 컴파일하여 실행 계획을 준비하는 역할, 이를 통해 SQL 쿼리를 반복적으로 실행할 때 매번 컴파일하는 비용을 절감하고 성능 향상
        $stmh -> execute();
        // execute() 메소드는 prepare() 메소드로 생성한 PDOStatement 객체에서 실행할 SQL 쿼리를 실행하는 역할, execute() 메소드를 실행하면 실행 결과를 가져오기 전까지는 데이터베이스와 연결이 유지
        $result = $stmh -> fetchAll();
        return $result;
    }

    public function getPostIdx(){
        $idx = $_GET['idx'];

        if($idx){
            $sql = "SELECT * FROM post WHERE idx = {$idx}";
            $stmh = $this -> db -> prepare($sql);
            $stmh -> execute();
            $result = $stmh -> fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function getPostComplete(){
        $idx = $_POST['idx'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $type = $_POST['type'];

        if($type == "update"){
            $sql = "UPDATE post SET title = '{$title}', content = '{$content}', author = '{$author}' WHERE post.idx = '{$idx}'";
            $txt = "수정";
        } else if ($type == "delete"){
            $sql = "DELETE FROM post WHERE idx = {$idx}";
            $txt = "삭제";
        } else {
            $sql = "INSERT INTO post(title, author, content, created_at) VALUES('{$title}', '{$author}', '{$content}', current_timestamp())";
            $txt = "작성";
        }

        $stmh = $this -> db -> prepare($sql);
        $stmh -> execute();
        return $txt;
    }

    public function getPostSearch(){
        $search_option = $_POST['search_option'];
        $search = $_POST['search'];

        $sql = "SELECT * FROM post WHERE {$search_option} LIKE '%{$search}%'";
        $stmh = $this -> db -> prepare($sql);
        $stmh -> execute();
        $result = $stmh -> fetchAll();
        return $result;
    }
}
?>