<?php
session_start();

// Include the database configuration file
include('database/config.php');


//check if the form is submited
if (isset($_POST['customersing'])) {
  // add user inputs

  $email = $_POST['email'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $phoneNumber = $_POST['phoneNumber'];
  $addressLine1 = $_POST['addressLine1'];
  $addressLine2 = $_POST['addressLine2'];
  $addressLine3 = $_POST['addressLine3'];
  $city = $_POST['city'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  //check field not empty
  if ($email != '' and $firstName != '' and $lastName != '' and $phoneNumber != '' and $addressLine1 != '' and $addressLine2 != '' and $city != '' and $username != '' and $password != '') {

    $customerInsertQuiry = " INSERT INTO customer(cust_fname, cust_lname, cust_username, cust_pwd, cust_email, cust_phone, cust_add_line1, cust_add_line2, cust_add_line3, cust_add_line4) VALUES ('$firstName' , '$lastName' , '$username' , '$password' , '$email', '$phoneNumber' , '$addressLine1' , '$addressLine2' , '$addressLine3' , '$city' ) ";

    //insert user details into database 
    // this code checks if the execution of the SQL query 
    if (mysqli_query($con, $customerInsertQuiry)) {
      echo "<script>alert('sign-UP is succefully');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/sign-up.css">

  <title>SingUp-Optimal Nutrition Hub</title>
</head>

<body style="background: rgb(255, 224, 213);">

  <!-- Navigation bar start -->
  <?php
  include('includes/navigation-bar.php');
  ?>
  <!-- Navigation bar end -->

  <!-- Sign up section start -->
  <div class="container row my-5 mx-auto">
    <div class="col-md-6 mx-auto">
      <div class="wrapper">
        <form action="#" method="post">
          <h2>Sign up-Optimal Nutrition Hub</h2>

          <div class="input-box">
            <input type="email" placeholder="@Email" name="email" id="email" required>
          </div>

          <div class="input-box">
            <input type="text" placeholder="First Name" name="firstName" id="firstName" required>
          </div>

          <div class="input-box">
            <input type="text" placeholder="Last Name" name="lastName" id="lastName" required>
          </div>

          <div class="input-box">
            <input type="text" placeholder="Phone Number" name="phoneNumber" id="phoneNumber" required>
          </div>

          <div class="input-box">
            <input type="text" placeholder="Address Line 1" name="addressLine1" id="addressLine1" required>
          </div>

          <div class="input-box">
            <input type="text" placeholder="Address Line 2" name="addressLine2" id="addressLine2" required>
          </div>

          <div class="input-box">
            <input type="text" placeholder="Address Line 3" name="addressLine3" id="addressLine3">
          </div>

          <div class="input-box">
            <input type="text" placeholder="City" name="city" id="city" required>
          </div>

          <div class="input-box">
            <input type="text" placeholder="Username" name="username" id="username" required>
          </div>

          <div class="input-box">
            <input type="password" placeholder="Password" name="password" id="password" required>
          </div>

          <button type="submit" class="btn" name="customersing"> Sign Up</button>

          <div class="login-link">
            <p> have an account? <a href="Login.php"> Login </a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Sign up section end -->

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