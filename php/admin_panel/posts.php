<?php

    $all_posts = "SELECT * FROM posts p INNER JOIN users u ON p.user_id=u.id_user";

    $stmt=$connection->prepare($all_posts);

    $stmt->execute();

    $posts = $stmt->fetchAll();

    

?>