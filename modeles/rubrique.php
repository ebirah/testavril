<?php
$sql = "SELECT a.id, a.letitre,r.id,r.lintitule,u.lelogin AS lelogin, SUBSTRING(a.ladesc,1 ,300)AS ladesc, a.ladate
       FROM article a
       INNER JOIN article_has_rubrique h
       ON a.id = h.article_id
       INNER JOIN rubrique r
       ON r.id = h.rubrique_id
       INNER JOIN util u
        ON u.id = h.article_id
        WHERE r.id = $idrubrique
        ORDER BY ladate DESC
       ";
$req_rubrique = mysqli_query($mysqli, $sql)or die(mysqli_error ($mysqli));

$tab_rubrique = mysqli_fetch_all($req_rubrique, MYSQLI_ASSOC);
//var_dump($tab_article);

$nb = mysqli_num_rows($req_rubrique);
?>