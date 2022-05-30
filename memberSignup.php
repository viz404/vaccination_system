<?php
require "extras/database.php";
    session_start();
    if(!isset($_SESSION['customer'])){
        header("location: customerlogin.php");
        }
    $exists = false;
    $alert = false;

    if($_SERVER['REQUEST_METHOD']=='POST'){
            $contact = $_SESSION['contact'];
        $aadhaar = $_POST['aadhaar'];
        $name = $_POST['name'];
        $pan = $_POST['pan'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

        $existquery = "SELECT * FROM `member` WHERE `aadhaar` = '$aadhaar';";
        $esql = mysqli_query($con,$existquery); 

        $numrows = mysqli_num_rows($esql);
        
        if($numrows>0){
            $exists = true;
        }
        else{
                $query = "INSERT INTO `member` (`contact`, `aadhaar`, `name`, `pan`, `email`, `dob`, `gender`, `regdate`) VALUES ('$contact', '$aadhaar', '$name', '$pan', '$email', '$dob','$gender', current_timestamp());";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Member Signup</title>
  <link rel="icon" href="extras/vaccine.ico">
  <link rel="stylesheet" href="extras/style.css">
  <link rel="stylesheet" href="extras/style2.css">
  <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
  <style>
    
  </style>
</head>

<body>
<?php require ("extras/nav.php"); ?>

<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-green">
    <li class="breadcrumb-item"><a href="/vaccine/customer.php" style="color:white; text-decoration:none;">Customer</a></li>
    <li class="breadcrumb-item" style="color: #81aeae;">Add Member</li>
    <li class="breadcrumb-item"><a href="/vaccine/vaccineBook.php" style="color:white; text-decoration:none;">Book Vaccine</a></li>
    <li class="breadcrumb-item"><form method="get" style="display:inline-block;"><input type="submit" value="Logout" name="logout" style="background-color: transparent; border:none; position: relative; left: -7px; color:white"></form></li>
  </ol>
</nav>

<div class="container">
<?php
    function logout() {
        unset($_SESSION['customer']);
        echo'<script>window.location.href = "/vaccine/customerlogin.php";</script>';
      }
    
      if(array_key_exists('logout', $_GET)) {
        logout();
    }

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
            <strong>Error!</strong> Aadhaar number already exists!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
           
    ?>
  <section class="vh-50 gradient-custom">  
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Member Signup</h3>
              <form method="post">

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <input type="text" id="name" name="name" class="form-control" placeholder="name" required>
                      <label for="floatingInput">Name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <input type="number" id="aadhaar" name="aadhaar" class="form-control" placeholder="aadhaar" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                      <label for="floatingInput">Aadhaar</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <input type="text" id="email" name="email" class="form-control" placeholder="email" required>
                      <label for="floatingInput">Email</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <input type="text" id="pan" name="pan" class="form-control" placeholder="pan" maxlength="10">
                      <label for="floatingInput">Pan <sup>(Optional)</sup></label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name = "dob" required>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label class="form-label">Gender:</label><br>
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male" style="padding-right:20px">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female" style="padding-right:20px">Female</label>
                <input type="radio" id="other" name="gender" value="Other">
                <label for="other">Other</label>
                  </div>
                </div>                
                
                <div class="row mt-2 pt-2">                
                  <div class="col-md-auto mb-4">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                  </div>
                  <div class="col-md-auto mb-4">
                    <input class="btn btn-warning btn-lg" type="reset" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <?php require "extras/footer.php"; ?>
</body>

</html>