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

    <title>FAQ-Optimal Nutrition Hub</title>
</head>

<body>
    <!-- Navigation bar start -->
    <?php
    include('includes/navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- FAQ section start -->
    <div class="col-10 mx-auto mt-5 bg-body-tertiary p-5 ">
        <form>
            <h3><b>FAQ</b></h3>
            <p>&nbsp</p>
            <h5><b>1. Where does Optimal Nutrition Hub deliver to & how much does it cost?</b></h5>
            <p>Optimal Nutrition Hub delivers only Colombo and shipping is Rs.500.00 inside Colombo area. Please
                refer Delivery & Shipping for more information. </p>
            <p>&nbsp</p>
            <h5><b>2. How long does it usually take for an item purchased online to be shipped?</b></h5>
            <p>We strive to deliver orders within 3-4 working days. Please refer Delivery & Shipping for more
                information.</p>
            <p>&nbsp</p>
            <h5><b>3. What if I am not present to receive the package?</b></h5>
            <p>Our company will call you before delivering your order. If you are not available to receive the
                package at the specified delivery address or do not continuously respond to the given contact
                number, you will have to pick up your package from the Supplement Factory store.</p>
            <p>&nbsp</p>
            <h5><b>4. What payment methods do you accept online?</b></h5>
            <p>We currently, only accept Cash on Delivery</p>
            <p>&nbsp</p>
            <h5><b>5. Why do I need to sign-up to make an online purchase?</b></h5>
            <p>Registering with us helps speed up the ordering process for you and allows you to keep track of
                your orders. It also assists in re-ordering as we maintain a record of your previous
                purchases</p>
        </form>
    </div>
    <!-- FAQ section end -->

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