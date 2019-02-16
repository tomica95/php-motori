<?php

    include "php/admin_panel/comments.php";

?>


<h1>Prikaz komentara </h1>
<table border="1" id="komentari">
    <tr>
        <td>Id komentara</td>
        <td>Naslov</td>
        <td>Tekst komentara</td>
        <td>Komentator</td>
        <td>Id posta</td>
    </tr>
    <?php foreach($comments as $comment): ?>
    <tr>
        <td><?=$comment->id_comment?></td>
        <td><?=$comment->title?></td>
        <td><?=$comment->body?></td>
        <td><?=$comment->username?></td>
        <td><?=$comment->post_id?></td>
        <td>
        <input type="submit" value="Obrisi" name="deleteComment" id="<?=$comment->id_comment?>" class="deleteComment">
        </td>
    </tr>
    <?php endforeach;?>
</table>