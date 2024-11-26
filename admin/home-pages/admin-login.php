<?php
// Include the database configuration file
include('../../database/config.php');
session_start();

//check if the form is subbmited or not
if (isset($_POST['staff_login'])) {

    //add user inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    //verifi if password store in DB in corect username
    $select_quirey = "SELECT * FROM staff WHERE staff_username = '$username'";

    $result = mysqli_query($con, $select_quirey);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    if ($row_count > 0) {
        //check user input password and DB store password are maching or not 
        if ($password == $row_data['staff_pwd']) {
            if ($row_data['staff_is_active'] == 1) { //check if user is active

                $_SESSION['staffId'] = $row_data['staff_id']; // store staff id in session
                $staff_type_id = ($row_data['fk_staff_type_id']);

                // Redirect to the relevant home page according to staff type id
                if ($staff_type_id == 1000) {
                    header("location:admin-home.php");
                    exit();
                } elseif ($staff_type_id == 1001) {
                    header("location:cashier-home.php");
                    exit();
                } elseif ($staff_type_id == 1002) {
                    header("location:inventory-manager-home.php");
                    exit();
                } elseif ($staff_type_id == 1003) {
                    header("location:deliver-home.php");
                    exit();
                }
            } else {
                echo "<script>alert('User is Deactive');</script>";
            }
        } else {
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials');</script>";
    }
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
    <link rel="stylesheet" href="../../css/login.css">

    <title>Admin Home-Optimal Nutrition Hub</title>
</head>

<body style="background-color: lightgray;">
    <!-- Navigation bar start -->
    <?php
    include('../../includes/admin-navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- Admin login section start -->
    <div class="container row my-5 mx-auto ">
        <div class="wrapper col-md-6 mx-auto">
            <form action="#" method="post" style="margin: 4%;">
                <h1>Login-Optimal Nutrition Hub</h1>
                <div class="input-box">
                    <input type="text" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="remember-frogot">
                    <a href="#"> Fogot password?</a>
                </div>
                <!-- login button -->
                <button type="submit" class="btn text-bg-secondary" name="staff_login"> Login</button>
            </form>
        </div>
    </div>
    <!-- Admin login section end -->

    <!-- Footer section start -->
    <footer class="bettle">
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
<?php
// close database connection
mysqli_close($con);
?>