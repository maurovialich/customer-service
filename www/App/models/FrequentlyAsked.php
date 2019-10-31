<?php

function find_all()
{
    $conn = mysqli_connect("db", "root", "phprs", "myDB");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM FrequentlyAskeds";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function find_by_id($id){
    // Create connection
    $conn = mysqli_connect("db", "root", "phprs", "myDB");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM FrequentlyAskeds WHERE id={$id}";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}