<?php

function dbConnect() {
    try{
        $db =  new PDO('pgsql:host=localhost;dbname=portfolio;user=postgres;password=root');
    } catch (PDOException $e) {
        die('Erreur : '.$e->getMessage());
    }

    return $db;
}

function getHeaderInfo() {
    $db = dbConnect();
    $req = $db->query('SELECT * FROM admin.header_info');
    return $req->fetch(PDO::FETCH_ASSOC);
}

function getAbout() {
    $db = dbConnect();
    $req = $db->query('SELECT fullname_about, EXTRACT(YEAR FROM AGE(birthday_about)) as age, city_about, email_about, phone_about, hobbies_about, current_job_about, description_about, cv_path_about FROM admin.about');
    return $req->fetch(PDO::FETCH_ASSOC);
}

function getProfessionnalExperience() {
    $db = dbConnect();
    $req = $db->query('SELECT id_experience, title_experience, place_experience, to_char(date_start_experience, \'MM/YYYY\') AS date_start, to_char(date_end_experience, \'MM/YYYY\') AS date_end, content_experience, id_type_experience FROM admin.experience WHERE id_type_experience = 1 ORDER BY id_experience DESC');

    $result = [];

    while($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $data;
    }

    return $result;
}

function getEducationExperience() {
    $db = dbConnect();
    $req = $db->query('SELECT id_experience, title_experience, place_experience, to_char(date_start_experience, \'MM/YYYY\') AS date_start, to_char(date_end_experience, \'MM/YYYY\') AS date_end, content_experience, id_type_experience FROM admin.experience WHERE id_type_experience = 2 ORDER BY id_experience DESC');

    $result = [];

    while($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $data;
    }

    return $result;
}

function getSkills() {
    $db = dbConnect();
    $req = $db->query('SELECT * FROM admin.skills');

    $result = [];

    while($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $data;
    }

    return $result;
}

function getProjects() {
    $db = dbConnect();
    $req = $db->query('SELECT * FROM admin.project');

    $result = [];

    while($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $data;
    }

    return $result;
}

// SELECT p.id_project, lt.title_label_type FROM admin.project AS p INNER JOIN admin.project_label_type AS l ON l.id_project = p.id_project INNER JOIN admin.label_type AS lt ON lt.id_label_type = l.id_label_type