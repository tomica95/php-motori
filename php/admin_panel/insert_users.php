<?php

    include "../connection.php";

   $username = $_REQUEST['tbUserName'];
   
   $email = $_REQUEST['tbEmail'];

   $password = $_REQUEST['tbPassword'];

    $list = $_REQUEST['list'];

    $input = "INSERT INTO users VAlUES('',:username,:password,:email,:token,:verifikovan,:role)";

    $stmt = $connection->prepare($input);
    
    //validacija za user-a
    
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
        
    //kraj validacije

   $proslo =  $stmt->execute([
    'username'=>$username,
    'password'=>$password,
    'email'=>$email,
    'token'=>'11111',
    'verifikovan'=>'1',
    'role'=>$list
]);

if($proslo){

    header('Location:../../index.php?page=adminpanel');
}
else
{
    echo "Napravili ste gresku prilikom unosa";
}

    }





















    





?>