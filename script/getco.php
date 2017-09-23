<?php
include 'conn.php';

$venue = $_GET['venue'];

    $sql = "select * from venues where roomname = '$venue';";
    $stmt = $myPDO->prepare($sql);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-type: application/json');
    $json = json_encode($results);
    echo($json);




?>