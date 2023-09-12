<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Forum</title>
</head>
<body>
    <div class="container">
        <header>
            <nav class="nav">
                <figure class="imgFigureNav">
                    <a href="./index.php">
                        <img src="./public/img/forum.png" alt="Logo Forum">
                    </a>
                </figure>
                <ul class="ul">
                    <div class="hoverNav"><li><a href="index.php?ctrl=forum&action=listCategorie">Catégorie</a></li></div>
                    <div class="hoverNav"><li><a href="index.php?ctrl=forum&action=lastTopics">Dernier Topics</a></li></div>
                    <div class="hoverNav"><li><a href="index.php?ctrl=forum&action=lastMessages">Dernier Messages</a></li></div>
                    <div class="hoverNav"><li><a href="index.php?ctrl=home&action=reglement">Règlement</a></li></div>
                </ul>
                <?php
                if(isset($_SESSION["user"])){ ?>
                    <div class="inscription_connexion">
                        <button><?= $_SESSION["user"]->getPseudo()?></button>
                        <div class="panel">
                            <ul>
                                <a href=""><li>Profile</li></a>
                                <?php if($_SESSION["user"]->getRole() == "admin"){  echo"<a href=''><li>Pannel Admin</li></a>"; }?>
                                <a href=""><li>Déconnexion</li></a>
                            </ul>
                        </div>
                        <figure class="figure-profile-picture">
                            <img src="<?= $_SESSION["user"]->getPicture()?>" alt="picture of <?= $_SESSION["user"]->getPseudo()?>" class="profile-picture">
                        </figure>
                    </div>
        <?php   } else { ?>
                    <div class="inscription_connexion">
                        <a class="hoverNav" href="index.php?ctrl=security&action=register">Inscription</a>
                        <span class="speration">/</span>
                        <a class="hoverNav" href="index.php?ctrl=security&action=login">Connexion</a>
                    </div>
            <?php }
                ?>
                <div class="burger">
                    <span></span>
                </div>
            </nav>
        </header>
        <main>
            <?= $content ?>
        </main>
        <footer class="nav">
        </footer>
    </div>
    <script src=".\public\js\script.js"></script>
</body>
</html>
<?php
