<?php

$categories = $result["data"]['categories'];
    
?>

<h1>list categorie</h1>
<?php
foreach($categories as $categorie ){

    ?>
    <a href="index.php?ctrl=forum&action=TopicByCategorie&id=<?=$categorie->getId()?>"><?=$categorie->getLibelle()?><br></a>
    <?php
}