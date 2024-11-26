<?php
session_start();

// Include the database configuration file
include('database/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/footer.css">
  <title>Home-Optimal Nutrition Hub</title>
</head>

<body>
  <!-- Navigation bar start -->
  <?php
  include('includes/navigation-bar.php');
  ?>
  <!-- Navigation bar end -->

  <!-- Search bar start -->
  <?php
  include('includes/search-bar.php');
  ?>
  <!-- Search bar end -->


  <!-- product section start -->
  <div class="container">
    <!-- all products start -->
    <?php
    if (!isset($_GET['categoryId'])) {
      if (!isset($_GET['search'])) { ?>
        <div class="col-lg-6 m-auto text-center my-3">
          <h1>Products</h1>
        </div>
        <div class="row">
          <?php
          $itemSelectQuery = "SELECT * FROM item ORDER BY rand()";
          getItemCard($con, $itemSelectQuery); //call function
          ?>
        </div>
    <?php }
    }
    ?>
    <!-- all products end -->

    <!-- products in select category start -->
    <?php
    if (isset($_GET['categoryId'])) {
      $categoryId = $_GET['categoryId']; ?>
      <div class="col-lg-6 m-auto text-center my-3">
        <h1><?php echo $_GET['categoryName']; ?></h1>
      </div>
      <div class="row">
        <?php
        $itemSelectQuery = "SELECT * FROM item WHERE fk_category_id = $categoryId";
        getItemCard($con, $itemSelectQuery); //call function
        ?>
      </div>
    <?php }
    ?>
    <!-- products in select category end -->

    <!-- search products start -->
    <?php
    if (isset($_GET['search'])) {
      $itemName = $_GET['searchName']; ?>
      <div class="col-lg-6 m-auto text-center my-3">
        <h1><?php echo "Searching result for \"$itemName\""; ?></h1>
      </div>
      <div class="row">
        <?php
        $itemSelectQuery = "SELECT * FROM item WHERE item_name LIKE '%$itemName%'";
        getItemCard($con, $itemSelectQuery); //call function
        ?>
      </div>
    <?php }
    ?>
    <!-- search products end -->
  </div>
  <!-- product section end -->

  <!-- Footer section start -->
  <?php
  include('includes/footer.php');
  ?>
  <!-- Footer section end -->

  <!-- Bootstrap JS link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?php
// Close the database connection
mysqli_close($con);
?>