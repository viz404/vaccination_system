<?php
    session_start();
    if(!isset($_SESSION['customer'])){
        header("location: customerlogin.php");
        }
    include "extras/database.php";   
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

  <title>VaccineBook</title>
  <link rel="icon" href="extras/vaccine.ico">
  <link rel="stylesheet" href="extras/style.css">
  <link rel="stylesheet" href="extras/style2.css">
  <link rel="stylesheet" href="extras/style3.css">
  <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
  <style>
    .heading {
      text-align: center;
      margin: 5px;
      font-weight: bold;
      font-size: 25px;
      color: #647a7a;
      margin-bottom: 25px;
    }

    .rows {
      display: flex;
      justify-content: center;
    }

    .cols {
      margin: 10px;
    }

    .container2 {
      padding-right: var(--bs-gutter-x,.75rem);
    padding-left: var(--bs-gutter-x,.75rem);
    margin-right: auto;
    margin-left: auto;
      width: auto;
      height: 200px;
      background-color: rgb(212, 233, 233);
    }

    .form-floating>.form-select {
      padding-top: 0.625rem;
      padding-bottom: 0.625rem;
    }
  </style>
  <script src="extras/cities.js"></script>
</head>

<body>
  <?php require ("extras/nav.php"); ?>
  <nav
    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-green">
      <li class="breadcrumb-item"><a href="/vaccine/customer.php"
          style="text-decoration: none; color: white;">Customer</a></li>
      <li class="breadcrumb-item"><a href="/vaccine/memberSignup.php" style="text-decoration: none; color: white;">Add
          Member</a></li>
      <li class="breadcrumb-item active" style="color: #81aeae;">Book Vaccine</li>
      <li class="breadcrumb-item">
        <form method="post" style="display:inline-block;"><input type="submit" value="Logout" name="logout"
            style="background-color: transparent;color: white; border:none; position: relative; left: -7px;"></form>
      </li>
    </ol>
  </nav>

  <?php
          function logout() {
            unset($_SESSION['customer']);
            header("location: customerlogin.php");
          }
        
          if(array_key_exists('logout', $_POST)) {
            logout();
        }
    ?>

  <div class="container-custom">
    <div class="heading">
      Find Your Nearest Vaccination Center
    </div>
    <nav>
      <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
          role="tab" aria-controls="nav-home" aria-selected="true">By District</button>
        <button class="nav-link nav-tabb" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
          type="button" role="tab" aria-controls="nav-profile" aria-selected="false">By Pin</button>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <form method="post">
          <div class="row">
            <div class="col">
              <select onchange="print_city('state', this.selectedIndex);" id="sts" name="stt"
                class="form-custom"></select>
            </div>
            <div class="col">
              <select id="state" name="city" class="form-custom">
                <option>Select City</option>
              </select>
              <script language="javascript">print_state("sts");</script>
            </div>
            <div class="col">
              <button type="submit" class="btn-darkgreen btn-cowin" name="search">SEARCH</button>
            </div>
        </form>
        <table class="table table-hover customer-table">
          <thead class="customer-thead">
            <tr class="customer-tr">
              <th scope="col">Name</th>
              <th scope="col">Contact</th>
              <th scope="col">slots</th>
            </tr>
          </thead>
          <tbody>
            <?php
                if(array_key_exists('search', $_POST)){
                  if($_SERVER['REQUEST_METHOD']=='POST'){

                    $state = $_POST['stt'];
                    $city = $_POST['city'];                    

                    $cquery = "SELECT * FROM `center` WHERE `city` ='$city' AND `state` ='$state';";
                    $csql=mysqli_query($con,$cquery);
                    $crows = mysqli_num_rows($csql);
                    if($crows>0){ 
                      while($print = mysqli_fetch_assoc($csql)){
                        $name = $print['name'];
                        echo "<tr class='customer-tr'>
                        <td>".$print['name']."</td>
                        <td>".$print['contact']."</td>";
    
                    $dquery = "SELECT * FROM `center_supplier` WHERE `center` ='$name';";
                    $dsql=mysqli_query($con,$dquery);
                    $drows = mysqli_num_rows($dsql);
                    if($drows>0){ 
                      while($dprint = mysqli_fetch_assoc($dsql)){
                        echo "
                        <td>".$dprint['slots']."</td>";
                      }
                    }
                  }
                }
                      
                      echo "</tr>";
                  }
                }
                ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      <form method="post">
        <div class="row">
          <div class="col">
            <input type="number" class="form-custom" name="pincode" id="pincode" placeholder="Enter Your Pincode">
          </div>
          <div class="col">
            <button type="submit" name="pin-search" id="pin-search" class="btn-darkgreen btn-cowin">SEARCH</button>
          </div>
      </form>
      <table class="table table-hover customer-table">
        <thead class="customer-thead">
          <tr class="customer-tr">
            <th scope="col">Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Slots</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if(array_key_exists('pin-search', $_POST)){
              if($_SERVER['REQUEST_METHOD']=='POST'){

                $pincode = $_POST['pincode'];                

                $cquery = "SELECT * FROM `center` WHERE `pincode` ='$pincode';";
                $csql=mysqli_query($con,$cquery);
                $crows = mysqli_num_rows($csql);
                if($crows>0){ 
                  while($print = mysqli_fetch_assoc($csql)){
                    $name = $print['name'];
                    echo "<tr class='customer-tr'>
                    <td>".$print['name']."</td>
                    <td>".$print['contact']."</td>";
                  
                $dquery = "SELECT * FROM `center_supplier` WHERE `center` ='$name';";
                $dsql=mysqli_query($con,$dquery);
                $drows = mysqli_num_rows($dsql);
                if($drows>0){ 
                  while($dprint = mysqli_fetch_assoc($dsql)){
                    echo "
                    <td>".$dprint['slots']."</td>";
                  }
                }
              }
            }
                  
                  echo "</tr>";
              }
            }
            
  

            ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>
  </div>

  <section class="vh-50">
    <div class="container2 py-5 h-100" style="background-color: white;">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <form method="get" action="slotbook.php">

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <select name="name" id="name" class="form-select" aria-label="Default select example"></select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <select name="center" id="center" class="form-select"
                        aria-label="Default select example"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <select name="type" id="type" class="form-select" aria-label="Default select example"></select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <select name="vaccine" id="vaccine" class="form-select"
                        aria-label="Default select example"></select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                      <input type="number" id="dose" name="dose" class="form-control" placeholder="dose" required>
                      <label for="floatingInput">Dose number</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-floating">
                    <select name="status" id="status" class="form-select"
                        aria-label="Default select example">
                        <option selected>Select vaccination status</option>
                        <option value="partial">Partial</option>
                        <option value="complele">Complete</option>
                      </select>
                    </div>
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



    <?php 
