<?php


require 'source/header.html';
require 'classes/Connect.php';
require 'classes/Post.php';
require 'functions/function.php';
use db\Connect;
?>

<h1 class="text-center mt-2"> Update Post</h1>



<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
   $post =  Post::Get_by_id($id)
      ?>

    <form class="container" method="post" action="">
        <label>Title</label>
        <input class="form-control" type="text" name="title" value="<?php echo $post->title;?>">
        <br>
        <br>
        <label>Body</label>
        <textarea class="form-control" name="body"><?php echo $post->body;?>
        </textarea>
        <br>
        <input class="btn btn-primary btn-block" name="submit" type="submit" value="Update">
    </form>


<?php
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $body = $_POST['body'];
        $post= Post::Get_by_id($post->id);
        $post->title = $title;
        $post->body = $body;
        $post->updated();
            redirect('index.php');


    }


} ?>











<?php require 'source/footer.html'?>
