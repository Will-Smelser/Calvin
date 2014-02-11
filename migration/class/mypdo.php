<?php
/**
 * Author: Will Smelser
 * Date: 2/10/14
 * Time: 7:33 PM
 * Project: Calvin
 */

class MyPdo{
    public static $mdb = 'C:\Users\Will\Desktop\calvin\GMP-ACE.11.1.1.be.dev.mdb';
    public static function connect($mdbFile){
        if(!file_exists($mdbFile))
            die("File did not exist: ".$mdbFile);
        return new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; Dbq=$mdbFile; Uid=; Pwd=;");
    }
}