<?php

// POSSIBLE_STATES = ['ACTIVE', 'INACTIVE']
echo "TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTttt";
$conn = mysqli_connect("db", "root", "phprs");
echo "OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "DROP DATABASE IF EXISTS myDB;";
mysqli_query($conn, $sql);
$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
mysqli_close($conn);

$conn = mysqli_connect("db", "root", "phprs", "myDB");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE Reports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
additional_description VARCHAR(140) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Reports created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);


// Create connection
$conn = mysqli_connect("db", "root", "phprs", "myDB");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Reports (title, additional_description)
VALUES ('Primeiro teste', 'Houve problema na hora de envio')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);