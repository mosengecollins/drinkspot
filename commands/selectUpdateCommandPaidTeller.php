<!DOCTYPE html>
<html lang="en">
<head>
<title>drinkspot</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="commandFinish.css" rel="stylesheet" type="text/css">
</head>
<body>



<?php
//echo "begin";


$post = $_POST;

//print_r ($post);
//$item = $_POST['item'];
//$price = $_POST['price'];

$commandPaid = $_POST['commandPaid'];
$commandTotal = $_POST['commandTotal'];

$tableNr = $_POST['idTable'];
$fkUser = $_POST['idUser'];
$idCommandLast = $_POST['idCommandLast'];


include_once('connect.php');

//$now = new DateTime();

//$update = "update command set tableNr = $tableNr, fk_user = $fkUser total = $commandTotal, date_time = $now where id = $idCommandLast";
$update = "update command set tableNr = $tableNr, fk_user = $fkUser, total = $commandTotal where id = $idCommandLast";

//echo "<br>update $update";



$stmt = $conn->prepare($update);


$stmt->execute();



print ("<h1>the command is $commandTotal </h1>");

$balance = $commandPaid - $commandTotal;

if($commandPaid != $commandTotal)
    print ("<h2> the customer paid <b>$commandPaid</b> so balance is <b>$balance</b></h2>");
 



/*
$commandTotal - $post['idUser'];
$total= $commandTotal- $idUser;

echo "You ordered ". $total . " " <br />";
//. " " . $item . " " . $total . "

echo "Your balance is  Thanks for ordering from drinkspot";

*/

print ("<table class='commandFinish' border=1>");
print ("<tr>");
print ("<td>");



print ("<form action = 'selectUpdateCommandLast10.php' method = 'post' >");

print("<input type='hidden' name='idUser' value=$fk_user>");
print("<input type='submit' value='back to list command not paid'>");

print("</form>");


print ("</td>");
print ("</tr>");
print ("</table>");



?>


