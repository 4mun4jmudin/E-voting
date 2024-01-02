<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Admin Panel</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='adminPanel.css'>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src='main.js'></script>
  <link rel="stylesheet" href="style/panel.css">
</head>
<style>
  .card1 {
    padding: 20px;
    background: #ffffff;
    border-radius: 5px;
    box-shadow: 5px 6px 15px lightseagreen;
    /* margin-bottom: 1rem; */
  }

  .card {
    padding: 20px;
  }
 
</style>

<body>

  <?php include 'adminPanelnav.php'; ?>
  <!-- =================== -->
  <?php
  include("koneksi.php");
  $select = "select * from admin where Username='$User'";
  $run = mysqli_query($conn, $select);

  $row_user = mysqli_fetch_array($run);
  $FullName = $row_user['FullName'];
  // $Status=$row_user['Status'];
  //      $Email=$row_user['Email'];
  //      $DOB=$row_user['DOB'];
  //      $Password=$row_user['Password'];
  $Query = "select * from register ";
  $run1 = mysqli_query($conn, $Query);
  $row1 = mysqli_fetch_array($run1);

  $Status = $row1['Status'];
  ?>

  <div class="content">
    <h2>Profile :</h2>
    <div style="display: flex;">
      <?php echo date('D,d-M-y'); ?> &nbsp;<div class="waktu" id="current-time"> </div>
    </div>
    <hr>
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card1">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4 style="text-transform: capitalize;"><?php echo $FullName; ?></h4>
                  <p class="text-secondary mb-1">Full Stack Developer</p>

                  <a href="adminPanel.php?str=<?php echo $Status ?>" class="btn btn-primary">Voting <?php echo $Status ?></a>
                  <a href="adminPanel.php?stp=<?php echo $Status ?>" class="btn btn-danger">Voting Stop</a>

                  <!-- =========================Voting Start======================= -->
                  <?php
                  if (isset($_GET['str'])) {
                    $str_Status = $_GET['str'];
                    $update = "update register set Status='ON' where Status='$str_Status'";
                    $run_str = mysqli_query($conn, $update);
                    if ($run_str === true) {
                      echo "<div style='color:green;text-align:center;'>Voting Start Successfully </div> ";
                    } else {
                      echo "<div style='color:red;text-align:center;'>Try Again</div>" . mysqli_error($conn);
                    }
                  }
                  ?>
                  <!-- =========================Voting Start======================= -->

                  <!-- =========================Voting Stop======================= -->
                  <?php
                  if (isset($_GET['stp'])) {
                    $stp_Status = $_GET['stp'];
                    $update = "update register set Status='OFF' where Status='$stp_Status'";
                    $run_stp = mysqli_query($conn, $update);
                    if ($run_stp === true) {
                      echo "<div style='color:green;text-align:center;'>Voting Stop Successfully</div> ";
                    } else {
                      echo "<div style='color:red;text-align:center;'>Try Again</div>" . mysqli_error($conn);
                    }
                  }
                  ?>
                  <!-- =========================Voting Stop======================= -->

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h5 class="mb-0">Full Name</h5>
                </div>
                <div class="col-sm-9 text-secondary" style="text-transform: capitalize;">
                  <?php echo $FullName; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h5 class="mb-0">Email</h5>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo "$User"; ?>
                </div>
              </div>
              <hr>

              <div>
                <a href="addadmin.php" class="btn btn-primary" style="float: right;">Add New Admin</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><br>
    <hr><br>

    <!-- ==============form for Nominee================================ -->

    <form action="" method="POST" enctype="multipart/form-data">
      <h4 style="font-weight: bold;">Tambah Kandidat :</h4>
      <hr>
      <label for="FullName"><b>Nim</b></label>
      <input type="text" placeholder="Enter Name" name="FullName" required>

      <label for="PartyName"><b>Nama Lengkap</b></label>
      <input type="text" placeholder="Enter Nama Lengkap" name="PartyName" required>

      <label for="visi"><b>Visi</b></label>
      <input type="text" placeholder="Enter visi" name="visi" required>

      <label for="misi"><b>Misi</b></label>
      <input type="text" placeholder="Enter misi" name="misi" required>

      <label for="Image"><b>Custom Image</b></label>
      <input type="file" name="Image" accept="image/*">
      <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
      <hr>
      <button type="submit" name="submit" class="btn btn-success" style="float: right;width: 120px;margin-left: 20px;">Tambah</button>
      <button type="reset" class="btn btn-primary" style="float: right;width: 120px;">Reset</button>
    </form>

    <!-- ==========form PHP=========== Nominee ADD=================== -->

    <?php
    include("koneksi.php");
    if (isset($_POST['submit'])) {
      $FullName = $_POST['FullName'];
      $PartyName = $_POST['PartyName'];
      $Visi = $_POST['visi'];
      $Misi = $_POST['misi'];
      // echo "<pre>";
      // print_r($_FILES['Image']);
      // echo "</pre>";
      $Image = $_FILES['Image']['name'];
      $tmp_name = $_FILES['Image']['tmp_name'];
      // $Status = $_POST['Status'];

      $insert = "insert into kandidat(FullName,PartyName,visi,misi,Image,Votes,Status)values('$FullName','$PartyName','$Visi','$Misi','$Image',0,'OFF')";
      $run = mysqli_query($conn, $insert);
      if ($run === true) {
        echo "<H5 style='color:green;text-align:center;'>Successfully Inseted</h5>";
        move_uploaded_file($tmp_name, "upload/$Image");
      } else {
        echo "<H5 style='color:red;text-align:center;'>Not Inseted Alredy Added</h5>"; //.mysqli_error($conn)
      }
    }
    ?>
    <!-- ==========form PHP============================== -->

  </div>
  <script>
    // Function to update the current time
    function updateTime() {
      var currentTime = new Date();
      var hours = currentTime.getHours();
      var minutes = currentTime.getMinutes();
      var seconds = currentTime.getSeconds();
      var ampm = hours >= 12 ? 'PM' : 'AM';

      hours = hours % 12;
      hours = hours ? hours : 12; // Handle midnight

      var formattedTime = hours + ':' + padZero(minutes) + ':' + padZero(seconds) + ' ' + ampm;
      document.getElementById('current-time').innerHTML = formattedTime;

      setTimeout(updateTime, 1000); // Update every 1 second
    }

    // Function to pad zero for single-digit minutes and seconds
    function padZero(value) {
      return value < 10 ? '0' + value : value;
    }

    // Initial call to start updating time
    updateTime();
  </script>
</body>

</html>