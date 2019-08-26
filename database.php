<?php

class Database {
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $database = "simple_shop";
    
    public $connection ;

    /**
     * Database constructor.
     * Phương thức khởi tạo 
     */
    public function __construct()
    {
        $this->connection = $this->connectDatabase();
    }

    /**
     * Phương thức kết nối đến cơ sở dữ liệu
     * @return false|mysqli
     */
    public function connectDatabase()
    {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $conn;
    }

    /**
     * Phương thức chạy câu truy vấn sql
     * @param $sql
     * @return array
     */
    public function runQuery($sql)
    {
        $data = array();
        $result = mysqli_query($this->connection,$sql);//thực hiện câu lệnh sql

//        echo "<pre>";
//        print_r($result);
        echo "</pre>";

        while ($row = mysqli_fetch_assoc($result)){
//            echo "<pre>";
//            print_r($result);
//            echo "</pre>";
            $data[] = $row;
        }

        return $data;
    }

    /**
     * Phương thức đếm số bản ghi trong câu lệnh query
     * @param $sql
     * @return int
     */
    public function numRows($sql)
    {
        $result = mysqli_query($this->connection,$sql);
        $count = mysqli_num_rows($result);
        return $count;
    }
}
