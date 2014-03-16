<?php
/**
 * Author: Will Smelser
 * Date: 2/16/14
 * Time: 6:10 PM
 * Project: Calvin
 */
require_once 'class/mypdo.php';
require_once 'class/mysql.php';

$access = MyPdo::connect(MyPdo::$mdb);
$mysql = Mysql::connect();

$mysqldb = '`iqauditing`.';

//need audit list
//build list of audits
$audits = array();
$q = "SELECT * FROM {$mysqldb}audit";
$result = mysql_query($q);
if(!$result) die(mysql_error());

while($row = mysql_fetch_assoc($result)){
    $audits[$row['Audit ID']] = $row['id'];
}
mysql_free_result($result);

//need Auditor list
$auditors = array();
$q = "SELECT * FROM {$mysqldb}auditor";
$result = mysql_query($q);
if(!$result) die(mysql_error());

while($row = mysql_fetch_assoc($result)){
    $auditors[$row['Auditor\'s ID']] = $row['id'];
}
mysql_free_result($result);

//need Personell list
$personnel = array();
$q = "SELECT * FROM {$mysqldb}personnel";
$result = mysql_query($q);
if(!$result) die(mysql_error());

while($row = mysql_fetch_assoc($result)){
    $personnel[$row['Personnel\'s ID Code']] = $row['id'];
}
mysql_free_result($result);


echo "<hr><h2>Adding Document table</h2><hr>";

$q = "select * from `Document Table`";
$result = $access->query($q);
if(!$result){var_dump($access->errorInfo());die();}
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $id = $audits[$row['Audit ID']];
    //document table
    $title = str_replace('"','\"',$row['Document Title']);
    $number = str_replace('"','\"',$row['Document Number']);
    $rev = str_replace('"','\"',$row['Document Revision/Date']);
    $did = str_replace('"','\"',$row['Document ID']);
    $retained = (empty($row['Retained']))?'NULL':$row['Retained'];

    $insert = "INSERT INTO {$mysqldb}document VALUES(NULL,$id,\"$title\",\"$number\",\"$rev\",\"$did\",$retained)";
    $res = mysql_query($insert);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$insert<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$insert<br/>\n";
    }
}