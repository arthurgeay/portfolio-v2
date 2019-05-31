<?php

require_once 'db.php';

function updateMenuInfo($alt, $linkedin, $twitter, $github) {
    $db = dbConnect();
    $req = $db->prepare('UPDATE admin.header_info SET alt_img_header_info = :alt, url_linkedin_header_info = :linkedin, url_twitter_header_info = :twitter, url_github_header_info = :github');
    $req->bindValue(':alt', htmlentities($alt));
    $req->bindValue(':linkedin', htmlentities($linkedin));
    $req->bindValue(':twitter', htmlentities($twitter));
    $req->bindValue(':github', htmlentities($github));

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
    $req->bindValue(':alt', htmlentities($alt));

    $req->execute();
}


function deleteSkill($id) {
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM admin.skills WHERE id_skills = :id');
    $req->bindValue(':id', $id);

    $req->execute();
}


function getTechnos() {
    $db = dbConnect();

    $req = $db->query('SELECT * FROM admin.label_type');

    $result = [];

    while($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $data;
    }

    return $result;
}

function addProject($pathScreenImg, $alt, $description, $technos, $url, $newTechno) {
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO admin.project(img_path_project, alt_img_project, content_project, url_project) VALUES(:img, :alt, :description, :url)');
    $req->bindValue(':img', $pathScreenImg);
    $req->bindValue(':alt', htmlentities($alt));
    $req->bindValue(':description', strip_tags($description));
    $req->bindValue(':url', htmlentities($url));

    $req->execute();
    $idProject = $db->lastInsertId();

    if(!empty($newTechno)) {
        $idNewTechno = addTechno($newTechno);
        $technos[] = $idNewTechno;
    }

    addProjectLabelType($idProject, $technos);
}

function addProjectLabelType($idProject, $technos) {
    $db = dbConnect();

    foreach($technos as $techno) {
        $req = $db->prepare('INSERT INTO admin.project_label_type(id_project, id_label_type) VALUES(:project, :label)');
        $req->bindValue(':project', $idProject);
        $req->bindValue(':label', htmlentities($techno));

        $req->execute();
    }

}

function addTechno($title) {
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO admin.label_type(title_label_type) VALUES(:label)');
    $req->bindValue(':label', htmlentities($title));

    $req->execute();

    return $db->lastInsertId();
}

function getProjectById($id) {
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM admin.project WHERE id_project = :id');
    $req->bindValue(':id', $id);

    $req->execute();

    return $req->fetch(PDO::FETCH_ASSOC);
}

function editProject($id, $alt, $description, $techno, $url) {
    $db = dbConnect();

    $req = $db->prepare('UPDATE admin.project SET alt_img_project = :alt, url_project = :url, content_project = :content WHERE id_project = :id');
    $req->bindValue(':id', $id);
    $req->bindValue(':alt', htmlentities($alt));
    $req->bindValue(':url', htmlentities($url));
    $req->bindValue(':content', $description);

    $req->execute();

    if(!empty($techno)) {
        $idNewTechno = [addTechno($techno)];
        addProjectLabelType($id, $idNewTechno);
    }
}

function deleteProject($id) {
    $db = dbConnect();

    $req = $db->prepare('DELETE FROM admin.project WHERE id_project = :id ');
    $req->bindValue(':id', $id);

    $req->execute();
}

function editContentContact($content) {
    $db = dbConnect();

    $req = $db->prepare('UPDATE admin.contact SET content_contact = :content WHERE id_contact = 2 ');
    $req->bindValue(':content', $content);

    $req->execute();
}

function getMessages() {

    $db = dbConnect();

    $req = $db->query('SELECT id_message, fullname_message, email_message, content_message, to_char(datetime_message, \'DD/MM/YYYY à HH24:MI:SS\') AS date_message FROM admin.message ORDER BY id_message DESC LIMIT 5');
    $result = [];

    while($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $data;
    }

    return $result;
}

function getMessageById($id) {
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM admin.message WHERE id_message = :id');
    $req->bindValue(':id', $id);

    $req->execute();

    return $req->fetch(PDO::FETCH_ASSOC);
}

function deleteMessage($id) {
    $db = dbConnect();

    $req = $db->prepare('DELETE FROM admin.message WHERE id_message = :id');
    $req->bindValue(':id', $id);

    $req->execute();
}