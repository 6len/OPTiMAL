<?php
try{
$myPDO = //this is sensitive information
if($myPDO){
}
}catch(PDOException $e)
{
    echo $e->getMessage();
}

?>