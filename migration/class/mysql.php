<?php
/**
 * Author: Will Smelser
 * Date: 2/10/14
 * Time: 7:38 PM
 * Project: Calvin
 */

class Mysql{
    public static function connect(){
        $link = mysql_connect('localhost', 'root', '');
        if (!$link)
            die('Could not connect: ' . mysql_error());
        return $link;
    }
}