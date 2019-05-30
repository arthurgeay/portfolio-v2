<?php $title = 'Projets'; ?>

<?php ob_start(); ?>

<!-- Affichage formulaire pour ajout et modification projet -->
<?php if (isset($_GET['action'])) : ?>
    <?php if ($_GET['action'] == 'add' || ($_GET['action'] == 'edit') && isset($_GET['id'])): ?>
        <?php $name = ($_GET['action'] == 'add') ? 'add-project' : 'edit-project' ?>
        <h1><?= ($_GET['action'] == 'add') ? 'Ajouter ' : 'Editer ' ?> un projet</h1>
        <hr>

        <?php if (isset($_SESSION['success'])): ?>
            <p class="success"><?= $_SESSION['success']; ?></p>
            <?php
            unset($_SESSION['success']);
        endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <p class="error"><?= $_SESSION['error']; ?></p>
            <?php
            unset($_SESSION['error']);
        endif; ?>

        <form method="post" enctype="multipart/form-data">
            <input type="file" id="file" name="screen"/>
            <label for="file" id="label-file">Choisissez une capture d'écran (.png)</label>
            <input type="text" placeholder="Texte alternatif pour l'image" name="alt" value="<?= (isset($project)) ? $project['alt_img_project'] : ''; ?>"/>
            <textarea name="description"><?= (isset($project)) ? $project['content_project'] : 'Description'; ?></textarea>
            <?php if($_GET['action'] == 'add'): ?>
            <select id="tech-select" multiple name="technos[]">
                <option disabled>Selectionner une technologie...</option>
                <?php foreach ($technos as $techno): ?>
                    <option value="<?= $techno['id_label_type']; ?>"><?= $techno['title_label_type']; ?></option>
                <?php endforeach; ?>
            </select>
            <?php endif; ?>
            <input type="text" placeholder="Ajouter une technologie" name="add-techno"/>
            <input type="text" placeholder="URL du projet" name="url" value="<?= (isset($project)) ? $project['url_project'] : ''; ?>"/>

            <input type="submit" name="<?= $name; ?>"/>
        </form>
    <?php endif; ?>

    <!-- Affichage liste des projets -->
<?php else: ?>
    <h1>Administration de la section projets</h1>
    <hr>

    <?php if (isset($_SESSION['success'])): ?>
        <p class="success"><?= $_SESSION['success']; ?></p>
        <?php
        unset($_SESSION['success']);
    endif; ?>

    <a href="index.php?page=project&action=add" class="btn btn-admin">Ajouter un projet</a>

    <?php foreach ($projects as $project): ?>
        <div class="project">
            <div class="project-content">
                <div class="content-text">
                    <h3><?= substr($project['url_project'], 8, strlen($project['url_project'])); ?></h3>
                    <p><?= $project['content_project']; ?></p>
                    <p><strong>Technologies utilisées :</strong></p>
                    <ul>
                        <?php foreach ($project['title_label_type'] as $techno): ?>
                            <li class="badge badge-secondary"><?= $techno; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="content-img">
                    <img src="public/<?= $project['img_path_project']; ?>" alt="<?= $project['alt_img_project']; ?>"/>
                </div>
            </div>
            <div class="actions">
                <a href="index.php?page=project&action=edit&id=<?= $project['id_project']; ?>"
                   class="btn btn-primary btn-lg">Modifier</a>
                <a href="index.php?page=project&action=delete&id=<?= $project['id_project']; ?>"
                   class="btn btn-danger btn-lg" data-toggle="modal"
                   data-target="#modal<?= $project['id_project']; ?>">Supprimer</a>
            </div>
        </div>

        <div class="modal fade" id="modal<?= $project['id_project']; ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer ce projet ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger"
                           href="index.php?page=project&action=delete&id=<?= $project['id_project']; ?>">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="public/js/sidebar-menu.js"></script>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=mzsxobhcy2bmaw0f297tdggvpn0hitc49u401ssum981ee5q"></script>
<script src="public/js/tinymce.js"></script>
<script src="public/js/input-file.js"></script>
<?php $script = ob_get_clean(); ?>


<?php require_once 'template.php'; ?>
