<?php

    $roles = "SELECT * FROM roles";

    $stmt = $connection->prepare($roles);

    $stmt->execute();

    $roles_ = $stmt->fetchAll();


    
?>