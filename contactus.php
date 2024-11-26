<?php
session_start();

// Include the database configuration file
include('database/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Contact Us-Optimal Nutrition Hub</title>
</head>

<body>
    <!-- Navigation bar start -->
    <?php
    include('includes/navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <div class="container row my-5 mx-auto ">
        <!-- Conatct Us section start -->
        <div class="col-md-6 mx-auto">
            <div class="text-center bg-body-tertiary p-3 ">
                <form>
                    <h3 class="">Conatct Us</h3>
                    <h3><b></b></h3>
                    <p>&nbsp</p>
                    <h5><b>Location</b></h5>
                    <p>No 58, Galle Road, Colombo 03<br /> </p>
                    <p>&nbsp</p>
                    <h5><b>Get in touch</b></h5>
                    <p>For Product Advice : 077 556 0022</p>
                    <p>For Delivery Information : 077 112 6970</p>
                    <p>Email : optimalnutritionhub@gmail.com</p>
                    <p>&nbsp</p>
                    <h5><b>Opening Hours</b></h5>
                    <p>Mon to Sat : 9.00AM to 7.00PM</p>
                    <p>Sunday : Closed</p>
                </form>
            </div>
        </div>
        <!-- Conatct Us section end -->

        <!-- Inquiry section start -->
        <div class="col-md-6 mx-auto ">
            <div class="text-center bg-body-tertiary p-3 ">
                <form>
                    <h3 class="">Send Your Inquiry</h3>
                    <div class="m-3">
                        <textarea class="form-control rounded-3" id="exampleFormControlTextarea1" rows="8" placeholder="Type Your Inquiry here"></textarea>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-outline-dark  btn-orange mt-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Inquiry section end -->
    </div>

    <!-- Footer section start -->
    <?php
    include('includes/footer.php');
    ?>
    <!-- Footer section end -->

    <!--Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?php
// Close the database connection
mysqli_close($con);
?>