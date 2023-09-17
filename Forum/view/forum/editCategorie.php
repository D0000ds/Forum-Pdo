<?php

$categorie = $result["data"]['categorie'];


?>

<div class="container-home">
    <div class="card">
        <div class="card-title">
            <h1>Modifier la catégorie</h1>
        </div>
        <div class="container-form-inscription">
            <form action="index.php?ctrl=forum&action=postCategorie&id=<?= $categorie->getId(); ?>" method="post" class="form-incription">
                <textarea name="libelleEdit" class="form-inscription-input" cols="30" rows="10"><?= $categorie->getLibelle(); ?></textarea>
                <textarea name="descEdit" class="form-text-area" cols="30" rows="10"><?= $categorie->getDescription(); ?></textarea>
                <input type="file" name="pictureEdit" class="form-inscription-profile-picture">
                <input type="submit" value="Modifier" name="edit" class="bouton-sup">
            </form>
        </div>
    </div>