<?php
/**
 * Author: Will Smelser
 * Date: 1/26/14
 * Time: 4:03 PM
 * Project: Calvin
 */

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

//load cit/country
$countries=array();
$states=array();
$query = "select * from calvin_new.country_codes";
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)) {
    $countries[$row['code']] = $row;
}
$query = "select * from calvin_new.state_codes";
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)) {
    $states[$row['code']] = $row;
}

//companies
$companies = array();

//create all company addresses
$query = "select * from calvin.participating_companies";
$result = mysql_query($query);

if(!$result){echo mysql_error();exit;}

//insert the company addresses
while ($row = mysql_fetch_assoc($result)) {
    //create the address
    $ccode = $countries[$row['Company Country']]['id'];
    $scode = $states[$row['Company State']]['id'];
    $q = "insert into calvin_new.address values (NULL,\"{$row['Company Address']}\",NULL,\"{$row['Company City']}\",$scode,\"{$row['Company Zip Code']}\",$ccode)";
    $res = mysql_query($q);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$q<br/>\n";
        echo mysql_error();
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$q<br/>\n";
    }


    $id = mysql_insert_id();
    $abr = $row['Abbreviation'];
    $active = $row['Active'];
    $name = $row['Company Name'];
    $rep = $row['Company Representative'];
    $phone = $row['Phone Number'];
    $web = $row['Company Website'];
    $q = "insert into calvin_new.company values (NULL,$id,\"$abr\",$active,\"$name\",\"$rep\",\"$phone\",\"$web\")";
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

}

//enter the facilities
$query = "select * from calvin.facility_table";
$result = mysql_query($query);

if(!$result){echo mysql_error();exit;}

while ($row = mysql_fetch_assoc($result)) {
    //create the address
    $ccode = $countries[$row['Facility Country']]['id'];
    $scode = $states[$row['Facility State']]['id'];

    $q = "insert into calvin_new.address values (NULL,\"{$row['Facility Address']}\",NULL,\"{$row['Facility City']}\",$scode,\"{$row['Facility Zip Code']}\",$ccode)";
    $res = mysql_query($q);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$q<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$q<br/>\n";
    }

    $id = mysql_insert_id(); //address id
    $cid = $companies[$row['Company']];

    $q = "insert into calvin_new.facility values (NULL,$cid,$id";

    $i = 0;
    foreach($row as $field=>$val){
        if(($i > 1 && $i < 7) || $i > 11){ //skip id, company, address
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
        continue;
    }
}

?>