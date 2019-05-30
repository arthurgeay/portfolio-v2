<?php

function dbConnect()
{
    try {
        $db = new PDO('pgsql:host=localhost;dbname=portfolio', 'postgres', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $db;
}