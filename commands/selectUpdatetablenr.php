<DOCTYPE html>
<html lang="en">
<head>
<title>drinkspot</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="tableChoose.css" rel="stylesheet" type="text/css">
</head>
<body>


<h1> please choose the table </h1>

<?php

//echo "<br>begin selectUpdatetablenr<br>";


$post = $_POST;


//print_r($post);
//$get = $_GET;
//print_r($get);
$idUser = $post['idUser'];
//$idUser = $get['idUser'];

//echo "aaa $idUser";
//$idUser = 3;


//print_r($post);

include_once("config.php");

include_once("connect.php");

//include_once("insert.php");


//$tableName = $_GET["tableName"];

$tableName = 'table_numbers';

//include_once('selectUpdatetablenr.php');


/*

echo "tableName $tableName";

print("<form action='insert.php' method= 'get' >");

print("<input type='hidden' name='tableName' value=$tableName>");
print("<input type='submit' value='new record'>");


print ("</form>");

*/



$stmt = $conn->prepare('select * from ' .  $tableName);

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($arr);

if ($arr)
{
   print ("<table class='tables' border=1>");
   foreach($arr as  $row)
   {
      print ("<tr>");

      foreach ($row as $key=>$value)
      {
         if ($key == 'id')
         {
            print ("<td >");
            print ($value);
            print ("</td>");
         }
      }
   print ("<td >");
   echo "<form action='insert1Command.php' method='post'>";
   echo "<input type='hidden' name='idTable' value=$row[id] />"; 
   echo "<input type='hidden' name='tableName' value=$tableName />"; 
   echo "<input type='hidden' name='idUser' value=$idUser />"; 
//   echo "<input type='hidden' name='idUser' value=3 />"; 
   echo "<input type='hidden' name='totalCommand' value=0 />"; 
   echo "<input type=submit value='choose me' />";
   echo "</form>"; 
   print ("</td>");
   print ("</tr>");
   }
       

   print ("</table>");
}
else
{
   echo "no record";
}



?>


