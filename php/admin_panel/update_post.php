<?php 
    include "../connection.php";

    $update_post = "UPDATE posts SET title=:naslov,subtitle=:podnaslov,text=:text WHERE id_post=:id";

    $stmt = $connection->prepare($update_post);

    $naslov = $_REQUEST['title'];
    
    $podnaslov = $_REQUEST['subtitle'];

    $sadrzaj = $_REQUEST['content'];

    $greske = [];

    if(empty($naslov)){

        $greske[]="Naslov los";
    }
    if(empty($podnaslov)){
        $greske[]="Podnaslov los";
    }
    if(empty($sadrzaj)){
        $greske[]="Contenct nepostojec";
    }

    if(count($greske)>0){

        echo "Forma nije popunjena u dobrom formatu";
    }
    else
    {

    $stmt->execute([
        'naslov'=>$naslov,
        'podnaslov'=>$podnaslov,
        'text'=>$sadrzaj,
        'id'=>$_REQUEST['post']
    ]);

    Header("Location:../../index.php?page=adminpanel");



    }


?>