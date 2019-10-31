<?php

function insert($title, $description)
{
    // Create connection
    $conn = mysqli_connect("db", "root", "phprs", "myDB");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO Reports (title, additional_description)
    VALUES ('{$title}', '{$description}')";

    if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully";
        $result = true;       
    } else {
        $result = false;
    }

    mysqli_close($conn);
    return $result;
}