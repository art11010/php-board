<?php
    class info{
        private $_name; // private : class 밖에서 사용 불가능
        public $_age;   // public : class 밖에서도 사용 가능

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

    echo $a -> getName();   // 클래스에 $aaa 라는 맴버변수가 있다면 $this->aaa 로 접근
?>