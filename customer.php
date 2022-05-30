<?php
require "extras/database.php";
$add = false;
    session_start();
     if(!isset($_SESSION['customer'])){
        header("location: customerlogin.php");
        }

        $contact = $_SESSION['contact'];
        
        $query = "SELECT * FROM `member` WHERE `contact` = '$contact';";
            $sql = mysqli_query($con,$query);
            $num = mysqli_num_rows($sql);

            if($num==0){
              $add = true;
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

    <title>Customer</title>
    <link rel="icon" href="extras/vaccine.ico">
    <link rel="stylesheet" href="extras/style.css">
    <link rel="stylesheet" href="extras/style2.css">
    <link rel="stylesheet" href="extras/style3.css">
    <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
<style>
  .container-custom{
    width: 100%;
    padding-right: var(--bs-gutter-x,.75rem);
    padding-left: var(--bs-gutter-x,.75rem);
    margin-right: auto;
    margin-left: auto;
    height:400px;
  }
  
</style>
    

  </head>

<body>
  <?php require "extras/nav.php"; ?>

<nav class="bread" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-green">
    <li class="breadcrumb-item" style="color: #81aeae;">Customer</li>
    <li class="breadcrumb-item"><a class="bread-items" href="/vaccine/memberSignup.php" style="color:white; text-decoration:none;">Add Member</a></li>
    <li class="breadcrumb-item"><a href="/vaccine/vaccineBook.php" style="color:white; text-decoration:none;">Book Vaccine</a></li>
    <li class="breadcrumb-item"><form method="post" style="display:inline-block;"><input type="submit" value="Logout" name="logout" style="background-color: transparent; color: white; border:none; position: relative; left: -7px;"></form></li>
  </ol>
</nav>

  <?php 
  if($add){
    echo '<center>
    <h1>Please add members!</h1>
  </center>';
  }
?>

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
  <table class="table table-hover customer-table">
  <thead class="customer-thead">
    <tr class="customer-tr">
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Vaccination</th>
      <th scope="col">Dose</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $tquery = "SELECT * FROM `member` WHERE `contact`='$contact' ";
      $tsql=mysqli_query($con,$tquery);
      $trows = mysqli_num_rows($tsql);
      if($trows>0){
        $sno =1;
          while($print = mysqli_fetch_assoc($tsql)){
            echo "<tr class='customer-tr'>
            <th scope='row'>".$sno."</th>
            <td>".$print['name']."</td>
            <td>".$print['dob']."</td>
            <td>".$print['status']."</td>
            <td>".$print['dose']."</td>
          </tr>";
          $sno++; 
        }
      } 

    ?>
  </tbody>
</table>
</div>
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