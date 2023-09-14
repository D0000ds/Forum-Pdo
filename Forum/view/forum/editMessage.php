<?php

$message= $result["data"]['message'];


?>

<div class="container-home">
    <div class="card">
        <div class="card-title">
            <h1>Modifier le message</h1>
        </div>
        <div class="container-form-inscription">
            <form action="index.php?ctrl=forum&action=messageEdit&id=<?= $message->getId(); ?>" method="post" class="form-incription">
                <textarea name="msgEdit" class="form-text-area" cols="30" rows="10"><?= $message->getTexte(); ?></textarea>
                <input type="submit" value="Modifier" name="edit" class="bouton-sup">
            </form>
        </div>
    </div>