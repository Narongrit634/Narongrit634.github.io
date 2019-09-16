<?php
include ('../connect.php');
session_start();
    if (isset($_POST["LOGIN"])){
        if(empty($_POST["uname"]) || empty($_POST['pwd'])){
            echo '<script>All fields are required.</script>';
        }
        else {
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'username' => $_POST['uname'],
                    'password' => $_POST['pwd']
                
                )
            );
            $count = $statement->rowCount();
            if ($count > 0) {
                $user = $statement->fetchAll(PDO::FETCH_OBJ);
                $_SESSION['username'] = $_POST['uname'];
                $_SESSION['id'] = $user[0]->id;
                $_SESSION['role'] = $user[0]->role;
                $__SESSION['user_id'];
                echo '<script>alert("Login Successful.");</script>';
                header("location:login_success.php");
            }
            else {
                echo '<script>alert("Can not log in");</script>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>CS ALUMNI | LOGIN</title>
</head>
<body>
    <?php
        if(isset($message)){
            echo '<label class="text-danger">'.$message.'</label>';
        }
    ?>
    <div class="banner">
        <div class="row justify-content-md-center">
            <div class="col-3">
                <img src="../image/KU_SubLogo.png" width="80px" height="80px" >
            </div>
            <div class="col-7">
                <img src="../image/ban.png" width="100%" height="80px">
            </div>
        </div>
    </div>
        <div class="icon-bar">
            <a href="index.php"><i class="fa fa-home"></i> HOME</a> 
            <a href="showAlumni.php"><i class="fa fa-search"></i> FIND ALUMNI</a> 
            <a class="active" href="login.php"><i class="fa fa-envelope"></i> LOGIN</a> 
            <a href="news.php"><i class="fa fa-globe"></i> NEWS</a>
            <a href="register.php"><i class="fas fa-users"></i> REGISTRATION</a> 
            </div>
        <div class="container">
            <form method="post">
                <p>Please answer in correct value.</p>
                <hr>
                <label for="uname">User Name</label>
                <input type="text" id="uname" name="uname" placeholder="Your username.." require>
                
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="pwd" placeholder="Your password.." require>
                <hr>
                <div class="col-2">
                    <input class="btn btn-primary" type="submit" name="LOGIN" value="LOGIN">
                </div>
            </form>
        </div>
</body>
</html>