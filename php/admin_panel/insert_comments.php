<?php
   
session_start();

include "../connection.php";
   

    if(isset($_REQUEST['inscomment'])){

        $naslov = $_REQUEST['title'];

        $sadrzaj = $_REQUEST['content'];

        $user_id = $_SESSION['user']->id_user;

        $id_posta = $_REQUEST['com_select'];

        $greske=[];

        if($id_posta=="0"){
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


        $insert_comment = "INSERT INTO comments VALUES('',:title,:body,:user_id,:post_id)";

        $stmt = $connection->prepare($insert_comment);

        $stmt->execute([
            'title'=>$naslov,
            'body'=>$sadrzaj,
            'user_id'=>$user_id,
            'post_id'=>$id_posta

        ]);

        header("Location:../../index.php?page=adminpanel");



        


        


        }
        


    }



?>