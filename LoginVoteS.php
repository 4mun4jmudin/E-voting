<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
    <link rel='stylesheet' type='text/css' media='screen' href='LoginSuccess.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<style>
    /* Add your custom styles here */

    /* Example responsive styles */
    @media (max-width: 767px) {
        img {
            width: 100%;
            max-width: 300px; /* Adjust the max-width as needed */
            height: auto;
            border-radius: 50%;
        }
    }

    /* Custom styles for image and buttons */
    img.party-image {
        width: 400px;
        height: 400px;
      
        display: block;
        margin: auto;
        margin-top: 20px; /* Adjust the margin as needed */
    }

    form {
        text-align: center;
        margin-top: 20px; /* Adjust the margin as needed */
    }
</style>

<body>
    <div class="container">
        <?php include "Loginnav.php";
        $select = "select * from register where Email='$user'";

        $run = mysqli_query($conn, $select);
        $row_user = mysqli_fetch_array($run);
        $FullName = $row_user['FullName'];
        $Voted = $row_user['Voted'];

        if ($Voted == 'NO') {
        ?>
            <div class="mt-5">
                <h2 class="bg-danger text-white text-center p-2">Please confirm Your Vote</h2>

                <?php
                include("koneksi.php");
                if (isset($_GET['Party'])) {
                    $PartyVote = $_GET['Party'];

                    $select = "select * from kandidat where FullName='$PartyVote'";
                    $run = mysqli_query($conn, $select);

                    $row_user = mysqli_fetch_array($run);
                    $eFullName = $row_user['FullName'];
                    $eVotes = $row_user['Votes'];
                    $eImage = $row_user['Image'];
                }
                ?>

                <form action="" method="POST" class="mt-3">
                    <h5 class="text-capitalize">You Voted: <?php echo $PartyVote; ?></h5>
                    <img src="upload/<?php echo $eImage; ?>" class="img-fluid rounded party-image" alt="Party Image">
                    <input type="hidden" name="Votes" value="<?php echo $eVotes; ?>" required placeholder="Enter Party Name" class="form-control mt-3">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <a href="LoginSuccess.php" class="btn btn-warning">Cancel</a>
                </form>

                <?php
                include("koneksi.php");
                if (isset($_POST['submit'])) {
                    $Votes = $_POST['Votes'];

                    $eVotes = $eVotes + 1;
                    $update = "update kandidat set Votes='$eVotes' where FullName='$PartyVote'";
                    $run_update = mysqli_query($conn, $update);

                    if ($run_update === true) {
                        echo "<script> window.open('LoginVoteSuccess.php','_self') </script>";
                    } else {
                        echo "<center><H5 style='color:red;text-align:center;'>Something Went Wrong</H5></center>" . mysqli_error($conn);
                    }

                    include("koneksi.php");
                    $Rupdate = "update register set Voted='YES' where FullName='$FullName'";
                    $Rrun_update = mysqli_query($conn, $Rupdate);

                    if ($Rrun_update === true) {
                        echo "<H5 style='color:green;text-align:center;'>Voted YES</H5>";
                    } else {
                        echo "<center><H5 style='color:red;text-align:center;'>Something Went Wrong NNOo</H5></center>" . mysqli_error($conn);
                    }
                }
                ?>
            </div>
        <?php
        } else {
            echo "<div class='mt-5 text-center text-danger'><h3>You Already Voted.</h3></div>";
            echo '<a href="Logout.php" class="btn btn-primary mt-3"><i class="fas fa-sign-out-alt"></i> LogOut</a>';
        }
        ?>
    </div>
</body>

</html>
