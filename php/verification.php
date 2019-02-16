<?php

        $tokence = $_GET['verification'];

        $update = "UPDATE users SET verified=:verifikovan WHERE token=:token";

        $stmt=$connection->prepare($update);

        $stmt->execute([

            'verifikovan'=>'1',
            'token'=>$tokence
        ]);

        
    


?>