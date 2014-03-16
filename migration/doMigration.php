<?php
/**
 * Author: Will Smelser
 * Date: 2/15/14
 * Time: 4:05 PM
 * Project: Calvin
 */

require_once 'class/mypdo.php';
require_once 'class/mysql.php';

$access = MyPdo::connect(MyPdo::$mdb);
$mysql = Mysql::connect();

$mysqldb = '`iqauditing`.';

/*
 * delete from personnel;
delete from auditor;
delete from facility;
delete from company;
delete from address;
delete from country_codes;
delete from state_codes;
 */
$tables = array(
    'remark','regulatory_references_remarks','regulatory_reference','suggestion','document','wsstatus','rqswsa','quality_system','auditmain','audit_auditor','audit','personnel','auditor','facility','facility_addresses','company','address','country_code','state_code'
);

foreach($tables as $table){
    $result = mysql_query("delete from {$mysqldb}$table;");
    if(!$result){
        die(mysql_error());
    }
}

//setup companies and addresses
require_once 'm-address.php';

//setup the auditors
require_once 'm-auditors.php';

//setup personnel
require_once 'm-personnel.php';

//basic audit setup
require_once 'm-audit.php';

//add rqswsa table
require_once 'm-auditRqs.php';

//add status and document
require_once 'm-auditStatus.php';