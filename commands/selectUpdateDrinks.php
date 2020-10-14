<!--

<!DOCTYPE html>
<html lang="en">
<head>
<title>drinkspot</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="commandLine.css" rel="stylesheet" type="text/css">
</head>
<body>
-->

<?php

//echo "begin";
include_once("config.php");

include_once("connect.php");

//$tableName = $_GET["tableName"];


$arrGet= $_GET;


//print_r($arrGet);



$tableName = 'drinks';


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
   print ("<table class='tbdrinks' border=1>");
   //print ("<table>") ;



   foreach($arr as  $row)
   {
//      echo("<br>");
//      print_r($row);
      print ("<tr class='trdrinks'>");


      print ("<form action='insert1CommandLine.php' method='post'");

      foreach ($row as $key=>$value)
//      foreach ($row as $value)
      {




//         print ("<td >");
//         print ($key);
//         print ("</td>");
//         if ($key =  
        // print ("<td >");
        // print ("<input type='hidden' name=$key value=$value />");
        // print ($value);
        // print ("</td>");


            print ("<td >");
  //          print ("<input type='text' name=$key value=$value />");
            print ($value);
            print ("</td>");



         //}


         if ($key == 'id')
         {  
            print ("<td >");
            $idDrink = $value;
//            print ("<input type='text' name='idDrink' value=$value>");
            print ("</td>");
         
         }
         elseif ($key == 'Price')
         {

            $price = $value; 
            print ("<input type='hidden' name='price' value=$value />");

         }


/*

         elseif ($key == 'Price')
//            print ("<input type='hidden' name='priceDrink' value=$value>");
            print ("<input type='text' name='priceDrink' value=$value>");
         else
            print ($value);

         print ("</td>");


         print ("<td >");


         print ("</td>");
*/
//         print ("<td >");




//         print ("</td>");


      }

      
      print ("<td>");
      
            print ("<select id='drinkNr' name='quantity' >");
            print ("<option selected value=1 > 1 </option>");
            print ("<option value=2 > 2 </option>");
            print ("<option value=3 > 3 </option>");
            print ("<option value=4 > 4 </option>");
            print ("<option value=5 > 5 </option>");
            print ("<option value=6 > 6 </option>");
            print ("<option value=7 > 7 </option>");
            print ("<option value=8 > 8 </option>");
            print ("<option value=9 > 9 </option>");
            print ("<option value=10 > 10 </option>");
            print ("<option value=11 > 11 </option>");
            print ("<option value=12 > 12 </option>");
            print ("</select>");




       //print ("<input type='text' name='quantity' value=1 />");
      print ("</td>");
      print ("<td>");
      print ("<input type='hidden' name='idUser' value=$idUser />"); 
      print ("<input type='hidden' name='idTable' value=$idTable />"); 
      print ("<input type='hidden' name='idDrink' value=$idDrink />"); 
      print ("<input type='hidden' name=tableName value=$tableName />"); 
      print ("<input type='hidden' name='idCommandLast' value=$idCommandLast />"); 
      print ("<input type='hidden' name='price' value=$price />"); 
      print ("</td>");
      print ("<td>");
      
      print ("<input type=submit value='choose me' />");
      print ("</td>");


      print ("</tr>");
      print ("</form>"); 

   }
       

   print ("</table>");
}
else
{
   echo "no record";
}
?>

</body>
</html>
