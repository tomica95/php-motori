<?php

    include "../connection.php";

    

        $id = $_POST['id'];

        

        $upit = "DELETE FROM posts WHERE id_post=:id";

        $stmt = $connection->prepare($upit);

        $stmt->execute([
            "id"=>$id
        ]);

       $prikazPostova = "SELECT * FROM posts p INNER JOIN users u ON p.user_id=u.id_user";

       $stmt=$connection->prepare($prikazPostova);

       $stmt->execute();

       $postovii = $stmt->fetchAll();

       echo json_encode($postovii);

  


?>