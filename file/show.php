<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>相簿</title>
</head>
<body>

<h1>相簿</h1>



<?php

include_once "function.php";
$rows=all('imgs');


foreach($rows as $file){
    echo "<div>";
    echo " <img src='files/{$file['filename']}'></br>";
    echo " <td>{$file['desc']}</td>";
    echo " <td><$file['id']}'>重新上傳</a></td>";
    echo "</tr>";
}
echo "</table>";

?>
</body>
</html>