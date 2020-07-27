<?php
require 'source/header.html';
require 'classes/Connect.php';
require 'classes/Post.php';
use db\Connect;
?>

<h1 class="text-center mt-2"> Insert Post</h1>

<?php
if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $post = new Post();
    $post->title = $title;
    $post->body = $body;
    $post->insert();

}

?>


<form class="container" method="post" action="">
    <label>Title</label>
    <input class="form-control" type="text" name="title">
    <br>
    <br>
    <label>Body</label>
    <textarea class="form-control" name="body"></textarea>
    <br>
    <input class="btn btn-primary btn-block" name="submit" type="submit">
</form>






<?php require 'source/footer.html'?>
