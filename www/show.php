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

$sql = "SELECT * FROM Reports WHERE id={$_GET['id']}";
$result = mysqli_query($conn, $sql);

include "header.php";
echo "<div class='container'>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<div class=single-report >";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<h3>".$row["title"]."</h3>";
        echo "<hr>";
        echo "<p>".$row['additional_description']."</p>";
    }
    echo "</div>";

} else {
    echo "0 results";
}

echo "</div>";
include "footer.php";
include "style.css";
mysqli_close($conn);