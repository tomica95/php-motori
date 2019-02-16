<?php
    session_start();

    include "connection.php";
    
        
        $post_id = $_POST['id'];

        $title = $_POST['title'];

        $comment = $_POST['com'];

        $unos = "INSERT INTO comments VALUES('',:title,:text,:user_id,:post_id)";

        $id_usera = $_SESSION['user']->id_user;

        $stmt=$connection->prepare($unos);

        $stmt->execute([
            'title'=>$title,
            'text'=>$comment,
            'user_id'=>$id_usera,
            'post_id'=>$post_id
        ]);


        $ispis_komentara = "SELECT * FROM comments c INNER JOIN users u ON c.user_id=u.id_user";

        $stmt=$connection->prepare($ispis_komentara);

        $stmt->execute();

        $komentari=$stmt->fetchAll();

       

        echo json_encode($komentari);
        
        
    
?>