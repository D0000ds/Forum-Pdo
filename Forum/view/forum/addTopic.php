<?php
$categorie = $result["data"]['categorie'];


?>
<div class="container-home">
    <div class="card">
        <div class="card-title">
            <h1>Ajouter un Topic</h1>
        </div>
        <div class="container-form-inscription">
            <form action="index.php?ctrl=forum&action=postTopic&id=<?= $categorie->getId(); ?>" method="post" class="form-incription">
                <input type="text" name="titleTopic" class="form-inscription-input" placeholder="Titre">
                <textarea name="descTopic" class="form-text-area" cols="30" rows="10" placeholder="Description"></textarea>
                <input type="submit" value="Ajouter" name="add" class="bouton-sup">
            </form>
        </div>
    </div>
</div>