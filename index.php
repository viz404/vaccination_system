<?php
session_start();
session_unset();
session_destroy();
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

  <title>Vaccine</title>
  <link rel="icon" href="extras/vaccine.ico">
  <link rel="stylesheet" href="extras/style.css">
  
  <script src="https://kit.fontawesome.com/c772d5be7c.js" crossorigin="anonymous"></script>
  <style>
    .marketing .col-lg-4 {
  margin-bottom: 1.5rem;
  text-align: center;
}
.marketing h2 {
  font-weight: 400;
}
/* rtl:begin:ignore */
.marketing .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
}
    .container1 {
      width: auto;
      height: auto;
      position: relative;
      background-color: aquamarine;
    }

    .container2 {
      width: auto;
      height: 400px;
      background-color: azure;
    }

    .img_txt1 {
      font-size: 30px;
      position: absolute;
      right: 75px;
      top: 340px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      color: #656866;
    }

    .sharevaccinationsection[_ngcontent-flb-c116] {
      padding: 45px 0;
      background-color: #fff;
    }

    .sharevaccinationsection[_ngcontent-flb-c116] h1[_ngcontent-flb-c116] {
      font-size: 32px;
      color: #007c7c;
      line-height: 40px;
      margin-bottom: 15px;
      font-weight: 700;
      letter-spacing: .1px;
    }

    .mat-h1,
    .mat-headline,
    .mat-typography h1 {
      font: 400 24px/32px Roboto, Helvetica Neue, sans-serif;
      letter-spacing: normal;
      margin: 0 0 16px;
    }

    .sharevaccinationsection[_ngcontent-flb-c116] p[_ngcontent-flb-c116] {
      font-size: 16px;
      color: #0e1229;
      font-weight: 400;
      line-height: 1.5;
      opacity: .7;
      letter-spacing: .5px;
    }

    .sharevaccinationsection[_ngcontent-flb-c116] .knowstatus_btn[_ngcontent-flb-c116] {
      border: 2px solid #007c7c;
      border-radius: 50px;
      padding: 0.75rem 2.95rem;
      display: inline-block;
      text-align: center;
      font-size: 16px;
      font-weight: 400;
      text-decoration: none;
      background: #007c7c;
      color: #fff;
      box-shadow: 0 5px 9px rgb(0 0 0 / 16%);
    }
  </style>
</head>

<body>
  <?php require ("extras/nav.php"); ?>
  <div class="container1">
    <img src="extras/index5.jpg" width="100%">
    <div class="img_txt1">WELCOME TO<br> VACCINATION MANAGEMENT SYSTEM</div>
  </div>

<div class="container marketing" style="margin-top: 20px;">
  <div class="row">
    <div class="col-lg-4">
      <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="extras/hospital.png" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"></img>

      <h2>Center</h2>
      <p>Center can purchase vaccines from suppliers and make them available for customers</p>
      <button id="center_btn" class="btn" style="background-color: aquamarine;">View details »</button>
      <script>function centerFunc(){ location.replace("center.php"); } document.getElementById('center_btn').addEventListener('click',centerFunc);</script>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="extras/supplier.png" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"></img>

      <h2>Supplier</h2>
      <p>Suppliers can create their profile and suppy their products/vaccines to centers</p>
      <button id="supplier_btn" class="btn" style="background-color: aquamarine;">View details »</button>
      <script>function supplierFunc(){ location.replace("supplier.php"); } document.getElementById('supplier_btn').addEventListener('click',supplierFunc);</script>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="extras/rating.png" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
      <h2>Customer</h2>
      <p>Customers can register themselves and add members and book their vaccines accordingly</p>
      <button id="cus_btn" class="btn" style="background-color: aquamarine;">View details »</button>
      <script>function cusFunc(){ location.replace("customer.php"); } document.getElementById('cus_btn').addEventListener('click',cusFunc);</script>
    </div><!-- /.col-lg-4 -->
  </div>
</div>
  
  <div _ngcontent-flb-c116="" class="sharevaccinationsection">
    <div _ngcontent-flb-c116="" class="container-fluid">
      <div _ngcontent-flb-c116="" class="container">
        <div _ngcontent-flb-c116="" class="row">
          <div _ngcontent-flb-c116="" class="col-md-5 col-lg-6"><img _ngcontent-flb-c116=""
              src="extras/share_illustration.svg" alt="img" class="img-fluid share_status_img" style=" max-width: 60%;"></div>
          <div _ngcontent-flb-c116="" class="col-md-7 col-lg-6 pl-md-0 pl-lg-0 text-center text-md-left text-lg-left">
            <h1 _ngcontent-flb-c116="" class="accessibility-plugin-ac mb-0 mt-5 mt-md-0">Share Your Vaccination Status
            </h1>
            <p _ngcontent-flb-c116="" class="my-4 accessibility-plugin-ac"> Be a Fighter! If you are fully or partially
              vaccinated, you can now share your vaccination status in your social circle. Let's encourage our friends
              and followers in joining India's battle against COVID-19. </p>
            <div _ngcontent-flb-c116="" class="intBtn"><a _ngcontent-flb-c116="" target="_blank"
                class="knowstatus_btn accessibility-plugin-ac"
                href="#">Share Your Status</a></div>
          </div>
        </div>
      </div>
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