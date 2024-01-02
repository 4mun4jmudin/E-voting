<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin Panel</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/adminPanel.css'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <style>
        body {
            font-family: "Arial", sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar h4 {
            padding: 16px;
            color: white;
            text-align: center;
        }

        .sidebar h5 {
            color: white;
            text-align: center;
        }

        .sidebar .closebtn {
            display: none;
        }

        /* Main content styles */
        #main {
            transition: margin-left 0.5s;
            padding: 16px;
        }

        /* Open button styles */
        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
            display: none;
        }

        /* Responsive styles */
        @media screen and (max-width: 600px) {
            .sidebar {
                width: 0;
            }

            #main {
                margin-left: 0;
            }

            .sidebar a {
                text-align: center;
                float: none;
            }

            .openbtn {
                display: block;
                position: fixed;
                top: 0;
                left: 10px;
            }

            .sidebar .closebtn {
                display: block;
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }
        }
    </style>
</head>

<body>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <h4><i class="fas fa-user-shield"></i> Admin Panel</h4>
        <?php
        session_start();
        include("koneksi.php");

        if (isset($_SESSION['Username'])) {
            $User = $_SESSION['Username'];
            echo "<h5>$User</h5>";
        } else {
            echo "<h5>Guest</h5>";
        }
        ?>
        <a href="adminPanel.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'adminPanel.php') ? 'active' : ''; ?>"><i class="fas fa-home"></i> Dashboard</a>
        <a href="adminResult.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'adminResult.php') ? 'active' : ''; ?>"><i class="fas fa-poll-h"></i> Quick Count</a>
        <a href="admintable.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'admintable.php') ? 'active' : ''; ?>"><i class="fas fa-table"></i> Data Mahasiswa</a>
        <a href="adminkandidat.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'adminkandidat.php') ? 'active' : ''; ?>"><i class="fas fa-database"></i> Data Kandidat</a>
        <a href="adminLogout.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'adminLogout.php') ? 'active' : ''; ?>"><i class="fas fa-sign-out-alt"></i> LogOut</a>

    </div>

    <div id="main">
        <span class="openbtn" onclick="openNav()">☰</span>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "240px";
            document.getElementById("main").style.marginLeft = "240px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }

        // Toggle sidebar based on screen width
        function toggleSidebar() {
            if (window.innerWidth <= 600) {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            } else {
                document.getElementById("mySidebar").style.width = "240px";
                document.getElementById("main").style.marginLeft = "240px";
            }
        }

        // Initial check and event listener
        toggleSidebar();
        window.addEventListener("resize", toggleSidebar);
    </script>

</body>

</html>