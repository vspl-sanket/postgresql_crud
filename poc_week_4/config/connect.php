<?php

    $dbuser = 'postgres';
    $dbpass = 'vis123';
    $dbhost = '172.17.0.3';
    $dbname = 'week_4_task';
    $base_url = "http://172.17.0.2/codeBase/poc_week_4";



    try {
        $dsn = "pgsql:host=$dbhost;port=5432;dbname=$dbname;";
        // make a database connection
        //$pdo = new PDO($dsn, $dbuser, $dbpass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $pdo = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass") or die ("Could not connect to server\n"); 
    } catch (PDOException $e) {
        die($e->getMessage());
    }

?>