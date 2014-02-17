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

$mysqldb = '`calvin_new`.';

//need facility list
//build list of facilities
$facilities = array();
$q = "SELECT * FROM {$mysqldb}facility";
$result = mysql_query($q);
if(!$result) die(mysql_error());

while($row = mysql_fetch_assoc($result)){
    $facilities[$row['Facility ID']] = $row['id'];
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

echo "<hr><h2>Adding Audits</h2><hr>";

//add the audits
$q = "SELECT * FROM `Audit Table`";
$result = $access->query($q);
while($row = $result->fetch()){
    $setup = $row['Audit Setup Started'];
    $status = $row['ws status initiated'];
    $aid = $row['Audit ID'];
    $fid = $facilities[$row['Facility ID']];
    $insert = "INSERT INTO {$mysqldb}audit VALUES (NULL,$setup,$status,\"$aid\",$fid)";
    $res = mysql_query($insert);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$insert<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$insert<br/>\n";
    }
    $newid = mysql_insert_id();

    //add the auditors each into the table
    $insert = "INSERT INTO {$mysqldb}audit_auditor VALUES";
    $comma = '';
    for($i=1; $i<6; $i++){
        $val = $row['Auditor '.$i.' ID'];
        if(!empty($val)){
            $auditor = $auditors[$val];
            $insert .= "$comma (NULL,$newid,$auditor)";
            $comma = ',';
        }
    }
    $res = mysql_query($insert);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$insert<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$insert<br/>\n";
    }
}