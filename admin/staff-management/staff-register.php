<?php
session_start();

// Redirect to the login page if user is not login
if (!isset($_SESSION['staffId'])) {
    header("location:../home-pages/admin-login.php");
    exit();
}

// Include the database configuration file
include('../../database/config.php');

// Check if the form is submitt
if (isset($_POST['staffRegister'])) {
    // add user inputs

    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $staffType = $_POST['staffType'];
    $email = $_POST['email'];
    $contactNo = $_POST['contactNo'];
    $nic = $_POST['nic'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $addressLine3 = $_POST['addressLine3'];
    $city = $_POST['city'];

    //check field not empty
    if ($fName != '' and $lName != '' and $userName != '' and $password != '' and $staffType != '' and $email != '' and $contactNo != '' and $nic != '' and $addressLine1 != '' and $addressLine2 != '' and $city != '') {

        $staffInsertQuiry = " INSERT INTO staff (staff_fname, staff_lname, staff_username, staff_pwd, staff_email, staff_phone, staff_hire_date, staff_nic, staff_add_line1, staff_add_line2, staff_add_line3, staff_add_line4, fk_staff_type_id) VALUES ('$fName', '$lName', '$userName', '$password', '$email', '$contactNo', NOW(), '$nic', '$addressLine1', '$addressLine2', '$addressLine3', '$city', $staffType ) ";

        //insert user details into database 
        if (mysqli_query($con, $staffInsertQuiry)) {
            echo "<script>alert('Staff Registration is succefully');</script>";
        }
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
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/sign-up.css">

    <title>Staff Register Form-Optimal Nutrition Hub</title>
</head>

<body style="background-color: lightgray;">
    <!-- Navigation bar start -->
    <?php
    include('../../includes/admin-navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- BACK button start -->
    <div class="back-button-container">
        <a href="staffAccount-management.php" class="back-button">Back</a>
    </div>
    <!-- BACK button end -->

    <!-- Staff Register form section start -->
    <div class="container  row my-5 mx-auto">
        <div class="wrapper col-md-6 mx-auto">
            <form action="#" method="post">
                <h2>Register Staff</h2>

                <!-- First name -->
                <div class="input-box">
                    <input type="text" name="fName" id="fName" placeholder="First Name" required>
                </div>
                <!-- Last name -->
                <div class="input-box">
                    <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                </div>
                <!-- Username -->
                <div class="input-box">
                    <input type="text" name="userName" id="userName" placeholder="Username" required>
                </div>
                <!-- Password -->
                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <!-- staff type dropdown -->
                <div>
                    <select name="staffType" required>
                        <option selected value=''>Select Staff Type</option>
                        <?php
                        $staffTypeSelectQuery = "SELECT * FROM staff_type";
                        // Execute query and get the result
                        $staffTypeResult = mysqli_query($con, $staffTypeSelectQuery);
                        // fetch staff types
                        while ($staffTypeRow = mysqli_fetch_assoc($staffTypeResult)) {
                            //add staff types to dropdown menu
                            echo "<option value='{$staffTypeRow['staff_type_id']}'>{$staffTypeRow['staff_type_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- E-mail -->
                <div class="input-box">
                    <input type="text" name="email" id="email" placeholder="E-mail" required>
                </div>
                <!-- Contact no -->
                <div class="input-box">
                    <input type="text" name="contactNo" id="contactNo" placeholder="Contact No" required>
                </div>
                <!-- NIC -->
                <div class="input-box">
                    <input type="text" name="nic" id="nic" placeholder="NIC" required>
                </div>
                <!-- Address line1 -->
                <div class="input-box">
                    <input type="text" name="addressLine1" id="addressLine1" placeholder="Address Line-1" required>
                </div>
                <!-- Address line2 -->
                <div class="input-box">
                    <input type="text" name="addressLine2" id="addressLine2" placeholder="Address Line-2" required>
                </div>
                <!-- Address line3 -->
                <div class="input-box">
                    <input type="text" name="addressLine3" id="addressLine3" placeholder="Address Line-3">
                </div>
                <!-- City  -->
                <div class="input-box">
                    <input type="text" name="city" id="city" placeholder="City" required>
                </div>
                <!-- Register button -->
                <button type="submit" class="btn text-bg-secondary" name="staffRegister">Register</button>
                <!-- Admin logon link -->
                <div class="login-link">
                    <p> Have an account? <a href="../home-pages/admin-login.php"> Login </a></p>
                </div>
            </form>
        </div>
    </div>
    <!-- Staff Register form section end -->

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
// Close the database connection
mysqli_close($con);
?>