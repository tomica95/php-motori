
//listener for name
document.getElementById('tbName').addEventListener('keyup',function(){

    var name = document.getElementById('tbName');

    var mistake = document.getElementById('mistake-name');

    var regExpName = /^[A-Z][a-z]{2,15}$/;

    if(!regExpName.test(name.value)){

        mistake.style.color="red";
        mistake.innerHTML="Vase ime nije u dobrom formatu, mora poceti velikim slovom i imati minimum 3 karaktera";
    }
    else
    {
        mistake.style.color="blue";
        mistake.innerHTML="Vase ime je u ispravnom formatu";
        
    }
});

//listener for mail
document.getElementById('tbEmail').addEventListener('keyup',function(){

    var mail = document.getElementById('tbEmail');

    var regExpMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    var mistake = document.getElementById('mail-mistake');


    if(!regExpMail.test(mail.value)){

        mistake.style.color="red";
        mistake.innerHTML="Format vaseg email-a mora da bude nnnnn@nnnn.nnn";

    }
    else
    {
        mistake.style.color="blue";
        mistake.innerHTML="Vas email je uspesno unesen";
    }
});

//listener for phone number
document.getElementById('tbPhone').addEventListener('keyup',function(){

    var phone = document.getElementById('tbPhone');

    var regExpPhone =/^(\+381)?(\s|-)?6(([0-6]|[8-9])\d{6,}|(77|78)\d{7}){1}$/;

    var mistake = document.getElementById('mistake-phone');

    if(!regExpPhone.test(phone.value)){
        
        mistake.style.color="red";
        mistake.innerHTML="Morate uneti telefon u formatu +xxxxxxxxxx";
    }
    else
    {
        mistake.style.color="blue";
        mistake.innerHTML="Telefon je uspesno unet";
    
    }
});

//listener for text area
document.getElementById('tbMessage').addEventListener('keyup',function(){

    var message = document.getElementById('tbMessage');

    var regExpMessage = /^[A-Z][a-z]{5,30}$/;

    var mistake = document.getElementById('mistake-message');

    if(!regExpMessage.test(message.value)){
        mistake.style.color="red";
        mistake.innerHTML="Morate uneti vasu poruku";
    }
    else
    {
        mistake.style.color="blue";
        mistake.innerHTML="Poruka je uspesno uneta";
   
    }
});

//function provera
document.getElementById('sendMessageButton').addEventListener('click',function(e){

    var podaci = [];
    var greske = [];

    //provera imena
    var name = document.getElementById('tbName');

    var mistake = document.getElementById('mistake-name');

    var regExpName = /^[A-Z][a-z]{2,15}$/;

    if(!regExpName.test(name.value)){

        mistake.style.color="red";
        mistake.innerHTML="Vase ime nije u dobrom formatu, mora poceti velikim slovom i imati minimum 3 karaktera";
        greske.push('Ime nije okej');
    }
    else
    {
        mistake.style.color="blue";
        mistake.innerHTML="Vase ime je u ispravnom formatu";
        podaci.push('Ime je dobro');
    }

    //provera mail
    var mail = document.getElementById('tbEmail');

    var regExpMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    var mistake = document.getElementById('mail-mistake');


    if(!regExpMail.test(mail.value)){

        mistake.style.color="red";
        mistake.innerHTML="Format vaseg email-a mora da bude nnnnn@nnnn.nnn";
        greske.push('Mail nije dobar');

    }
    else
    {
        mistake.style.color="blue";
        mistake.innerHTML="Vas email je uspesno unesen";
        podaci.push('Mail je dobar');
    }

    //provera mobilnog
    var phone = document.getElementById('tbPhone');

    var regExpPhone =/^(\+381)?(\s|-)?6(([0-6]|[8-9])\d{6,}|(77|78)\d{7}){1}$/;

    var mistake = document.getElementById('mistake-phone');

    if(!regExpPhone.test(phone.value)){
        
        mistake.style.color="red";
        mistake.innerHTML="Morate uneti telefon u formatu +xxxxxxxxxx";
        greske.push("Mobilni nije dobar");
    }
    else
    {
        mistake.style.color="blue";
        mistake.innerHTML="Telefon je uspesno unet";
        podaci.push("Mobilni je dobar");
    
    }

    //provera poruke
    var phone = document.getElementById('tbPhone');

    var regExpPhone =/^(\+381)?(\s|-)?6(([0-6]|[8-9])\d{6,}|(77|78)\d{7}){1}$/;

    var mistake = document.getElementById('mistake-phone');

    if(!regExpPhone.test(phone.value)){
        
        mistake.style.color="red";
        mistake.innerHTML="Morate uneti telefon u formatu +xxxxxxxxxx";
        greske.push('Poruka nije okej');
    }
    else
    {
        mistake.style.color="blue";
        mistake.innerHTML="Telefon je uspesno unet";
        podaci.push('Poruka je dobra');
    
    }

    if(greske.length!=0){

        e.preventDefault();



    }
    



});




