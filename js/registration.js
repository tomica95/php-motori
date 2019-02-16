document.getElementById('sendMessageButton').addEventListener('click',function(e){

    var username = document.getElementById('tbUsername');

    var regUsername = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;

    var mistakeUser = document.getElementById('mistake-username');

    var mail = document.getElementById('tbEmail');

    var regMail = /^[\w\-.+_%]+@[\w\.\-]+\.[A-Za-z0-9]{2,}$/;

    var mistakeMail = document.getElementById('mail-mistake');

    var password = document.getElementById('tbPassword');

    var regPassword =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;

    var mistakePassword = document.getElementById('mistake-password');

    var password2 = document.getElementById('tbPassword2');

    var mistakePassword2 = document.getElementById('mistake-password2');

    var greske = [];

    //checking username
    if(!regUsername.test(username.value)){

        mistakeUser.innerHTML="Vas username nije u dobrom formatu";
        mistakeUser.style.color="red";
        greske.push('Los username');
    }
    else
    {
        mistakeUser.innerHTML="Vas username je u dobrom formatu";
        mistakeUser.style.color="blue";

    }

    //checking mail
    if(!regMail.test(mail.value)){

        mistakeMail.innerHTML="Vas email nije u dobrom formatu";
        mistakeMail.style.color="red";
        greske.push('Los mail');
    }
    else
    {
        mistakeMail.innerHTML="Vas email je u dobrom formatu";
        mistakeMail.style.color="blue";

    }

    //checking password 
    if(!regPassword.test(password.value)){

        mistakePassword.innerHTML="Vas password mora imati minimum 8 karaktera, barem jedno veliko slovo i barem jedan broj";
        mistakePassword.style.color="red";
        greske.push('Los password');
    }
    else
    {
        mistakePassword.innerHTML="Vas password je u dobrom formatu";
        mistakePassword.style.color="blue";
    }

    //checking password retype
    if(password.value!=password2.value || password2.value=="")
    {
        mistakePassword2.innerHTML="Morate potvrditi vas password";
        mistakePassword2.style.color="red";
        greske.push('Los password 2');

    }
    else
    {
        mistakePassword2.innerHTML="Potvrdjen password je uspesno unesen";
        mistakePassword2.style.color="blue";
    }

    

    if(greske.length!=0){

        e.preventDefault();
    }






});