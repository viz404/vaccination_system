<?php
    session_start();
     if(!isset($_SESSION['admin'])){
            header("location: adminlogin.php");
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

    <title>Welcome, <?php echo $_SESSION['username'] ?></title>
    <link rel="icon" href="extras/vaccine.ico">
    <link rel="stylesheet" href="extras/style.css">
    <link rel="stylesheet" href="extras/style2.css">
    <link rel="stylesheet" href="extras/style3.css">
    <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
    <style>
      .container1{
        width: auto;
        height: 400px;
      }
    </style>
  </head>
  <body>
    <?php
        require "extras/nav.php";
    ?>
      <form method="post">
          <input type="submit" name="logout" class="btn btn-outline-danger" value="Logout" style="display: inline-block; position: absolute; right: 5px; top: 60px;">
          <input type="submit" name="reports" class="btn btn-outline-primary" value="Reports" style="display: inline-block; position: absolute; left: 5px; top: 60px;">
        </form>
    <center>
      <h1 style="margin-top:100px;">Welcome</h1>
      </center> 
      <div class="container1">

      </div>

      <?php
          function logoutFunc() {
            session_start();
            unset($_SESSION['admin']);
            header("location: adminlogin.php");
          }
        
          if(array_key_exists('logout', $_POST)) {
            logoutFunc();
        }
          function reportFunc() {            
            header("location: report.php");
          }
        
          if(array_key_exists('reports', $_POST)) {
            reportFunc();
        }
    ?>

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