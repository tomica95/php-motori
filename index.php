<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<?php
session_start();



    include 'php/connection.php';
    include "views/header.php";


     $page = $_GET['page'] ?? 'index';

    switch($page)
    {
    
    
      case "index":
            include "views/home.php";
            break;
        case "contact":
            include "views/contact.php";
            break;
        case "post":
            include "views/post.php"; 
            break;
        case "registration":
            include "views/registration.php";
            break;  
        case "login":
            include "views/login.php";
            break; 
        case "verification":
            include "views/verification.php";
            break;
        case"adminpanel":
            include "views/admin_panel/admin_panel.php";
            break;
        

        default: 
        http_response_code(404);
    }

    include "views/footer.php";

?>