<?php
    session_start();
    include "../connection.php";
    
    $naslov = $_REQUEST['title'];
    $podnaslov = $_REQUEST['subtitle'];
    $sadrzaj = $_REQUEST['content'];
   
    $image=$_FILES['picture']['name'];
	$tmp=$_FILES['picture']['tmp_name'];
    
    
   
   
    $alt = $_REQUEST['alt'];
    $user_id = $_SESSION['user']->id_user;
    
    $insert_post = "INSERT INTO posts VALUES ('',:title,:subtitle,:text,:id_user,:created_at)";
    $stmt = $connection->prepare($insert_post);
   
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
   
    try{
    $proslo = $stmt->execute([
        'title'=>$naslov,
        'subtitle'=>$podnaslov,
        'text'=>$sadrzaj,
        'id_user'=>$user_id,
        'created_at'=>'2019-02-14 05:20:00'
    ]);
    
    if($proslo){
        $post_id = $connection->lastInsertId();
        $path = "../../img/".$image;
        if (move_uploaded_file($tmp, $path)){
            
            $insert_picture = "INSERT INTO pictures VALUES('',:src,:alt,:post_id)";
            $stmt = $connection->prepare($insert_picture);
            $stmt->execute([
                'src'=>'img/'.$image,
                'alt'=>$alt,
                'post_id'=>$post_id
            ]);
            Header('Location:../../index.php?page=adminpanel');
        }
        else
        {
            echo "<h1>Upis slike na server nije uspeo, probajte drugu sliku</h1>";
        }
    }
}
catch(PDOException $e){
    echo $e->getMessage();
}
    }
?>