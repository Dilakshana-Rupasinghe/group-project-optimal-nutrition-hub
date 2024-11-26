<?php
session_start();

// Redirect to the login page if user is not login
if (!isset($_SESSION['staffId'])) {
    header("location:admin-login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Google Material icons CSS link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/admin-home.css">

    <title>Cashier Home-Optimal Nutrition Hub</title>
</head>

<body>
    <!-- Navigation bar start -->
    <?php
    include('../../includes/admin-navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- Cashier panel section start -->
    <div class="container-fluid text-center my-5  p-0">
        <div class="m-auto mb-3 ">
            <h2>Cashier Panel</h2>
        </div>
        <div class="row align-items-center  mx-auto bg-body-secondary   justify-content-center py-3  ">
            <a href="" class="nav-link col-lg-2 btn-module">
                <div class="module-content">
                    <div><i class="material-icons" style="font-size: 40px;color:white;">group_add</i></div>
                    <div>Staff Management</div>
                </div>
            </a>
            <a href="" class="nav-link col-lg-2 btn-module">
                <div class="module-content">
                    <div><i class="material-icons" style="font-size: 40px;color:white;">category</i></div>
                    <div>Category Management</div>
                </div>
            </a>
            <a href="" class="nav-link col-lg-2 btn-module">
                <div class="module-content">
                    <div><i class="material-icons" style="font-size: 40px;color:white;">inventory_2</i></div>
                    <div>Item Management</div>
                </div>
            </a>
            <a href="" class="nav-link col-lg-2 btn-module">
                <div class="module-content">
                    <div><i class="material-icons" style="font-size: 40px;color:white;">shopping_cart_checkout</i>
                    </div>
                    <div>Cart & Checkout Handling</div>
                </div>
            </a>
            <a href="" class="nav-link col-lg-2 btn-module">
                <div class="module-content">
                    <div><i class="material-icons" style="font-size: 40px;color:white;">notifications_active</i>
                    </div>
                    <div>News & Notification Management</div>
                </div>
            </a>

        </div>
    </div>
    <!-- Cashier panel section start -->

    <!-- Footer section start -->
    <footer class="bettle fixed-bottom ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2023 Optimal Nutrition Hub | Devoloped by -
                        <a href="#"> BattleShip</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer section end -->

    <!--Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>