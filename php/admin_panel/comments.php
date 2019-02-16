<?php 

    $all_comments = "SELECT * FROM comments c INNER JOIN users u ON c.user_id=u.id_user";

    $stmt = $connection->prepare($all_comments);

    $stmt->execute();

    $comments = $stmt->fetchAll();

    

?>