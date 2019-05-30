<?php

function upload($file, $size, $extensionAllowed, $destination) {
    if($file['size'] <= $size) {
        $infosImg = pathinfo($file['name']);
        $extensionImgUploaded = $infosImg['extension'];

        if(in_array($extensionImgUploaded, $extensionAllowed)) {
            move_uploaded_file($file['tmp_name'], $destination);
        } else {
            $_SESSION['error'] = 'Le format de fichier accepté est le '. $extensionAllowed[0] .' uniquement';
        }
    } else {
        $_SESSION['error'] = 'La taille de votre image est trop importante';
    }
}