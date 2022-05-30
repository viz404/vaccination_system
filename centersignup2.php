<?php
if(!session_start()){
  session_start();
}

if(!$_SESSION['username']){
  header("location: centersignup.php");
}
require "extras/database.php";
$alert = false;
$numerror = false;


if($_SERVER['REQUEST_METHOD']=='POST'){
  $username = $_SESSION['username'];  
  $password = $_SESSION['password'];  
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $pincode = $_POST['pincode'];
  $area = $_POST['area'];
  $landmark = $_POST['landmark'];
  $email = $_POST['email'];
  $state = $_POST['stt'];
  $city = $_POST['city'];
  
  $asql = "SELECT * FROM `center` WHERE `contact` = '$contact';";
  $result = mysqli_query($con,$asql);
  $row = mysqli_num_rows($result);
  if($row==0){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO `center` (`username`, `password`, `name`, `contact`, `pincode`, `area`, `landmark`, `state`, `city`, `email`, `regdate`) VALUES ('$username', '$hash', '$name', '$contact', '$pincode', '$area', '$landmark', '$state', '$city', '$email', current_timestamp());";
    $sql = mysqli_query($con,$query);
    $alert = true;
    
    $aquery = "INSERT INTO `center_supplier` (`center`) VALUES ('$name');;";
    mysqli_query($con,$aquery);

  }
  else{
    $numerror = true;
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

  <title>Center Signup</title>
  <link rel="icon" href="extras/vaccine.ico">
  <link rel="stylesheet" href="extras/style.css">
  <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
  <style>
    div.alert-success{
      margin-bottom: 0rem;
      width: 30%;
      margin: auto;
      top: 10px;
    }
    .card{
      background-color: rgb(240, 240, 226);
      top: 20px;
    }
    div.alert-danger{
      top: 10%;
      left: 35.5%;
    }
  </style>
   <script src="extras/cities.js"></script>
</head>

<body>
<?php require ("extras/nav.php"); ?>
<div class="container">
  <?php

if($alert){
  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your have successfully signed up!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> ';
}
if($numerror){
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Contact number already registered!
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
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><?php echo "Please register yourself ".$_SESSION['username']; ?></h3>
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
                    <input type="number" id="contact" name="contact" class="form-control"
                                            placeholder="Enter Contact" maxlength="10"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required>
                      <label for="floatingInput">Contact</label>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <input type="number" id="pincode" name="pincode" class="form-control"
                                              placeholder="Enter Pincode" maxlength="6"
                                              oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                              required>
                        <label for="floatingInput">Pincode</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <input type="text" id="area" name="area" class="form-control" placeholder="area" required>
                      <label for="floatingInput">Area/Colony</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <input type="text" id="landmark" name="landmark" class="form-control" placeholder="landmark" required>
                      <label for="floatingInput">Landmark</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <input type="text" id="email" name="email" class="form-control" placeholder="email" required>
                      <label for="floatingInput">Email</label>
                    </div>
                  </div>
                </div> 

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" class="form-control" required></select>
                  </div>
                  <div class="col-md-6 mb-4">
                    <select id ="state" name="city" class="form-control" required>
                      <option>Select City</option>
                    </select>
                    <script language="javascript">print_state("sts");</script>
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