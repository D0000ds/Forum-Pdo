<?php

$topic = $result["data"]['topic'];


 ?>

<h1>detail Topic</h1>

<?php

echo "<a href='index.php?ctrl=forum&action=detailUser&id=".$topic->getUser()->getId()."'>".$topic->getUser()."</a><br>";
echo "Membre du Forum depuis ".$topic->getUser()->getDateInscription()."<br>";
echo $topic->getTitle()."<br>";
echo $topic->getDescription()."<br>";
echo "Publication posté le ".$topic->getCreationdate()."<br>";


?>
        
<h3>--------------------Commentaire------------------------</h3>
        
<?php

$messages = $result["data"]['messages'];

if(is_array($messages) || is_object($messages)){
    foreach($messages as $message){
        ?>
        
        <h3>--------------------Message------------------------</h3>
        
        <?php
        echo "<a href='index.php?ctrl=forum&action=detailUser&id=".$message->getUser()->getId()."'>".$message->getUser()."</a><br>";
        echo "Membre du Forum depuis ".$message->getUser()->getDateInscription()."<br>";
        echo $message->getTexte()."<br>";
        echo "Publication posté le ".$message->getDatePublication()."<br>";
    }    
} else {
    echo "Il y a aucun Commentaire.<br>";
}

