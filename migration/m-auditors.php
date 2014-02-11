<?php

require_once 'class/mypdo.php';
require_once 'class/mysql.php';

$access = MyPdo::connect(MyPdo::$mdb);
$mysql = Mysql::connect();

$mysqldb = '`calvin_new`.';

//load a list of company ids
$companies = array();
$q = 'SELECT * FROM '.$mysqldb.'company';
$result = mysql_query($q);

if(!$result) die(mysql_error());

while($row = mysql_fetch_assoc($result)){
    $companies[$row['Abbreviation']] = $row['id'];
}
mysql_free_result($result);

//get the data from the access
$q = 'SELECT * from `Auditor Table`';
$result = $access->query($q);
while($row = $result->fetch()){
    //var_dump($row);
    $fname = $row['Auditor\'s First Name'];
    $lname = $row['Auditor\'s Last Name'];
    $title = $row['Audtior\'s Title'];
    $cid = $companies[$row['Auditor\'s Organization']];
    $aid = $row['Auditor\'s ID'];
    $phone = $row['Auditors Phone #'];
    $insert = 'INSERT INTO '.$mysqldb.'`auditor` VALUES (NULL,"'.$fname.'","'.$lname.'","'.$title.'",'.$cid.',"'.$aid.'","'.$phone.'")';
    $res = mysql_query($insert);

    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$insert<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$insert<br/>\n";
    }
}