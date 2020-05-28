
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






$post = $_POST;
//print_r($post);

print ($post['commandTotal']);

$commandTotal = $post['commandTotal'];

$tableNr = $_POST['tableNr'];
$idUser = $_POST['idUser'];
$idCommandLast = $_POST['fk_command'];
$totalCommand = $_POST['totalCommand'];


print ("<h1>total command <b>$totalCommand</b></h1>");

print ("<h2> the customer paid: </h2>");

//print ("<h1>total command is $totalCommand</h1>");

//echo "begin";


//$post = $_POST;

//print_r ($post);
//$item = $_POST['item'];
//$price = $_POST['price'];

//$commandPaid = $_POST['commandPaid'];
//$commandTotal = $_POST['commandTotal'];

//$tableNr = $_POST['idTable'];
$fkUser = $_POST['idUser'];
$idCommandLast = $_POST['fk_command'];


include_once('connect.php');

//$now = new DateTime();

//$update = "update command set tableNr = $tableNr, fk_user = $fkUser total = $commandTotal, date_time = $now whre id = $idCommandLast";
$update = "update command set tableNr = $tableNr, fk_user = $fkUser, total = $totalCommand, pay = 'paid' where id = $idCommandLast";

//echo "<br>update $update";



$stmt = $conn->prepare($update);


$stmt->execute();

/*
print ("<h1>the command is $commandTotal </h1>");

$balance = $commandPaid - $commandTotal;

if($commandPaid != $commandTotal)
    print ("<br><br> the customer paid <b>$commandPaid</b> so balance is <b>$balance</b>");
 




$commandTotal - $post['idUser'];
$total= $commandTotal- $idUser;


echo "You ordered ". $total . " " <br />";
//. " " . $item . " " . $total . "

echo "Your balance is  Thanks for ordering from drinkspot";



print ("<form action = 'selectUpdatetablenr.php' method = 'post' >");

print("<input type='hidden' name='idUser' value=$fk_user>");
print("<input type='submit' value='new command'>");

print("</form>")

*/


/*
include_once("insert1CommandPaid.php");

*/
//print ("<form action='insert1CommandPaid.php' method='post'> ");

//header("Refresh:0; url=selectUpdateCommandLast10-Rachel.php");

print ("<table class='commandFinish' border=1>");
print ("<tr>");
print ("<td>");




print ("<form action='selectUpdateCommandPaidTeller.php' method='post'> ");
    
print ("<input type='text' name= 'commandPaid' value=$totalCommand />");
print ("<input type='hidden' name= 'commandTotal' value=$totalCommand />");
print ("<input type='hidden' name= 'idTable' value=$tableNr />");
print ("<input type='hidden' name= 'idUser' value=$idUser />");
print ("<input type='hidden' name= 'idCommandLast' value=$idCommandLast />");
print ("<input type='submit' value='paid' />");
print ("</form>");


rint ("</td>");
print ("</tr>");
print ("</table>");



?>


