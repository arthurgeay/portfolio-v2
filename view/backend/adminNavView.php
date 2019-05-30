<?php $title = 'Menu de navigation'; ?>

<?php ob_start(); ?>

<h1>Informations du menu de navigation</h1>
<hr>

<?php if(isset($_SESSION['success'])): ?>
    <p class="success"><?= $_SESSION['success']; ?></p>
<?php
unset($_SESSION['success']);
endif; ?>

<form method="post">
    <input type="file" id="file"/>
    <label for="file" id="label-file">Choisissez une image...</label>
    <input type="text" placeholder="Texte alternatif pour l'image" name="alt" value="<?= $info['alt_img_header_info']; ?>"/>
    <input type="text" placeholder="URL de votre compte Twitter" name="twitter" value="<?= $info['url_twitter_header_info']; ?>"/>
    <input type="text" placeholder="URL de votre compte Linkedin" name="linkedin" value="<?= $info['url_linkedin_header_info']; ?>"/>
    <input type="text" placeholder="URL de votre compte Github" name="github" value="<?= $info['url_github_header_info']; ?>"/>
    <input type="submit"/>
</form>

<?php $content = ob_get_clean(); ?>


<?php ob_start(); ?>
<script src="public/js/sidebar-menu.js"></script>
<script src="public/js/input-file.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require_once 'template.php'; ?>
