<?php

$categories = $result["data"]['categories'];

    
?>

<div class="container-home">
    <div class="card">
        <div class="card-title">
            <h1>Toutes les Catégories</h1>
        </div>

<?php
foreach($categories as $categorie){
    ?>
    <a class="categorie-lien" href="index.php?ctrl=forum&action=listTopics&id=<?=$categorie->getId()?>">
        <div class="categorie">
            <figure class="categorie-img">
                <img class="categorie-img" src="<?=$categorie->getPicture()?>" alt="<?=$categorie->getLibelle()?>">
            </figure>
            <div class="categorie-title">
                <h2><?=$categorie->getLibelle()?></h2>
                <span><?=$categorie->getDescription()?></span>
            </div>
            <div class="categorie-nb-topics">
                <div class="categorie-span">
                    <span>Nombre de Topics</span><br>
                    <span>4</span>
                </div>
            </div>
        </div>
    </a>
    <?php
}
?>
    </div>
</div>