<?php
$alert =false;
    session_start();
    if(!isset($_SESSION['customer'])){
        header("location: customerlogin.php");
        }
    include "extras/database.php";   
    $cusname = $_GET['name'];
    $centername =$_GET['center'];
    $vaccinetype =$_GET['type'];
    $vaccinename =$_GET['vaccine'];
    $dose =$_GET['dose'];
    $status =$_GET['status'];

    $query = "SELECT * FROM `supplier` WHERE `name` = '$vaccinename';";
    $sql=mysqli_query($con,$query);
    $print = mysqli_fetch_assoc($sql);
    $price = $print['price'];

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $uquery = "UPDATE `member` SET `status` = '$status', `dose` = '$dose' WHERE `name` = '$cusname';";
        mysqli_query($con,$uquery);
        $alert =true;


        $qquery = "SELECT * FROM `center_supplier` where `center`='$centername';";
        $qsql = mysqli_query($con,$qquery);
        $qprint = mysqli_fetch_assoc($qsql);
        $newslot = $qprint['slots']-1;
        $quan = $qprint["$vaccinename"]-1;

        $ququery = "UPDATE `center_supplier` SET `slots` = '$newslot',`$vaccinename`='$quan' WHERE `center` = '$centername';";
        mysqli_query($con,$ququery);

        

        if(empty($_POST['credit_txt'])){
            $card = "Debit";
        }
        else{
            $card = "Credit";
        }

        $fquery = "INSERT INTO `transactions` (`from_`, `to_`,`price`,`quantity`, `type`) VALUES ('$cusname','$centername','$price','1','$card');";
        mysqli_query($con,$fquery);
    }
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

    <title>Slot Book</title>
    <link rel="icon" href="extras/vaccine.ico">
    <link rel="stylesheet" href="extras/style.css">
    <link rel="stylesheet" href="extras/style2.css">
    <style>
        #bill_table{
            display:none;
        }

        @media print {
  body * {
    visibility: hidden;
  }
  #bill_table * {
    visibility: visible;;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}


    </style>
    <script>
        function printFunction(){
            document.getElementById("bill_table").style.display = "block";
            window.print();
        }
    </script>
</head>

<body>
    <?php require ("extras/nav.php");

    
    ?>
    <div bgcolor="#f6f6f6" style="color: #333; height: 100%; width: 100%; padding: 10px;" height="100%" width="100%" id="bill_table" >
    <table width="100%" cellspacing="0" style="border: 50px;">
                        <tbody>
                        </tbody>
                    </table>
                </td>
                <td width="5px" style="padding: 0;"></td>
            </tr> 
            <tr>
                <td width="5px" style="padding: 0;"></td>
                <td style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                    <table cellspacing="0" style="border-collapse: collapse; border: 1px solid #000; margin: 0 auto; max-width: 600px;">
                        <tbody>
                            <tr>
                                <td valign="top"  style="padding: 20px;">
                                    <h3
                                        style="
                                            border-bottom: 1px solid #000;
                                            color: #000;
                                            font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                            font-size: 18px;
                                            font-weight: bold;
                                            line-height: 1.2;
                                            margin: 0;
                                            margin-bottom: 15px;
                                            padding-bottom: 5px;
                                        "
                                    >
                                        Bill
                                    </h3>
                                    <table cellspacing="0" style="border-collapse: collapse;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 10px;">From <?php echo $cusname." ".$_SESSION['contact']; ?></td>
                                                <td align="right" style="padding: 10px;">To <?php echo $centername; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 5px 0;">Amount for total vaccines</td>
                                                <td align="right" style="padding: 5px 0;">₹<script> document.write(localStorage.getItem("quantity")*<?php echo $price?>);</script></td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">Amount paid</td>
                                                <td align="right" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">₹<script> document.write(localStorage.getItem("quantity")*<?php echo $price?>);</script></td>
                                            </tr>
                                            <tr>
                                            <td><input type="button" id="print_btn" value="Print" class="btn btn-warning" onclick="window.print()"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="5px" style="padding: 0;"></td>
            </tr>

            <tr style="color: #666; font-size: 12px;">
                <td width="5px" style="padding: 10px 0;"></td>
                <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                    <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                        <tbody>
                            
                        </tbody>
                    </table>
</div>



    <section style="background-color: #eee;">
    <?php
    if($alert){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your slot has been booked!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="printFunction()"></button>
        </div> ';
    }
    ?>
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card" style="background-color: white;">
                        <div class="card-body p-md-5">
                            <div>
                                <h4>Payment Form</h4>
                                <p class="text-muted pb-2">
                                    Booking slot for <?php echo $vaccinename; ?>
                                </p>
                            </div>

                            <div
                                class="px-3 py-4 border border-primary border-2 rounded mt-4 d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <img src="https://i.imgur.com/S17BrTx.webp" class="rounded" width="60" />
                                    <div class="d-flex flex-column ms-4">
                                        <span class="h5 mb-1">To <?php echo $centername; ?></span>
                                        <span class="small text-muted">From <?php echo $cusname." ".$_SESSION['contact']; ?></span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <sup class="dollar font-weight-bold text-muted">₹</sup>
                                    <span class="h2 mx-1 mb-0"><?php echo $price; ?></span>
                                </div>
                            </div>

                            <h4 class="mt-5">Payment details</h4>

                            <form method="post">
                                <input type="number" name="trialnum" id="trialnum" hidden>
                                <div class="mt-4 d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://i.imgur.com/qHX7vY1.webp" class="rounded" width="70" />
                                        <div class="d-flex flex-column ms-3">
                                            <span class="h5 mb-1">Credit Card</span>
                                            <input type="number" id="credit_txt" name="credit_txt" class="form-control"
                                                placeholder="Enter Card number" maxlength="16"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                required>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="number" class="form-control" placeholder="CVC" id="credit_cvc"
                                            style="width: 70px;" maxlength="3"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required>
                                    </div>
                                </div>

                                <script>
                                    window.setInterval(foo, 1000);
                                    foo();
                                    function foo() {
                                        if (document.getElementById('credit_txt').value) {
                                            document.getElementById('debit_txt').required = false;
                                            document.getElementById('debit_cvv').required = false;
                                        }
                                    }
                                </script>

                                <div class="mt-2 d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://i.imgur.com/qHX7vY1.webp" class="rounded" width="70" />
                                        <div class="d-flex flex-column ms-3">
                                            <span class="h5 mb-1">Debit Card</span>
                                            <input type="number" id="debit_txt" name="debit_txt" class="form-control"
                                                placeholder="Enter Card number" maxlength="16"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                required>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="number" class="form-control" placeholder="CVV" id="debit_cvv"
                                            style="width: 70px;" maxlength="3"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required>
                                    </div>
                                </div>
                                <script>
                                    window.setInterval(doo, 1000);
                                    doo();
                                    function doo() {
                                        if (document.getElementById('debit_txt').value) {
                                            document.getElementById('credit_txt').required = false;
                                            document.getElementById('credit_cvc').required = false;
                                        }
                                    }
                                </script>
                                <div class="form-outline">
                                    <input type="email" id="formControlLg" class="form-control form-control-lg mt-3"
                                        placeholder="Enter Email" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg" id="pay_btn">
                                        Proceed to payment <i class="fas fa-long-arrow-alt-right"></i>
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>




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