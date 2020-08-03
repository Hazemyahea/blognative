<?php

use db\Connect;

class User extends Connect
{
    protected static $tabel = "users";
    public static $db_fileds = array('username','user_image','password','email');
    public $id;
    public $username;
    public $user_image;
    public $password;
    public $email;

    // Image ..
        public $directory = 'image';
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
        if(empty($file) || !$file){
            $this->error[] = "File Not Upladed !";
        }elseif ($file['error'] != 0){
            $this->error[] = $this->phpFileUploadErrors[$file['error']];
        }else{
            $this->user_image = $file['name'];
            $this->tmp_name = $file['tmp_name'];
        }
    }

    public function placeHolder(){
        if ($this->user_image){
            echo 'images/'. $this->user_image;
        }else{
            echo 'http://placehold.it/200x200';
        }
    }

    // Save Photo ..
    public function save_Photo(){

        return move_uploaded_file($this->tmp_name, 'C:\xampp\htdocs\learn\images' . DIRECTORY_SEPARATOR . $this->user_image);
        unset($this->tmp_name);
    }


}