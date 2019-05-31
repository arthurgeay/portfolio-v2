<?php

require_once 'model/frontend.php';
require_once 'model/backend.php';
require_once 'utils/upload.php';

function logout() {
    unset($_SESSION['email']);
    unset($_SESSION['password_hash']);
    header('Location: index.php?page=connect');
    exit();
}

function menuAdmin() {
    if(!isset($_SESSION['email']) || !isset($_SESSION['password_hash'])) {
        header('Location: index.php?page=connect');
        exit();
    }


    if(isset($_POST['alt']) || isset($_POST['linkedin']) || isset($_POST['twitter']) || isset($_POST['github'])) {

        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            upload($_FILES['image'], 100000, ['jpeg'], 'public/img/profile/profile.jpeg');
        }

        if(!isset($_SESSION['error'])) {
            updateMenuInfo($_POST['alt'], $_POST['linkedin'], $_POST['twitter'], $_POST['github']);
            $_SESSION['success'] = 'Vos modifications ont été prise en compte';
        }

        header('Location: index.php?page=menu');
        exit();
    }
    $info = getHeaderInfo();

    require_once 'view/backend/adminNavView.php';
}

function aboutAdmin() {

    if(!isset($_SESSION['email']) || !isset($_SESSION['password_hash'])) {
        header('Location: index.php?page=connect');
        exit();
    }

    if(isset($_POST['fullname']) || isset($_POST['birthday']) || isset($_POST['city']) || isset($_POST['email']) || isset($_POST['phone']) || isset($_POST['hobbies']) || isset($_POST['current_job']) || isset($_POST['description'])) {

        if(isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
            upload($_FILES['cv'], 1000000, ['pdf'], 'public/download/CV.pdf');
        }

        if(!isset($_SESSION['error'])) {
            updateAbout($_POST['fullname'], $_POST['birthday'], $_POST['city'], $_POST['email'], $_POST['phone'], $_POST['hobbies'], $_POST['current_job'], $_POST['description']);
            $_SESSION['success'] = 'Vos modifications ont été prise en compte';

        }

        header('Location: index.php?page=about');
        exit();
    }

    $about = getAbout(true);

    require_once 'view/backend/adminAboutView.php';
}

function experienceAdmin() {

    if(!isset($_SESSION['email']) || !isset($_SESSION['password_hash'])) {
        header('Location: index.php?page=connect');
        exit();
    }

    /* Ajouter une expérience */
    if(isset($_POST['add-experience'])) {
        if(empty($_POST['type_experience']) || empty($_POST['title_experience']) || empty($_POST['place_experience']) || empty($_POST['date_start']) || empty($_POST['description'])) {
            $_SESSION['error'] = 'Vous devez remplir tous les champs';
        }

        if(!isset($_SESSION['error'])) {
            $type = ($_POST['type_experience'] == 'pro') ? 1 : 2;
            $dateEnd = (!empty($_POST['date_end'])) ? $_POST['date_end'] : NULL;
            addExperience($type, $_POST['title_experience'], $_POST['place_experience'], $_POST['date_start'], $dateEnd, $_POST['description']);
            $_SESSION['success'] = 'Votre expérience a bien été ajoutée';
        }

        header('Location: index.php?page=experience&action=add');
        exit();
    }

    /* Editer une expérience */
    if(isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $experience = getExperienceById($id);
        if(!$experience) {
            header('Location: index.php?page=experience');
            exit();
        }

        if(isset($_POST['edit-experience'])) {
            if (empty($_POST['type_experience']) || empty($_POST['title_experience']) || empty($_POST['place_experience']) || empty($_POST['date_start']) || empty($_POST['description'])) {
                $_SESSION['error'] = 'Vous devez remplir tous les champs';
            }

            if(!isset($_SESSION['error'])) {
                $type = ($_POST['type_experience'] == 'pro') ? 1 : 2;
                $dateEnd = (!empty($_POST['date_end'])) ? $_POST['date_end'] : NULL;
                editExperience($id, $type, $_POST['title_experience'], $_POST['place_experience'], $_POST['date_start'], $dateEnd, $_POST['description']);
                $_SESSION['success'] = 'Votre expérience a bien été modifiée';
            }

            header('Location: index.php?page=experience&action=edit&id='.$id);
            exit();
        }

    }

    /* Supprimer une expérience */
    if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $experience = getExperienceById($id);
        if(!$experience) {
            header('Location: index.php?page=experience');
            exit();
        }

        deleteExperience($id);
        $_SESSION['success'] = "L'expérience a bien été supprimé";
        header('Location: index.php?page=experience');
        exit();
    }

    $professionnals = getProfessionnalExperience();
    $formations = getEducationExperience();

    require_once 'view/backend/adminExperienceView.php';
}


