
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
      <h2 style="text-align: center;font-weight: bolder;">Data Kandidat</h2>
      

    <?php
    if (isset($_GET['ndel'])) {
      $ndel_FullName = $_GET['ndel'];
      $ndelete = "delete from kandidat where FullName='$ndel_FullName'";
      $nrun_del = mysqli_query($conn, $ndelete);
      if ($nrun_del === true) {
        echo "<div style='color:green;text-align:center;'>Record Deleted Successfully </div> ";
      } else {
        echo "<div style='color:red;text-align:center;'>Try Again</div>";
      }
    }
    ?>

    <hr>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>No Urut</th>
          <th>Nim</th>
          <th>Nama Calon</th>
          <th>Visi</th>
          <th>Misi</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php
      $select = "select * from kandidat";
      $run = mysqli_query($conn, $select);

      while ($row_user = mysqli_fetch_array($run)) {
        $id = $row_user['id_nomine'];
        $Nim = $row_user['Nim'];
        $FullName = $row_user['FullName'];
        $Visi = $row_user['visi'];
        $Misi = $row_user['misi'];
        $nImage = $row_user['Image'];
      ?>

        <tbody>
          <tr style="text-transform: capitalize;">
            <td><?php echo $id; ?></td>
            <td><?php echo $Nim; ?></td>
            <td><?php echo $FullName; ?></td>
            <td><?php echo $Visi; ?></td>
            <td><?php echo $Misi; ?></td>
            <td><img src="upload/<?php echo $nImage; ?>" style="width: 100px;height: 100px; border-radius: 50%;"></td>
            <td>
              <a href="EditKandidat.php?nedit=<?php echo $FullName; ?>" class="btn btn-primary" title="Edit"><i class="fas fa-pen"></i></a>
              <a href="adminkandidat.php?ndel=<?php echo $FullName; ?>" class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
  </div>
  <!-- ===========end =Nominee TAble=============================== -->
  </div>

</body>

</html>