<?php

use db\Connect;

class Post extends Connect
{
    protected static $tabel = "post";
    public static $db_fileds = array('title','body');
    public $id;
    public $title ;
    public $body;


    // CURD ..





}