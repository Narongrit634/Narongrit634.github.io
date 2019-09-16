<?php
include ('../connect.php');
session_start();
$se = $connect->prepare('SELECT * FROM news_cate');
$se->execute();
$type = $se->fetchAll(PDO::FETCH_OBJ);
if (isset($_POST["Submit"])){
    $query = '';
    $query = "INSERT INTO news (title, content, users_id, news_cate_id, date_time)
    VALUE (:title, :content, :users_id, :news_cate_id, :date_time)";
    $stmt = $connect->prepare($query);
    $stmt->execute([
        'title'         => $_POST["title"],
        'content'       => $_POST["content"],
        'users_id'      => $_SESSION['id'],
        'news_cate_id'  => $_POST['type'],
        'date_time'     => date("Y/m/d"),
        ]);
        echo "<script>alert('Write NEWS Successful.'); location.href='news.php'</script>";
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
    <title>CS ALUMNI | WRITE NEWS</title>
</head>
<body>
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
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>Write News</h1>
            <hr> 
            <form method="post">
                <div class="form-group">
                    <label for="title"><b>Title</b> :</label>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Write title here.." required>
                </div>


                <div class="form-group">
                    <label for="content"><b>Content</b> :</label>
                    <textarea class="form-control" name="content" id="content" placeholder="Write content here.." cols="140" rows="10" require></textarea>
                </div>
                <div class="form-group">
                    <label><b>Topic </b>:</label>
                    <select name="type" id="type">
                    <?php foreach ($type as $value) :?>
                        <option value="<?= $value->id?>" ><?= $value->name ?></option>
                    <?php endforeach;?>
                </select>
                </div>
                <hr>
                <div class="col-2">
                    <input type="submit" name="Submit" value="Submit">
                </div>
            </form>
            <div class="col-6">
                <a href="news.php" class="btn btn-danger">Back to news page</a>
            </div>
        </div>
    </div>
</body>
</html>