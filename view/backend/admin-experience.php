<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/main.css" />
        <link rel="stylesheet" href="../css/admin.css" />
        <title>Administration - Parcours</title>
    </head>
    <body>
        <div class="wrapper">
            <!-- Menu sidebar -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Admin portfolio</h3>
                </div>

                <ul class="list-unstyled">
                    <li class="active">
                        <a href="adminNavView.php">Menu de navigation</a>
                    </li>
                    <li>
                        <a href="adminAboutView.php">A propos</a>
                    </li>
                    <li>
                        <a href="admin-experience.php">Parcours</a>
                    </li>
                    <li>
                        <a href="admin-skills.php">Compétences</a>
                    </li>
                    <li>
                        <a href="admin-project.php">Projets</a>
                    </li>
                    <li>
                        <a href="admin-contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="admin-message.php">Messagerie</a>
                    </li>
                </ul>
            </nav>

            <!-- Main content -->
            <main>

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="navbar-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Bonjour Arthur
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Déconnexion</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="container">
                    <h1>Administration de la section parcours</h1>
                    <hr>
                    <a href="admin-edit-experience.php" class="btn btn-admin">Ajouter une expérience ou une formation</a>
                    <h2>Expériences professionnelles</h2>
                    <div class="parcours">
                        <div class="parcours-content">
                            <h3>Développeur web @ ENVOLiiS</h3>
                            <p><strong>Les missions :</strong></p>
                            <ul>
                                <li>Développement d'un portail Power BI</li>
                                <li>Développement d'un outil d'import de contrat</li>
                            </ul>
                        </div>
                        <div class="actions">
                            <a href="#" class="btn btn-primary btn-lg">Modifier</a>
                            <a href="#" class="btn btn-danger btn-lg">Supprimer</a>
                        </div>
                    </div>

                    <h2>Formations</h2>
                    <div class="parcours">
                        <div class="parcours-content">
                            <h3>Bachelor Informatique et Systèmes d'Information @ Ynov Informatique</h3>
                            <p>La formation d’Ynov Informatique prépare au titre d’Expert Informatique <br/>et Systèmes
                                d’Information, enregistré au Répertoire National de la Certification Professionnelle (RNCP)
                                au niveau I.)</p>
                        </div>
                        <div class="actions">
                            <a href="#" class="btn btn-primary btn-lg">Modifier</a>
                            <a href="#" class="btn btn-danger btn-lg">Supprimer</a>
                        </div>
                    </div>
                </div>

            </main>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script src="../js/sidebar-menu.js"></script>
    </body>
</html>