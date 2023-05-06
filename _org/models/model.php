<?php
    class PostModel {
        private $pdo;

        // 처음에 자동으로 호출하는 함수(생성자)
        public function __construct($pdo) {
          $this->pdo = $pdo;
        }

        public function listPost() {
          // 게시글 목록 조회 쿼리 수행
        }

        public function getPost($post_id) {
          // 게시글 상세 조회 쿼리 수행
        }

        public function createPost($post) {
          // 게시글 등록 쿼리 수행
        }

        public function updatePost($post_id, $post) {
          // 게시글 수정 쿼리 수행
        }

        public function deletePost($post_id) {
          // 게시글 삭제 쿼리 수행
        }
      }
?>