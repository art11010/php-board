<?php
class BoardDatabase{
    private static $instance = null;
    private $pdo;

    private function __construct(){
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname="board";

        // DB 연결
        try {
            $this -> pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

            $this -> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // setAttribute() :  PDO 객체의 속성을 설정하는 데 사용
            // PDO::ATTR_ERRMODE : 오류 모드를 설정하는데 사용, 이 상수는 PDO의 setAttribute() 메소드를 호출할 때와 함께 사용
            // PDO::ERRMODE_EXCEPTION : PDO가 예외를 발생시키도록 설정, 이는 코드에서 try-catch 블록을 사용하여 예외를 처리할 수 있도록 함

            // echo "DB 연결 성공";
        } catch (PDOException $e){
            die('데이터베이스 연결 실패: ' . $e -> getMessage());
            // PDO 예외가 발생할 경우 해당 예외 정보를 $e 변수에 담아서 catch 블록 내부에서 사용할 수 있음
        }
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new BoardDatabase();
            // 정적 변수는 $this 대신 self 키워드를 사용
        }
        return self::$instance;
    }

    public function getPdo(){
        return $this -> pdo;
    }
}
?>