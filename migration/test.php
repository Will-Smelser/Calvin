<?php
require_once 'class/mypdo.php';
require_once 'class/mysql.php';

$access = MyPdo::connect(MyPdo::$mdb);
$mysql = Mysql::connect();

$mysqldb = '`calvin_new`.';


$query = "show columns from $mysqldb`facility` ";
//$result = $access->query($query);
$result = mysql_query($query);

if(!$result){echo mysql_error();die();}

while ($row = mysql_fetch_assoc($result)) {
    if($row['Type']=='bit(1)'){
        $q = "ALTER TABLE $mysqldb`facility` CHANGE `{$row['Field']}` `{$row['Field']}` BOOLEAN NULL DEFAULT NULL";
        echo $q."\n";
        $r = mysql_query($q);
        if(!$r){
            echo "\n\n".mysql_error()."\n\n";
        }
    }

}