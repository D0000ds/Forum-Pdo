<?php

$topics = $result["data"]['topics'];
$categorie = $result["data"]['categorie'];


if($topics !== NULL){
    ?>
    <div class="container-home">
        <div class="card">
            <div class="card-title">
                <h1><?=$categorie->getLibelle()?></h1>
            </div>

    <?php
    foreach($topics as $topic){
        ?>
        <a class="categorie-lien" href="index.php?ctrl=forum&action=detailTopic&id=<?=$topic->getId()?>">
        <div class="categorie">
            <figure class="categorie-img">
                <img class="categorie-img" src="<?=$categorie->getPicture()?>" alt="<?=$categorie->getLibelle()?>">
            </figure>
            <div class="categorie-title">
                <h2><?=$topic->getTitle()?></h2>
                <span>publié le <?=$topic->getCreationdate()?></span>
            </div>
            <div class="categorie-nb-topics">
                <div class="categorie-auteur">
                    <span>Auteur: <?=$topic->getUser()?></span><br>
                </div>
            </div>
        </div>
        </a>
        <?php
    }
    ?>
        </div>
    </div>
    <?php
} else {
    ?>
    <h2>Il n'y a aucun topic dans cette catégorie...</h2>
     <?php
}
