<?php
include 'conn.php';

$type = $_GET['type'];

if($type == 'venues')
{
$sql = 'select * from venues;';
$stmt = $myPDO->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-type: application/json');
$json = json_encode($results);
echo($json);
}

if($type == 'events')
{
$sql = 'select * from events;';
$stmt = $myPDO->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-type: application/json');
$json = json_encode($results);
echo($json);
}
?>
