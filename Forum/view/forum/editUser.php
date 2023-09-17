<?php

$user = $result["data"]['user'];


?>

<div class="container-home">
    <div class="card">
        <div class="card-title">
            <h1>Modifier l'utilisateur</h1>
        </div>
        <div class="container-form-inscription">
            <form action="index.php?ctrl=forum&action=PostUser&id=<?= $user->getId(); ?>" method="post" class="form-incription">
                <textarea name="pseudoEdit" class="form-inscription-input" cols="30" rows="10"><?= $user->getPseudo(); ?></textarea>
                <textarea name="emailEdit" class="form-inscription-input" cols="30" rows="10"><?= $user->getEmail(); ?></textarea>
                <input type="file" name="pictureUserEdit" class="form-inscription-profile-picture">
                <input type="submit" value="Modifier" name="edit" class="bouton-sup">
            </form>
        </div>
    </div>