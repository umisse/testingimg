<?php
function logthis ($sessionid, $hosturl,$pageurl,$useragent,$userip,$logfile)
{
$log = fopen("log5.txt","a");
date_default_timezone_set("America/Winnipeg");
$now = date("d F Y h:i:s A");

fwrite($log,"$now , $pageurl ,  $useragent ,  $userip \n ");
$log = fclose($log);

}

?>