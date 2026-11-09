<?php

$db['db_host'] = "shareddb-n.hosting.stackcp.net";
$db['db_user'] = "Secretdiary-31303736f7";
$db['db_pass'] = "*6O^=M]9-£8T";
$db['db_name'] = "Secretdiary-31303736f7";

foreach($db as $key => $value)  {
  
define(strtoupper($key), $value);
    
}



$connection =  mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//if($connection) {
//    
//    echo "We are connected ";
//}





?>