<?php

$topic = $result["data"]['topic'];


?>

<div class="container-home">
    <div class="card">
        <div class="card-title">
            <h1>Ajouter un message</h1>
        </div>
        <div class="container-form-inscription">
            <form action="index.php?ctrl=forum&action=postMessage&id=<?= $topic->getId(); ?>" method="post" class="form-incription">
                <textarea name="textMessage" class="form-text-area" cols="30" rows="10"></textarea>
                <input type="submit" value="Ajouter" name="add" class="bouton-sup">
            </form>
        </div>
    </div>
</div>