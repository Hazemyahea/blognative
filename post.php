<?php
require 'source/header.html';
require 'classes/Connect.php';
require 'classes/Post.php';
require 'functions/function.php';
use db\Connect;

?>

<h1 class="text-center mt-2"> Insert Post</h1>

<?php
if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $number = $_POST['number'];
    $total = $_POST['total'];

    $post = new Post();
    $post->title = $title;
    $post->body = $body;
    $post->number = $number;
    $post->total = $total;
    $post->set_file($_FILES['picture']);
    $post->save_Photo();
    $post->insert();
    redirect('index.php');


}

?>


<form class="container" method="post" action="" enctype="multipart/form-data">
    <label>Title</label>
    <input class="form-control" type="text" name="title">
    <br>
    <br>
    <input class="form-control" type="file" name="picture">
    <label>Body</label>
    <textarea class="form-control" name="body"></textarea>
    <br>
    <label>Total Lessons </label>
    <input class="form-control" type="number" name="total">
    <br>
    <label>Lessons You Finshed</label>
    <input class="form-control" type="number" name="number">
    <br>
    <input class="btn btn-primary btn-block" name="submit" type="submit">
</form>






<?php require 'source/footer.html'?>
