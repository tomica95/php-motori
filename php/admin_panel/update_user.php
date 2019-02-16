<?php 

    include "../connection.php";

    $update_user = "UPDATE users SET username=:username,password=:password,email=:email WHERE id_user=:id";

    $stmt = $connection->prepare($update_user);

    $password = $_REQUEST['password'];

    $passwordcript = md5($password);

    

    $stmt->execute([
        'username'=>$_REQUEST['username'],
        'password'=>$passwordcript,
        'email'=>$_REQUEST['email'],
        'id'=>$_REQUEST['user']

    ]);

    Header('Location:../../index.php?page=adminpanel');


?>