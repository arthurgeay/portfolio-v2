<?php

require_once 'db.php';


function getMenuInfo() {
    $db = dbConnect();
    $req = $db->query('SELECT * FROM admin.header_info');
    return $req->fetch(PDO::FETCH_ASSOC);
}

function updateMenuInfo($alt, $linkedin, $twitter, $github) {
    $db = dbConnect();
    $req = $db->prepare('UPDATE admin.header_info SET alt_img_header_info = :alt, url_linkedin_header_info = :linkedin, url_twitter_header_info = :twitter, url_github_header_info = :github');
    $req->bindValue(':alt', $alt);
    $req->bindValue(':linkedin', $linkedin);
    $req->bindValue(':twitter', $twitter);
    $req->bindValue(':github', $github);

    $req->execute();
}