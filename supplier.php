<?php
$add = false;
require "extras/database.php";
    session_start();
     if(!isset($_SESSION['supplier'])){
        header("location: supplierlogin.php");
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

  <title>Supplier</title>
  <!-- <link rel="shortcut icon" href="extras/vaccine.ico" /> -->
  <link rel="icon" type="image/png" href="extras/vaccine.png">
  <link rel="stylesheet" href="extras/style.css">
  <link rel="stylesheet" href="extras/style2.css">
  <link rel="stylesheet" href="extras/style3.css">
  <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
  <style>
    .container1{
      width: 100%;
    padding-right: var(--bs-gutter-x,.75rem);
    padding-left: var(--bs-gutter-x,.75rem);
    margin-right: auto;
    margin-left: auto;
    height: 400px;
    }
  </style>
</head>
<body>
<?php require "extras/nav.php"; ?>
  <center>
    <h1>Welcome</h1>
    <form method="post">
      <input type="submit" name="logoutbtn" class="btn btn-outline-danger" value="Logout" style="display:inline-block; position: absolute; right: 5px; top: 60px;">
      <input type="submit" name="supplybtn" class="btn btn-outline-primary" value="Supply" style="display:inline-block; position: absolute; left: 5px; top: 60px;">
    </form>
  </center>

  <?php
          function logoutbtn() {
            unset($_SESSION['supplier']);
            header("location: supplierlogin.php");
          }
          function supplybtn() {
            header("location: supply.php");
          }
        
          if(array_key_exists('logoutbtn', $_POST)) {
            logoutbtn();
          }
          if(array_key_exists('supplybtn', $_POST)) {
            supplybtn();
          }
    ?>

  <div class="container1" style="margin-top:50px;">
    <table class="table table-borderless" style="margin-left:auto;margin-right:auto;width:80%;">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Vaccine Type</th>
          <th scope="col">Vaccine</th>
          <th scope="col">quantity</th>
        </tr>
      </thead>
      <tbody>
        <?php

      $contact = $_SESSION['contact'];

    $query = "SELECT * FROM `supplier` WHERE `contact`='$contact' ";
    $sql=mysqli_query($con,$query);
    $print = mysqli_fetch_assoc($sql);
    echo "<tr>
        <th scope='row'>".$print['name']."</th>
        <td>".$print['vaccinetype']."</td>
        <td>".$print['vaccine']."</td>
        <td>".$print['quantity']."</td>
      </tr>";
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