<?php
include 'conn.php';

$query = $_GET['query'];

$sql = "SELECT * , ST_AsText(geom) as theg, (tags->'name') as thename from nodes where (tags->'amenity') = '$query';";
$stmt = $myPDO->prepare($sql);
$stmt->execute();
    
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-type: application/json');
$json = json_encode($results);
echo($json);


?>
