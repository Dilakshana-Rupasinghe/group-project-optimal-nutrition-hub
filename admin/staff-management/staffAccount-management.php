<?php
session_start();

// Redirect to the login page if user is not login
if (!isset($_SESSION['staffId'])) {
    header("location:../home-pages/admin-login.php");
    exit();
}

// Include the database configuration file
include('../../database/config.php');
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
    <link rel="stylesheet" href="../../css/staff-management.css">

    <title>Sfatt Account Manegement-Optimal Nutrition Hub</title>
</head>

<body>
    <!-- Navigation bar start -->
    <?php
    include('../../includes/admin-navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- BACK & Register button start -->
    <div class="back-button-container">
        <a href="staff-register.php" class="Registration">Register</a>
        <a href="../home-pages/admin-home.php" class="back-button">Back</a>
    </div>
    <!--  BACK & Register button end -->

    <!-- Staff details  section start -->
    <h2 class="text-center ">Staff Management</h2>
    <table>
        <tr>
            <th>Staff ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Staff Type</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <!-- get value from staff table and staff type table -->
        <?php
        $get_userdetails = "SELECT staff_id, staff_fname, staff_email, staff_username, staff_type_name, staff_is_active FROM staff 
            INNER JOIN staff_type ON staff.fk_staff_type_id = staff_type.staff_type_id";  //get user possition from staff type table 
        $result = mysqli_query($con, $get_userdetails);
        $row_count = mysqli_num_rows($result);

        // check the table row count 
        if ($row_count == 0) {
            echo "<h2 class='bg-danger text-center mt-5 '> No users yet </h2>";
        } else {
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) { //fetch a single row of result data as an associative array
                //asign to database valuwe to variables 
                $staff_id = $row_data['staff_id'];
                $staff_fname = $row_data['staff_fname'];
                $staff_email = $row_data['staff_email'];
                $staff_username = $row_data['staff_username'];
                $staff_type_name = $row_data['staff_type_name'];
                $staff_is_active = $row_data['staff_is_active'];
                $number++;

                //check the user is active or deactive
                if ($staff_is_active == 1) {
                    $status = "Active";
                    $invisible = "";
                } else {
                    $status = "Deactivate"; //defoult value should be deactivate
                    $invisible = "invisible";
                }
                echo "<tr>
                    <td>$staff_id</td>
                    <td>$staff_fname</td>
                    <td>$staff_email</td>
                    <td>$staff_username</td>
                    <td>$staff_type_name</td>
                    <td>$status</td>

                    <td class='action-links'>
                    <a href='staff-view.php?staffId=$staff_id' class='view'>View</a> 
                    <a href='edit-account.php?staffId=$staff_id' class='$invisible update'>Update</a>
                    <a href='#' class='$invisible deactivate'>Deactivate</a>
                    </td>
                </tr> 
                    ";
            }
        }
        ?>
    </table>
    <!-- Staff details section ende -->

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