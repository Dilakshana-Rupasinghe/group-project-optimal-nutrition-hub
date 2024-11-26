<?php
session_start();

// Include the database configuration file
include('database/config.php');

//check if the form is subbmited or not
if (isset($_POST['custom_login'])) {

  //add user inputs
  $username = $_POST['username'];
  $password = $_POST['password'];

  //verifi if password store in DB in corect username
  $select_quirey = " SELECT * FROM customer WHERE cust_username= '$username'";

  $result = mysqli_query($con, $select_quirey);
  $row_count = mysqli_num_rows($result);
  $row_data = mysqli_fetch_assoc($result);
  if ($row_count > 0) {
    //check user input password and DB store password are maching or not 
    if ($password == $row_data['cust_pwd']) {
      if ($row_data['cust_is_active'] == 1) { //check if user is active
        $_SESSION['custId'] = $row_data['cust_id']; //store customer id in session
        header("location:index.php");
        exit();
      } else {
        echo "<script>alert('User is Deactive');</script>";
      }
    } else {
      echo "<script>alert('Invalid Password');</script>";
    }
  } else {
    echo "<script>alert('Invalid Credentials');</script>";
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
  <div class="container row my-5 mx-auto ">
    <div class="col-md-6 mx-auto">
      <div class="wrapper">
        <form action="#" method="post" style="margin: 4%;">
          <h1>Login-Optimal Nutrition Hub</h1>
          <div class="input-box">
            <input type="text" name="username" id="username" placeholder="Username" required>
          </div>
          <div class="input-box">
            <input type="password" name="password" id="password" placeholder="Password" required>
          </div>
          <div class="remember-frogot">
            <a href="#"> Fogot password?</a>
          </div>

          <button type="submit" class="btn" name="custom_login"> Login</button>

          <div class="register-link">
            <p> Don't have an account? <a href="sign-up.php"> Sign-up </a></p>
          </div>
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