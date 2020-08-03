<?php


namespace db;


use mysqli;

class Connect
{
    public $con;
    public function __construct()
    {
         $this->con = new mysqli('localhost','root','','blog');
        if (!$this->con) {
            die('ERROR' . $this->con->connect_error());
        }
    }



    public static function query($sql){
        global $connect;
        $database = $connect->con;
        return mysqli_query($database,$sql);
    }

    public static function Get_by_id($id){
         $the_result_array =  static::showData("SELECT * FROM post WHERE id = '$id'");
      return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function all(){
        return static::showData("SELECT * FROM " . static::$tabel . " ORDER BY id DESC");
    }

    public static function showData($sql){
        $the_result = static::query($sql);
        $object_array = [];
        while ($the_record = mysqli_fetch_assoc($the_result)){
            $object_array[] = static::instantiation($the_record);
        }
        return $object_array;
    }

    public static function instantiation($the_record){
        $get_class = get_called_class();
        $the_class = new $get_class;

        foreach ($the_record as $the_attrbuite => $value) {
            if ($the_class->has_the_attrbuite($the_attrbuite)){
                $the_class->$the_attrbuite = $value;

            }
        }
        return $the_class;
    }

    private function has_the_attrbuite($the_attrbuite ){
        $the_objects = get_object_vars($this);
        return array_key_exists($the_attrbuite,$the_objects);

    }

    public function properites(){

        $properites = array();
        foreach (static::$db_fileds as $db_filed){
            if (property_exists($this,$db_filed)){
                $properites[$db_filed] = $this->$db_filed;
            }
        }
        return $properites;
    }


    // Crude

    public  function insert(){

        $properites = $this->properites();
        $sql ="INSERT INTO " . static::$tabel  . "(" . implode(",",array_keys($properites)) . ")";
        $sql.="VALUES ('" . implode("','",array_values($properites)). "')";
         return static::query($sql);



    }

    public function updated() {

        $properites = $this->properites();
        $properites_berent = array();
        foreach ($properites as $key =>$value){
            $properites_berent[] = "{$key} = '{$value}'";
        }
        $sql = "UPDATE " . static::$tabel  . " SET ";
        $sql .= implode(",",$properites_berent);
        $sql .="WHERE id = '$this->id'";
        static::query($sql);

    }

    public function delete(){
        $sql = "DELETE FROM " . static::$tabel . " WHERE id = '$this->id'";

        return static::query($sql);
    }

}


$connect = new Connect();