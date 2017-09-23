<?php
include 'conn.php';


if($_SERVER['REQUEST_METHOD'] == "DELETE")
{
    $id = $_GET['id'];
   
    $sql = "SELECT * from venues where venueid = $id;";
    $stmt = $myPDO->prepare($sql);
    $stmt->execute();
    $total = $stmt->rowCount();
    
    $sql2 = "UPDATE venues set vdelete = true where venueid = $id;";
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

if($_SERVER['REQUEST_METHOD']=="PUT"){
    $query = $_GET['query'];
    $stmt = $myPDO->prepare($query);
    $stmt->execute();
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    $query = $_POST['query'];
    $stmt = $myPDO->prepare($query);
    $stmt->execute();
}

?>
