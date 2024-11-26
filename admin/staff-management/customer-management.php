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

    <title>Customer Account Manegement-Optimal Nutrition Hub</title>
</head>

<body>
    <!-- Navigation bar start -->
    <?php
    include('../../includes/admin-navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- BACK & Register button start -->
    <div class="back-button-container">
        <a href="../home-pages/admin-home.php" class="back-button">Back</a>
    </div>
    <!--  BACK & Register button end -->

    <!-- Staff details  section start -->
    <h2 class="text-center ">Customer Details</h2>
    <table>
        <tr>
            <th>Custiomer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Status</th>

        </tr>
        <!-- get value from staff table and staff type table -->
        <?php
        $get_custdetails = "SELECT * FROM customer ";  //get user possition from staff type table 
        $result = mysqli_query($con, $get_custdetails);
        $row_count = mysqli_num_rows($result);

        // check the table row count 
        if ($row_count == 0) {
            echo "<h2 class='bg-danger text-center mt-5 '> No users yet </h2>";
        } else {
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) { //fetch a single row of result data as an associative array
                //asign to database valuwe to variables 
                $cust_id = $row_data['cust_id'];
                $cust_name = $row_data['cust_fname'] . ' ' . $row_data['cust_lname'];
                $cust_email = $row_data['cust_email'];
                $cust_username = $row_data['cust_username'];
                $cust_contact = $row_data['cust_phone'];
                $cust_Address = $row_data['cust_add_line1'] . ', ' . $row_data['cust_add_line2'] . ', ' . $row_data['cust_add_line3'] . ', ' . $row_data['cust_add_line4'];
                $cust_is_active = $row_data['cust_is_active'];
                $number++;

                //check the user is active or deactive
                if ($cust_is_active == 1) {
                    $status = "Active";
                } else {
                    $status = "Deactivate";
                }
                echo "<tr>
                    <td>$cust_id</td>
                    <td>$cust_name</td>
                    <td>$cust_email</td>
                    <td>$cust_username</td>
                    <td>$cust_contact</td>
                    <td>$cust_Address</td>
                    <td>$status</td>
                </tr> 
                    ";
            }
        }
        ?>
    </table>
    <!-- Staff details section ende -->

    <!-- Footer section start -->
    <div class="fixed-bottom ">
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
    </div>
    <!-- Footer section end -->

    <!--Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?php
// Close the database connection
mysqli_close($con);
?>