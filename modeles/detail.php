<?php
$sql = "SELECT a.id, a.letitre,
GROUP_CONCAT(u.lelogin SEPARATOR '|||' )AS lelogin, a.ladesc, a.ladate
       FROM article a
       INNER JOIN article_has_utilisateur h
       ON a.id = h.article_id
       INNER JOIN util u
        ON u.id = h.article_id
        WHERE a.id = $idarticle

       ";
$req_article = mysqli_query($mysqli, $sql)or die(mysqli_error ($mysqli));

$tab_article = mysqli_fetch_assoc($req_article);
//var_dump($tab_article);
if(empty($tab_article['id'])){
    $erreur = "Cet article n'existe plus";
}