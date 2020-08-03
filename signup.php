<?php require 'source/header.html';
    require 'classes/Connect.php';
    require 'classes/User.php';
use db\Connect;


?>

<h1 class="ml-3 mt-3">registration</h1>

    <?php

        if (isset($_POST['submit'])){
            $user = new User();
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->set_file($_FILES['user_image']);
            if(empty($user->username) || empty($user->email) || empty($user->password)){
                echo "<div>Pleas Dont Let Any Thing Empty</div>";
            }else{
                $user->insert();
                echo "<div> registration Successfully</div>";
            }

        }


    ?>
    <div class="login container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <form method="post" action="signup.php"  enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Write Your Email" name="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" placeholder="Write Your Password" name="password">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Write Your user name" name="username">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="file" name="user_image">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary btn-block" type="submit" value="Sign Up" name="submit" >
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <img src="http://placehold.it/200x200">
            </div>
        </div>

    </div>
























<?php require 'source/footer.html'; ?>