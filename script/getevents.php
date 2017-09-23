<?php
include 'conn.php';

$type = $_GET['type'];

if($type == 'week'){
    $day = $_GET['day'];
    $sign = $_GET['sign'];
    $sql = "select * from events where date(eventstart) <= current_date + interval '7' day and current_date <= date(eventstart) and eventprivacy = false and edelete = false;";
    $stmt = $myPDO->prepare($sql);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-type: application/json');
    $json = json_encode($results);
    echo($json);
}


if ($type == 'day')
{
    $day = $_GET['day'];
    $sign = $_GET['sign'];
    $sql = "select * from events where date(eventstart) <= CURRENT_DATE $sign interval '$day' day and CURRENT_DATE $sign interval '$day' day <= date(eventend) and eventprivacy = false and edelete = false;";
    $stmt = $myPDO->prepare($sql);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-type: application/json');
    $json = json_encode($results);
    echo($json);
}

if ($type == 'shared')
{
    $eid = $_GET['eventid'];
    
    $sql = "select * from events where eventid = $eid and eventprivacy = false and edelete = false;";
    $stmt = $myPDO->prepare($sql);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-type: application/json');
    $json = json_encode($results);
    echo($json);
}

if($type == 'all')
{
    $sql = "select * from events where edelete = false order by eventid asc;";
    $stmt = $myPDO->prepare($sql);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-type: application/json');
    $json = json_encode($results);
    echo($json);
}
//select * from events where date(eventstart) <= current_date + interval '7' day and current_date <= date(eventstart);
//this will be used on load for events this week


?>
