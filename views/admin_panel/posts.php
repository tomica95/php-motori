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
        <td>
        <input type="button" class="deletePost" value="Obrisi" name="deletePost" id="<?=$post->id_post?>">
       </td>
    </tr>
<?php endforeach; ?>
</table>


