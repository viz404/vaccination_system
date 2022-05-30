<?php
    $alert = false;
    session_start();
    if(!isset($_SESSION['supplier'])){
        header("location: supplierlogin.php");
        }
    include "extras/database.php";

    

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $quantity = $_POST['quantity'];

        $existquery = "SELECT * FROM `supplier` WHERE `contact` = '$contact';";
        $esql = mysqli_query($con,$existquery); 
        $row = mysqli_fetch_assoc($esql);

        $uquantity = $row['quantity']+$quantity;
        $uquery = "UPDATE `supplier` SET `quantity` = '$uquantity' WHERE `contact` = '$contact' ;";
        $usql = mysqli_query($con,$uquery);
        $alert = true;
                
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

    <title>Supply Vaccine</title>
    <link rel="icon" href="extras/vaccine.ico">
    <link rel="stylesheet" href="extras/style.css">
    <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
    <style>
        .container1{
      width: auto;
    padding-right: var(--bs-gutter-x,.75rem);
    padding-left: var(--bs-gutter-x,.75rem);
    margin-right: auto;
    margin-left: auto;
    height: 500px;
    }
    </style>
  </head>
  <body>
    <?php
        require "extras/nav.php";
    ?>

    <?php
    if($alert){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Total Vaccines updated!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    ?>

    <div class="container1">
        <h2 class="text-center">Supply Vaccine</h2>
        <form style="width:50%; margin-left:25%" method = "post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name = "name" value="<?php echo $_SESSION['name']?>" aria-label="Disabled input example" readonly>
            </div>
            <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input class="form-control" type="text" value="<?php echo $_SESSION['contact']?>" aria-label="Disabled input example" name="contact" id="contact" readonly>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" id="quantity" name = "quantity" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
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