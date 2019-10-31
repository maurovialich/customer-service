<?php
include "../../App/views/header.php";
echo "<div class='container'>";
if (mysqli_num_rows($frequentlyAskedQuestion) > 0) {
    echo "<div class=single-report >";
    while($row = mysqli_fetch_assoc($frequentlyAskedQuestion)) {
        echo "<h3>".$row["title"]."</h3>";
        echo "<hr>";
        echo "<p>".$row['answer']."</p>";
    }
    echo "</div>";

} else {
    echo "0 results";
}
echo "</div>";
include "../../App/views/footer.php";
include "../../public/assets/css/style.css";
