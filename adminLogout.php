<?php
session_start();
include("koneksi.php");

  echo "<script> window.open('admin.php','_self') </script>";

session_destroy();
?>