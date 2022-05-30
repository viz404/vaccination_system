<?php  require "extras/database.php"; ?> 
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Reports</title>
    <link rel="icon" href="extras/vaccine.ico">
    <link rel="stylesheet" href="extras/style.css">
    <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
    <style>
        .container1 {
            width: auto;
            min-height: 403px;
            height: auto;


        }
        @media print {
  body * {
    visibility: hidden;
  }
  .container-custom, .container-custom * {
    visibility: visible;
  }
  .container-custom {
    position: absolute;
    left: 0;
    top: 0;
  }
}
    </style>
</head>

<body>
    <?php require "extras/nav.php"; ?>
    <div class="container1">
        <form method="post">
        <select name="table" id="table" class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="center">Center</option>
            <option value="member">Member</option>
            <option value="supplier">Supplier</option>
            <option value="transactions">Transactions</option>
            <!-- <option value="vaccinator">Vaccinator</option> -->
        </select>
        <button class="btn btn-primary" id="show_btn" type="submit">Show</button>
        </form>

        <?php 
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $table = $_POST['table'];
            echo $table;
            if($table == "member"){
                echo '
                
                <div class="container-custom">
                <table class="table table-hover customer-table">
                <thead class="customer-thead">
                <tr class="customer-tr">
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Vaccination</th>
                <th scope="col">Dose</th>
                <th scope="col">Aadhaar</th>
                <th scope="col">Pan</th>
                <th scope="col">Email</th>
                <th scope="col">gender</th>
                </tr>
                </thead>                
                ';
                $tquery = "SELECT * FROM `member`";
                $tsql=mysqli_query($con,$tquery);
                $trows = mysqli_num_rows($tsql);
                if($trows>0){
                while($print = mysqli_fetch_assoc($tsql)){
                    echo "<tr class='customer-tr'>
                        <td>".$print['name']."</td>
                        <td>".$print['contact']."</td>
                        <td>".$print['dob']."</td>
                        <td>".$print['status']."</td>
                        <td>".$print['dose']."</td>
                        <td>".$print['aadhaar']."</td>
                        <td>".$print['pan']."</td>
                        <td>".$print['email']."</td>
                        <td>".$print['gender']."</td>
                        </tr>";
                }
                } 
                echo '</table>';
            }

            if($table == "center"){
                echo '
                
                <div class="container-custom">
                <table class="table table-hover customer-table">
                <thead class="customer-thead">
                <tr class="customer-tr">
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Pincode</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                </tr>
                </thead>                
                ';
                $tquery = "SELECT * FROM `center`";
                $tsql=mysqli_query($con,$tquery);
                $trows = mysqli_num_rows($tsql);
                if($trows>0){
                while($print = mysqli_fetch_assoc($tsql)){
                    echo "<tr class='customer-tr'>
                        <td>".$print['name']."</td>
                        <td>".$print['contact']."</td>
                        <td>".$print['email']."</td>                        
                        <td>".$print['pincode']."</td>                        
                        <td>".$print['city']."</td>                        
                        <td>".$print['state']."</td>                        
                        </tr>";
                }
                } 
                echo '</table>';
            }

            if($table == "supplier"){
                echo '
                
                <div class="container-custom">
                <table class="table table-hover customer-table">
                <thead class="customer-thead">
                <tr class="customer-tr">
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Quantity</th>
                <th scope="col">Vaccine Type</th>
                <th scope="col">Vaccine</th>
                <th scope="col">Price</th>
                </tr>
                </thead>                
                ';
                $tquery = "SELECT * FROM `supplier`";
                $tsql=mysqli_query($con,$tquery);
                $trows = mysqli_num_rows($tsql);
                if($trows>0){
                while($print = mysqli_fetch_assoc($tsql)){
                    echo "<tr class='customer-tr'>
                        <td>".$print['name']."</td>
                        <td>".$print['contact']."</td>
                        <td>".$print['email']."</td>                       
                        <td>".$print['city']."</td>                        
                        <td>".$print['state']."</td>                        
                        <td>".$print['quantity']."</td>                        
                        <td>".$print['vaccinetype']."</td>                        
                        <td>".$print['vaccine']."</td>                        
                        <td>".$print['price']."</td>                        
                        </tr>";
                }
                } 
                echo '</table>';
            }

            if($table == "transactions"){
                echo '
                
                <div class="container-custom">
                <table class="table table-hover customer-table">
                <thead class="customer-thead">
                <tr class="customer-tr">
                <th scope="col">From</th>
                <th scope="col">TO</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Type</th>
                <th scope="col">Time</th>
                </tr>
                </thead>                
                ';
                $tquery = "SELECT * FROM `transactions`";
                $tsql=mysqli_query($con,$tquery);
                $trows = mysqli_num_rows($tsql);
                if($trows>0){
                while($print = mysqli_fetch_assoc($tsql)){
                    echo "<tr class='customer-tr'>
                        <td>".$print['from_']."</td>
                        <td>".$print['to_']."</td>
                        <td>".$print['price']."</td>                       
                        <td>".$print['quantity']."</td>                       
                        <td>".$print['type']."</td>                       
                        <td>".$print['tstamp']."</td>                        
                        </tr>";
                }
                } 
                echo '</table>';
            }
        }
        ?>
        <input type="button" class="btn btn-warning" onclick="window.print()" value="Print" />
        
</div>
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