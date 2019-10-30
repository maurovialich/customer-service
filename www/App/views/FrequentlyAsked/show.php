<?php
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "myDB";

include "../../App/views/header.php";
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
include "../../App/views/footer.php";
include "../../public/assets/css/style.css";
