<?php

require_once 'model/frontend.php';

function home() {
    $headerInfo = getHeaderInfo();
    $about = getAbout();
    $experiencesPro = getProfessionnalExperience();
    $formations = getEducationExperience();
    $skills = getSkills();
    $projects = getProjects();
    require_once 'view/frontend/homeView.php';
}