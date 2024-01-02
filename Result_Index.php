<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Comic Sans', sans-serif;
            background-color: #f8f9fa;
            padding-top: 60px;
            /* Adjusted to match the fixed navbar height */
        }

        .navbar {
            background-color: #007bff;
        }

        .container {
            margin-top: 20px;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 3px;
            flex-wrap: wrap;
        }

        .card {
            position: relative;
            width: 250px;
            height: 450px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            overflow: hidden;
            border-radius: 15px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            /* Increase size on hover */
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 15px;
            font-style: italic;
            /* Italic style */
            font-weight: bold;
            /* Bold weight */
            text-align: center;
            /* Center align the text */
            padding: 10px;
            /* Add padding for better visibility */
        }

        /* Additional styles for the motivational message */

        .motivational-message {
            color: #6C757D;
            /* Adjust color to your preference */
            font-size: 1.2rem;
            text-align: center;
            margin-top: 15px;
            font-family: 'Helvetica', sans-serif;
            /* Choose a suitable font-family */
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">E-Voting</a>


        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
            </li>
        </ul>

    </nav>

    <div>
        <br>
        <hr>
        <center>
            <h1><b>Nama Kandidat : </b></h1>
        </center>
        <hr>
    </div>

    <div class="container">
        <div class="row">
            <?php
            include("koneksi.php");
            $query = "SELECT * FROM kandidat WHERE Status IN ('ON', 'OFF')";
            $run = mysqli_query($conn, $query);

            if ($run) {
                if (mysqli_num_rows($run) > 0) {
                    while ($row = mysqli_fetch_array($run)) {
                        $id = $row['id_nomine'];
                        $Nim = $row['Nim'];
                        $FullName = $row['FullName'];
                        $Visi = $row['visi'];
                        $Misi = $row['misi'];
                        $Image = $row['Image'];
                        $Votes = $row['Votes'];
                        $Status = $row['Status'];
                        $MotivationalMessage = $row['MotivationalMessage']; // Added this line

            ?>
                        <div class="card">
                            <img class="card-img-top" src="upload/<?php echo $Image; ?>" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title" style="text-transform: capitalize;"><?php echo "$FullName"; ?></h4>
                                <p class="card-text motivational-message"><?php echo $MotivationalMessage; ?></p>
                                <a href="view_candidate.php?candidate_id=<?php echo $id; ?>" class="btn btn-primary" style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%);">View</a>
                            </div>
                        </div>
            <?php
                    }
                } else {
                    echo "<center style='color:red;'><h3>No candidates available.</h3></center>";
                }
            } else {
                echo "<center style='color:red;'><h3>Error fetching data from the database.</h3></center>";
            }
            ?>
        </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyDX8FtT0tIcSFA+qDjI2WZI6LTCv7EmE" crossorigin="anonymous"></script>

</body>

</html>