<?php
include 'conn.php';


if($_SERVER['REQUEST_METHOD'] == "DELETE")
{
    $id = $_GET['id'];
   
    $sql = "SELECT * from events where eventid = $id;";
    $stmt = $myPDO->prepare($sql);
    $stmt->execute();
    $total = $stmt->rowCount();
    
    $sql2 = "UPDATE events set edelete = true where eventid = $id;";
    $myPDO->exec($sql2);
   if($total > 0)
    {
        echo 'true';
    }
    else
    {
        echo 'false';
    }
    
}
?>