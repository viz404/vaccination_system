<?php require ("extras/database.php");
if(!session_start()){
session_start();
}
     if(!isset($_SESSION['center'])){
        header("location: centerlogin.php");
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

    <title>Buy Vaccine</title>
    <link rel="icon" href="extras/vaccine.ico">
  <link rel="stylesheet" href="extras/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <style>

.rounded {
    border-radius: 1rem
}

.nav-pills .nav-link {
    color: #555
}

.nav-pills .nav-link.active {
    color: white
}

input[type="radio"] {
    margin-right: 5px
}

.bold {
    font-weight: bold
}
button#buy_btn {
    position: relative;
    left: -473px;
}

  </style>
  <script>
      $(function() {
$('[data-toggle="tooltip"]').tooltip()
})
  </script>
  </head>
  <body>
  <?php require ("extras/nav.php");?>


<div class="container" style="padding: 10px;">
  <h2 class="text-center">Buy Vaccine</h2>
      <form style="width:50%; margin-left:25% ;display:inline-block;" method = "post">
        <div class="mb-3">
        <label for="name">Select Supplier</label>  
            <select name="name" id="name" class="form-select" aria-label="Default select example" style="margin-top:8px"></select>
        </div>
            <div class="mb-3">
              <label for="supplier" class="form-label">Selected Supplier</label>
              <input type="text" class="form-control" id="supplier" name = "supplier" value="" aria-label="Disabled input example"  readonly>
            </div>
            <div class="mb-3">
              <label for="type" class="form-label">Vaccine Type</label>
              <input type="text" class="form-control" id="type" name = "type" value="" aria-label="Disabled input example"  readonly>
            </div>
        <div class="mb-3">
          <label for="vaccinename" class="form-label">Vaccine Name</label>
          <input type="text" class="form-control" id="vaccinename" name = "vaccinename" value="" aria-label="Disabled input example" readonly>
      </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price<sup>₹</sup></label>
          <input type="text" class="form-control" id="price" name = "price" value="" aria-label="Disabled input example" readonly>
      </div>

      <div class="mb-3">
          <label for="quantity" id = "quantity_label" class="form-label"></label>
          <input type="number" id="quantity" name = "quantity" placeholder="Enter Quantity">
      </div>
        <button class="btn btn-info" id="update_btn" name="update_btn">Update</button>
      </form>
      <button class="btn btn-warning" id="buy_btn" name="buy_btn">Buy</button>
      <script>
        function thicFunc(){
          var quantity = document.getElementById('quantity').value;
          localStorage.setItem("quantity",quantity);
          location.replace("buyvaccine2.php");
        }
        document.getElementById('buy_btn').addEventListener('click',thicFunc);
      </script>
</div>


<!-- To fill in select options -->
<?php 
$query = "SELECT * FROM `supplier`";
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
?>
<!-- TO fill in rest options -->
<?php 

if(array_key_exists('update_btn', $_POST))
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = $_POST['name'];
  $aquery = "SELECT * FROM `supplier` WHERE `name` = '$name'";
  $sql=mysqli_query($con,$aquery);
  $aprint = mysqli_fetch_assoc($sql);
  $_SESSION['suppliername'] = $aprint['name'];
  $_SESSION['supplierprice'] = $aprint['price'];

  echo "
  <script>
  document.getElementById('supplier').value = '".$aprint['name']."';
  document.getElementById('type').value = '".$aprint['vaccinetype']."';
  document.getElementById('vaccinename').value = '".$aprint['vaccine']."';
  document.getElementById('price').value = '".$aprint['price']."';
  document.getElementById('quantity_label').innerHTML = 'Max Quantity: ".$aprint['quantity']."';
  </script>   
  ";

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