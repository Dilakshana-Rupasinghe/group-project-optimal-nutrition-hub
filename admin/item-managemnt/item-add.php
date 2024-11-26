<?php
session_start();

// Redirect to the login page if user is not login
if (!isset($_SESSION['staffId'])) {
    header("location:../home-pages/admin-login.php");
    exit();
}

// Include the database configuration file
include('../../database/config.php');

// Check if form is submitted
if (isset($_POST['itemAdd'])) {
    // Assign user input
    $itemName = $_POST['itemName'];
    $categoryId = $_POST['category'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $costPrice = $_POST['costPrice'];
    $sellPrice = $_POST['sellPrice'];
    $discount = $_POST['discount'];
    $stockQty = $_POST['stockQty'];

    // Access image name
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    // Access image temp name
    $tmp_image1 = $_FILES['image1']['tmp_name'];
    $tmp_image2 = $_FILES['image2']['tmp_name'];

    // check if not empty
    if ($itemName != '' and $categoryId != '' and $brand != '' and $description != '' and $costPrice != '' and $sellPrice != '' and $discount != '' and $stockQty != '' and $image1 != '' and $image2 != '') {
        move_uploaded_file($tmp_image1, "../../Images/products/$image1");
        move_uploaded_file($tmp_image2, "../../Images/products/$image2");

        $itemInsertQuery = "INSERT INTO item (item_name, item_image1, item_image2, item_brand, item_description, item_sell_price, item_cost_price, item_stock_qty, item_discount, item_date_added, fk_category_id) VALUES ('$itemName', '$image1', '$image2', '$brand', '$description', '$sellPrice', '$costPrice', '$stockQty', '$discount', NOW(), $categoryId)";
        // insert new item to database
        if (mysqli_query($con, $itemInsertQuery)) {
            echo "<script>alert('New Item is added succefully');</script>";
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

    <title>Item Add Form-Optimal Nutrition Hub</title>
</head>

<body style="background-color: lightgray;">
    <!-- Navigation bar start -->
    <?php
    include('../../includes/admin-navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- item add form section start -->
    <div class="container  row my-5 mx-auto">
        <div class="wrapper col-md-6 mx-auto">
            <form action="#" method="post" enctype="multipart/form-data">
                <h2>Add Item</h2>
                <!-- Name -->
                <div class="input-box">
                    <input type="text" name="itemName" id="itemName" placeholder="Name" required>
                </div>
                <!-- Image 1 -->
                <label class="" for="image1">Upload Image</label>
                <div class="input-file-box mt-0 ">
                    <input class="" type="file" name="image1" id="image1" required>
                </div>
                <!-- Image 2 -->
                <label class="" for="image2">Upload Image</label>
                <div class="input-file-box mt-0 ">
                    <input class="" type="file" name="image2" id="image2" required>
                </div>
                <!-- Category dropdown -->
                <div>
                    <select name="category" required>
                        <option selected value=''>Select Category</option>
                        <?php
                        $categorySelectQuery = "SELECT * FROM category ORDER BY category_name";
                        // Execute query and get the result
                        $result = mysqli_query($con, $categorySelectQuery);
                        // Fetch Category from database
                        while ($row = mysqli_fetch_assoc($result)) {
                            // add category to dropdown menu
                            echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- Brand -->
                <div class="input-box">
                    <input type="text" name="brand" id="brand" placeholder="Brand" required>
                </div>
                <!-- Description -->
                <textarea style="height: 120px;" name="description" id="description" placeholder="Description" rows="3" required></textarea>
                <!-- Cost price -->
                <div class="input-box mt-2">
                    <input type="text" name="costPrice" id="costPrice" placeholder="Cost Price" required>
                </div>
                <!-- Sell price -->
                <div class="input-box">
                    <input type="text" name="sellPrice" id="sellPrice" placeholder="Sell Price" required>
                </div>
                <!-- Discount -->
                <div class="input-box">
                    <input type="text" name="discount" id="discount" placeholder="Discount" required>
                </div>
                <!-- Stock quantity -->
                <div class="input-box">
                    <input type="text" name="stockQty" id="stockQty" placeholder="Stock Quantity" required>
                </div>

                <button type="submit" class="btn text-bg-secondary" name="itemAdd">Add</button>
            </form>
        </div>
    </div>
    <!-- item add form section end -->

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