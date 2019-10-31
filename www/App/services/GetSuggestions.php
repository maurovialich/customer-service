<?php

$titles = [];
$ids = [];

//Retrieve available suggestions
$conn = mysqli_connect("db", "root", "phprs", "myDB");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT id, title FROM FrequentlyAskeds";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $titles[] = $row["title"];
        $ids[] = $row["id"];
    }
}
mysqli_close($conn);

$text = $_REQUEST["text"];
$suggestion = "";

if ($text !== "") {
  $text = strtolower($text);
  $len=strlen($text);
  foreach(array_combine($titles, $ids) as $name => $id)
  {
    if (stristr($text, substr($name, 0, $len))) {
      if ($suggestion === "") {
        $suggestion = "<a href='FrequentlyAsked.php?action=show&id={$id}'>{$name}</a>";
      } else {
        $suggestion .= ", <a href='FrequentlyAsked.php?action=show&id={$id}'>{$name}</a>";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $suggestion === "" ? "no suggestion" : $suggestion;
?>