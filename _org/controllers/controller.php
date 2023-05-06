<?php
    class PostController {
        private $model;

        // 처음에 자동으로 호출하는 함수(생성자)
        public function __construct($model) {
            $this->model = $model;
        }

        public function listPosts() {
            $posts = $this->model->listPost();
            // 게시글 목록 데이터를 뷰에 전달
        }

        public function viewPost($post_id) {
            $post = $this->model->getPost($post_id);
            // 게시글 상세 정보 데이터를 뷰에 전달
        }

        public function createPost($post) {
            $this->model->createPost($post);
            // 등록된 게시글의 상세 정보 데이터를 뷰에 전달
        }

        public function updatePost($post_id, $post) {
            $this->model->updatePost($post_id, $post);
            // 수정된 게시글의 상세 정보 데이터를 뷰에 전달
        }

        public function deletePost($post_id) {
            $this->model->deletePost($post_id);
            // 삭제된 게시글 정보 데이터를 뷰에 전달
        }
    }
?>