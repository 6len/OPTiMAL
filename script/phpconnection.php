<?php
include 'conn.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $t = $_POST['type'];
    $q = $_POST['query'];
 
    $sql= $q;
    $stmt = $myPDO->prepare($sql);
    $stmt->execute();
    $total = $stmt->rowCount();

if($t === 'map')
{
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-type: application/json');
    $json = json_encode($results);
    echo($json);
    
}
    else if($t === 'near')
    {
        while ($row = $stmt->fetchObject()) {
    echo "<b> <br> Name:</b> {$row->thename}  <br><b>Distance from you:</b>{$row->thedist}<br><button class = 'button button-primary' onclick = 'getDir2(\"{$row->theg}\")'>Get Directions</button><br>";
    }
}
}

?>