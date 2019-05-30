<?php $name = (isset($_GET['action']) && $_GET['action'] == 'firstConnect') ? 'register' : 'connect'; ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
              integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="public/css/main.css"/>
        <link rel="stylesheet" href="public/css/admin.css"/>
        <title>Connexion à l'administration</title>
    </head>
    <body>
        <main id="login">
            <section id="form-login">
                <h1>Connexion</h1>
                <hr>

                <?php if(isset($_SESSION['success'])): ?>
                    <p class="success"><?= $_SESSION['success']; ?></p>
                    <?php
                    unset($_SESSION['success']);
                endif; ?>

                <?php if(isset($_SESSION['error'])): ?>
                    <?php foreach($_SESSION['error'] as $error): ?>
                        <p class="error"><?= $error; ?></p>
                    <?php endforeach; ?>
                <?php
                unset($_SESSION['error']);
                endif; ?>
                <form method="post">
                    <input type="email" placeholder="Identifiant" name="email"   required autofocus/>
                    <input type="password" placeholder="Mot de passe" name="password" required/>
                    <input name="<?= $name; ?>" type="submit"/>
                </form>
                <?php if($name == 'connect'): ?>
                    <a href="index.php?page=connect&action=firstConnect">Première connexion ?</a>
                <?php else: ?>
                    <a href="index.php?page=connect">Se connecter</a>
                <?php endif; ?>
            </section>
        </main>


    </body>
</html>