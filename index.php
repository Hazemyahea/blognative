<?php
require 'source/header.html';
require 'classes/Connect.php';
require 'classes/Post.php';
use db\Connect;
?>

<h1 class="text-center mt-2"> Blog System</h1>
<a style="direction: rtl;text-align: center;display: block;margin-top: 22px;"href="post.php"><button class="btn btn-primary">Add Post</button></a>

<div class="container">
    <div class="row">
    <?php
        $posts = Post::all();

            foreach ($posts as $post) {


            ?>
            <div class="col-lg-12">git
                <h2><?php echo $post->title ;?></h2>

                <img class="img-fluid mt-2 mb-2" style="display: block" width="200" src="<?php $post->placeHolder()?>">

                <a class="btn btn-danger" href="delete.php?id=<?php echo $post->id; ?>" >Delete</a>
                <a class="btn btn-primary" href="update.php?id=<?php echo $post->id; ?>" >Update</a>
                <br>
                <br>
                <p><?php echo $post->body ;?></p>
                <br>
                <?php
                    $result = ($post->number * 100) / $post->total;
                    $final = ceil($result);

                ?>
                You Get <span class="result"><?php  echo ceil($result); ?> %</span>
                <?php  if ($final <= 10) {
                    echo 'Duck !';
                }elseif ($final <= 20){
                    echo 'You Make Some Thing';
                }elseif ($final <= 30){
                    echo 'You almost make a good Thing';
                }elseif ($final <= 50){
                    echo 'Midway to success';
                }elseif ($final <= 70){
                    echo 'Dont Be Lazy You will get it';
                }elseif ($final <= 80){
                    echo 'You Are A super Man !';
                }elseif ($final <= 90){
                    echo ' You almost fineh !';
                }elseif ($final <= 100){
                    echo 'Mission Complete Sir !';
                }
                ?>
            </div>
            <hr>
        <?php
        }
        ?>
    </div>
</div>




<?php require 'source/footer.html'?>
