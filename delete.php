<?php
require 'classes/Connect.php';
require 'classes/Post.php';
require 'functions/function.php';
use db\Connect;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = Post::Get_by_id($id);
    $post->picture;
    if ($post->delete()){
        unlink('C:\xampp\htdocs\learn\images' . DIRECTORY_SEPARATOR . $post->picture);
    }

    redirect('index.php');



}



