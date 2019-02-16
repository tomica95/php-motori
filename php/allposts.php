<?php
    

    $get_posts = "SELECT * FROM posts p INNER JOIN users u ON p.user_id=u.id_user";

    $stmt = $connection->prepare($get_posts);

    $stmt->execute();

    $posts = $stmt->fetchAll();

    
?>