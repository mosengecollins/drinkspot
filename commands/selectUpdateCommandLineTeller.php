


<?php

echo "begin teller";




$post = $_POST;

print_r($post);


$get = $_GET;

print_r($get);


$idCommandLast = $get['idCommandLast'];
$idUser = $get['idUser'];
$idTable = $get['idTable'];
$totalCommand = $get['totalCommand'];
//$idCommandLast = $get['idCommandLast'];

$drink = $get['drink'];


include_once("connect.php");

$query = "select id from command order by id desc limit 1";

$stmt = $conn->prepare($query);

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($arr);
 
$idLastCommand = 0;

foreach ($arr as $key => $value) {
    // $arr[3] will be updated with each alue from $arr...
    echo "<br>key {$key} => {$value} value<br> ";

    echo "value[id] $value[id]";
    $idLastCommand = $value[id];

    //foreach ($value   as $key1 => $value1) {
    //$idLastCommand = $value1;
    //}
    print_r($arr);
}
//echo " arr $arr['id']";

//$idLastCommand = $arr['id'];

echo "<br>idLastCommand  $idLastCommand<br>";



//include_once("config.php");

//$tableName = $_POST["tableName"];
$tableName = 'command_line';


//echo "tableName $tableName";

/*

print("<form action='insert.php' method= 'post' >");

print("<input type='hidden' name='tableName' value=$tableName>");
print("<input type='submit' value='new record'>");


print ("</form>");

*/

$idLastCommandMinus10 = $idLastCommand -10;
echo "idLastCommandMinus10 $idLastCommandMinus10";

$query = 'select * from ' .  $tableName . ' where fk_command <=' . $idLastCommand . ' and fk_command > ' . $idLastCommandMinus10 . ' order by fk_command desc';


echo "<br> query $query<br>"; 

$stmt = $conn->prepare($query );
//$stmt = $conn->prepare('select * from ' .  $tableName . ' where fk_command=' . $idCommandLast );
//$stmt = $conn->prepare('select * from ' .  $tableName . ' where fk_command=' . 269 );

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($arr);

// this is the total of the command record
$commandTotal = 0;

print ("<table border=1>");

print ("<tr>");

print ("<td>");

print ("<table border=1");

$commandTotal = 0;

//if (isset ($_POST))
//if ($_POST == NULL)
//    echo "<br>isset yes<br>";
//   echo "POST NULL";
 


if ($arr)
{
   foreach($arr as  $row)
   {
      print ("<tr>");
     // print ("<td>");
     // print ($drink);      
     // print ("</td>");
     echo "<form action='insert1CommandLine.php' method='post'>";

      foreach ($row as $key=>$value)
      {
         print ("<td >");
         //print ($value);
         if ($key == 'subtotal')
         {
            $commandTotal = $commandTotal + $value;
            $commandSubtotal = $value;
            print ($value);
         }
         elseif ($key == 'id')
            ;
         elseif ($key == 'fk_command')
         {
            $value = $commandNow;
            if ($commandLast == $commandNow)
            {
                $commandTotal1 = $commandTotal1 + $commandSubtotal;

            }
            else
            {
               echo "$commandTotal1 $commandTotal1";
               print ("</tr><tr><td>");
               $commandLast = $commandNow;
               $commandTotal = 0;
               $commandTotal = $commandSubtotal;
               print ("</td></tr>");
            }
         }
         elseif ($key == 'fk_dinks')
         {


            $queryCommand = "select * from drinks where id = $value";

            //echo "$queryCommand $queryCommand";

            $stmt1 = $conn->prepare($queryCommand);

            $stmt1->execute();

            $arrDrinks = $stmt1->fetchAll(PDO::FETCH_ASSOC);
//            print_r( $arrDrinks);

            foreach ($arrDrinks as $rowCommand)
            {


                foreach ($rowCommand as $keyCommand=>$valueCommand)
                {
                   if ($keyCommand == 'Choice')
                       print ($valueCommand);
                }

            }

         }
         else
         {

             print ($value);
         }
         print ("</td>");
      }
   print ("<td >");

   echo "<input type='hidden' name='idDrink' value=$idUser />"; 
   echo "<input type='hidden' name='idTable' value=$idTable />"; 

//   echo "<input type='hidden' name='tableName' value=$tableName />"; 
   echo "<input type='hidden' name='totalCommand' value=$totalCommand />"; 

   echo "<input type='hidden' name='idCommandLast' value=$idCommandLast />"; 
   echo "<input type='hidden' name='idUser' value=$idUser />"; 

   echo "<input type=submit value='update/delete' />";
   echo "</form>"; 

   print ("</td>");
   print ("</tr>");

//   print ("<table border=1 >");
//   print ("<tr>");
//   print ("<td>");





// button for conmend finish

//   print ("<td>");



//   print ("</td>");
//   print ("</tr>");
   }
       

}
else
{
   echo "<br>no record";
}


print ("</table>");

print ("<td>");
print ("finish command");
   print ("total command $commandTotal");
   print ("<form action='selectUpdateCommandFinish.php' method='post'>");
   print ("<input type='hidden' name='commandTotal' value=$commandTotal />");
   print ("<input type='hidden' name='idUser' value=$idUser />");
   print ("<input type='hidden' name='idCommandLast' value=$idCommandLast />");
   print ("<input type='hidden' name='idTable' value=$idTable />");
   print ("<input type='submit' value='finish command' />");
   print ("</form>");
   print ("</td>");
   print ("</tr>");
   print ("</table>");




?>



</body>
</html>