$contact = $_SESSION['contact'];
$ncontact = (int)$contact;
$query = "SELECT * FROM `member` WHERE `contact` = '$ncontact';";
$sql=mysqli_query($con,$query);
$rows = mysqli_num_rows($sql);
if($rows>0){
while($print = mysqli_fetch_assoc($sql)){
  echo "
  <script>
    var select = document.getElementById('name');
    select.options[select.options.length] = new Option('".$print['name']."', '".$print['name']."');  
  </script>  
  ";
}
}

$cquery = "SELECT * FROM `center`";
$csql=mysqli_query($con,$cquery);
$crows = mysqli_num_rows($csql);
if($crows>0){
while($cprint = mysqli_fetch_assoc($csql)){
  echo "
  <script>
    var select = document.getElementById('center');
    select.options[select.options.length] = new Option('".$cprint['name']."', '".$cprint['name']."');  
  </script>  
  ";
}
}

$qquery = "SELECT DISTINCT `vaccinetype` FROM `supplier`";
$qsql=mysqli_query($con,$qquery);
$qrows = mysqli_num_rows($qsql);
if($qrows>0){
while($qprint = mysqli_fetch_assoc($qsql)){
  echo "
  <script>
    var select = document.getElementById('type');
    select.options[select.options.length] = new Option('".$qprint['vaccinetype']."', '".$qprint['vaccinetype']."');  
  </script>  
  ";
}
}

$tquery = "SELECT * FROM `supplier`";
$tsql=mysqli_query($con,$tquery);
$trows = mysqli_num_rows($tsql);
if($trows>0){
while($tprint = mysqli_fetch_assoc($tsql)){
  echo "
  <script>
    var select = document.getElementById('vaccine');
    select.options[select.options.length] = new Option('".$tprint['name']."', '".$tprint['name']."');  
  </script>  
  ";
}
}
?>

  <!-- </script> -->
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