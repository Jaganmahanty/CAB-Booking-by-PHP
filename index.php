<!DOCTYPE html>

<html>

<head>

  <title> Cab Booking Module </title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">

</head>

<body>

  <!-- Navbar Control Started -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">
      <a class="navbar-brand" href="#">Cab Booking System : )</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="AdminLogin.php">Login As Admin</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="CustLogin.php">Login As Customer</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contactUs.php">Contact Us . .</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us . .</a>
          </li>

        </ul>

        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-primary" type="submit">Search</button>

        </form> -->
      </div>
    </div>
  </nav>

  <!-- Navbar Control Started -->

  <!-- auto image slider carousel slide -->

  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/cab1.jpg" alt="Los Angeles" width="1100" height="500">
        <div class="carousel-caption">
          <h3>Rolls-Royce Phantom</h3>
          <p>Strive for perfection in everything you do</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="images/cab2.jpg" alt="Chicago" width="1100" height="500">
        <div class="carousel-caption">
          <h3>Mercedes_Benz AMG GT</h3>
          <p>DESIRE for the Extraordinaire</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="images/cab3.jpg" alt="New York" width="1100" height="500">
        <div class="carousel-caption">
          <h3>Mercedes_Benz S</h3>
          <p>The Best or Nothing</p>
        </div>
      </div>
    </div>

    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>

    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>


  <section class="my-5">
    <div class="py-3">
      <h2 class="text-center">We are everywhere</h2>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-12">
          <div class="card">
            <img class="card-img-top" src="images/cab101.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">For any budget</h4>
              <p class="card-text">From Bikes and Autos to Prime Sedans and Prime SUVs, you will find a ride in your
                budget at your convenience any time.</p>
              <a href="#" class="btn btn-dark">View More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12">
          <div class="card">
            <img class="card-img-top" src="images/cab102.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">For any distance</h4>
              <p class="card-text">Book rides within the city with Daily, or take a trip to your favourite destinations
                outside the city with Outstation.</p>
              <a href="#" class="btn btn-dark">View More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12">
          <div class="card">
            <img class="card-img-top" src="images/cab103.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">For any duration</h4>
              <p class="card-text">Easily plan a day out without having to worry about conveyance with an hour-based
                package from Rental.</p>
              <a href="#" class="btn btn-dark">View More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <p class="p-2 bg-dark text-white text-center">All Rights Reserved By @Cab_Booking_Service>> </p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>