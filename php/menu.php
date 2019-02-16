<?php
    

    if(isset($_SESSION['user']) && $_SESSION['user']->role_id==1){

        

            $get_menu = "SELECT * FROM menu ORDER BY order_number";

             $stmt = $connection->prepare($get_menu);

             $stmt->execute();

            $menu = $stmt->fetchAll();


    }
    else
    {
        $get_menu = "SELECT * FROM menu WHERE role_id>:role_id ORDER BY order_number";

        $stmt = $connection->prepare($get_menu);


        $stmt->execute([
            
            'role_id'=>1

        ]);

       $menu = $stmt->fetchAll();  
    }



    

    

    
?>