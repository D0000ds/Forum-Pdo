<?php

$topics = $result["data"]['topics'];


foreach($topics as $topic ){

    echo"--------------------Topic---------------------------<br>";
    ?>
    <a href=""><?=$topic->getTitle()?><br>
    <span><?=$topic->getDescription()?><br></span>
    </a>
    <?php
}
?>
