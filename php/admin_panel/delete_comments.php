<?php

    include "../connection.php";

   

        $id = $_POST['id'];

        $upit = "DELETE FROM comments WHERE id_comment=:id";
        
        $stmt = $connection -> prepare($upit);

        $stmt->execute([
            "id"=>$id
        ]);

        $prikaz_komentara = "SELECT * FROM comments c INNER JOIN users u ON c.user_id=u.id_user";

        $stmt = $connection->prepare($prikaz_komentara);

        $stmt->execute();

        $komentari = $stmt -> fetchAll();

        echo json_encode($komentari);
        





?>