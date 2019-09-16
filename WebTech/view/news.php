<?php
include ('../connect.php');
session_start();
$se = $connect->prepare('SELECT users.username,news_cate.name,news.id AS news_id,title,content,date_time FROM ((news_cate
                        INNER JOIN news  ON news_cate.id = news.news_cate_id)
                        INNER JOIN users ON users.id = news.users_id)');
$se->execute();
$news = $se->fetchAll(PDO::FETCH_OBJ);
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

    <title>CS ALUMNI | NEWS</title>
</head>
<body>
<?php if (!isset($_SESSION['username'])){
        echo '<div class="banner">
                <div class="row justify-content-md-center">
                    <div class="col-3">
                        <img src="../image/KU_SubLogo.png" width="80px" height="80px" >
                    </div>
                    <div class="col-7">
                        <img src="../image/ban.png" width="100%" height="80px">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="icon-bar">
                        <a href="index.php"><i class="fa fa-home"></i> HOME</a> 
                        <a href="showAlumni.php"><i class="fa fa-search"></i> FIND ALUMNI</a> 
                        <a href="login.php"><i class="fa fa-envelope"></i> LOGIN</a> 
                        <a class="active" href="news.php"><i class="fa fa-globe"></i> NEWS</a>
                        <a href="register.php"><i class="fas fa-users"></i> REGISTRATION</a> 
                    </div>
                </div>    
            </div>';
    }
    else{
        // echo '<h3>LOGIN Success, Welcome - '.$_SESSION['username'].'</h3>';
        // echo '<br /><br /><a href="logout.php">LOGOUT</a>';
        echo '<div class="banner">
                <div class="row justify-content-md-center">
                    <div class="col-3">
                        <img src="../image/KU_SubLogo.png" width="80px" height="80px" >
                    </div>
                    <div class="col-7">
                        <img src="../image/ban.png" width="100%" height="80px">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="icon-bar">
                        <a href="index.php"><i class="fa fa-home"></i> HOME</a> 
                        <a href="showAlumni.php"><i class="fa fa-search"></i> FIND ALUMNI</a> 
                        <a href="logout.php"><i class="fa fa-envelope"></i> LOGOUT</a> 
                        <a class="active" href="news.php"><i class="fa fa-globe"></i> NEWS</a>
                        <a href="register.php"><i class="fas fa-users"></i> ADD OFFICER</a> 
                    </div>
                </div>
                
                <div class="col-8">
                    <div class="row justify-content-start">
                        <div class="card bg-light mb-3 userCard">
                            <div class="card-body">
                                <h5 class="card-title">MENU</h5>
                                <p class="card-text"><a href="Accountsetting(Beta).php">My account</a></p>
                                <p class="card-text"><a href="writeNEWS.php">Write news</a></p>
                            </div>
                        </div>
                    </div>
                
                </div>';} ?>
                <div class="container">
                    <?php foreach ($news as $new):?>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <?=$new->name?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?=$new->title?></h5>
                            <p class="card-text">Post by <?=$new->username?>, Post date : <?=$new->date_time?></p>
                            <a class="btn btn-primary"href="showNEWS.php?id=<?= $new->news_id ?>">Continue to read..</a>
                        </div>
                    </div>
                <?php endforeach;?>
                </div>
</body>
</html>