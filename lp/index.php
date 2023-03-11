<?php

include 'config-pg.php';

?>

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contoh Landing Page</title>

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="css/swiper-bundle.min.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php

  $cardlist = pg_query($db, 'SELECT * FROM "public"."card" ORDER BY "id"');
  if (!$cardlist) {
    echo pg_last_error($db);
    exit;
  }

  ?>

  <!-- Image and text -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="/images/lp-icon-02.svg" width="30" height="30" class="d-inline-block align-top"
        alt="">
      Contoh Landing Page
    </a>
    <a class="btn btn-primary btn-lg" href="#" role="button">Masuk</a>
  </nav>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
<section class="jumbotron text-center">
  <video id="video-background" preload muted autoplay loop>
    <source src="/videos/bg.mp4" type="video/mp4">
  </video>
  <div class="container">
    <h1 class="jumbotron-heading">Contoh Video Jumbotron</h1>
    <p class="lead text-muted">Card sdh pake database PostgreSQL</p>
    <p>
      <a href="#" class="btn btn-primary my-2">Opsi pertama</a>
      <a href="#" class="btn btn-secondary my-2">Opsi kedua</a>
    </p>
  </div>
</section>

  <div class="container swiper">
    <div class="slide-container">
      <div class="card-wrapper swiper-wrapper">
        <?php
        while ($rowcard = pg_fetch_row($cardlist)) {
          echo '<div class="card swiper-slide">';
          echo '<div class="image-box">';
          echo '<img src="' . $rowcard[1] . '" alt="" />';
          echo '</div>';
          echo '<div class="profile-details">';
          echo '<img src="' . $rowcard[1] . '" alt="" />';
          echo '<div class="name-job">';
          echo '<h3 class="name">' . $rowcard[2] . '</h3>';
          echo '<h4 class="job">' . $rowcard[3] . '</h4>';
          echo '</div>';
          echo '</div>';
          echo '</div>';

        }
        ?>
      </div>
      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <div class="swiper-pagination"></div>
    </div>

    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>