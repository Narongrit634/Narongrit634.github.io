<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<?php
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
    <div class="icon-bar">
        <a href="index.php"><i class="fa fa-home"></i> HOME</a> 
        <a class="active" href="showAlumni.php"><i class="fa fa-search"></i> FIND ALUMNI</a> 
        <a href="login.php"><i class="fa fa-envelope"></i> LOGIN</a> 
        <a href="news.php"><i class="fa fa-globe"></i> NEWS</a>
        <a href="register.php"><i class="fas fa-users"></i> REGISTRATION</a> 
    </div>';
 echo "<html>
        <body>
        <div class='container'><table class='table table-dark table-striped'>\n\n";
$f = fopen("../csv/namelist.csv", "r");
 echo "
        <thead>
        <tr>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Student ID</td>
            <td>Email</td>
            <td>GPA</td>
            <td>Graduate Year</td>
        </tr>
        </thead>
        <tbody>
    ";
 while (($line = fgetcsv($f)) !== false) {
         echo "<tr>";
         foreach ($line as $cell) {
                 echo "<td>" . htmlspecialchars($cell) . "</td>";
         }
         echo "</tr>\n";
 }
 fclose($f);
 echo "\n</tbody></table></div></body></html>";
?>
</body>
</html>