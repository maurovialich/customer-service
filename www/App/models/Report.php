<?php

function insert($title, $description)
{
    $conn = mysqli_connect("db", "root", "phprs", "myDB");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO Reports (title, additional_description)
    VALUES ('{$title}', '{$description}')";

    if (mysqli_query($conn, $sql)) {
        $result = true;       
    } else {
        $result = false;
    }
    mysqli_close($conn);
    return $result;
}