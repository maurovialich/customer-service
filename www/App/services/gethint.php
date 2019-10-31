<?php
// Array with names

// $a = array("Adilson", "bella");
$a = [];
$b = [];


// Create connection
$conn = mysqli_connect("db", "root", "phprs", "myDB");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, title FROM FrequentlyAskeds";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        $a[] = $row["title"];
        $b[] = $row["id"];
    }
} else {
    // echo "0 results";
    // $a[] = ""
}

mysqli_close($conn);



















// $a[] = "Anna";
// $a[] = "Brittany";
// $a[] = "Cinderella";
// $a[] = "Diana";
// $a[] = "Eva";
// $a[] = "Fiona";
// $a[] = "Gunda";
// $a[] = "Hege";
// $a[] = "Inga";
// $a[] = "Johanna";
// $a[] = "Kitty";
// $a[] = "Linda";
// $a[] = "Nina";
// $a[] = "Ophelia";
// $a[] = "Petunia";
// $a[] = "Amanda";
// $a[] = "Raquel";
// $a[] = "Cindy";
// $a[] = "Doris";
// $a[] = "Eve";
// $a[] = "Evita";
// $a[] = "Sunniva";
// $a[] = "Tove";
// $a[] = "Unni";
// $a[] = "Violet";
// $a[] = "Liza";
// $a[] = "Elizabeth";
// $a[] = "Ellen";
// $a[] = "Wenche";
// $a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  // foreach($a as $name) 
  foreach(array_combine($a, $b) as $name => $id)
  {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        // $hint = "é uma resposta {$name}";
        $hint = "<a href='FrequentlyAsked.php?action=show&id={$id}'>{$name}</a>";
        
      } else {
        // $hint .= ", $name";
        $hint .= ", <a href='FrequentlyAsked.php?action=show&id={$id}'>{$name}</a>";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>