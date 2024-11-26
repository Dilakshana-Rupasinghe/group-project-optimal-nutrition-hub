<?php
session_start();

// Redirect to the login page if user is not login
if (!isset($_SESSION['staffId'])) {
    header("location:home-pages/admin-login.php");
    exit();
}

// Redirect to if logout button id clicked
if (isset($_POST['logout'])) {
    session_destroy(); // Destroy the session
    header("location:home-pages/admin-login.php");
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
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/login.css">

    <title>Admin Home-Optimal Nutrition Hub</title>
</head>

<body style="background-color: lightgray;">
    <!-- Navigation bar start -->
    <nav class="navbar navbar-expand-lg bg-body-secondary  sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-5 me-auto " href="">
                <img src="../images/logo.svg" alt="logo" class="logo ">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right item start -->
                <ul class="navbar-nav ms-auto ">

                    <li class="nav-item">
                        <a class="nav-link" href="admin-logout.php"><img src="../icons/profile-line.svg" style="width: 32px;"></a>
                    </li>
                </ul>
                <!-- Right item end -->
            </div>
        </div>
    </nav>
    <!-- Navigation bar end -->
        
    <!-- back button start -->
    <div class="back-button-container">
            <a href="../admin/home-pages/admin-home.php" class="back-button"> BACK</a>
        </div>
    <!-- back button end -->

    <!-- Admin logout section start -->
    <div class="container row my-5 mx-auto p-5">
        <div class="wrapper col-md-6 mx-auto p-5">
            <form action="#" method="post" style="margin: 4%;">
                <h1>You are Login to the system</h1>
                <!-- logout button -->
                <button type="submit" class="btn text-bg-secondary" name="logout"> Logout</button>
            </form>
        </div>
    </div>
    <!-- Admin logout section end -->

    <!-- Footer section start -->
    <footer class="bettle fixed-bottom">
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