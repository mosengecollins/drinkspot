<html>
<head>
<link href="login.css" rel="stylesheet" type="text/css">
<!--
<link href="tableChoose.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css"><meta http$
-->

</head>

<body>

<?php

//echo "begin selectUpdatLogin.php";

print ("<h1> drinkspot </h1> <h2> login </h2>");

$post = $_POST;


include_once("connect.php");


//$tableName = $_POST["tableName"];
$tableName = 'login';

//echo "tableName $tableName";




$stmt = $conn->prepare('select * from ' .  $tableName);

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($arr);


$postCount = count($post);

//echo "<br>postCount $postCount<br>";


//if (!isset($id))
//if ($name == NULL)
//if ($postCount < 2)



if (!$post)
{

  // print ("<table border=1>");
    print ("<table class='login' border=1>");

   print ("<tr>");

//if ($arr)
//{



   foreach($arr as  $row)
   {


      print ("<form action='login/selectUpdateLogin.php' method='post'>");



      foreach ($row as $key=>$value)
      {


         if ($key == 'id')
//         if ($key == 'id or $key == 'password')
         {
            //print ("<td>");
            print ("<input type = 'hidden' name = '$key' value = $value />");
            //print ("</td>");

         }
         elseif ($key == 'password1')
         {
            print ("<td>");
            //print ("<input type = 'password' name = '$key' value = $value />");
            print ("<input type = 'password' name = '$key' value = '' />");
            print ("</td>");


         }

         else
         {

            print ("<td >");
            print ($value);
            print ("</td>");
         }
      
      }

      print ("<td >");
   //echo "<form action='loginCheck1.php' method='post'>";
   //echo "<input type='hidden' name=id value=$row[id] />"; 
      echo "<input type='hidden' name='tableName' value=$tableName />"; 
      echo "<input type=submit value='check passwork' />";
      echo "</form>";
 
      print ("</td>");
      print ("</tr>");
   }
       

   print ("</table>");


}


//else
//{
//   echo "no record";
//}

else
{
   


   $post = $_POST;

   //print_r($post);
   // check login
   $password = $_POST['password'];
   $idUser = $_POST['id'];
   $tableName = 'login';
    
   



//$stmt = $conn->prepare('select * from ' .  $tableName . 'where id = $id and paswword1 = $password');
//$query = "select * from login where id=1 and password1 = 'service1'";
//$query = "select * from login where id=$id and password1 = '$password'";
   $query = "select * from login where id=$idUser and password1 = ?";
   $stmt = $conn->prepare($query);
//   $password = 'service2';
   $password1 = $post['password1'];
//   echo "password1 $password1";

   $stmt->execute([$password1]);

   $arr1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

   //print_r($arr1);

   $submitValue = 'loginoktocommand';
// login/selectUpdateLogin.php  print ("<form action=$action method='post' >");


 
   if ($arr1)
   {



      foreach ($arr1 as $row)
      {


         foreach($row as $key=>$value)
         {

//            echo ('comes in foreach');
           
//            echo "<br>key $key<br>";
//            echo "<br>value $value<br>";

            if($value == 'teller')
//               $action = '../commands/selectUpdateCommandLast10.php';
               //$action = "../commands/selectUpdateCommandLast10.php?idUser='$idUser'";
               $action = "../commands/selectUpdateCommandLast10.php";
//               $input = "<input type='hidden' name='idUser' value=$idUser />";

//               $action = '../commands/test1.php';
            else
//               $action = "../commands/index.php?idUser='$idUser'";
               $action = "../commands/index.php";
               $input = "<input type='hidden' name='idUser' value=$idUser />";  

         }
//      print ("<form action='../commands/index.php' method='post' >");

      }
    
   }
   else
   {

      print("false login");
//      $action = '../login/selectUpdateLogin.php';
      $action = '../';
      $submitValue = 'falseLogin';
      $idUser = 1;
      $input = "";
 
   }

//   echo "<br>action $action<br>";

   print ("<form action=$action method='post' >");
//   print ("<input type='hidden' name='idUser' value=$idUser />");
   print ($input);

   print ("<center><input type='submit' value=$submitValue /></center>");

   print ("</form>");


}


//echo "end";
?>

</body>
</html>
