<?php 
$topics = $result["data"]['topics'];
?>

<div class="container-home">
    <div class="card">
        <div class="card-title">
            <h1>Les Derniers Topics</h1>
        </div>
<?php
foreach($topics as $topic){
    ?>
    <a class="categorie-lien" href="index.php?ctrl=forum&action=detailTopic&id=<?=$topic->getId()?>">
        <div class="categorie">
            <figure class="categorie-img">
                <img class="categorie-img" src="<?=$topic->getCategorie()->getPicture()?>" alt="<?=$topic->getCategorie()->getLibelle()?>">
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
}?>
    </div>
</div>

<?php