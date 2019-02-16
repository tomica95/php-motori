<?php 

    include "../connection.php";
    
    $update_comment = "UPDATE comments SET title=:naslov,body=:sadrzaj WHERE id_comment=:id";


    $stmt = $connection->prepare($update_comment);

    $naslov =$_REQUEST['title'] ;

    $sadrzaj =$_REQUEST['content'];

    $id_comm =$_REQUEST['comment'];

    $greske=[];

        if($id_comm=="0"){
            $greske[]="Morate izabrati post";
        }
        if(empty($naslov)){
            $greske[]="Morate uneti naslov";
        }
        if(empty($sadrzaj)){
            $greske[]="Morate imati sadrzaj";
        }

        if(count($greske)>0)
        {
            echo "<h2>Forma nije popunjena u dobrom formatu</h2>";
        }
        else
        {

    $stmt->execute([
        'naslov'=>$naslov,
        'sadrzaj'=>$sadrzaj,
        'id'=>$id_comm
    ]);


    Header("Location:../../index.php?page=adminpanel");


        }

?>