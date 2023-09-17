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
    if(App\Session::getUser()){
        ?><div class="container-img-listCategorie">
        <?php if(App\Session::isAdmin()){?>
                <a href="index.php?ctrl=forum&action=deleteCategorie&id=<?=$categorie->getId()?>">
                    <figure class="figure-img-listCategorie" style="background-color: #e4717a;">
                        <img src="./public/img/delete.png" alt="delete">
                    </figure>
                </a>
                <a href="index.php?ctrl=forum&action=editCategorie&id=<?=$categorie->getId()?>">
                    <figure class="figure-img-listCategorie" style="background-color: #735bf3;">
                        <img src="./public/img/edit.png" alt="modify">
                    </figure>
                </a>
    <?php } ?>
                <a href="index.php?ctrl=forum&action=addTopic&id=<?=$categorie->getId()?>">
                    <figure class="figure-img-listCategorie" style="background-color: #75da7e;">
                        <img src="./public/img/more.png" alt="add">
                    </figure>
                </a>
            </div>
        </div>
    </div>
<?php } 
} else {
    ?>
    <div>
        <h2>Il n'y a aucun topic dans cette catégorie...</h2>
        <?php
        if(App\Session::getUser()){
            ?><div class="container-img-listCategorie" style="justify-content: center;">
            <?php if(App\Session::isAdmin()){?>
                    <a href="index.php?ctrl=forum&action=deleteCategorie&id=<?=$categorie->getId()?>">
                        <figure class="figure-img-listCategorie" style="background-color: #e4717a;">
                            <img src="./public/img/delete.png" alt="delete">
                        </figure>
                    </a>
                    <a href="index.php?ctrl=forum&action=editCategorie&id=<?=$categorie->getId()?>">
                        <figure class="figure-img-listCategorie" style="background-color: #735bf3;">
                            <img src="./public/img/edit.png" alt="modify">
                        </figure>
                    </a>
    <?php } ?>
                <a href="index.php?ctrl=forum&action=addTopic&id=<?=$categorie->getId()?>">
                    <figure class="figure-img-listCategorie" style="background-color: #75da7e;">
                        <img src="./public/img/more.png" alt="add">
                    </figure>
                </a>
                </div>
            </div>
        </div>
    </div>
<?php }
}
