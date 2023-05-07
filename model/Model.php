<?php
require_once 'database/Database.php';

class Model {
    private $db;

    public function __construct(){
        $this -> db = Database::getInstance() -> getPdo();
    }

    // stmh : Statement Handle
    // prepare() 메소드는 SQL 쿼리를 미리 컴파일하여 실행 계획을 준비하는 역할, 이를 통해 SQL 쿼리를 반복적으로 실행할 때 매번 컴파일하는 비용을 절감하고 성능 향상
    // execute() 메소드는 prepare() 메소드로 생성한 PDOStatement 객체에서 실행할 SQL 쿼리를 실행하는 역할, execute() 메소드를 실행하면 실행 결과를 가져오기 전까지는 데이터베이스와 연결이 유지

    // 전체 게시물 수 계산
    public function getTotalPost() {
        // 전체 게시물 수 반환
        $sql = "SELECT COUNT(*) AS total FROM post";
        $stmt = $this -> db -> prepare($sql);
        $stmt -> execute();
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    // 게시글 목록, 검색 결과
    public function getListPost($search_option, $search, $start, $perPage){
        if(!$search){
            $sql = "SELECT * FROM post ORDER BY idx DESC LIMIT {$start}, {$perPage}";
        } else {
            $sql = "SELECT * FROM post WHERE {$search_option} LIKE '%{$search}%' ORDER BY idx DESC LIMIT {$start}, {$perPage}";
        }

        $stmh = $this -> db -> prepare($sql);
        $stmh -> execute();
        $result = $stmh -> fetchAll();
        return $result;
    }

    // 게시글 idx 데이터
    public function getIdxPost($idx){
        if($idx){
            $sql = "SELECT * FROM post WHERE idx = {$idx}";
            $stmh = $this -> db -> prepare($sql);
            $stmh -> execute();
            $result = $stmh -> fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    // 게시글 작성, 수정, 삭제 완료
    public function getCompletePost($idx, $title, $author, $content, $password, $type){
        if($type == "update"){
            $sql = "UPDATE post SET title = '{$title}', content = '{$content}', author = '{$author}' WHERE post.idx = '{$idx}'";
            $txt = "게시글 수정 완료";
        } else if ($type == "delete"){
            $sql = "DELETE FROM post WHERE idx = {$idx}";
            $txt = "게시글 삭제 완료";
        } else {
            // 비밀번호 해시화
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO post(title, password, author, content, created_at) VALUES('{$title}', '{$password}',  '{$author}', '{$content}', current_timestamp())";
            $txt = "게시글 작성 완료";
        }

        $stmh = $this -> db -> prepare($sql);
        $stmh -> execute();
        return $txt;
    }

}
?>