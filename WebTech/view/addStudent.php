<?php
include ('../connect.php');
session_start();
    if (isset($_POST["Submit"])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $studentid = $_POST['student_id'];
        $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' OR student_id = '$studentid'" ;
        $stmt = $connect->prepare($query);
        $stmt->execute();
        if ($stmt == NULL){
        if (!isset($_SESSION['username'])){
            $query = "INSERT INTO users (firstname, lastname, email, username, password, student_id, role, grade, graduate_year, gender)
            VALUE (:firstname, :lastname, :email, :username, :password, :student_id, 'student', :grade, :graduate_year, :gender)";
            $stmt = $connect->prepare($query);
            $stmt->execute([
                'firstname'     => $_POST["firstname"],
                'lastname'      => $_POST["lastname"],
                'email'         => $_POST['email'],
                'username'      => $_POST['username'],
                'password'      => $_POST['password'],
                'student_id'    => $_POST['stdid'],
                'grade'         => $_POST['grade'],
                'graduate_year' => $_POST['graduate_year'],
                'gender'        => $_POST['gender']
            ]);
        } else {
            $query = "INSERT INTO users (firstname, lastname, email, username, password, student_id, role, grade, graduate_year, gender)
            VALUE (:firstname, :lastname, :email, :username, :password, :student_id, 'officer', :grade, :graduate_year, :gender)";        
            $stmt = $connect->prepare($query);
            $stmt->execute([
                'firstname'     => $_POST["firstname"],
                'lastname'      => $_POST["lastname"],
                'email'         => $_POST['email'],
                'username'      => $_POST['username'],
                'password'      => $_POST['password'],
                'student_id'    => '-',
                'grade'         => '-',
                'graduate_year' => '-',
                'gender'        => $_POST['gender'],
                
        ]);
        }
    
        echo "<script>alert('Register Successful.'); location.href='index.php';</script>";
        // header("location:index.php");
        }
        else {
            echo "<script>alert('Username Already Exist.'); location.href='register.php';</script>";
            // header("location:register.php")
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <title>CS ALUMNI | Add Student</title>
</head>
<body>
<?php if(isset($_SESSION['username'])){
    echo '
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
            <a href="logout.php"><i class="fa fa-envelope"></i> LOGOUT</a> 
            <a href="news.php"><i class="fa fa-globe"></i> NEWS</a>
            <a class="active" href="addStudent.php"><i class="fas fa-users"></i> ADD STUDENT</a> 
            <a href="register.php"><i class"fas fa-users"></i> ADD OFFICER</a>
            </div>
        <div class="container">
            <form method="post">
                <p>Please answer in correct value.</p>
                <hr>
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

                <label for="email">Email</label><br>
                <input type="text" id="email" name="email" placeholder="Your email.." required>
                <br>
                <label for="username">User Name</label>
                <input type="text" id="username" name="username" placeholder="Your username.." required>
                
                <label for="pwd">Password</label>
                <input type="text" id="password" name="password" placeholder="Your password.." required>
                
                <label for="student_id">Student ID</label>
                <input type="text" id="stdid" name="stdid" placeholder="Your Student ID.." required>

                <label for="graduate_year">Graduate Year</label>
                <input type="text" id="graduate_year" name="graduate_year" placeholder="Your Graduate Year ex.2020" required>

                <label for="grade">GPA</label>
                <input type="text" id="grade" name="grade" placeholder="Your GPA.." required>

                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <hr>
                <div class="col-2">
                    <input type="submit" name="Submit" value="Submit">
                </div>
            </form>
        </div>
    </div>';
}
?>
</body>
</html>