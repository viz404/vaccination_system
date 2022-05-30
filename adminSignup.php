<?php
    $alert = false;
    $wrongalert = false;
    $exists = false;
    $alertpass = false;
    if($_SERVER['REQUEST_METHOD']=='POST'){

        include "extras/database.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $vaccine = $_POST['vaccine'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $aadhaar = $_POST['aadhaar'];
        $email = $_POST['email'];
        $pan = $_POST['pan'];

        $existquery = "SELECT * FROM `admin` WHERE `username` = '$username';";
        $esql = mysqli_query($con,$existquery); 

        $numrows = mysqli_num_rows($esql);

        if($numrows>0){
            $exists = true;
        }
        else{
            if(isset($_POST['password'])){
                if(($password==$cpassword)){
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO `admin` (`username`, `password`, `contact`, `address`, `vaccine`, `dob`, `gender`, `aadhaar`, `email`, `pan`) VALUES ('$username', '$hash', '$contact', '$address', '$vaccine', '$dob', '$gender', '$aadhaar', '$email', '$pan');";
                    $sql = mysqli_query($con,$query);
                    $alert = true;
                }
                else{
                    $wrongalert = true;
                }
            }
            else{
                $alertpass = true;
            }
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

    <title>Admin SignUp</title>
    <link rel="icon" href="extras/vaccine.ico">
    <link rel="stylesheet" href="extras/style.css">
  </head>
  <body>
    <?php
        require "extras/nav.php";
    ?>

    <?php
    if($alert){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your have successfully signed up!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    if ($wrongalert) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Passwords dosen\'t match!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    if ($exists) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Username not available!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    if($alertpass){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Enter Password!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    ?>

    <div class="container">
        <h2 class="text-center">Admin SignUp</h2>
        <form style="width:50%; margin-left:25%" method = "post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength = "11" class="form-control" id="username" name="username" aria-describedby="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name = "password" required>
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                <div id="cpassword" class="form-text">Make sure type the exact same password entered above</div>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" maxlength = "10" class="form-control" id="contact" name = "contact" minlength="10" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name = "address" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Vaccination:</label><br>
                <input type="radio" id="first" name="vaccine" value="first" required>
                <label for="first" style="padding-right:20px">First</label>
                <input type="radio" id="second" name="vaccine" value="second">
                <label for="second">Second</label><br>
            </div>
            <div class="mb-3">
                <label class="form-label" style="margin-top:15px">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name = "dob" required>
            </div>
            <div class="mb-3">
            <label class="form-label" style="margin-top:15px">Gender:</label><br>
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male" style="padding-right:20px">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female" style="padding-right:20px">Female</label>
                <input type="radio" id="other" name="gender" value="Other">
                <label for="other">Other</label><br>
            </div>
            <div class="mb-3">
                <label for="aadhaar" class="form-label" style="margin-top:15px">Aadhaar</label>
                <input type="text" maxlength = "12" class="form-control" id="aadhaar" name = "aadhaar" minlength="12" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" maxlength = "40" class="form-control" id="email" name = "email" required>
            </div>
            <div class="mb-3">
                <label for="pan" class="form-label">Pan</label>
                <input type="text" maxlength = "10" class="form-control" id="pan" name = "pan" minlength="10" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
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