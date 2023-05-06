<?php
    class PostView {
        public function listPost($posts) {
            // 게시글 목록 데이터를 이용하여 HTML, CSS 등으로 구성한 UI를 출력
        }

        public function showPost($post) {
            // 게시글 상세 정보 데이터를 이용하여 HTML, CSS 등으로 구성한 UI를 출력
        }

        public function showCreateForm() {
            // 게시글 등록 폼을 출력
        }

        public function showUpdateForm($post) {
            // 게시글 수정 폼을 출력
        }

        public function showError($error_message) {
            // 에러 메시지를 출력
        }
    }
?>