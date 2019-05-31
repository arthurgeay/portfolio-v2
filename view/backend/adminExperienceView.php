<?php $title = 'Parcours'; ?>

<?php ob_start(); ?>

<!-- Affichage formulaire d'ajout ou de modification parcours -->
<?php if (isset($_GET['action'])): ?>
    <?php if ($_GET['action'] == 'add' || ($_GET['action'] == 'edit') && isset($_GET['id'])): ?>
        <?php $name = ($_GET['action'] == 'add') ? 'add-experience' : 'edit-experience' ?>
        <h1><?= ($_GET['action'] == 'add') ? 'Ajouter ' : 'Editer ' ?>une expérience / formation</h1>
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

        <form method="post">
            <select name="type_experience">
                <option value="pro" <?= (isset($experience) && $experience['id_type_experience'] == 1) ? 'selected' : ''; ?>>
                    Expérience professionnelle
                </option>
                <option value="educ" <?= (isset($experience) && $experience['id_type_experience'] == 2) ? 'selected' : ''; ?>>
                    Formation
                </option>
            </select>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" placeholder="Titre du poste ou de la formation" name="title_experience"
                           value="<?= (isset($experience)) ? $experience['title_experience'] : ''; ?>"/>
                </div>
                <div class="col-md-6">
                    <input type="text" placeholder="Entreprise ou établissement de formation" name="place_experience"
                           value="<?= (isset($experience)) ? $experience['place_experience'] : ''; ?>"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="dateStart">Date de début</label>
                    <input id="dateStart" type="date" placeholder="Date de début" name="date_start"
                           value="<?= (isset($experience)) ? $experience['date_start_experience'] : ''; ?>"/>
                </div>
                <div class="col-md-6">
                    <label for="dateEnd">Date de fin</label>
                    <input id="dateEnd" type="date" name="date_end"
                           value="<?= (isset($experience)) ? $experience['date_end_experience'] : ''; ?>"/>
                </div>
            </div>
            <textarea cols="10"
                      name="description"><?= (isset($experience)) ? $experience['content_experience'] : 'Description'; ?></textarea>
            <input type="submit" name="<?= $name; ?>"/>
        </form>

    <?php endif; ?>


    <!-- Affichage page parcours -->
<?php else: ?>
    <h1>Administration de la section parcours</h1>
    <hr>

    <?php if (isset($_SESSION['success'])): ?>
        <p class="success"><?= $_SESSION['success']; ?></p>
        <?php
        unset($_SESSION['success']);
    endif; ?>

    <a href="index.php?page=experience&action=add" class="btn btn-admin">Ajouter une expérience ou une formation</a>
    <h2>Expériences professionnelles</h2>
    <?php foreach ($professionnals as $professionnal): ?>
        <div class="parcours">

            <div class="parcours-content">
                <h3><?= $professionnal['title_experience'] ?> @ <?= $professionnal['place_experience'] ?></h3>
                <?= $professionnal['content_experience']; ?>
            </div>
            <div class="actions">
                <a href="index.php?page=experience&action=edit&id=<?= $professionnal['id_experience']; ?>"
                   class="btn btn-primary btn-lg">Modifier</a>
                <a href="index.php?page=experience&action=delete&id=<?= $professionnal['id_experience']; ?>"
                   class="btn btn-danger btn-lg" data-toggle="modal"
                   data-target="#modal<?= $professionnal['id_experience']; ?>">Supprimer</a>
            </div>
        </div>

        <div class="modal fade" id="modal<?= $professionnal['id_experience']; ?>" tabindex="-1" role="dialog"
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
                        <p>Êtes-vous sûr de vouloir supprimer cette expérience ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger"
                           href="index.php?page=experience&action=delete&id=<?= $professionnal['id_experience']; ?>">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <h2>Formations</h2>
    <?php foreach ($formations as $formation): ?>
        <div class="parcours">
            <div class="parcours-content">
                <h3><?= $formation['title_experience']; ?> <?= (!empty($formation['place_experience'])) ? ' @ ' . $formation['place_experience'] : ''; ?></h3>
                <?= $formation['content_experience']; ?>
            </div>
            <div class="actions">
                <a href="index.php?page=experience&action=edit&id=<?= $formation['id_experience']; ?>"
                   class="btn btn-primary btn-lg">Modifier</a>
                <a href="index.php?page=experience&actiondelete&id=<?= $formation['id_experience']; ?>"
                   class="btn btn-danger btn-lg" data-toggle="modal"
                   data-target="#modal<?= $formation['id_experience']; ?>"">Supprimer</a>
            </div>
        </div>

        <div class="modal fade" id="modal<?= $formation['id_experience']; ?>" tabindex="-1" role="dialog"
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
                        <p>Êtes-vous sûr de vouloir supprimer cette expérience ? </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger"
                           href="index.php?page=experience&action=delete&id=<?= $formation['id_experience']; ?>">Supprimer</a>
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
<?php $script = ob_get_clean(); ?>

<?php require_once 'template.php'; ?>
