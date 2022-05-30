<?php
    $alert = false;
    $wrongalert = false;
    $exists = false;
    $alertpass = false;
    if($_SERVER['REQUEST_METHOD']=='POST'){

        include "extras/database.php";
        $username = $_POST['username'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $vaccine = $_POST['vaccine'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $aadhaar = $_POST['aadhaar'];
        $email = $_POST['email'];
        $center = $_POST['center'];

        $existquery = "SELECT * FROM `vaccinator` WHERE `username` = '$username';";
        $esql = mysqli_query($con,$existquery); 

        $numrows = mysqli_num_rows($esql);

        if($numrows>0){
            $exists = true;
        }
        else{
                $query = "INSERT INTO `vaccinator` (`username`, `name`, `contact`, `address`, `vaccine`, `dob`, `gender`, `aadhaar`, `email`, `center`) VALUES ('$username', '$name', '$contact', '$address', '$vaccine', '$dob', '$gender', '$aadhaar', '$email', '$center');";
                $sql = mysqli_query($con,$query);
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

    <title>Vaccinator SignUp</title>
    <link rel="icon" href="extras/vaccine.ico">
    <link rel="stylesheet" href="extras/style.css">
    <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
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
    if ($exists) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Username not available!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    ?>

    <div class="container">
        <h2 class="text-center">Vaccinator SignUp</h2>
        <form style="width:50%; margin-left:25%" method = "post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength = "15" class="form-control" id="username" name="username" aria-describedby="username" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" maxlength = "20" class="form-control" id="name" name="name" aria-describedby="name" required>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" maxlength = "10" class="form-control" id="contact" name = "contact" minlength="10" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name = "address" required>
            </div>
            <label for="center">Vaccinator center</label>  
            <select name="center" id="center" class="form-select" aria-label="Default select example" style="margin-top:8px">
                <option selected>Choose here:</option>
                <?php 
                        include "extras/database.php";
                        $csql = "SELECT * FROM `center`;";
                        $cresult = mysqli_query($con,$csql);
                        $crow = mysqli_num_rows($cresult);
                        if($crow>0){
                            while ($pr = mysqli_fetch_assoc($cresult)) {
                                echo '<option value="'.$pr['name'].'">'.$pr['name'].'</option>';
                              }
                            }
                ?>
            </select>

            <div class="mb-3">
                <label class="form-label" style="margin-top:10px">Vaccination:</label><br>
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
            
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <?php require "extras/footer.php"; ?>
  </body>
</html>