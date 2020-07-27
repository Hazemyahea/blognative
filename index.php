<?php
require 'source/header.html';
require 'classes/Connect.php';
require 'classes/Post.php';
use db\Connect;
?>

<h1 class="text-center mt-2"> Blog System</h1>
<a style="direction: rtl;text-align: center;display: block;margin-top: 22px;"href="post.php"><button class="btn btn-primary">Add Post</button></a>

<div class="container">

    <?php
        $posts = Post::all();

            foreach ($posts as $post) {


            ?>
            <div class="col-lg-12">
                <h2><?php echo $post->title ;?></h2>
                <a class="btn btn-danger" href="delete.php?id=<?php echo $post->id; ?>" >Delete</a>
                <a class="btn btn-primary" href="update.php?id=<?php echo $post->id; ?>" >Update</a>
                <br>
                <br>
                <p><?php echo $post->body ;?></p>
            </div>
            <hr>
        <?php
        }
        ?>
</div>




<?php require 'source/footer.html'?>
