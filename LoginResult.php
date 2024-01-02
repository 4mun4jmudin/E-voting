<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .card {
            width: 400px;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            text-align: center;
            padding: 15px;
        }

        .card-title {
            text-transform: capitalize;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .btn-primary {
            width: 80%;
            margin: auto;
            display: block;
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        hr {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        h1 {
            margin-bottom: 20px;
            color: #17a2b8;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
    <?php include "Loginnav.php"; ?>
        <hr>
        <h1><b>Winner:</b></h1>
        <hr>

        <?php
        include("koneksi.php");
        $query = "select * from kandidat";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($run);
        $RStatus = $row['Status'];
        if ($RStatus == 'ON') {
            $view = "select * from kandidat where Status='$RStatus'";
            $run1 = mysqli_query($conn, $view);

            while ($row1 = mysqli_fetch_array($run1)) {
                $Nim = $row1['Nim'];
                $FullName = $row1['FullName'];
                $Visi = $row1['visi'];
                $Misi = $row1['misi'];
                $Image = $row1['Image'];
                $Votes = $row1['Votes'];
                $Status = $row1['Status'];
        ?>
                
        <?php
            }
        } else {
            echo "<center style='color:red;'><h3>Data Not Available.</h3></center>";
        }
        ?>
        </div>
        <div class="row">
        <?php
        include("koneksi.php");
        $query = "select * from kandidat";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($run);
        $RStatus = $row['Status'];
        if ($RStatus == 'ON') {
            $view = "select * from kandidat where Status='$RStatus'";
            $run1 = mysqli_query($conn, $view);

            while ($row1 = mysqli_fetch_array($run1)) {
                $Nim = $row1['Nim'];
                $FullName = $row1['FullName'];
                $Visi = $row1['visi'];
                $Misi = $row1['misi'];
                $Image = $row1['Image'];
                $Votes = $row1['Votes'];
                $Status = $row1['Status'];
        ?>
                <div class="card">
                    <h2 style="text-transform: capitalize;"><?php echo $FullName; ?></h2>
                    <img class="card-img-top" src="upload/<?php echo $Image; ?>" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $FullName; ?></h4>
                        <a href="LoginSuccess.php" class="btn-primary">OK</a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<center style='color:red;'><h3>Data Not Available.</h3></center>";
        }
        ?>
    </div>
</body>

</html>
