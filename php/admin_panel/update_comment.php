<?php 

    include "../connection.php";
    
    $update_comment = "UPDATE comments SET title=:naslov,body=:sadrzaj WHERE id_comment=:id";


    $stmt = $connection->prepare($update_comment);

    $stmt->execute([
        'naslov'=>$_REQUEST['title'],
        'sadrzaj'=>$_REQUEST['content'],
        'id'=>$_REQUEST['comment']
    ]);


    Header("Location:../../index.php?page=adminpanel");

?>