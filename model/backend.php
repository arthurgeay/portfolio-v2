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