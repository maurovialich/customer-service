<?php
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "myDB";


include "../../App/views/header.php";
echo "<div class='container'>";
echo "<div class='frequently-asked-questions'>";
echo "<h1>Perguntas Frequentes</h1>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<ul class='list-group'>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li class='list-group-item'>"."<a href='FrequentlyAsked.php?action=show&id={$row["id"]}'>".$row["title"]."</a>"."</li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}

// echo "<a href='/'>link text</a>";
echo "</div>";
echo "</div>";
include "../../App/views/footer.php";
include "../../public/assets/css/style.css";
