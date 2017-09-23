<?php
include 'conn.php';

$type = $_GET['type'];

if($type === 'alpha')
{
    $sql = "SELECT * from VENUES where vdelete is false order by roomname asc;";
$stmt = $myPDO->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-type: application/json');
    $json = json_encode($results);
    echo($json);
}

if ($type === 'id')
{
$sql = "SELECT * from VENUES where vdelete is false order by venueid asc;";
$stmt = $myPDO->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-type: application/json');
    $json = json_encode($results);
    echo($json);
}

?>
