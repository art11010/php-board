<?php
require_once '../model/BoardModel.php';
require_once '../view/BoardView.php';

class BoardController {
    private $model;
    private $view;

    public function __construct(){
        $this -> model = new BoardModel();
        $this -> view = new BoardView();
    }

    // 게시글 목록, 검색 결과
    public function listPost($search_option, $search){
        $perPage = 10; // 페이지당 보여줄 게시물 수
        $currentPage = $_GET['page'] ? $_GET['page'] : 1; // 현재 페이지 번호
        $start = ($currentPage - 1) * $perPage; // 시작 게시물 번호

        // 전체 게시물 수 계산
        $total = $this -> model -> getTotalPost($search_option, $search);
        // 페이징 수 계산
        $totalPage = ceil($total / $perPage); // ceil() : 소수점 올림

        $post = $this -> model -> getListPost($search_option, $search, $start, $perPage);
        $this -> view -> showListPost($post, $search_option, $search, $currentPage, $totalPage);
    }

    // 게시글 보기
    public function viewPost($idx) {
        $post = $this -> model -> getIdxPost($idx);
        $this -> view -> showPostView($post);
    }

    // 게시글 작성, 수정
    public function writePost($idx) {
        $post = $this -> model -> getIdxPost($idx);
        $this -> view -> showPostWrite($post);
    }

    // 게시글 삭제
    public function deletePost($idx){
        $post = $this -> model -> getIdxPost($idx);
        $this -> view -> showPostDelete($post);
    }

    // 게시글 작성, 수정, 삭제 완료
    public function completePost($idx, $storedpwd, $title, $author, $content, $password, $type) {
        // 비밀번호 확인
        $verify = password_verify($password, $storedpwd);

        if($verify || !$idx) {
            $txt = $this -> model -> getCompletePost($idx, $title, $author, $content, $password, $type);
            $this -> view -> showCompletePost($txt);
        } else {
            $txt = '비밀번호가 일치하지 않습니다.';
            $this -> view -> showCompletePost($txt, $idx);
        }
    }
}
?>