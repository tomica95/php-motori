$(document).ready(function(){

    $('#korisnici-tabela').on('click','.delete',function(){

        
        var user_id= $(this).attr('id');
        
        
        
        

        $.ajax({

            url:"php/admin_panel/del.php",
            type:"POST",
            data:{

                id:user_id

                
                
            },
            success: function(response) {

                var korisnici = JSON.parse(response);
                
                var tabela = `<tr>
                <td>Id</td>
                <td>Username</td>
                <td>Email</td>
                <td>Uloga</td>
            </tr>`;
               
                korisnici.forEach(function(korisnik){


                    tabela+=`<tr>
                        <td>${korisnik['id_user']}</td>
                        <td>${korisnik['username']}</td>
                        <td>${korisnik['email']}</td>
                        <td>${korisnik['role']}</td>
                        <td><input type="button" value="Obrisi" class="delete" id="${korisnik['id_user']}" name="delete"></td>
                    
                    
                    </tr>`;


                })
                $('#korisnici-tabela').html(tabela);
            }

        })



    })

    $('#komentari').on('click','.deleteComment',function(){

        var comm_id = $(this).attr('id');

        $.ajax({

            url:"php/admin_panel/delete_comments.php",
            method:"POST",
            data:{
                id:comm_id
            },
            success:function(response){

                var komentari = JSON.parse(response);

                var tabela = `
                
                <tr>
                <td>Id komentara</td>
                <td>Naslov</td>
                <td>Tekst komentara</td>
                <td>Komentator</td>
                <td>Id posta</td>
                </tr>
                
                `;

                komentari.forEach(function(komentar){

                    tabela+=`
                    <tr>
                        <td>${komentar['id_comment']}</td>
                        <td>${komentar['title']}</td>
                        <td>${komentar['body']}</td>
                        <td>${komentar['username']}</td>
                        <td>${komentar['post_id']}</td>
                        <td>
        <input type="submit" value="Obrisi" name="deleteComment" id="${komentar['id_comment']}" class="deleteComment">
        </td>
                    </tr>
                    
                    `;



                })

                $('#komentari').html(tabela);




            }


        })





    })


    $('#unesi-komentar').on('click',function(){

       // console.log("Radi dugme");

       let title = $('#title').val();

       let comment = $('#comment').val();

       let post_id = $('#vracaPostId').val();


       //console.log(post_id);



       $.ajax({

        url:"php/insertComment.php",
        method:"POST",
        data:{

            id:post_id,
            title,
            com:comment

        },
        success:function(vraca){

            let sviKomentari = JSON.parse(vraca);

            let ispis = "";

            sviKomentari.forEach(function(komentar){

            ispis+=`
            
            Title:${komentar['title']}</br>

            Body:${komentar['body']} </br>

            Post napisao:${komentar['username']}</br>
            
            
            `;    
                



            })

            $('#primac-komentara').html(ispis);


        }


       })




    })

    $('#primacPostova').on('click','.deletePost',function(){

        let id_posta = $(this).attr('id');

        $.ajax({

            url:"php/admin_panel/delete_posts.php",
            method:"POST",
            data:{

                id:id_posta

            },
            success:function(vracaa){

                console.log(vracaa);

                let postovi = JSON.parse(vracaa);

                let tabela = `
                
                <tr>
                <td>Id</td>
                <td>Naslov</td>
                <td>Pod naslov</td>
                <td>Sadrzaj</td>
                <td>Datum kreiranja</td>
                <td>Username</td>
        
                  </tr>

                
                `;

                postovi.forEach(function(post){


                    
                    tabela+=`

                    <tr>
                    <td>${post['id_post']}</td>
                    <td>${post['title']}</td>
                    <td>${post['subtitle']}</td>
                    <td>${post['text']}</td>
                    <td>${post['created_at']}</td>
                    <td>${post['username']}</td>
                    <td>
                    <input type="button" class="deletePost" value="Obrisi" name="deletePost" id="${post['id_post']}">
                   </td>
                    </tr>
                    
                    
                    
                    
                    
                    `;


                })
                $('#primacPostova').html(tabela);


            }


        })


    })




})