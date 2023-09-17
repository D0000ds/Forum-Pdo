<div class="container-home">
    <div class="card">
        <div class="card-title">
            <h1>Menu</h1>
        </div>
        <div class="menu-lien">
            <a href="index.php?ctrl=forum&action=detailUser&id=<?php echo App\Session::getUser()->getId(); ?>" class="categorie-lien">
                <span>Profile</span>
            </a>
            <a href="index.php?ctrl=forum&action=logout" class="categorie-lien">
                <span>Déconnexion</span>
            </a>
        </div>
    </div>
</div>

