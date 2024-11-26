<?php
session_start();

// Redirect to the login page if user is not login
if (!isset($_SESSION['staffId'])) {
    header("location:../home-pages/admin-login.php");
    exit();
}
?>

<!-- include database connection -->
<?php
include('../../database/config.php')
?>

<!-- item delete if click delete button -->
<?php
if (isset($_GET['ItemId'])) {
    $item_id = $_GET['ItemId'];

    $getitemdelete = " DELETE FROM item WHERE item_id = $item_id";
    if (mysqli_query($con, $getitemdelete)) {
        echo "<script>alert('item is deleted successfully');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/staff-management.css">

    <title>Item Management-Optimal Nutrition Hub</title>

</head>

<body>
    <!-- navigation bar start  -->
    <?php
    include('../../includes/admin-navigation-bar.php');
    ?>
    <!-- navigation bar end -->

    <!-- back & item add button start -->

    <div class="back-button-container">
        <a href="item-add.php" class="Registration">ADD Item</a>
        <a href="../home-pages/admin-home.php" class="back-button">BACK</a>
    </div>




    <!-- back & item-add button end -->
    <h2 class="text-center">Item Details</h2>


    <table>
        <tr>
            <th>Item ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Cost Price</th>
            <th>Quontity</th>
            <th>Discount</th>
            <th>Action</th>
        </tr>
        <!-- get value from item table  -->
        <?php
        $get_itemdetails = "SELECT * FROM item ";
        $result = mysqli_query($con, $get_itemdetails);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2 class='bg-danger text-center mt-5 '> No users yet </h2>";
        } else {
            while ($row_data = mysqli_fetch_assoc($result)) {
                $item_id = $row_data['item_id'];
                $item_name = $row_data['item_name'];
                $item_brand = $row_data['item_brand'];
                $item_cost_price = $row_data['item_cost_price'];
                $item_stock_qty = $row_data['item_stock_qty'];
                $item_discount = $row_data['item_discount'];


                echo "<tr>
                <td>$item_id</td>
                <td class='item-name'>$item_name</td>
                <td>$item_brand</td>
                <td>$item_cost_price</td>
                <td>$item_stock_qty</td>
                <td>$item_discount</td>
                <td class='action-link'>
                    <a href='#.php?itemID=$item_id' class='view'>View</a> 
                    <a href='#.php?ItemID=$item_id' class='update'>Update</a>
                    <a href='item-manage.php?ItemId=$item_id' class='deactivate'>Delete</a>
                </td> 
            </tr>
                ";
            }
        }

        ?>


    </table>
</body>

</html>