<?php
session_start();
include("koneksi.php");
if (!isset($_SESSION['Email'])) {
  echo "<script> window.open('Login.php','_self') </script>";
}

$user = $_SESSION['Email'];

include("koneksi.php");
$select = "select * from register where Email='$user'";
$run = mysqli_query($conn, $select);
$row_user = mysqli_fetch_array($run);
$Nim = $row_user['Nim'];
$FullName = $row_user['FullName'];
$Kelas = $row_user['Kelas'];
$TL = $row_user['Tanggal_Lahir'];
$Password = $row_user['Password'];
$Status = $row_user['Status'];
$Voted = $row_user['Voted'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Nav</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    * {
      font-family: 'Montserrat', sans-serif;
    }

    .space {
      width: 300px;
      min-height: 300vh;
      background-color: lightseagreen;
      position: fixed;
      overflow: auto;
      text-align: center;
      transition: 0.5s;
      left: -300px;
      /* Inisialisasi posisi awal di luar layar */
    }

    .space.show {
      left: 0;
    }

    .space a {
      display: block;
      color: white;
      font-size: 20px;
      padding: 16px;
      text-decoration: none;
    }

    .space a:hover {
      background-color: #555;
      color: white;
    }

    .card {
      width: 80%;
      max-width: 300px;
      margin: 20px auto;
      padding: 20px;
      box-shadow: 5px 6px 20px lightseagreen;
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
    }

    .card img {
      width: 100%;
      max-width: 150px;
      border-radius: 50%;
      margin: 0 auto 15px;
      display: block;
    }

    .card h6 {
      font-size: 16px;
      margin-bottom: 8px;
      color: #333;
    }
  </style>

  <script>
    $(document).ready(function() {
      $(".toggle-btn").click(function() {
        $(".space").toggleClass("show");
      });
    });
  </script>

</head>

<body>
  <div class="toggle-btn">
    <i class="fas fa-bars"></i>
  </div>

  <div class="space">
    <div class="card">
      <center>
        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
      </center>
      <div class="card-body">
        <h6 class="card-title mt-3">User: <?php echo $user; ?></h6>
        <h6 class="card-title">NIM: <?php echo $Nim; ?></h6>
        <h6 class="card-title">Name: <?php echo $FullName; ?></h6>
        <h6 class="card-title">Class: <?php echo $Kelas; ?></h6>
        <h6 class="card-title">Birthdate: <?php echo $TL; ?></h6>
        <h6 class="card-title">Voted: <?php echo $Voted; ?></h6>
      </div>
    </div>

    <a href="LoginResult.php"><i class="fas fa-poll-h"></i> Result</a>
    <a href="Logout.php"><i class="fas fa-sign-out-alt"></i> LogOut</a>
  </div>

</body>

</html>