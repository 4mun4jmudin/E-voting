<?php
include("koneksi.php");

$query = "SELECT FullName, Votes FROM kandidat";
$result = mysqli_query($conn, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
