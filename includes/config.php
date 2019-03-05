<?php

    $dbhost = 'cis282store.cnj51rw6g5sj.us-east-1.rds.amazonaws.com';
    $dbuser = 'neidlingerstore';
    $dbpass = 'red8blue';
    $dbname = 'cis282store';
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$connect) {
        die('Could not connect to instance: ' . mysqli_error($connect));
    }

?>