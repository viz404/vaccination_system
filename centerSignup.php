<?php
   require "extras/database.php";
   $alert = false;
   $passalert = false;
   if(!session_start()){
        session_start();
   }

   if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $query = "SELECT * FROM `center` WHERE `username` = '$username';";
        $sql = mysqli_query($con,$query);
        $num = mysqli_num_rows($sql);
        if($num==0){            
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            if($password==$cpassword){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("location: centersignup2.php");
            }
            else{
                $passalert = true;
            }
        }
        else{
            $alert = true;
        }
   }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Center Signup</title>
    <link rel="icon" href="extras/vaccine.ico">
    <link rel="stylesheet" href="extras/style.css">
    <link rel="stylesheet" href="extras/style2.css">
    <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
    <style>
        div.container-main-login {
            position: relative;
        }

        .box-register {
            position: relative;
        }
    </style>
  </head>
  <body>
  <?php require ("extras/nav.php"); ?>
      
    <div class="container-main-login">
        <?php
            if($alert){
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Username not available!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if($passalert){
                echo '<div class="alert alert-danger alert-align alert-dismissible fade show" role="alert" style="left: 37.5%;">
                <strong>Passwords dosen\'t match!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>
        <div class="box-register">
                <form method="post">
                    <h1 class="h3 mb-3 fw-normal">Center Registeration</h1>        
                    <div class="form-floating form-floating-signup">
                        <input type="text" id="username" name="username" class="form-control" placeholder="username" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating form-floating-signup">
                        <input type="password" class="form-control" id="password" name = "password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating form-floating-signup">
                        <input type="password" class="form-control" id="cpassword" name = "cpassword" placeholder="Password" required>
                        <label for="floatingPassword">Confirm Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Next</button>
                </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <?php require "extras/footer.php"; ?>
  </body>
</html>