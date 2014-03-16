<?php
require_once 'class/mypdo.php';
require_once 'class/mysql.php';

$access = MyPdo::connect(MyPdo::$mdb);
$mysql = Mysql::connect();

$mysqldb = '`iqauditing`.';

//build list of facilities
$facilities = array();
$q = "SELECT * FROM {$mysqldb}facility";
$result = mysql_query($q);
if(!$result) die(mysql_error());

while($row = mysql_fetch_assoc($result)){
    $facilities[$row['Facility ID']] = $row['id'];
}
mysql_free_result($result);

//load a list of company ids
$companies = array();
$q = 'SELECT * FROM '.$mysqldb.'company';
$result = mysql_query($q);

if(!$result) die(mysql_error());

while($row = mysql_fetch_assoc($result)){
    $companies[$row['Abbreviation']] = $row['id'];
}
mysql_free_result($result);

echo "<hr><h2>Adding Personnel</h2><hr>";

//TODO: having the company and facility relationship is not good, is there a better way to do this?
//maybe have a facilityPersonnel table

//get the personel list
$q = 'SELECT * FROM `Personnel List`';
$result = $access->query($q);
while($row = $result->fetch()){
    $fid = (isset($facilities[$row['Facility ID']]))?$facilities[$row['Facility ID']]:'NULL';
    $cid = (isset($companies[$row['Company']]))?$companies[$row['Company']]:'NULL';
    $insert = "INSERT INTO {$mysqldb}personnel VALUES (NULL,\"{$row['Personnel\'s ID Code']}\",\"{$row['Personnel\'s First Name']}\",\"{$row['Personnel\'s Last Name']}\",\"{$row['Personnel\'s Title']}\",$cid,$fid)";
    $res = mysql_query($insert);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$insert<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$insert<br/>\n";
    }
}