<?php
include 'conn.php';

$sql = 'select * from events where "EventCoordinates" is null;';
$stmt = $myPDO->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $value)
{

    $sql2 = "select x,y,roomname,venueid from venues where roomname ='".$value['eventvenue']."'";
    $stmt2 = $myPDO->prepare($sql2);
    $stmt2->execute();
    $result2 = $stmt2->fetchAll();
    
    foreach($result2 as $venval)
    {
    $ystring = $result2[0]['y'];
    $xstring = $result2[0]['x'];
    $string = "'POINT($ystring $xstring)'";
        
    $venroom = $venval['roomname'];
    $evroom = $value['eventvenue'];
    $evid = $value['eventid'];
    
    if($venroom === $evroom)
    {
    $stmt3 = $myPDO->prepare("update events set \"EventCoordinates\" = (SELECT ST_GeomFromText($string,4326)) where eventid = $evid;");
    $stmt3->execute();
        
    $stmt4 = $myPDO->prepare("update events set x = $xstring where eventid = $evid;");
    $stmt4->execute();
        
    $stmt5 = $myPDO->prepare("update events set y = $ystring where eventid = $evid;");
    $stmt5->execute();
    }
    }
}


?>
