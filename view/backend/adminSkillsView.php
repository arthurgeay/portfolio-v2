<?php $title = 'Parcours'; ?>

<?php ob_start(); ?>

<!-- Affichage formulaire d'ajout et de modifications d'une compétence -->
<?php if (isset($_GET['action'])) : ?>
    <?php if ($_GET['action'] == 'add' || ($_GET['action'] == 'edit') && isset($_GET['id'])): ?>
        <?php $name = ($_GET['action'] == 'add') ? 'add-skills' : 'edit-skills' ?>
        <h1><?= ($_GET['action'] == 'add') ? 'Ajouter ' : 'Editer ' ?> une compétence</h1>
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
            <input type="file" id="file" name="img"/>
            <label for="file" id="label-file">Choisissez une image...</label>
            <input type="text" placeholder="Texte alternatif pour l'image" name="alt" value="<?= (isset($skill)) ? $skill['alt_img_skills'] : ''; ?>"/>
            <input type="submit" name="<?= $name; ?>"/>
        </form>
    <?php endif; ?>

    <!-- Affichage des compétence -->
<?php else: ?>
    <h1>Administration de la section compétence</h1>
    <hr>

    <?php if (isset($_SESSION['success'])): ?>
        <p class="success"><?= $_SESSION['success']; ?></p>
        <?php
        unset($_SESSION['success']);
    endif; ?>

    <a href="index.php?page=skills&action=add" class="btn btn-admin">Ajouter une compétence</a>
    <h2>Mes compétences</h2>
    <?php foreach ($skills as $skill): ?>
        <div class="skills">
            <div class="skills-content">
                <h3><?= $skill['alt_img_skills']; ?></h3>
                <img src="<?= 'public/' . $skill['img_skills']; ?>" alt="<?= $skill['alt_img_skills']; ?>">
            </div>
            <div class="actions">
                <a href="index.php?page=skills&action=edit&id=<?= $skill['id_skills']; ?>"
                   class="btn btn-primary btn-lg">Modifier</a>
                <a href="index.php?page=skills&action=delete&id=<?= $skill['id_skills']; ?>"
                   class="btn btn-danger btn-lg" data-toggle="modal"
                   data-target="#modal<?= $skill['id_skills']; ?>">Supprimer</a>
            </div>
        </div>

        <div class="modal fade" id="modal<?= $skill['id_skills']; ?>" tabindex="-1" role="dialog"
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
                        <p>Êtes-vous sûr de vouloir supprimer cette compétence ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger"
                           href="index.php?page=skills&action=delete&id=<?= $skill['id_skills']; ?>">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

<?php endif; ?>


<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="public/js/sidebar-menu.js"></script>
<script src="public/js/input-file.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require_once 'template.php'; ?>
