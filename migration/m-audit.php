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
    $auditors[$row['Auditors ID']] = $row['id'];
}
mysql_free_result($result);

//company list
//load a list of company ids
$companies = array();
$q = 'SELECT * FROM '.$mysqldb.'company';
$result = mysql_query($q);

if(!$result) die(mysql_error());

while($row = mysql_fetch_assoc($result)){
    $companies[$row['Abbreviation']] = $row['id'];
}
mysql_free_result($result);

echo "<hr><h2>Adding Audits</h2><hr>";

//add the audits
$q = "select * from `Audit Table` LEFT JOIN `Audit Main` ON `Audit Table`.`Audit ID` = `Audit Main`.`Audit ID`";
$result = $access->query($q);
while($row = $result->fetch(PDO::FETCH_ASSOC)){
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
    $insert = "INSERT INTO {$mysqldb}audits_auditors VALUES";
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

    //add the audit basic details
    $keys = array('Close Audit','Audit Year','Audit Number', 'Auditor Group',
        'Auditor Class','Auditee Class','Audit Type','Audit Status',
        'Projected Start Date', 'Audit Start Date', 'Audit End Date',
        'Summary of Findings'
    );
    $sof = isset($auditors[$row['SOF Author']])?$auditors[$row['SOF Author']]:'NULL';
    $init = isset($auditors[$row['Audit Initator/Requestor']])?$auditors[$row['Audit Initator/Requestor']]:'NULL';
    $fac = isset($facilities[$row['Facility ID']])?$facilities[$row['Facility ID']]:'NULL';
    $sponsor = isset($companies[$row['Sponsor Company']])?$companies[$row['Sponsor Company']]:'NULL';
    $contract = isset($companies[$row['Contract Company']])?$companies[$row['Contract Company']]:'NULL';
    $insert = "INSERT INTO {$mysqldb}auditmain VALUES (NULL,$newid,$sof,$init,$fac,$sponsor,$contract";
    foreach($keys as $field){
        if($field === 'Auditor Group'){
            $insert .= ','.(isset($companies[$row[$field]])?$companies[$row[$field]]:'NULL');
        }else{
            $insert .= ', "'.str_replace('"','\"',$row[$field]).'"';
        }
    }
    $res = mysql_query($insert.')');
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$insert<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$insert<br/>\n";
    }
}