<?php
    session_start();
     if(!isset($_SESSION['center'])){
        header("location: centerlogin.php");
        }
    require "extras/database.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Center</title>
    <link rel="icon" href="extras/vaccine.ico">
    <link rel="stylesheet" href="extras/style.css">
    <link rel="stylesheet" href="extras/style2.css">
    <link rel="stylesheet" href="extras/style3.css">
    <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
    <style>
      .container2{  
        width: auto;
        height: auto;    
      }
      img{
        object-fit: cover;
      }
      
    </style>
  </head>
  <body>
    <?php require "extras/nav.php"; ?>
    <form method="post">
      <!-- <input type="submit" name="logoutbtn" class="btn btn-outline-danger" value="Logout" style="display:inline-block; position: absolute; right: 5px; top: 60px;"> -->
      <!-- <input type="submit" name="buybtn" class="btn btn-outline-primary" value="Buy" style="display:inline-block; position: absolute; left: 5px; top: 60px;"> -->
    </form>
    <nav class="bread" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-green" style="margin-bottom: 0;">
        <li class="breadcrumb-item"><form method="post" style="display:inline-block;"><input type="submit" value="Buy" name="buybtn" style="background-color: transparent; color: white; border:none; position: relative;"></form></li>
        <li class="breadcrumb-item"><form method="post" style="display:inline-block;"><input type="submit" value="Logout" name="logoutbtn" style="background-color: transparent; color: white; border:none; position: relative; left: -7px;"></form></li>
      </ol>
    </nav>
    <!-- <center>
      <h1 style="margin-top:100px;">Welcome</h1>
    </center>  -->

<div class="container1">
<img src="extras/center.jpg" alt="center Background" width="100%" height="500px">
</div>
<div class="container2">
<table class="table table-hover customer-table" style="margin-top:20px;">
        <thead class="customer-thead">
          <tr class="customer-tr">
            <?php
                $aql = "SELECT * FROM `center_supplier`;";
                $res = mysqli_query($con, $aql);
                $num=0;
                while ($dow=mysqli_fetch_array($res,MYSQLI_ASSOC)) {
                  while($field=mysqli_fetch_field($res)) {
                      $fieldname=$field->name;
                      echo  "<th scope='col'>". substr($fieldname,0,strlen($fieldname)+1)."</th>";
                      $num++;
                  }
                }
                
?>
          
          </tr>
        </thead>
        <tbody>
        <tr class='customer-tr'>
        <?php
        $center = $_SESSION['center'];
        $sql = "SELECT * FROM `center_supplier` WHERE `center` = '$center';";
        $res = mysqli_query($con, $sql);
        for ($i=0; $i < $num; $i++) {         
          while($row = mysqli_fetch_array($res)){
            for ($i=0; $i < $num; $i++) { 
              
              $item = $row[$i];
              echo "<td>".$item."</td>";
            }
          }
        }

?>

        </tbody>
      </table>

</div>

      <?php
          function logoutbtn() {
            unset($_SESSION['center']);
            header("location: centerlogin.php");  
          }
          function buybtn() {
            header("location: buyvaccine.php");
          }
        
          if(array_key_exists('logoutbtn', $_POST)) {
            logoutbtn();
          }
          if(array_key_exists('buybtn', $_POST)) {
            buybtn();
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