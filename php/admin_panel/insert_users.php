<?php

    include "../connection.php";

   $username = $_REQUEST['tbUserName'];
   
   $email = $_REQUEST['tbEmail'];

   $password = $_REQUEST['tbPassword'];

    $list = $_REQUEST['list'];

    $input = "INSERT INTO users VAlUES('',:username,:password,:email,:token,:verifikovan,:role)";

    $stmt = $connection->prepare($input);

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



    





?>