<?php
echo "begin";


$post = $_POST;

//print_r ($post);
//$item = $_POST['item'];
//$price = $_POST['price'];

$commandPaid = $_POST['commandPaid'];
$commandTotal = $post['commandTotal'];

$tableNr = $_POST['idTable'];
$fkUser = $_POST['idUser'];
$idCommandLast = $_POST['idCommandLast'];


include_once('connect.php');

//$now = new DateTime();

//$update = "update command set tableNr = $tableNr, fk_user = $fkUser total = $commandTotal, date_time = $now where id = $idCommandLast";
$update = "update command set tableNr = $tableNr, fk_user = $fkUser, total = $commandTotal where id = $idCommandLast";

echo "<br>update $update";



$stmt = $conn->prepare($update);


$stmt->execute();



print ("<h1>the command is $commandTotal </h1>");

$balance = $commandPaid - $commandTotal;

if($commandPaid != $commandTotal)
    print ("<br><br> the customer paid <b>$commandPaid</b> so balance is <b>$balance</b>");
 



/*
$commandTotal - $post['idUser'];
$total= $commandTotal- $idUser;

echo "You ordered ". $total . " " <br />";
//. " " . $item . " " . $total . "

echo "Your balance is  Thanks for ordering from drinkspot";

*/

print ("<form action = 'selectUpdatetablenr.php' method = 'post' >");

print("<input type='hidden' name='idUser' value=$fk_user>");
print("<input type='submit' value='new command'>");

print("</form>")




?>


