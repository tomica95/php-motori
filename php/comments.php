<?php 
    $id_post=$_GET['post_id'];

    $comments = "SELECT * FROM comments c INNER JOIN users u ON c.user_id=u.id_user WHERE post_id=:post_id";

    $stmt=$connection->prepare($comments);

    $stmt->execute([

        'post_id'=>$id_post
    ]);

    $comments=$stmt->fetchAll();

    


?>