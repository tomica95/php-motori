<?php

    $all_users = "SELECT * FROM users u INNER JOIN roles r ON u.role_id=r.id_role";

    $stmt=$connection->prepare($all_users);
    
    $stmt->execute();

    $users = $stmt->fetchAll();

    

?>