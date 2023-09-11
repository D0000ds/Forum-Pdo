<?php
$topic = $result["data"]['topic'];
$messages = $result["data"]['messages'];

?>
<div class="container-detailTopic">
<div class="container-topic">
    <a href="index.php?ctrl=forum&action=detailUser&id=<?= $topic->getUser()->getId(); ?>" class="categorie-lien">
        <figure class="topic-auteur">
            <img src="<?= $topic->getUser()->getPicture(); ?>" alt="profile picture of <?= $topic->getUser(); ?>" class="imgTopicAuteur">
            <h2><?= $topic->getUser(); ?></h2>
            <span>A rejoins le forum le <?= $topic->getUser()->getDateInscription(); ?></span>
        </figure>
    </a>
    <div class="topic-detail">
        <h1><?= $topic->getTitle(); ?></h1>
        <p><?= $topic->getDescription(); ?></p>
        <div class="topic-like-post">
            <figure class="topic-like-post-figure">
                <a href=""><img src="./public/img/like.png" alt="like"></a>
                <span><?php if($topic->getLikes() == NULL){
                    echo"0";
                }else echo $topic->getLikes(); ?></span>
            </figure>
            <span>Posté le <?= $topic->getCreationdate(); ?></span>
        </div>
    </div>
</div>
<?php
if(is_array($messages) || is_object($messages)){
    foreach($messages as $message){ ?>
        <div class="container-topic">
            <a href="index.php?ctrl=forum&action=detailUser&id=<?= $message->getUser()->getId(); ?>" class="categorie-lien">
                <figure class="topic-auteur">
                    <img src="<?= $message->getUser()->getPicture(); ?>" alt="profile picture of <?= $message->getUser(); ?>" class="imgTopicAuteur">
                    <h2><?= $message->getUser(); ?></h2>
                    <span>A rejoins le forum le <?= $message->getUser()->getDateInscription(); ?></span>
                </figure>
            </a>
            <div class="topic-detail">
                <p><?= $message->getTexte(); ?></p>
                <div class="topic-like-post">
                    <figure class="topic-like-post-figure">
                        <a href=""><img src="./public/img/like.png" alt="like"></a>
                        <span><?php if($message->getLikes() == NULL){
                            echo"0";
                        }else echo $message->getLikes(); ?></span>
                    </figure>
                    <span>Posté le <?= $message->getDatePublication(); ?></span>
                </div>
            </div>
        </div>
<?php }
}

?>
</div>