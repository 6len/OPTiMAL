<?php
include 'conn.php';

$start = $_GET['start'];
$end = $_GET['end'];

    $sql = "select * from events where date(eventstart) <= '$end' and '$start' <= date(eventend) and eventprivacy = false and edelete = false;";
        
    $stmt = $myPDO->prepare($sql);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-type: application/json');
    $json = json_encode($results);
    echo($json);









?>