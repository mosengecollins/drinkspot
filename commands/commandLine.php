<!DOCTYPE html>
<html lang="en">
<head>
<title>drinkspot</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="commandLine.css" rel="stylesheet" type="text/css">
</head>
<body>


<?php
echo "begin commandLine.php<br>";

$get = $_GET;

print_r($get);

// display command lines

include_once("selectUpdateCommandLine.php");


// display the drink for choose

include_once ("selectUpdateDrinks.php");   //ok

?>



</body>
</html>



