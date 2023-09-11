<?php 
$messages = $result["data"]['messages'];
?>
<div class="container-home">
    <div class="card">
        <div class="card-title">
            <h1>Les Derniers Messages</h1>
        </div>
<?php
foreach($messages as $message){
    ?>
    <a class="categorie-lien" href="index.php?ctrl=forum&action=detailTopic&id=<?=$message->getTopic()->getId()?>">
        <div class="categorie">
            <figure class="categorie-img">
                <img class="categorie-img" src="<?=$message->getTopic()->getCategorie()->getPicture()?>" alt="<?=$message->getTopic()->getCategorie()->getLibelle()?>">
            </figure>
            <div class="categorie-title">
                <h2><?=$message->getTopic()->getTitle()?></h2>
                <span>Nouveau message de <?=$message->getUser()->getPseudo()?></span>
            </div>
            <div class="categorie-nb-topics">
                <div class="categorie-auteur">
                    <span>Auteur: <?=$message->getTopic()->getUser()?></span><br>
                </div>
            </div>
        </div>
    </a>
    <?php
}?>
    </div>
</div>

<?php