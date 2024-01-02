<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit Nominee</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Register.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="registerform">
        <h1>Edit Kandidat Form</h1>
        <?php
        include("koneksi.php");
        if (isset($_GET['nedit'])) {
            $edit_FullName = $_GET['nedit'];

            $select = "select * from kandidat where FullName='$edit_FullName'";
            $run = mysqli_query($conn, $select);

            $row_user = mysqli_fetch_array($run);
            $id = $row_user['id_nomine'];
            $Nim = $row_user['Nim'];
            $FullName = $row_user['FullName'];
            $Visi = $row_user['visi'];
            $Misi = $row_user['misi'];
            $eImage = $row_user['Image'];
            $MotivationalMessage = $row_user['MotivationalMessage'];
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <img src="upload/<?php echo $eImage; ?>" alt="Admin" class="rounded-circle" width="150"><br>
            <input type="text" name="id_nomine" value="<?php echo $id; ?>" required placeholder="Enter nomor">
            <input type="text" name="Nim" value="<?php echo $Nim; ?>" required placeholder="Enter Nim">
            <input type="text" name="FullName" value="<?php echo $edit_FullName; ?>" required placeholder="Enter Full Name">
            <input type="text" name="visi" value="<?php echo $Visi; ?>" required placeholder="Enter visi"><br>
            <input type="text" name="misi" value="<?php echo $Misi; ?>" required placeholder="Enter misi"><br>
            
            <!-- Add a new field for MotivationalMessage -->
            <input type="text" name="MotivationalMessage" placeholder="Enter Motivational Message" rows="4" cols="50"><?php echo $MotivationalMessage; ?><br>

            <input type="file" name="Image" value="<?php echo $eImage; ?>" accept="image/*"> <br>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <?php
    include("koneksi.php");
    if (isset($_POST['submit'])) {
        $id = $_POST['id_nomine'];
        $Nim = $_POST['Nim'];
        $FullName = $_POST['FullName'];
        $Visi = $_POST['visi'];
        $Misi = $_POST['misi'];
        $Image = $_FILES['Image']['name'];
        $tmp_name = $_FILES['Image']['tmp_name'];
        $MotivationalMessage = $_POST['MotivationalMessage'];

        if (empty($Image)) {
            $Image = $eImage;
        }
        $update = "update kandidat set id_nomine='$id',Nim='$Nim',FullName='$FullName',visi='$Visi',misi='$Misi',Image='$Image', MotivationalMessage='$MotivationalMessage' where FullName='$edit_FullName'";

        $run_update = mysqli_query($conn, $update);
        if ($run_update === true) {
            echo "<H5 style='color:green;text-align:center;'>Successfully Updated</h5>";
            move_uploaded_file($tmp_name, "upload/$Image");
        } else {
            echo "<center><H5 style='color:red;text-align:center;'>Not Inseted</h5></center>" . mysqli_error($conn);
        }
    }
    ?>
    <button class="open-button" onclick="back()">Back</button>

    <script>
        function back() {
            window.location = "adminkandidat.php";
        }
    </script>
</body>

</html>
