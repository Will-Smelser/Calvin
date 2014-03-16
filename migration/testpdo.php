<?php



$dbName = "C:\Users\Will\Desktop\calvin\GMP-ACE.11.1.1.be.dev.mdb";
if (!file_exists($dbName)) {
    die("Could not find database file.");
}
$db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; Dbq=$dbName; Uid=; Pwd=;");

$sql = "select * from `Auditor Table`";
$result = $db->query($sql);

while($row=$result->fetch()){
    var_dump($row);
    echo "<br/>\n";
}
