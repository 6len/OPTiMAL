<?php
try{
$myPDO = new PDO('pgsql:host=optimal-dev.cs.nuim.ie;dbname=optimal', 'optimal', 'Aeyies8oot');
if($myPDO){
}
}catch(PDOException $e)
{
    echo $e->getMessage();
}

?>