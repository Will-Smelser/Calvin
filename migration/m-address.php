<?php
require_once 'class/mypdo.php';
require_once 'class/mysql.php';

$access = MyPdo::connect(MyPdo::$mdb);
$mysql = Mysql::connect();

$mysqldb = '`iqauditing`.';

//load cit/country
$countries=array();
$states=array();
$query = "select * from `Country Codes`";
$result = $access->query($query);

if(!$result){var_dump($access->errorInfo());die();}

echo "<hr><h2>Adding Addresses</h2><hr>";

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $c = str_replace("'","\'",$row['Country']);
    $q = "INSERT INTO {$mysqldb}country_code VALUES (NULL,'$c','{$row['Country Abreviation']}')";
    $res = mysql_query($q);

    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$q<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$q<br/>\n";
    }

    $id = mysql_insert_id();
    $row['id'] = $id;
    $countries[$row['Country Abreviation']] = $row;
}
$query = "select * from `State Codes`";
$result = $access->query($query);

if(!$result){var_dump($access->errorInfo());die();}

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $q = "INSERT INTO {$mysqldb}state_code VALUES (NULL,'{$row['State Abbreviation']}','{$row['State']}')";
    $res = mysql_query($q);

    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$q<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$q<br/>\n";
    }

    $id = mysql_insert_id();
    $row['id'] = $id;
    $states[$row['State Abbreviation']] = $row;
}

//companies
$companies = array();

//create all company addresses
$query = "select * from `Participating Companies`";
$result = $access->query($query);

if(!$result){var_dump($access->errorInfo());die();}

//insert the company addresses
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    //$id = mysql_insert_id();
    $abr = $row['Abbreviation'];
    $active = $row['Active'];
    $name = $row['Company Name'];
    $rep = $row['Company Representative'];
    $phone = $row['Phone Number'];
    $web = $row['Company Website'];
    $q = "insert into {$mysqldb}company values (NULL,\"$abr\",$active,\"$name\",\"$rep\",\"$phone\",\"$web\")";
    $res = mysql_query($q);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$q<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$q<br/>\n";
    }

    //store the company id
    $id = mysql_insert_id();
    $companies[$row['Abbreviation']] = $id;

    //create the address
    $ccode = $countries[$row['Company Country']]['id'];
    $scode = $states[$row['Company State']]['id'];
    $q = "insert into {$mysqldb}address values (NULL,$id,\"{$row['Company Address']}\",NULL,\"{$row['Company City']}\",$scode,\"{$row['Company Zip Code']}\",$ccode)";
    $res = mysql_query($q);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$q<br/>\n";
        echo mysql_error();
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$q<br/>\n";
    }

}

//enter the facilities
$query = "select * from `Facility Table`";
$result = $access->query($query);

if(!$result){var_dump($access->errorInfo());die();}


while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    //$id = mysql_insert_id(); //address id
    $cid = $companies[$row['Company']];

    $q = "insert into {$mysqldb}facility values (NULL,$cid";

    $i = 0;
    foreach($row as $field=>$val){
        if(($i > 0 && $i < 6) || $i > 10){ //skip id, company, address
            $q .= ",\"{$val}\"";
        }
        $i++;
    }
    $q .= ')';

    $res = mysql_query($q);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$q<br/>\n";
        echo mysql_error();
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$q<br/>\n";
    }

    $id = mysql_insert_id();
    //create the address
    $ccode = $countries[$row['Facility Country']]['id'];
    $scode = $states[$row['Facility State']]['id'];

    $q = "insert into {$mysqldb}facility_address values (NULL,$id,\"{$row['Facility Address']}\",NULL,\"{$row['Facility City']}\",$scode,\"{$row['Facility Zip Code']}\",$ccode)";
    $res = mysql_query($q);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$q<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$q<br/>\n";
    }
}

?>