
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Admin Panel</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='adminPanel.css'>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
  <?php include 'adminPanelnav.php'; ?>

  <!-- ============User TAble=============================== - -->

  <div class="content" >
    <div style="overflow-x:auto;">
      <h2 style="text-align: center;font-weight: bolder;">User Data Table:</h2>
      <hr>

      <?php
      include("koneksi.php");
      if (isset($_GET['del'])) {
        $del_email = $_GET['del'];
        $delete = "delete from register where Email='$del_email'";
        $run_del = mysqli_query($conn, $delete);
        if ($run_del === true) {
          echo "<div style='color:green;text-align:center;'>Record Deleted Successfully </div> ";
        } else {
          echo "<div style='color:red;text-align:center;'>Try Again</div>";
        }
      }
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Semester</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Email</th>
            <th>Password</th>
            <th>Voted Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
        include("koneksi.php");
        $select = "select * from register";
        $run = mysqli_query($conn, $select);

        while ($row_user = mysqli_fetch_array($run)) {
          $Nim= $row_user['Nim'];
          $FullName = $row_user['FullName'];
          $Kelas = $row_user['Kelas'];
          $Semester = $row_user['Semester'];
          $JK = $row_user['Jenis_Kelamin'];
          $TL = $row_user['Tanggal_Lahir'];
          $Email = $row_user['Email'];
          $Password = $row_user['Password'];
          $Voted=$row_user['Voted'];

        ?>
          <tbody>
            <tr>
              <td style="text-transform: capitalize;"><?php echo $Nim; ?></td>
              <td><?php echo $FullName; ?></td>
              <td><?php echo $Kelas; ?></td>
              <td><?php echo $Semester; ?></td>
              <td><?php echo $JK; ?></td>
              <td><?php echo $TL; ?></td>
              <td><?php echo $Email; ?></td>
              <td><?php echo $Password; ?></td>
              <td><?php echo $Voted; ?></td>
              <td>
                <a href="EditUser.php?edit=<?php echo $Email; ?>" class="btn btn-primary" title="Edit"><i class="fas fa-pen"></i></a>
                <a href="admintable.php?del=<?php echo $Email; ?>" class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
      </table>
    </div>
    <!-- </div> -->
    <!-- ==========end ==user TAble=============================== -->
    

</body>

</html>