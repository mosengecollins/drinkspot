<?php
$id  = $_GET['id'];
$tableName  = $_GET['tableName'];


include_once("connect.php");
include_once("config.php");

$stmt = $conn->prepare("select * from " . $tableName . " where id = '$id'");
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);




print ("<table border=1>");
foreach($arr as  $row) {
    print ("<form action ='update1.php' method='get'>");

    print ("<input type='hidden' name = 'tableName' value = $tableName />");


    foreach ($row as $key=>$value)
    {
       print ("<tr><td>");
       print( $key);
       print ("</td><td>");
       print ("<input type='text' name = $key value = $value />");
       print ($value);
       print ("</td></tr>");
     }
     print ("<tr><td>");
     print ("<input type='submit' value='save'/>");
     print ("</td></tr></table>");
     print ("</form>");
}
?>
