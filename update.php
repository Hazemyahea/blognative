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

    <form class="container" method="post" action="" enctype="multipart/form-data">
        <label>Title</label>
        <input class="form-control" type="text" name="title" value="<?php echo $post->title;?>">
        <br>
        <br>
        <input class="form-control" type="file" name="picture">
        <label>Body</label>
        <textarea class="form-control" name="body"><?php echo $post->body;?>
        </textarea>
        <br>
        <label>Total Lessons </label>
        <input class="form-control" type="number" name="total" value="<?php echo $post->total?>">
        <br>
        <label>Lessons You Finshed</label>
        <input class="form-control" type="number" name="number" value="<?php echo $post->number?>">
        <br>
        <input class="btn btn-primary btn-block" name="submit" type="submit" value="Update">
    </form>


<?php
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $body = $_POST['body'];
        $number = $_POST['number'];
        $total = $_POST['total'];
        $post= Post::Get_by_id($post->id);
        $post->title = $title;
        $post->body = $body;
        $post->number = $number;
        $post->total = $total;
        unlink('C:\xampp\htdocs\learn\images' . DIRECTORY_SEPARATOR . $post->picture);
        $post->set_file($_FILES['picture']);
        $post->save_Photo();
        $post->updated();
            redirect('index.php');


    }


} ?>











<?php require 'source/footer.html'?>
