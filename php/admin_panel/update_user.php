<?php 

    include "../connection.php";

    $update_user = "UPDATE users SET username=:username,password=:password,email=:email WHERE id_user=:id";

    $stmt = $connection->prepare($update_user);

    $username = $_REQUEST['username'];

    $email = $_REQUEST['email'];

    $password = $_REQUEST['password'];

   

    //pocetak validacije

    $regUsername = "/[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*/";

   

    $regMail = "/[\w\-.+_%]+@[\w\.\-]+\.[A-Za-z0-9]{2,}/";

    
    $regPassword = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}/";

    
    $greske = [];

    if(!preg_match($regUsername,$username)){

        $greske[]="Username nije okej";
    }
    
    if(!preg_match($regMail,$email)){

        $greske[]="Mail nije okej";
    }
    if(!preg_match($regPassword,$password)){
       
        $greske[]="Password nije okej";
    }
    

    if(count($greske)>0){

        echo "Forma nije popunjena u dobrom formatu";
    }
    else
    {
        
     $passwordcript = md5($password);

    $stmt->execute([
        'username'=>$username,
        'password'=>$passwordcript,
        'email'=>$email,
        'id'=>$_REQUEST['user']

    ]);

    Header('Location:../../index.php?page=adminpanel');

    }
?>