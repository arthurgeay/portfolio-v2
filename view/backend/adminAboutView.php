<?php $title = 'Section présentation'; ?>

<?php ob_start(); ?>

    <h1>Administration de la section présentation</h1>
    <hr>

    <?php if(isset($_SESSION['success'])): ?>
        <p class="success"><?= $_SESSION['success']; ?></p>
        <?php
        unset($_SESSION['success']);
    endif; ?>

    <?php if(isset($_SESSION['error'])): ?>
        <p class="error"><?= $_SESSION['error']; ?></p>
        <?php
        unset($_SESSION['error']);
    endif; ?>

    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <input type="text" placeholder="Nom complet" name="fullname" value="<?= $about['fullname_about']; ?>"/>
            </div>
            <div class="col-md-6">
                <input type="text" id="dateBirth" placeholder="Date de naissance" name="birthday" value="<?= $about['birthday_about']; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <input type="text" placeholder="Ville" name="city" value="<?= $about['city_about']; ?>"/>
            </div>
            <div class="col-md-6">
                <input type="email" placeholder="Adresse e-mail" name="email" value="<?= $about['email_about']; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <input type="tel" placeholder="Téléphone" name="phone" value="<?= $about['phone_about']; ?>"/>
            </div>
            <div class="col-md-6">
                <input type="text" placeholder="Hobbies" name="hobbies" value="<?= $about['hobbies_about']; ?>"/>
            </div>
        </div>

        <input type="text" placeholder="Titre / Poste occupé" name="current_job" value="<?= $about['current_job_about']; ?>"/>

        <textarea rows="10" name="description"><?= $about['description_about']; ?></textarea>

        <input type="file" id="file" name="cv" />
        <label for="file" id="label-file">Envoyez un nouveau CV (.pdf)</label>
        <input type="submit"/>
    </form>

<?php $content = ob_get_clean(); ?>


<?php ob_start(); ?>
    <script src="public/js/sidebar-menu.js"></script>
    <script src="public/js/input-file.js"></script>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=mzsxobhcy2bmaw0f297tdggvpn0hitc49u401ssum981ee5q"></script>
    <script src="public/js/tinymce.js"></script>
    <script src="public/js/input-date.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require_once 'template.php';
