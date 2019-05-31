<?php

function dbConnect()
{
    try {
        $db = new PDO('pgsql:host=localhost;dbname=portfolio', 'postgres', 'root');
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $db;
}