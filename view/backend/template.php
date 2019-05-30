<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/main.css" />
    <link rel="stylesheet" href="public/css/admin.css" />
    <title>Administration - <?= $title; ?></title>
</head>
<body>
<div class="wrapper">
    <!-- Menu sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Admin portfolio</h3>
        </div>

        <ul class="list-unstyled">
            <li class="<?= (isset($_GET['page']) && $_GET['page'] == 'menu') ? 'active' : '' ?>">
                <a href="index.php?page=menu">Menu de navigation</a>
            </li>
            <li class="<?= (isset($_GET['page']) && $_GET['page'] == 'about') ? 'active' : '' ?>">
                <a href="index.php?page=about">A propos</a>
            </li>
            <li class="<?= (isset($_GET['page']) && $_GET['page'] == 'experience') ? 'active' : '' ?>">
                <a href="index.php?page=experience">Parcours</a>
            </li>
            <li class="<?= (isset($_GET['page']) && $_GET['page'] == 'skills') ? 'active' : '' ?>">
                <a href="index.php?page=skills">Compétences</a>
            </li>
            <li class="<?= (isset($_GET['page']) && $_GET['page'] == 'project') ? 'active' : '' ?>">
                <a href="index.php?page=project">Projets</a>
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
                                Bonjour <?= $_SESSION['email']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.php?page=logout">Déconnexion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <?= $content; ?>
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

<?= $script; ?>

</body>
</html>