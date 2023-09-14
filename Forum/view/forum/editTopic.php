<?php

$topic = $result["data"]['topic'];


?>

<div class="container-home">
    <div class="card">
        <div class="card-title">
            <h1>Modifier le topic</h1>
        </div>
        <div class="container-form-inscription">
            <form action="index.php?ctrl=forum&action=postEdit&id=<?= $topic->getId(); ?>" method="post" class="form-incription">
            <textarea name="titleEdit" class="form-inscription-input" cols="30" rows="10"><?= $topic->getTitle(); ?></textarea>
                <textarea name="descEdit" class="form-text-area" cols="30" rows="10"><?= $topic->getDescription(); ?></textarea>
                <input type="submit" value="Modifier" name="edit" class="bouton-sup">
            </form>
        </div>
    </div>