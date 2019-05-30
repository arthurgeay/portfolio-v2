<?php

require_once 'db.php';

function updateMenuInfo($alt, $linkedin, $twitter, $github) {
    $db = dbConnect();
    $req = $db->prepare('UPDATE admin.header_info SET alt_img_header_info = :alt, url_linkedin_header_info = :linkedin, url_twitter_header_info = :twitter, url_github_header_info = :github');
    $req->bindValue(':alt', $alt);
    $req->bindValue(':linkedin', $linkedin);
    $req->bindValue(':twitter', $twitter);
    $req->bindValue(':github', $github);

    $req->execute();
}

function updateAbout($fullname, $birthday, $city, $email, $phone, $hobbies, $currentJob, $description) {
    $db = dbConnect();
    $req = $db->prepare('UPDATE admin.about SET fullname_about = :fullname, birthday_about = :birthday, city_about = :city, email_about = :email, phone_about = :phone, hobbies_about = :hobbies, current_job_about = :current_job, description_about = :description');

    $req->bindValue(':fullname', htmlentities($fullname));
    $req->bindValue(':birthday', htmlentities($birthday));
    $req->bindValue(':city', htmlentities($city));
    $req->bindValue(':email', htmlentities($email));
    $req->bindValue(':phone', htmlentities($phone));
    $req->bindValue(':hobbies', htmlentities($hobbies));
    $req->bindValue(':current_job', htmlentities($currentJob));
    $req->bindValue(':description', $description);

    $req->execute();
}

function addExperience($type, $title, $place, $dateStart, $dateEnd, $description) {
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO admin.experience(title_experience, place_experience, date_start_experience, date_end_experience, content_experience, id_type_experience) VALUES(:title, :place, :start, :end, :content, :type)');

    $req->bindValue(':type', htmlentities($type));
    $req->bindValue(':title', htmlentities($title));
    $req->bindValue(':place', htmlentities($place));
    $req->bindValue(':start', htmlentities($dateStart));
    $req->bindValue(':end', $dateEnd);
    $req->bindValue(':content', $description);

    $req->execute();
}

function getExperienceById($id) {
    $db = dbConnect();
    $req = $db->prepare('SELECT id_experience, title_experience, place_experience, date_start_experience, date_end_experience, content_experience, id_type_experience FROM admin.experience WHERE id_experience = :id');
    $req->bindValue(':id', $id);

    $req->execute();

    return $req->fetch(PDO::FETCH_ASSOC);
}

function editExperience($id, $type, $title, $place, $dateStart, $dateEnd, $description) {
    $db = dbConnect();
    $req = $db->prepare('UPDATE admin.experience SET title_experience = :title, place_experience = :place, date_start_experience = :start, date_end_experience = :end, content_experience = :content, id_type_experience = :type WHERE id_experience = :id');
    $req->bindValue(':id', $id);
    $req->bindValue(':type', htmlentities($type));
    $req->bindValue(':title', htmlentities($title));
    $req->bindValue(':place', htmlentities($place));
    $req->bindValue(':start', htmlentities($dateStart));
    $req->bindValue(':end', $dateEnd);
    $req->bindValue(':content', $description);

    $req->execute();
}

function deleteExperience($id) {
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM admin.experience WHERE id_experience = :id');
    $req->bindValue(':id', $id);

    $req->execute();
}

function addSkills($img, $alt) {
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO admin.skills(img_skills, alt_img_skills) VALUES(:img, :alt)');
    $req->bindValue(':img', $img);
    $req->bindValue(':alt', htmlentities($alt));

    $req->execute();
}

function getSkillById($id) {
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM admin.skills WHERE id_skills = :id');
    $req->bindValue(':id', $id);

    $req->execute();

    return $req->fetch(PDO::FETCH_ASSOC);

}

function editSkill($id, $alt) {
    $db = dbConnect();
    $req = $db->prepare('UPDATE admin.skills SET alt_img_skills = :alt WHERE id_skills = :id');
    $req->bindValue(':id', $id);
    $req->bindValue(':alt', $alt);

    $req->execute();
}


function deleteSkill($id) {
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM admin.skills WHERE id_skills = :id');
    $req->bindValue(':id', $id);

    $req->execute();
}