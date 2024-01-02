<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login Success</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/panel.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .card {
      margin: 0px;
      padding: 10px;
      box-shadow: 5px 6px 20px lightseagreen;
      width: 150px;
      /* Adjust the width as needed */


    }

    .card img {
      width: 100%;
      height: 120px;
    }

    .row {
      padding: 1px;
    }

    .fixed-nav {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      background-color: blue;
      padding: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      top: 0;
      left: 0;
      width: 100%;
      background: blue;
      color: white;
      text-align: center;
      padding: 10px;
      z-index: 1000;
    }
  </style>
</head>

<body>
  <div class="fixed-nav">
    <?php include "Loginnav.php"; ?>E-voting
  </div>
  <div class="container-fluid" style="position: relative; z-index: 1;">
    <!--container-fluid ========================php====================== -->
    <?php
    include("koneksi.php");
    $query = "select * from register";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
    $RStatus = $row['Status'];
    if ($RStatus == 'ON') {
      $view = "select * from kandidat";
      $run1 = mysqli_query($conn, $view);

      $count = 0; // Counter to keep track of cards in each row

      while ($row1 = mysqli_fetch_array($run1)) {
        $id = $row1['id_nomine'];
        $Nim = $row1['Nim'];
        $FullName1 = $row1['FullName'];
        $Image = $row1['Image'];
        $Votes = $row1['Votes'];
    ?>
        <!-- ========================php====================== -->
        <?php if ($count % 2 == 0) : ?>
          <div class="row">
          <?php endif; ?>
          <div class="col-md-6 card">
            <h4 style="text-transform: capitalize;">
              <!-- ========================php====================== -->
              <i class='fab fa-<?php echo $id; ?>'></i> <?php echo $id; ?>
              <!-- ========================php====================== -->
            </h4>
            <center>
              <img class="card-img-top" src="upload/<?php echo $Image; ?>" alt="Card image">
            </center>
            <div class="card-body">
              <h6 class="card-title" style="text-transform: capitalize;">Nim: <?php echo "$Nim"; ?></h6>
              <h6 class="card-title" style="text-transform: capitalize;">Name: <?php echo "$FullName1"; ?></h6>
              <a href="LoginVoteS.php?Party=<?php echo $FullName1; ?>" class="btn btn-primary" style="width: 100%;">Vote </a>
            </div>
          </div>
          <?php if ($count % 2 != 0 || $count == mysqli_num_rows($run1) - 1) : ?>
          </div>
        <?php endif; ?>
        <?php $count++; ?>
    <?php
      }
    } else {
      echo "<br><br><br><br>";
      echo "<center style='margin-left: 270px;color:red;'><h3>Voting is No Available.</h3></center>";
    } ?>
  </div>
  <br>
</body>

</html>