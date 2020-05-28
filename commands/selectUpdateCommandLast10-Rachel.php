<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<meta http-equiv="refresh" content="5">

</head>

<body>

<?php

//echo "begin selectUpdateCommandLast10<br>";

include_once("connect.php");

/*

function listCommandLine($fkCommand)
{

   echo "<br>begin function listCommand() <br>";
 
   include_once("connect.php");


   $query = "select * from command_line where fk_command = $fkCommand";

   $stmt = $conn->prepare($query);

   $stmt->execute();

   $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

   print_r($arr);
   



   echo "<br>end f listComand()<br>";

}


*/

$query = "select * from command order by id desc limit 10";

$stmt = $conn->prepare($query);

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($arr);



foreach ($arr as $key => $value) 
{
   //echo "<br>aaaaaaaaakey $key<br>";
   //echo "<br>value $value<br>";

   print ("<table border=3>");

   print ("<tr>");


   $arr1 = $value;
   $fkCommand = 0; 
   //print_r($arr1);

   foreach ($arr1 as $key1 => $value1)
   {
      //echo ("<br>key1 $key1<br>");
      //echo ("<br>value1 $value1<br>");
      
      if ($key1 == 'id')
      {
         $fkCommand = $value1;
      }
      elseif ($key1 == 'date_time')
      ;
      else
      {
         print ("<th> $key1 </th><th>$value1 </th>");
      }
      
   }
  
//   print ("</tr><tr><td>");
//   print ("");
  
   $query12 = "select * from command_line where fk_command = $fkCommand";
  
   $stmt12 = $conn->prepare($query12);

   $stmt12->execute();

   $arr12 = $stmt12->fetchAll(PDO::FETCH_ASSOC);

   print ("<table border = 1>");



   foreach ($arr12 as $key12 => $value12)
   {

      print("<tr>"); 

//
//         {
            //print ("key12 $key12");
            //print ("value12 $value12");




      $arr13 = $value12;     
            //print_r($arr13);
      foreach ($arr13 as $key14 => $value14)
      {
         //print_r($value14);

         if ($key14 == 'fk_dinks')  // careful shoulb be drinks
         {

            $query14 = "select Choice, Price from drinks where id = $value14";

            $stmt14 = $conn->prepare($query14);

            $stmt14->execute();

            $arr14 = $stmt14->fetchAll(PDO::FETCH_ASSOC);

            //print_r($arr14);

            
            $drinkName = '';

            foreach ($arr14 as $key15 => $value15)
            {

               foreach ($value15 as $key16 => $value16)
               {
                  $drinkName = $value16;  
                  //echo "<br>drinkName $drinkName<br>";
          
                  //print ("<td> $key16 </td><td>$drinkName </td>");
                  print ("<td>$drinkName </td>");
               }
            } 
          
            

         }
         elseif ($key14 == 'id')
         ;
         elseif ($key14 == 'fk_command')
         ;
         else
         { 

//            print ("<td> $key14 </td><td> $value14 </td>");
            print ("<td> $value14 </td>");
         }
 



      }
               //print_r($value14);
      print ("</tr>");

   }

   print ("</table>");








   print ("</th></tr>");
   print ("</table>");

//   print ("<hr>");
   

}




//echo "<br>end selectUpdateCommandLast10<br>";
?>


</body>
</html>
