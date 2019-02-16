<?php

    $all_posts = "SELECT * FROM posts p INNER JOIN users u ON p.user_id=u.id_user INNER JOIN pictures s ON p.id_post=s.post_id ";

    $stmt=$connection->prepare($all_posts);

    $stmt->execute();

    $posts = $stmt->fetchAll();

    

?>