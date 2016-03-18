<?php
    $hostname = '192.168.1.112';
    $username = 'root';
    $password = 'a1s2d3f4';
    $dbname = 'PUIBANK';
    $usertable = 'account';
    $yourfield = 'remaining_amount';

    $conn = new mysqli($hostname, $username, $password, $dbname);

    if ($conn -> connect_error) {
        die('Unable to connect to database! Please try again later.');
    }

    $query = 'UPDATE '.$usertable.' SET '.$yourfield.'=100000 WHERE account_id=6291085597';

    if ($conn->query($query) === TRUE) {
        echo 'Database Reset';
    } else {
        echo 'Error update data. ' . $conn->error;
    }

    $query2 = 'UPDATE '.$usertable.' SET '.$yourfield.'=50000 WHERE account_id=6292181176';
    $conn->query($query2);
    $query3 = 'UPDATE '.$usertable.' SET '.$yourfield.'=5 WHERE account_id=112805362';
    $conn->query($query3);
   $conn->close();
?>
