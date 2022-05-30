<?php
    $alert = false;
    $existscon = false;
    $existsemail = false;
    $existsweb = false;
    $existsuser = false;
    if($_SERVER['REQUEST_METHOD']=='POST'){

        include "extras/database.php";

        $pincode = $_POST['pincode'];
        $area = $_POST['area'];
        $landmark = $_POST['landmark'];
        $price = $_POST['price'];
        $state = $_POST['stt'];
        $city = $_POST['city'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $website = $_POST['website'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $vaccinetype = $_POST['vaccinetype'];
        $vaccine = $_POST['vaccine'];


        function insert(){
          global $password, $username, $name, $website, $contact, $email, $vaccinetype, $vaccine, $area, $landmark, $price, $pincode, $state, $city, $con, $alert;
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $query = "INSERT INTO `supplier` (`username`, `password`, `name`, `website`, `contact`, `email`, `regdate`, `vaccinetype`, `vaccine`, `area`, `landmark`, `price`, `pincode`, `state`, `city`) VALUES ('$username', '$hash', '$name', '$website', '$contact','$email', current_timestamp(), '$vaccinetype', '$vaccine', '$area', '$landmark', '$price', '$pincode', '$state', '$city');";
          mysqli_query($con,$query);
          $alert = true;
        } 

        $existquery = "SELECT * FROM `supplier` WHERE `contact` = '$contact';";
        $esql = mysqli_query($con,$existquery); 
        $numcontact = mysqli_num_rows($esql);

        $existqueryu = "SELECT * FROM `supplier` WHERE `username` = '$username';";
        $usql = mysqli_query($con,$existqueryu); 
        $numuser = mysqli_num_rows($usql);

        $existquerye = "SELECT * FROM `supplier` WHERE `email` = '$email';";
        $sqle = mysqli_query($con,$existquerye); 
        $numemail = mysqli_num_rows($sqle);

        $existqueryw = "SELECT * FROM `supplier` WHERE `website` = '$website';";
        $sqlw = mysqli_query($con,$existqueryw); 
        $numweb = mysqli_num_rows($sqlw);


        if($numcontact>0){
            $existscon = true;
        }
        elseif($numemail>0){
          $existsemail = true;
        }
        elseif($numweb>0){
          $existsweb = true;
        }
        elseif($numuser>0){
          $existsuser = true;
        }
        else{
          insert();
        }
            

        
            $vaccinequery = "ALTER TABLE `center_supplier` ADD `$name` INT NOT NULL;";
            mysqli_query($con,$vaccinequery);
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

  <title>Supplier Signup</title>
  <link rel="icon" href="extras/vaccine.ico">
  <link rel="stylesheet" href="extras/style.css">
  <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
  <style>
    .py-5 {
    padding-top: 4rem!important;
  }
    div.alert-success{
      margin-bottom: 0rem;
      width: 30%;
      margin: auto;
      top: 10px;
    }
    .alert-custom2{
      display: inline-block;
      position: absolute;
      top: 10%;
      left: 39%;
      color: #842029;
      background-color: #f8d7da;
      border-color: #f5c2c7;
    }
  </style>
  <link rel="stylesheet" href="extras/style.css">
  <link rel="stylesheet" href="extras/style2.css">
  <link rel="stylesheet" href="extras/style3.css">
   <script src="extras/cities.js"></script>
</head>

<body>
<?php require ("extras/nav.php"); ?>

<?php
    if($alert){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your have successfully signed up!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    if ($existscon) {
        echo '
        <div class="alert alert-custom2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Contact not available!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    elseif ($existsemail) {
        echo '
        <div class="alert alert-custom2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Email not available!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    elseif ($existsuser) {
        echo '
        <div class="alert alert-custom2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Username not available!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    elseif ($existsweb) {
        echo '
        <div class="alert alert-custom2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Website not available!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    ?>

<div class="container">
  <section class="vh-50 gradient-custom">  
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Supplier Signup</h3>
              <form method="post">

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <input type="text" id="username" name="username" class="form-control" placeholder="username" required>
                      <label for="floatingInput">Username</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">

                    <div class="form-floating">
                      <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                      <label for="floatingInput">Password</label>
                    </div>

                  </div>
                </div>

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
                      <input type="text" id="vaccinetype" name="vaccinetype" class="form-control" placeholder="vaccinetype" required>
                      <label for="floatingInput">Vaccine Type</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">

                    <div class="form-floating">
                      <input type="text" id="vaccine" name="vaccine" class="form-control" placeholder="vaccine" required>
                      <label for="floatingInput">Vaccine Name</label>
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
                    <div class="form-floating">
                      <input type="text" id="website" name="website" class="form-control" placeholder="website" required>
                      <label for="floatingInput">Website</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <input type="number" id="price" name="price" class="form-control" placeholder="price" required>
                      <label for="floatingInput">Price<sup>₹</sup></label>
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