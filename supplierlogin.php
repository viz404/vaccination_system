<?php
    $wrongalert = false;
    if($_SERVER['REQUEST_METHOD']=='POST'){

        include "extras/database.php";

        $username = $_POST['username'];
        $password = $_POST['password'];

            $query = "SELECT * FROM `supplier` WHERE `username` = '$username';";
            $sql = mysqli_query($con,$query);
            $num = mysqli_num_rows($sql);

            if($num==1){
                while($row = mysqli_fetch_assoc($sql)){
                    if(password_verify($password, $row['password'])){
                        session_start();
                        $_SESSION['supplier'] = true;
                        $_SESSION['username'] = $username;
                        $_SESSION['contact'] = $row['contact'];
                        $_SESSION['name'] = $row['name'];
                        header("location: supplier.php");
                    }
                    else{
                        $wrongalert = true;
                    }
                }
                
            }
            else{
                $wrongalert = true;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Supplier Login</title>
    <link rel="icon" href="extras/vaccine.ico">
    <link rel="stylesheet" href="extras/style.css">
    <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
    <style>
      div.container-main-login{
    position: relative;
  }
    </style>
  </head>
  <body>
    <?php
        require "extras/nav.php";
    ?>

    

<div class="container-main-login">
<?php
    if ($wrongalert) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Invalid credentials!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
    ?>  
    <div class="customer-login">
      <main class="form-signin">
        <form method="post">
          <img src="extras/customer login.png" alt="" width="100" height="100">
          <h1 class="h3 mb-3 fw-normal">Supplier login</h1>

          <div class="form-floating">
            <input type="text" id="username" name="username" class="form-control" min="10" max="" placeholder="Username"
              required>
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>
          <button class="w-100 btn btn-lg btn-info" type="submit">Login</button>
        </form>
            <a href="supplierSignup.php">
              <button class="w-100 btn btn-lg btn btn-lightgreen mt-2">Register</button>
            </a>
        </div>
      </main>
    </div>
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