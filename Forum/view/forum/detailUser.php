<?php
$user = $result["data"]['user'];
$topics = $result["data"]['topics'];
$messages = $result["data"]['messages'];
$nbMessage = $result["data"]['nbMessage'];
$nbTopic = $result["data"]['nbTopic'];

?>
<div class="container-DetailUser">
    <div class="container-InfoUser">
        <figure class="picture-profile-card">
            <img src="<?= $user->getPicture(); ?>" alt="profile picture of <?= $user->getPseudo(); ?>" class="imgTopicAuteur">
        </figure>
        <div class="card-stats">
            <div class="card-stats-title">
                <h2>Infos</h2>
            </div>
            <h2>Username</h2>
            <h3><?= $user->getPseudo(); ?></h3>
            <h2>Date d'incription</h2>
            <h3>le <?= $user->getDateInscription(); ?></h3>
        </div>
        <div class="card-stats">
            <div class="card-stats-title">
                <h2>Stats</h2>
            </div>
            <h2>Role</h2>
            <h3><?= $user->getRole(); ?></h3>
            <h2>Nombre de Topics</h2>
            <h3><?php if($nbTopic){
                echo $nbTopic->getNbTopic();
            }else {
                echo "0";
            } ?></h3>
            <h2>Nombre de messages</h2>
            <h3><?php if($nbMessage){
                echo $nbMessage->getNbMessage();
            }else {
                echo "0";
            } ?></h3>
        </div>
    </div>
    <aside class="container-all-topics-user">
        <div class="card">
            <div class="card-title">
                <h1>Tout les topics de <?= $user->getPseudo(); ?></h1>
            </div>
            <?php
            if( $topics !== NULL){
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
                }
            } else {?>
                <h2>Cette utilisateur n'a posté aucun topic</h2>
    <?php }
            ?>
        </div>
        <div class="card">
            <div class="card-title">
                <h1>Tout les messages de <?= $user->getPseudo(); ?></h1>
            </div>
            <?php
            if($messages !== NULL){
                foreach($messages as $msg){
                    ?>
                    <a class="categorie-lien" href="index.php?ctrl=forum&action=detailTopic&id=<?=$msg->getTopic()->getId()?>">
                        <div class="categorie">
                            <figure class="categorie-img">
                                <img class="categorie-img" src="<?=$msg->getTopic()->getCategorie()->getPicture()?>" alt="<?=$msg->getTopic()->getCategorie()->getLibelle()?>">
                            </figure>
                            <div class="categorie-title">
                                <h2><?=$msg->getTopic()->getTitle()?></h2>
                                <span>Message sur ce topic</span>
                            </div>
                            <div class="categorie-nb-topics">
                                <div class="categorie-auteur">
                                    <span>Auteur: <?=$msg->getTopic()->getUser()?></span><br>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                }
            } else {?>
                <h2>Cette utilisateur n'a posté aucun message</h2>
    <?php }
            ?>
        </div>
    </aside>
</div>

