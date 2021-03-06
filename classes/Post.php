<?php

use db\Connect;

class Post extends Connect
{
    protected static $tabel = "post";
    public static $db_fileds = array('title','body','picture','total','number');
    public $id;
    public $title ;
    public $body;
    public $picture;
    public $tmp_name;
    public $total;
    public $number;
    // Photo Methods ..
    public $error = array();
    public    $phpFileUploadErrors = array(
        UPLOAD_ERR_OK => 'There is no error, the file uploaded with success.',
        UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
        UPLOAD_ERR_NO_FILE => 'No file was uploaded',
        UPLOAD_ERR_NO_TMP_DIR=> 'Missing a temporary folder',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload.'
    );

    public function set_file($file){
        if(!$file || empty($file)){
            $this->error[] = "There are no file uploaded !";
            return false;
        }elseif ($file['error'] != 0){
            $this->error[] = $this->phpFileUploadErrors[$file['error']];
            return false;
        }else{
            $this->picture = $file['name'];
            $this->tmp_name = $file['tmp_name'];
        }
    }

    public function placeHolder(){
        if ($this->picture){
            echo 'images/'. $this->picture;
        }else{
            echo 'http://placehold.it/400x400';
        }
    }

    // Save Photo ..
    public function save_Photo(){

       return move_uploaded_file($this->tmp_name, 'C:\xampp\htdocs\learn\images' . DIRECTORY_SEPARATOR . $this->picture);
        unset($this->tmp_name);
    }




}