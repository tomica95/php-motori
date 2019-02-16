<?php 

    include 'connection.php';

    $id = $_GET['post_id'] ?? 1;

    $get_post = "SELECT * FROM posts p INNER JOIN pictures i ON i.post_id=p.id_post INNER JOIN users u ON p.user_id=u.id_user  WHERE id_post=:id_posta";



    $stmt = $connection->prepare($get_post);

    $stmt->execute([
        'id_posta'=>$id
    ]);

    $post = $stmt->fetch();



?>