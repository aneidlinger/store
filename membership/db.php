<?php

$dbhost = 'cis282store.cnj51rw6g5sj.us-east-1.rds.amazonaws.com';
$dbuser = 'neidlingerstore';
$dbpass = 'red8blue';
$dbname = 'cis282store';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($mysqli->error);