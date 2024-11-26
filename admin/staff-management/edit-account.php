<?php
session_start();

// Redirect to the login page if user is not login
if (!isset($_SESSION['staffId'])) {
    header("location:../home-pages/admin-login.php");
    exit();
}

// Include the database configuration file
include('../../database/config.php');

// Check if the form is submitted using Update button
if (isset($_POST['staffUpdate'])) {
    // get user inputs from the form fields
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

    $staffId = $_GET['staffId']; //get staff id form URL

    //check fields are not empty
    if ($fName != '' and $lName != '' and $userName != '' and $password != '' and $staffType != '' and $email != '' and $contactNo != '' and $nic != '' and $addressLine1 != '' and $addressLine2 != '' and $city != '') {

        $staffUpdateQuiry = "UPDATE staff SET staff_fname = '$fName', staff_lname = '$lName', staff_username = '$userName', staff_pwd = '$password', staff_email = '$email', staff_phone = '$contactNo', staff_nic = '$nic', staff_add_line1 = '$addressLine1', staff_add_line2 = '$addressLine2', staff_add_line3 = '$addressLine3', staff_add_line4 = '$city', fk_staff_type_id = '$staffType' WHERE staff_id = $staffId";

        //update user details 
        if (mysqli_query($con, $staffUpdateQuiry)) {
            echo "<script>alert('Staff Update is succefully');</script>";
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

<body style="background-color: white;">
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
    <h1 class="text-center mb-5 mt-auto fw-bold">Edit Account</h>

        <?php
        // get staff user details
        // Check if the 'staffId' parameter is set in the URL
        if (isset($_GET['staffId'])) {
            $staffId = $_GET['staffId']; //get staff id form URL

            $get_user_details = "SELECT staff_fname, staff_lname, staff_username, staff_pwd, staff_email, staff_phone, staff_nic, staff_add_line1,staff_add_line2, staff_add_line3, staff_add_line4, fk_staff_type_id FROM staff WHERE staff_id = $staffId";

            $result = mysqli_query($con, $get_user_details); // Execute query and get the result

            $row_count = mysqli_num_rows($result);
            if ($row_count == 0) { // check if user not exist
                echo "<h2 class='bg-danger text-center mt-5 '> No users yet </h2>";
            } else {
                // fetch user details
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $staff_fname = $row_data['staff_fname'];
                    $staff_lname = $row_data['staff_lname'];
                    $staff_username = $row_data['staff_username'];
                    $staff_pwd = $row_data['staff_pwd'];
                    $staff_email = $row_data['staff_email'];
                    $staff_phone = $row_data['staff_phone'];
                    $staff_nic = $row_data['staff_nic'];
                    $staff_add_line1 = $row_data['staff_add_line1'];
                    $staff_add_line2 = $row_data['staff_add_line2'];
                    $staff_add_line3 = $row_data['staff_add_line3'];
                    $staff_add_line4 = $row_data['staff_add_line4'];
                    $fk_staff_type_id = $row_data['fk_staff_type_id'];
        ?>
                    <div class="container  row my-5 mx-auto ">
                        <div class="wrapper col-md-6 mx-auto ">
                            <form action="#" method="post">

                                <!-- First name -->
                                <div class="input-box">
                                    <input type="text" name="fName" value="<?php echo $staff_fname; ?>" required>
                                </div>
                                <!-- Last name -->
                                <div class="input-box">
                                    <input type="text" name="lName" value="<?php echo $staff_lname; ?>" required>
                                </div>
                                <!-- Username -->
                                <div class="input-box">
                                    <input type="text" name="userName" value="<?php echo $staff_username; ?>" required>
                                </div>
                                <!-- Password -->
                                <div class="input-box">
                                    <input type="password" name="password" value="<?php echo $staff_pwd; ?>" required>
                                </div>
                                <!-- staff type dropdown -->
                                <div>
                                    <select name="staffType" required>
                                        <?php
                                        $staffTypeSelectQuery = "SELECT * FROM staff_type";
                                        // Execute query and get the result
                                        $staffTypeResult = mysqli_query($con, $staffTypeSelectQuery);
                                        // fetch staff types
                                        while ($staffTypeRow = mysqli_fetch_assoc($staffTypeResult)) {
                                            $staff_type_id = $staffTypeRow['staff_type_id'];
                                            $staff_type_name = $staffTypeRow['staff_type_name'];

                                            // select current user staff type from drop down menu
                                            if ($fk_staff_type_id == $staff_type_id) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            // add staff types to dropdown menu
                                            echo "<option $selected value='$staff_type_id'>$staff_type_name</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- E-mail -->
                                <div class="input-box">
                                    <input type="text" name="email" value="<?php echo $staff_email; ?>" required>
                                </div>
                                <!-- Contact no -->
                                <div class="input-box">
                                    <input type="text" name="contactNo" value="<?php echo $staff_phone; ?>" required>
                                </div>
                                <!-- NIC -->
                                <div class="input-box">
                                    <input type="text" name="nic" value="<?php echo $staff_nic; ?>" required>
                                </div>
                                <!-- Address line1 -->
                                <div class="input-box">
                                    <input type="text" name="addressLine1" value="<?php echo $staff_add_line1; ?>" required>
                                </div>
                                <!-- Address line2 -->
                                <div class="input-box">
                                    <input type="text" name="addressLine2" value="<?php echo $staff_add_line2; ?>" required>
                                </div>
                                <!-- Address line3 -->
                                <div class="input-box">
                                    <input type="text" name="addressLine3" value="<?php echo $staff_add_line3; ?>">
                                </div>
                                <!-- City  -->
                                <div class="input-box">
                                    <input type="text" name="city" value="<?php echo $staff_add_line4; ?>" required>
                                </div>
                                <!-- Register button -->
                                <button type="submit" class="btn text-bg-secondary" name="staffUpdate">Update</button>
                            </form>
                        </div>
                    </div>
        <?php }
            }
        } ?>
        <!-- Staff Register form section end -->

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
<?php
// Close the database connection
mysqli_close($con);
?>