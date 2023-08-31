<?php

$topics = $result["data"]['topics'];


foreach($topics as $topic ){

    echo"--------------------Topic---------------------------<br>";
    ?>
    <a href="index.php?ctrl=forum&action=detailTopic&id=<?=$topic->getId()?>"><?=$topic->getTitle()?><br>
    <span><?=$topic->getDescription()?><br></span>
    </a>
    <?php
}
?>
