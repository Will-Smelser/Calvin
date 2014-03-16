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



echo "<hr><h2>Adding Quality System Types table</h2><hr>";

//add all the stystem types
$systems = array();
$q = "select * from `Quality System IDs`";
$result = $access->query($q);
if(!$result){var_dump($access->errorInfo());die();}
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $insert = "INSERT INTO {$mysqldb}quality_system VALUES(NULL,\"{$row['QS ID']}\",\"{$row['Quality System']}\",";
    $insert.= "\"{$row['QS Sub-System']}\",\"{$row['QS Sub-Topic']}\")";
    $systems[$row['QS ID']] = mysql_insert_id();

    $res = mysql_query($insert);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$insert<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$insert<br/>\n";
    }
}



echo "<hr><h2>Adding Audit RQS_WS_A table</h2><hr>";

$rqwsas = array();

//add the audits
error_reporting(E_ALL);
$q = "select * from `RQS WS A`";
$result = $access->query($q);
if(!$result){var_dump($access->errorInfo());die();}
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row);
    $auditId = $audits[$row['Audit ID']];
    $auditor1 = empty($row['Auditor ID 1'])?'NULL':$auditors[$row['Auditor ID 1']];
    $auditor2 = empty($row['Auditor ID 2'])?'NULL':$auditors[$row['Auditor ID 2']];
    $auditor3 = empty($row['Auditor ID 3'])?'NULL':$auditors[$row['Auditor ID 3']];
    $qsId = $systems[$row['QS ID']];

    $summaryAuthor = empty($row['Summary Author'])?'NULL':$auditors[$row['Summary Author']];

    $insert = "INSERT INTO {$mysqldb}rqswsa VALUES (NULL,$auditId,$qsId,'{$row['Worksheet ID']}','{$row['WS Start  Date']}','{$row['WS End Date']}',";
    $insert.= "'{$row['WS Status']}',{$row['Findings Reported']},$auditor1,$auditor2,$auditor3,$summaryAuthor";
    $i=0;

    foreach($row as $key=>$value){
        if($i>=12){
            //echo "<h2>started at: $key</h2>";
            if(strpos($key,'Personnel')  !== false){
                $p;
                if(!empty($value) && !isset($personnel[$value])){
                    //personnel id is messed up in real table
                    preg_match('/(?P<rest>.*?)(?P<id>[\d+])$/',$value,$matches);

                    $zero = '0';
                    for($j=0;$j<3;$j++){
                        if(isset($personnel[$matches['rest'] . $zero . $matches['id']])){
                            echo "<div>Found Personnel Id: ".$matches['rest'] . $zero . $matches['id'].'</div>';
                            $p = $personnel[$matches['rest'] . $zero . $matches['id']];
                            break;
                        }else{
                            echo "<div>Tried to lookup Personnel Id: ".$matches['rest'] . $zero . $matches['id'].'</div>';
                        }
                        $zero.='0';
                    }

                    if(empty($p)){
                        echo "<div style='color:red'>Failed to lookup Personnel Id: $value</div>\n";
                        $p = NULL;
                    }
                }else{
                    $p = empty($value)?'NULL':$personnel[$value];
                }

                $insert .= ",$p";
            }else{
                $temp = str_replace("'","\'",$value);
                $insert .= ",'$temp'";
            }
        }
        $i++;
    }
    $res = mysql_query($insert.')');
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$insert<br/>\n";
        echo mysql_error()."<br/>";
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$insert<br/>\n";
    }

    $rqwsas[$row['QS ID']] = mysql_insert_id();
}


echo "<hr><h2>Adding Audit ws status table</h2><hr>";

//add the audits
error_reporting(E_ALL);
$q = "select * from `ws status`";
$result = $access->query($q);
if(!$result){var_dump($access->errorInfo());die();}
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $rqwsaId = $rqwsas[$row['QS ID']];

    //wsstatus
    $insert = "INSERT INTO {$mysqldb}wsstatus VALUES(NULL,$rqwsaId,{$row['assigned']},{$row['done']},{$row['PA']})";
    $res = mysql_query($insert);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$insert<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$insert<br/>\n";
    }


}


echo "<hr><h2>Adding Suggestion table</h2><hr>";

//add the suggestions
$q = "select * from `Suggestions`";
$result = $access->query($q);
if(!$result){var_dump($access->errorInfo());die();}
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $auditorId = $auditors[$row['Auditor']];
    $auditId = $audits[$row['Audit ID']];
    $systemId = $systems[$row['WS Reference']];

    $suggest = str_replace('"','\"',$row['Suggestion']);
    $status = $row['Suggestion Status'];

    $insert = "INSERT INTO {$mysqldb}`suggestion` VALUES (NULL,$auditId,$auditorId,$systemId,\"$suggest\",\"$status\"";

    $i=0;
    foreach($row as $key=>$val){
        if($i > 7){
            $insert.=','.(empty($val)?'NULL':"'".str_replace("'","\'",$val)."'");
        }
        $i++;
    }
    $insert.=')';

    $res = mysql_query($insert);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$insert<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$insert<br/>\n";
    }
}

//add the regulatory reference
echo "<hr><h2>Adding Regulatory Reference table</h2><hr>";

//add the suggestions
$regRef = array();

$q = "select * from `Regulatory References`";
$result = $access->query($q);
if(!$result){var_dump($access->errorInfo());die();}
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $insert = "INSERT INTO {$mysqldb}`regulatory_reference` VALUES (NULL,'{$row['Ref ID']}','{$row['Regulatory Ref']}'";

    $temp = str_replace('"','\"',$row['Short Description']);
    $temp2 = str_replace('"','\"',$row['Actual Regulatory Quote']);
    $insert.=",\"$temp\",\"$temp2\")";

    $res = mysql_query($insert);
    if(!$res){
        echo "<span style='color:red'>FAILED: </span>$insert<br/>\n";
        echo mysql_error()."<br/>";
        continue;
    }else{
        echo "<span style='color:green'>SUCCESS: </span>$insert<br/>\n";
    }

    $regRef[$row['Ref ID']] = mysql_insert_id();

}