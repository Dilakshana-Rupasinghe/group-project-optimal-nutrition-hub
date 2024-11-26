<?php
session_start();

// Redirect to the login page if user is not login
if (!isset($_SESSION['staffId'])) {
    header("location:../home-pages/admin-login.php");
    exit();
}

// Include the database configuration file
include('../../database/config.php');

// delete category if click on delete button
if (isset($_GET['categoryId'])) {
    $categoryId = $_GET['categoryId'];
    $categoryDeleteQuery = "DELETE FROM category WHERE category_id = $categoryId";
    if (mysqli_query($con, $categoryDeleteQuery)) {
        echo "<script>alert('Category is deleted successfully');</script>";
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
    <link rel="stylesheet" href="../../css/staff-management.css">

    <title>Category Manegement-Optimal Nutrition Hub</title>
</head>

<body>
    <!-- Navigation bar start -->
    <?php
    include('../../includes/admin-navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- BACK & Register button start -->
    <div class="back-button-container">
        <a href="category-add.php" class="Registration">ADD Category</a>
        <a href="../home-pages/admin-home.php" class="back-button">Back</a>
    </div>
    <!--  BACK & Register button end -->

    <!-- Staff details  section start -->
    <h2 class="text-center ">Category Details</h2>
    <table>
        <tr>
            <th>Category ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <!-- get value from staff table and staff type table -->
        <?php
        $get_custdetails = "SELECT * FROM category ";  //get user possition from staff type table 
        $result = mysqli_query($con, $get_custdetails);
        $row_count = mysqli_num_rows($result);

        // check the table row count 
        if ($row_count == 0) {
            echo "<h2 class='bg-danger text-center mt-5 '> No category yet </h2>";
        } else {

            while ($row_data = mysqli_fetch_assoc($result)) { //fetch a single row of result data as an associative array
                //asign to database valuwe to variables 
                $category_id = $row_data['category_id'];
                $category_name = $row_data['category_name'];

                echo "<tr>
                    <td>$category_id</td>
                    <td>$category_name</td>
                  
                    <td class='action-links'>
                    <a href='category-edit.php?categoryId=$category_id' class='update'>Update</a>
                    <a href='category-manage.php?categoryId=$category_id' class='deactivate'>Delete</a>
                    </td>
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