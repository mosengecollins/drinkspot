
<?php

$post = $_POST;

print_r($post);

if ($post)
 
{

   echo "$post is not empty so check if  login corect";

   include_once('loginCheck.php');

}
else
{
   echo "$post empty so form to fill";
}

print("<h2> login </h2>");


echo "begin";

$tableName = 'login';

//include ("dbTablesAdminPost/selectUpdate.php");

//echo "begin";

include_once("dbTablesAdminPost/connect.php");
//include_once("config.php");

//$tableName = $_POST["tableName"];


//echo "tableName $tableName";
/*
print("<form action='insert.php' method= 'post' >");

print("<input type='hidden' name='tableName' value=$tableName>");
print("<input type='submit' value='new record'>");


print ("</form>");

*/

$query = "select * from " . $tableName;

//$stmt = $conn->prepare('select * from ' .  $tableName);
$stmt = $conn->prepare($query);

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($arr);



if ($arr)
{
   print ("<table border=1>");
   foreach($arr as  $row)
   {
      print ("<tr>");

      foreach ($row as $key=>$value)
      {
         if ($key == 'name')
         {
            print ("<td >");
            print ($value);
            print ("</td>");
         }
      }
   print ("<td >");
//   echo "<form action='loginCheck.php' method='post'>";
//   echo "<form action='login/loginCheck.php' method='post'>";
//   echo "<form action='command/' method='post'>";
   echo "<form action='commands/' method='post'>";
   echo "<input type='hidden' name=idUser value=$row[id] />"; 
   echo "<input type='hidden' name=tableName value=$tableName />"; 
   echo "<input type=submit value='login' />";
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
