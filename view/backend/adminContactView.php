<?php $title = 'Contact'; ?>

<?php ob_start(); ?>

<h1>Administration section contact</h1>
<hr>

<?php if (isset($_SESSION['success'])): ?>
    <p class="success"><?= $_SESSION['success']; ?></p>
    <?php
    unset($_SESSION['success']);
endif; ?>

<form method="post">
    <textarea rows="8" name="content"><?= (isset($content)) ? $content['content_contact'] : 'Description'; ?></textarea>
    <input type="submit" name="content-submit" />
</form>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=mzsxobhcy2bmaw0f297tdggvpn0hitc49u401ssum981ee5q"></script>

<script src="public/js/sidebar-menu.js"></script>
<script src="public/js/tinymce.js"></script>
<script src="public/js/input-file.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require_once 'template.php'; ?>
