<?php $title = 'Messagerie'; ?>

<?php ob_start(); ?>
<h1>Administration de la messagerie</h1>
<hr>

<?php if (isset($_SESSION['success'])): ?>
    <p class="success"><?= $_SESSION['success']; ?></p>
    <?php
    unset($_SESSION['success']);
endif; ?>

<?php if(!empty($messages)): ?>
<?php foreach($messages as $message): ?>
<div class="message">
    <div class="message-content">
        <h3><?= $message['fullname_message']; ?> - le <?= $message['date_message']; ?></h3>
        <p>Adresse e-mail : <strong><?= $message['email_message']; ?></strong></p>
        <p>
            <?= nl2br($message['content_message']); ?>
        </p>
    </div>
    <div class="actions">
        <a href="#" class="btn btn-danger btn-lg" data-toggle="modal"
           data-target="#modal<?= $message['id_message']; ?>">Supprimer</a>
    </div>
</div>

    <div class="modal fade" id="modal<?= $message['id_message']; ?>" tabindex="-1" role="dialog"
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
                    <p>Êtes-vous sûr de vouloir supprimer ce message ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-danger"
                       href="index.php?page=message&action=delete&id=<?= $message['id_message']; ?>">Supprimer</a>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<?php else: ?>

<p class="info">Vous n'avez reçu aucun message</p>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="public/js/sidebar-menu.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require_once 'template.php'; ?>
