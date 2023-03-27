<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reviews</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- <a class="navbar-brand" href="#">
    <img src="images/logo_ph.png" width="150" height="150" class="d-inline-block align-top" alt="temp_logo">
  </a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item px-5 mx-5">
        <!-- <img src="images/home.png" width="50" height="50"> -->
        <a class="nav-link" href="index.html"><h2>Home</h2> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item px-5 mx-5">
        <!-- <img src="images/camera.png" width="65" height="65"> -->
        <a class="nav-link" href="photos.html"><h2>Photos</h2></a>
      </li>
      <li class="nav-item active px-5 mx-5">
        <!-- <img src="images/notes.png" width="45" height="45"> -->
        <a class="nav-link" href="reviews.php"><h2>Reviews</h2></a>
      </li>
      <li class="nav-item px-5 mx-5">
        <!-- <img src="images/icon.png" width="45" height="45"> -->
        <a class="nav-link disabled" href="about.html"><h2>About</h2></a> <!-- Temp disable until completion -->
      </li>
    </ul>
  </div>
  </nav>

  <!-- Review Table -->
  <div class="container d-flex justify-content-center px-5 pt-5">
    <!-- 
    <table class="table">
    <thead>
      <tr class='table-light'>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Name</th>
        <th scope="col">Stars</th>
        <th scope="col">Message</th>
      </tr>
    </thead>
    <tbody>
      <tr class='table-info'>
        <th scope="row">1</th>
        <td>Jan 1, 2023</td>
        <td>John Smith</td>
        <td>X/5</td>
        <td>I love these earrings!</td>
      </tr>
      <tr class='table-info'>
        <th scope="row">2</th>
        <td>Jan 1, 2023</td>
        <td>Jane Doe</td>
        <td>X/5</td>
        <td>I love these earrings!</td>
      </tr>
      <tr class='table-info'>
        <th scope="row">3</th>
        <td>Jan 1, 2023</td>
        <td>Bob Jones</td>
        <td>X/5</td>
        <td>I love these earrings!</td>
      </tr>
    </tbody>
    </table> -->  
  </div>

  <div class="container">
    <div class="row">
      <!-- Form column -->
      <div class="col-md-6 border-right">
        <h2>Enter A Review</h2>
        <form action="post-review.php" method="POST">
          <div class="form-group">
            <label for="first_name"></label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter your first name" style="width: 100%">
          </div>
          <div class="form-group">
            <label for="last_name"></label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter your last name" style="width: 100%">
          </div>
          <div class="form-group">
            <label for="review"></label>
            <textarea class="form-control" name="review" id="review-entrytext" rows="5" placeholder="Enter your review (256 Char. Limit)" maxlength="256"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  
      <!-- Posted reviews column -->
      <div class="col-md-6">
        <div class="review-box">
          <h2 style="margin-bottom: 31px;">Posted Reviews</h2>
          <ul class="list-group" id="reviewlist">
            <?php
              // Set up database connection
              $servername = "localhost";
              $username = "root";
              $password = "hman123";
              $dbname = "clayation_db";
              $conn = mysqli_connect($servername, $username, $password, $dbname);

              // Check connection
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }

              // Select all reviews from the "reviews" table
              $sql = "SELECT * FROM reviews";
              $result = mysqli_query($conn, $sql);

              // Output each review as a list item in the review board
              if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                      echo '<li class="list-group-item">';
                      echo '<h4 class="list-group-item-heading">' . $row["first_name"] . ' ' . $row["last_name"] . '</h4>';
                      echo '<p class="list-group-item-text">' . $row["review"] . '</p>';
                      echo '</li>';
                  }
              } else {
                  echo "<li class='list-group-item'>No reviews yet.</li>";
              }

              // Close database connection
              mysqli_close($conn);
            ?>  
          </ul>
        </div>
      </div>

  <!-- Footer -->
  <nav class="navbar fixed-bottom bg-body-tertiary navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid d-flex justify-content-center">
    <a class="navbar-brand" href="#">Contact for Pricing and Inquiries: ereineke@iwu.edu</a>
    <a href="mailto:ereineke@iwu.edu?subject=Clayations Inquiry">Send Email</a>
  </div>
  </nav>
  
<!-- Javascript Stuff -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
