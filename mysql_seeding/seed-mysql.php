<?php
$conn = mysqli_connect("db", "root", "phprs");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//Replacing modified database if exists
$sql = "DROP DATABASE IF EXISTS myDB;";
mysqli_query($conn, $sql);
$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
mysqli_close($conn);

//Creating tables
$conn = mysqli_connect("db", "root", "phprs", "myDB");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE Reports (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        additional_description VARCHAR(140) NOT NULL
        )";
if (mysqli_query($conn, $sql)) {
    echo "Table Reports created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE FrequentlyAskeds (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        answer VARCHAR(140) NOT NULL
        )";
if (mysqli_query($conn, $sql)) {
    echo "Table FrequantlyAsked created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);

//Seeding FrequentlyAsked
$conn = mysqli_connect("db", "root", "phprs", "myDB");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO FrequentlyAskeds (title, answer)
VALUES ('Como cancelar um pedido?', 'Instruções para cancelamento de pedido.')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "INSERT INTO FrequentlyAskeds (title, answer)
VALUES ('Como rastrear um pedido?', 'Instruções para rastreamento de pedido.')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "INSERT INTO FrequentlyAskeds (title, answer)
VALUES ('Como devolver um produto recebido?', 'Instruções para devolução de pedido.')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
