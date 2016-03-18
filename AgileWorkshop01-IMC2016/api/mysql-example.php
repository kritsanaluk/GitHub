<?php
//Connect To Database
$hostname = '150.107.19.128:3306';
$username = 'root';
$password = 'a1s2d3f4';
$dbname = 'PUIBANK';
$usertable = 'test';
$yourfield = 'nickname';

mysql_connect($hostname, $username, $password) or die('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);

$query = 'SELECT * FROM '.$usertable;
$result = mysql_query($query);
if ($result) {
    while ($row = mysql_fetch_array($result)) {
        echo $name = $row[$yourfield];
        echo 'Name: '.$name;
    }
} else {
    echo 'Database NOT Found ';
    mysql_close($db_handle);
}
