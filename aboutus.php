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
  <link rel="stylesheet" href="css/footer.css">

  <title>About Us-Optimal Nutrition Hub</title>
</head>

<body>

  <body>
    <!-- Navigation bar start -->
    <?php
    include('includes/navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- About Us section start -->
    <div class="col-10 mx-auto mt-5 bg-body-tertiary p-5 ">
      <form>
        <h3><b>About Us</b></h3>
        <p>Step into a world of unparalleled wellness, where your fitness goals become achievable realities. As Sri
          Lanka's leading Sports Nutrition Distributor, Optimal Nutrition Hub serves as your gateway to a transformative
          journey. We take pride in being the sole authorized distributor for prestigious American brands, offering a
          curated selection of products designed to elevate your performance and fuel your ambitions.</p>
        <h5><b>Our Journey</b></h5>
        <p>Our story is one of unwavering dedication and a relentless pursuit of excellence. We emerged when the
          supplement market was in its infancy, driven by a mission to redefine the industry. For us, it wasn't just
          about sourcing products - it was about establishing a new standard. We committed ourselves to procuring brands
          directly from their origin, ensuring the highest quality and authenticity with every single offering. This
          unwavering commitment is the cornerstone of our company motto: "Do it right or not do it at all!!!"</p>
        <h5><b>Our Mission</b></h5>
        <p>Our dedication has propelled us to the forefront of Sri Lanka's sports nutrition landscape, securing our
          position as the undisputed Number One Provider of Genuine Sports Nutrition. But our mission goes beyond mere
          product offerings. We believe that true success lies in the perfect fusion of superior quality and
          exceptional customer service. From personalized consultations to comprehensive post-purchase support, our
          team of experts is dedicated to guiding you on your journey towards optimal health and performance.</p>
        <p>Choosing Optimal Nutrition Hub is choosing the path of certainty. Every product undergoes meticulous
          quality control and origin verification, ensuring its authenticity and effectiveness. We don't just offer
          products; we offer assurance. You can rest assured that every purchase is backed by our unwavering guarantee
          of seamless verification with the brand's mother company. In a market saturated with choices, we stand out as
          a beacon of trust and excellence, a trusted partner in your pursuit of a healthier, more vibrant you.</p>
        <p>Join us on this transformative journey. Let Optimal Nutrition Hub be your fuel, your guide, and your
          inspiration. Unleash your potential and experience the difference that genuine, high-quality sports
          nutrition can make.</p>
      </form>
    </div>
    <!-- About Us section end -->

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