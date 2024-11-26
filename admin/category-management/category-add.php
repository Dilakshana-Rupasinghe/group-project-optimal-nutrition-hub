<?php
session_start();

// Redirect to the login page if user is not login
if (!isset($_SESSION['staffId'])) {
    header("location:../home-pages/admin-login.php");
    exit();
}

// Include the database configuration file
include('../../database/config.php');

// Check if the form is submitted
if (isset($_POST['categoryAdd'])) {
    $categoryName = $_POST['categoryName'];

    // Check if the category name is not empty
    if ($categoryName != '') {
        // Check if the category exists
        $categorySelectQuery = "SELECT * FROM category WHERE category_name='$categoryName'";
        $result = mysqli_query($con, $categorySelectQuery);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('{$categoryName} already exists');</script>";
        } else {
            // Insert new category to database
            $categoryInsertQuery = "INSERT INTO category(category_name) VALUES('$categoryName')";
            if (mysqli_query($con, $categoryInsertQuery)) {
                echo "<script>alert('New Category is added Successfully')</script>";
            }
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
    <!-- CSS link -->
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/sign-up.css">
    <!-- JS link -->
    <script src="../../scripts/formValidationScript.js" defer></script>

    <title>Category Add Form-Optimal Nutrition Hub</title>
</head>

<body style="background-color: lightgray;">
    <!-- Navigation bar start -->
    <?php
    include('../../includes/admin-navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- BACK & Register button start -->
    <div class="back-button-container">
        <a href="category-manage.php" class="back-button">Back</a>
    </div>
    <!--  BACK & Register button end -->

    <!-- Category add form section start -->
    <div class="container row my-5 mx-auto py-5 ">
        <div class="wrapper col-md-6 mx-auto">
            <form action="#" method="post" id="categoryAddForm">
                <h2>Add Category</h2>
                <!-- Category name -->
                <div class="input-box">
                    <input type="text" name="categoryName" id="categoryName" placeholder="Category Name">
                </div>
                <button type="submit" class="btn text-bg-secondary" name="categoryAdd">Add</button>
            </form>
        </div>
    </div>
    <!-- Category add form section end -->

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