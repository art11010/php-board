<?php
require_once './model/Model.php';
require_once './view/View.php';

class Controller {
    private $model;
    private $view;

    public function __construct(){
        $this -> model = new Model();
        $this -> view = new View();
    }

    public function listPost(){
        $posts = $this -> model -> getPostList();
        $this -> view -> showPostList($posts, 'list');
    }

    public function idxPost($type) {
        $post = $this -> model -> getPostIdx();
        if($type === 'view'){
            $this -> view -> showPostView($post);
        } else if ($type === 'write'){
            $this -> view -> showPostIdx($post);
        }
    }

    public function searchPost(){
        $posts = $this -> model -> getPostSearch();
        $this -> view -> showPostList($posts, 'search');
    }

    public function completePost() {
        $txt = $this -> model -> getPostComplete();
        $this -> view -> showPostComplete($txt);
    }
}
?>