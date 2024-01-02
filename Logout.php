<?php
session_start();
include("koneksi.php");

  echo "<script> window.open('Login.php','_self') </script>";

session_destroy();
?>