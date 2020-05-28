<html>
<head>
<link rel="stylesheet" type="text/css" href="css/dbtb.css" />
</head>
<body

<h3> tables admin </h3>


<p class0'intro'>
choose a table


</p>


<?php

//include_once("listTables.php");


include_once("connect.php");


$stmt = $conn->prepare('show tables');

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);


print_r($arr);



print ("<table id='table01' border=1>");


foreach($arr as  $row)
{
     print ("<tr>");

    foreach ($row as $key=>$value)
    {
       print ("<td >");
  
       print ("<form action='selectUpdate.php' method='get' >");
 
       print ("$value");
 
       print ("<input type='hidden' name='tableName' value=$value>"); 
       print ("</td>");
       print ("<td>");
       print ("<input type=submit value='choose me' />");
  

       print ("</td>");
       
       print ("</form>");

     }
     
     print ("</tr>"); 
}
  
print ("</table>");


//echo "end listTable.php2";
?>


</body>
</html>