function skillsAdmin() {

    if(!isset($_SESSION['email']) || !isset($_SESSION['password_hash'])) {
        header('Location: index.php?page=connect');
        exit();
    }

    /* Ajouter une compétence */

    if(isset($_POST['add-skills'])) {
        if(empty($_FILES['img']) || empty($_POST['alt'])) {
            $_SESSION['error'] = 'Vous devez remplir tous les champs';
        }

        if(isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
            upload($_FILES['img'], 100000, ['png'], 'public/img/skills/'.$_FILES['img']['name']);
        }

        if(!isset($_SESSION['error'])) {
            addSkills('img/skills/'.$_FILES['img']['name'], $_POST['alt']);
            $_SESSION['success'] = 'Votre nouvelle compétence a bien été ajouté';
        }

        header('Location: index.php?page=skills&action=add');
        exit();
    }

    /* Editer une compétence */

    if(isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $skill = getSkillById($id);

        if(!$skill) {
            header('Location: index.php?page=skills');
            exit();
        }

        if(isset($_POST['edit-skills'])) {
            if(empty($_POST['alt'])) {
                $_SESSION['error'] = 'Vous devez remplir tous les champs';
            }

            if(isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                upload($_FILES['img'], 100000, ['png'], 'public/'.$skill['img_skills']);
            }

            if(!isset($_SESSION['error'])) {
                editSkill($skill['id_skills'], $_POST['alt']);
                $_SESSION['success'] = 'Votre compétence a bien été modifié';
            }

            header('Location: index.php?page=skills&action=edit&id='.$skill['id_skills']);
            exit();
        }
    }

    /* Supprimer une compétence */

    if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $skill = getSkillById($id);
        if(!$skill) {
            header('Location: index.php?page=skills');
            exit();
        }

        deleteSkill($id);
        unlink('public/'.$skill['img_skills']);
        $_SESSION['success'] = 'Votre compétence a bien été supprimé';
        header('Location: index.php?page=skills');
        exit();
    }

    $skills = getSkills();
    require_once 'view/backend/adminSkillsView.php';
}

function projectAdmin() {

    if(!isset($_SESSION['email']) || !isset($_SESSION['password_hash'])) {
        header('Location: index.php?page=connect');
        exit();
    }

    /* Ajouter un projet */

    if(isset($_POST['add-project'])) {

        if(empty($_POST['alt']) || empty($_POST['description']) || empty($_POST['technos']) || empty($_POST['url'])) {
            $_SESSION['error'] = 'Vous devez remplir tous les champs';
        }

        if(isset($_FILES['screen']) && $_FILES['screen']['error'] == 0) {
            upload($_FILES['screen'], 200000, ['png', 'jpg'], 'public/img/project/'.$_FILES['screen']['name']);
        }

        if(!isset($_SESSION['error'])) {
            $pathScreenImg = (isset($_FILES['screen'])) ? 'img/project/'.$_FILES['screen']['name'] : NULL;
            addProject($pathScreenImg, $_POST['alt'], $_POST['description'], $_POST['technos'], $_POST['url'], $_POST['add-techno']);
            $_SESSION['success'] = 'Votre projet a bien été ajouté';
        }

        header('Location: index.php?page=project&action=add');
        exit();
    }

    /* Editer un projet */

    if(isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {

        $id = (int)$_GET['id'];
        $project = getProjectById($id);

        if(!$project) {
            header('Location: index.php?page=project');
            exit();
        }

        if(isset($_POST['edit-project'])) {
            if(empty($_POST['description']) || empty($_POST['alt'])){
                $_SESSION['error'] = 'Vous devez remplir tous les champs';
            }

            if(isset($_FILES['screen']) && $_FILES['screen']['error'] == 0) {
                upload($_FILES['screen'], 200000, ['png', 'jpg'], 'public/'.$project['img_path_project']);
            }

            if(!isset($_SESSION['error'])) {
                editProject($id, $_POST['alt'], $_POST['description'], $_POST['add-techno'], $_POST['url']);
                $_SESSION['success'] = 'Votre projet a bien été modifié';
            }

            header('Location: index.php?page=project&action=edit&id='.$project['id_project']);
            exit();
        }
    }

    /* Supprimer un projet */

    if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $project = getProjectById($id);
        if (!$project) {
            header('Location: index.php?page=project');
            exit();
        }

        deleteProject($id);
        unlink('public/' . $project['img_path_project']);
        $_SESSION['success'] = 'Votre projet a bien été supprimé';
        header('Location: index.php?page=project');
        exit();
    }

    $projects = getProjects();
    $technos = getTechnos();
    require_once 'view/backend/adminProjectView.php';
}

function contactAdmin() {

    $content = getContentContact();

    if(isset($_POST['content-submit'])) {
        editContentContact($_POST['content']);
        $_SESSION['success'] = 'Votre message a bien été modifié';
        header('Location: index.php?page=contact');
        exit();
    }

    require_once 'view/backend/adminContactView.php';
}

function messageAdmin() {

    if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $message = getMessageById($id);
        if (!$message) {
            header('Location: index.php?page=message');
            exit();
        }

        deleteMessage($id);
        $_SESSION['success'] = 'Le message a bien été supprimé';
        header('Location: index.php?page=message');
        exit();
    }

    $messages = getMessages();

    require_once 'view/backend/adminMessageView.php';
}
