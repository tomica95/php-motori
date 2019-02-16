<?php
    include "../connection.php";

    $id_user = $_REQUEST['id'];

   $upit = "DELETE FROM users WHERE id_user=:id";


   $stmt= $connection ->prepare($upit);

    $stmt->execute([
        "id"=>$id_user
    ]);

    $preostali_korisnici = "SELECT * FROM users u INNER JOIN roles r ON u.role_id=r.id_role";

    $stmt = $connection -> prepare($preostali_korisnici);

    $stmt->execute();

    $korisnici = $stmt->fetchAll();

    echo json_encode($korisnici);



?>

