<?php

// // Create connection
// $conn = new mysqli("db", "root", "phprs");
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "INSERT INTO Reports (title, additional_description)
// VALUES ('John', 'Doe')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
$title = $_POST["title"];
$additional_description = $_POST["additional_description"];


// Create connection
$conn = mysqli_connect("db", "root", "phprs", "myDB");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Reports (title, additional_description)
VALUES ('{$title}', '{$additional_description}')";

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
    header('Location: successful.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

// include "consult.php";

