<?php

function dbConnect()
{
    try {
        $db = new PDO('pgsql:host=localhost;dbname=portfolio;user=postgres;password=root');
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $db;
}