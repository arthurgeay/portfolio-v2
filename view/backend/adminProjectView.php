<?php $title = 'Projets'; ?>

<?php ob_start(); ?>

<h1>Administration de la section projets</h1>
<hr>
<a href="admin-edit-project.php" class="btn btn-admin">Ajouter un projet</a>
<div class="project">
    <div class="project-content">
        <div class="content-text">
            <h3>moncoutant.arthurgeay.fr</h3>
            <p>Réalisation d'un site web pour les activités culturelles de la ville de Moncoutant</p>
            <p><strong>Technologies utilisées :</strong></p>
            <ul>
                <li class="badge badge-secondary">HTML &amp; CSS</li>
                <li class="badge badge-secondary">WordPress</li>
            </ul>
        </div>
        <div class="content-img">
            <img src="public/img/project/moncoutant.jpg"/>
        </div>
    </div>
    <div class="actions">
        <a href="#" class="btn btn-primary btn-lg">Modifier</a>
        <a href="#" class="btn btn-danger btn-lg">Supprimer</a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="public/js/sidebar-menu.js"></script>
<?php $script = ob_get_clean(); ?>


<?php require_once 'template.php'; ?>
