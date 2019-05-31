<?php

try
{
        $bdd = new PDO('mysql:host=localhost;dbname=herocorp;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
   /* $host_name = 'db5000091493.hosting-data.io';
    $database = 'dbs86162';
    $user_name = 'dbu295276';
    $password = 'Hetic93!';
    $dbh = null;

    try {
        $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
    } catch (PDOException $e) {
        echo "Erreur!: " . $e->getMessage() . "<br/>";
        die();
    }*/