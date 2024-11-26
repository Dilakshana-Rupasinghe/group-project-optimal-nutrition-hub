<?php
session_start();

// Include the database configuration file
include('database/config.php');

// Redirect to the login page if user is not login
if (!isset($_SESSION['custId'])) {
  header("location:Login.php");
  exit();
}

// Redirect to if logout button id clicked
if (isset($_POST['custLogout'])) {
  session_destroy(); // Destroy the session
  header("location:index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/footer.css">

  <title>Login-Optimal Nutrition Hub</title>
</head>

<body>
  <!-- Navigation bar start -->
  <?php
  include('includes/navigation-bar.php');
  ?>
  <!-- Navigation bar end -->

  <!-- Login section start -->
  <div class="container row my-5 mx-auto">
    <div class="col-md-6 mx-auto">
      <div class="wrapper">
        <form action="#" method="post" style="margin: 4%;">
          <h1>My Profile</h1>
          <h3>You are login to the system</h3>
          <button type="submit" class="btn mt-5 " name="custLogout"> Logout</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Login section end -->

  <!-- Footer section start -->
  <?php
  include('includes/footer.php');
  ?>
  <!-- Footer section end -->

  <!--Bootstrap JS link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?php
// Close the database connection
mysqli_close($con);
?>