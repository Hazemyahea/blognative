<?php
require 'classes/Connect.php';
require 'classes/Post.php';
require 'functions/function.php';
use db\Connect;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = Post::Get_by_id($id);
    $post->Delete();
    redirect('index.php');
    exit;


}

?>

