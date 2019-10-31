<?php
$conn = mysqli_connect("db", "root", "phprs", "myDB");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM Reports WHERE id={$_GET['id']}";
$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    echo "deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);