<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='Register.css'> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url('images/voting2.jpg');
            /* Ganti dengan path gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 600px;
            /* Sesuaikan lebar container sesuai kebutuhan */
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 0 rgba(0, 0, 0, 0.3);
            box-sizing: border-box;
            margin-top: 50px;
        }

        .background {
            width: 100%;
            height: 100vh;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            background: url('path/to/your/background-image.jpg') no-repeat center center/cover;
        }

        .registerform {
            background: rgba(255, 255, 255, 0.8);
            /* Warna latar belakang semi-transparan */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            box-sizing: border-box;
            margin-top: 50px;

        }

        h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        button {
            width: 100%;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 100px;
            /* Sesuaikan lebar logo sesuai kebutuhan */
            margin-bottom: 20px;
        }

        .select-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
            margin-bottom: 20px;
        }

        .select-wrapper select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .select-wrapper::after {
            content: '\25BC';
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            pointer-events: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="background"></div>
        <div class="registerform">
            <div class="logo">
                <img src="images/logo_stmik.png" alt="Logo" />
            </div>
            <h1 class="text-center mb-4">Registration Form</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="Nim">NIM:</label>
                    <input type="text" class="form-control" name="Nim" required placeholder="NIM">
                </div>
                <div class="form-group">
                    <label for="FullName">Nama:</label>
                    <input type="text" class="form-control" name="FullName" required placeholder="Full Name">
                </div>
                <div class="select-wrapper">
                    <label for="Kelas">Kelas:</label>
                    <select name="Kelas" id="Kelas" required>
                        <?php
                        // Generate options for Kelas
                        for ($i = 1; $i <= 10; $i++) {
                            echo "<option value=\"TI $i\">TI $i</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="select-wrapper">
                    <label for="Semester">Semester:</label>
                    <select name="Semester" id="Semester" required>
                        <?php
                        // Generate options for Semester
                        for ($i = 1; $i <= 8; $i++) {
                            echo "<option value=\"$i\">$i</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Tanggal_Lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" name="Tanggal_Lahir" required placeholder="Date Of Birth">
                </div>
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="email" class="form-control" name="Email" required placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="Password">Password:</label>
                    <input type="password" class="form-control" name="Password" required placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="RePassword">Repassword:</label>
                    <input type="password" class="form-control" name="RePassword" required placeholder="ReEnter Password">
                </div>
                <div class="form-group">
                    <label for="kelamin">Jenis Kelamin:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelamin" value="Laki-laki" required>
                        <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelamin" value="Perempuan" required>
                        <label class="form-check-label" for="Perempuan">Perempuan</label>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <div class="text-center mt-3">
                    <button class="open-button btn btn-secondary" onclick="back()">Back</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function back() {
            window.location = "index.html";
        }
    </script>

    <?php
    include("koneksi.php");
    if (isset($_POST['submit'])) {
        $Nim = $_POST['Nim'];
        $FullName = $_POST['FullName'];
        $Kelas = $_POST['Kelas'];
        $Semester = $_POST['Semester'];
        $TL = $_POST['Tanggal_Lahir'];
        $kelamin = $_POST['kelamin'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $RePassword = $_POST['RePassword'];
        if ($Password == $RePassword) {
            $insert =
                "insert into register(Nim,FullName,Kelas,Semester,Jenis_Kelamin,Tanggal_Lahir,Email,Password,Status,Voted) values('$Nim','$FullName','$Kelas',$Semester,'$kelamin','$TL','$Email','$Password','OFF','NO')";
            $run_insert = mysqli_query($conn, $insert);
            if ($run_insert === true) {
                echo "<H5 style='color:green;text-align:center;'>Successfully Inseted</h5>";
            } else {
                echo "<H5 style='color:red;text-align:center;'>Not Inseted</H5>" . mysqli_error($conn);
            }
        } else {
            echo "<H5 style='color:red;text-align:center;'>Password is not Matched with RE-Entered Password</H5>";
        }
    }
    ?>
</body>

</html>