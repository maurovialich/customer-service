<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect("db", "root", "phprs", "myDB");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Reports";
$result = mysqli_query($conn, $sql);

include "header.php";
echo "<div class='container'>";
echo "<div class='frequently-asked-questions'>";
echo "<h1>Perguntas Frequentes</h1>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<ul class='list-group'>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li class='list-group-item'>"."<a href='/show.php?id={$row["id"]}'>".$row["title"]."</a>"."</li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}

// echo "<a href='/'>link text</a>";
echo "</div>";
echo "</div>";
include "footer.php";
include "style.css";
mysqli_close($conn);