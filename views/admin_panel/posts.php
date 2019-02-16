<?php

    include "php/admin_panel/posts.php";

    
?>
<h1>Prikaz svih postova</h1>
<table border="1" id="primacPostova">
    <tr>
        <td>Id</td>
        <td>Naslov</td>
        <td>Pod naslov</td>
        <td>Sadrzaj</td>
        <td>Datum kreiranja</td>
        <td>Username</td>

    </tr>
<?php foreach($posts as $post):?>

    <tr>
        <td><?=$post->id_post?></td>
        <td><?=$post->title?></td>
        <td><?=$post->subtitle?></td>
        <td><?=$post->text?></td>
        <td><?=$post->created_at?></td>
        <td><?=$post->username?></td>
        <td><img src="<?=$post->src?>" alt="<?=$post->alt?>" width="50px" height="50px"></td>
        <td>
        <input type="button" class="deletePost" value="Obrisi" name="deletePost" id="<?=$post->id_post?>">
       </td>
       
    </tr>
<?php endforeach; ?>
</table>

<hr>Editovanje posta
<form method="POST" action="php/admin_panel/update_post.php">

    <select name="post">
    <option value="0">Izaberi post</option>
        <?php foreach($posts as $post):?>
        <option value="<?=$post->id_post?>"><?=$post->title?></option>
<?php endforeach; ?>
    </select>
</br>
     Naslov: <input type="text" name="title"></br>
       Podnaslov: <input type="text" name="subtitle"></br>
       Sadrzaj: <textarea name="content"></textarea></br>
       
       

    <input type="submit" value="Edituj post">
</form>


