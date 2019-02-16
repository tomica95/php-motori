<?php 
    include "../connection.php";

    $update_post = "UPDATE posts SET title=:naslov,subtitle=:podnaslov,text=:text WHERE id_post=:id";

    $stmt = $connection->prepare($update_post);

    $stmt->execute([
        'naslov'=>$_REQUEST['title'],
        'podnaslov'=>$_REQUEST['subtitle'],
        'text'=>$_REQUEST['content'],
        'id'=>$_REQUEST['post']
    ]);

    Header("Location:../../index.php?page=adminpanel");






?>