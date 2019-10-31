<?php

$action = $_GET["action"];

switch ($action) 
{
    case 'index':
        index();
        break;
    case 'show':
        show();
        break;
}

function index()
{
    // Create connection
    $conn = mysqli_connect("db", "root", "phprs", "myDB");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM FrequentlyAskeds";
    $result = mysqli_query($conn, $sql);

    include '../../App/views/FrequentlyAsked/index.php';
    mysqli_close($conn);
}

function show()
{
        // Create connection
    $conn = mysqli_connect("db", "root", "phprs", "myDB");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM FrequentlyAskeds WHERE id={$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    include '../../App/views/FrequentlyAsked/show.php';
    mysqli_close($conn);
}
