<?php 
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    

    
    if(isset($_REQUEST['sendMessageButton'])){

    $username = $_REQUEST['tbUsername'];
    $regUsername = "/[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*/";

    $email = $_REQUEST['tbEmail'];

    $regMail = "/[\w\-.+_%]+@[\w\.\-]+\.[A-Za-z0-9]{2,}/";

    $password = $_REQUEST['tbPassword'];
    $regPassword = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}/";

    $password2 = $_REQUEST['tbPassword2'];
    $regPassword2 = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}/";

    $podaci = [];
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
    if(!preg_match($regPassword2,$password2)){

        $greske[]="Password2 nije okej";
    }

    if(count($greske)>0){

        Header("Location:index.php?page=registration");
    }
    else
    {
        $checking_if_exists = "SELECT email FROM users WHERE email=:email";

        $stmt = $connection->prepare($checking_if_exists);

        $stmt->execute([

            'email'=>$email
        ]);

        $user = $stmt->fetch();

        if($user){

            echo "Vas email vec postoji u bazi";
        }
        else
        {
            $insert_user = "INSERT INTO users  VALUES('',:username,:password,:email,:token,:verified,:role)";

            $stmt = $connection->prepare($insert_user);
    
            $token = md5($email."".time());

            $password = md5($password);
    
    
    
            $user = $stmt->execute([
                'username'=>$username,
                'password'=>$password,
                'email'=>$email,
                'token'=>$token,
                'verified'=>0,
                'role'=>2
            ]);
    
            if($user)
            {
                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sajtzaphp1@gmail.com';                 // SMTP username
    $mail->Password = 'sajtzaphp1!';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to


    $mail->SMTPOptions =array(

        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            "allow_self_signed"=>true
        )



    );


    //Recipients
    $mail->setFrom('sajtzaphp1@gmail.com', 'Verifikacija');
    $mail->addAddress($email);     // Add a recipient
   

   


    



    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Uspesna registracija';
    $mail->Body    = 'Morate da kliknete za verifikaciju<b><a href="http://localhost/motori/index.php?page=verification&verification='.$token.'">ovde</a></b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
            }
            else echo 'Registracija nije uspela, pokusajte ponovo';

        }

        
   




    }
}
?>