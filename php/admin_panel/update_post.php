<?php 
    include "../connection.php";

    $update_post = "UPDATE posts SET title=:naslov,subtitle=:podnaslov,text=:text WHERE id_post=:id";

    $stmt = $connection->prepare($update_post);

    $naslov = $_REQUEST['title'];
    
    $podnaslov = $_REQUEST['subtitle'];

    $sadrzaj = $_REQUEST['content'];

    $id_post = $_REQUEST['post'];

    $greske = [];

    if(empty($naslov)){

        $greske[]="Naslov los";
    }
    if(empty($podnaslov)){
        $greske[]="Podnaslov los";
    }
    if(empty($sadrzaj)){
        $greske[]="Sadrzaj nepostojec";
    }
    if($id_post=="0"){
        $greske[]="Morate izabrati post za izmenu";
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
        'id'=>$id_post
    ]);

    Header("Location:../../index.php?page=adminpanel");



    }


?>