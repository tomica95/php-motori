<?php
    if(isset($_REQUEST['sendMessageButton'])){

        $mail= $_REQUEST['tbMail'];
        $password = $_REQUEST['tbPassword'];

        $users = "SELECT * FROM users WHERE email=:mail AND password=:password AND verified=:verified ";

        $stmt = $connection->prepare($users);

        $password = md5($password);

        $stmt->execute([

            'mail'=>$mail,
            'password'=>$password,
            'verified'=>1


        ]);

        $user = $stmt->fetch();

        

        if($user){

            
            $_SESSION['user'] = $user;
            Header("Location:index.php");
            
        }
        else
        {
            echo "Lovoganje nije uspelo";
        }

        



    }



?>