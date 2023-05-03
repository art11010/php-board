<?php
    class info{
        private $_name;
        public $_age;

        public function setName($_name){
            $this -> _name = $_name; // $this = class info, 객체 자신을 가리키는 키워드
        }

        public function getName(){
            return $this -> _name;
        }
    }

    $a = new info();

    $a -> setName('홍길동');
    $a -> _age = 20;

    // var_dump($a);
    // print_r($a);
    echo $a -> getName();
?>