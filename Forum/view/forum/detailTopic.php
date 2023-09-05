<?php
$topic = $result["data"]['topic'];
$messages = $result["data"]['messages'];


?>
<div class="container-topic">
    <a href="index.php?ctrl=forum&action=detailUser&id=<?= $topic->getUser()->getId(); ?>" class="categorie-lien">
        <figure class="topic-auteur">
            <img src="<?= $topic->getUser()->getPicture(); ?>" alt="profile picture of <?= $topic->getUser(); ?>">
            <h2><?= $topic->getUser(); ?></h2>
            <span>A rejoins le forum le <?= $topic->getUser()->getDateInscription(); ?></span>
        </figure>
    </a>
    <div class="topic-detail">
        <h1><?= $topic->getTitle(); ?></h1>
        <p><?= $topic->getDescription(); ?></p>
        <div class="topic-like-post">
            <figure class="topic-like-post-figure">
                <img src="./public/img/like.png" alt="like">
                <span>0</span>
            </figure>
            <span>Posté le <?= $topic->getCreationdate(); ?></span>
        </div>
    </div>
</div>
