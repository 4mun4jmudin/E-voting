<!-- view_candidate.php -->

<?php
include("koneksi.php");

// Check if candidate ID is set
if (isset($_GET['candidate_id'])) {
    $candidate_id = $_GET['candidate_id'];

    // Fetch candidate details from the database
    $query = "SELECT * FROM kandidat WHERE id_nomine = $candidate_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $candidate = mysqli_fetch_assoc($result);
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Candidate Details</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
                <style>
                    body {
                        background-color: #f8f9fa;
                    }

                    .container {
                        margin-top: 50px;
                    }

                    .card {
                        margin-top: 20px;
                    }

                    img {
                        max-width: 100%;
                        height: auto;
                    }
                </style>
            </head>

            <body class="container">

                <h1 class="text-center">Candidate Details</h1>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="upload/<?php echo $candidate['Image']; ?>" class="card-img-top" alt="Candidate Image">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $candidate['FullName']; ?></h2>
                                <p class="card-text"><strong>NIM:</strong> <?php echo $candidate['Nim']; ?></p>
                                <p class="card-text"><strong>Visi:</strong> <?php echo $candidate['visi']; ?></p>
                                <p class="card-text"><strong>Misi:</strong> <?php echo $candidate['misi']; ?></p>
                                <p class="card-text"><strong>Votes:</strong> <?php echo $candidate['Votes']; ?></p>
                                <!-- Add more details if needed -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-5">
                    <div class="row">
                        <div class="text-center mt-3 position-fixed" style="top: 0; right: 0; margin: 10px;">
                            <a href="Result_index.php" class="btn btn-primary">Back to Results</a>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

            </body>

            </html>

<?php
        } else {
            echo "<p class='text-danger text-center'>No candidate found with the specified ID.</p>";
        }
    } else {
        echo "<p class='text-danger text-center'>Error fetching data from the database.</p>";
    }
} else {
    echo "<p class='text-danger text-center'>Candidate ID not provided.</p>";
}
?>