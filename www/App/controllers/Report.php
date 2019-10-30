<?php

$action = $_GET["action"] ? $_GET["action"] : $_GET["action"];

switch ($action) 
{
    case 'index':
        index();
        break;
    case 'create':
        create();
        break;
}

function create()
{
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
      header('Location: ../views/Report/successful.php');
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
}

function index ()
{
    include '../../App/views/Report/index.php';
}

