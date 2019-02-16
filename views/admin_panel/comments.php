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

<hr>
<h2>Editovanje komentara</h2>
<form method="POST" action="php/admin_panel/update_comment.php">
    Izaberite komentar za editovanje<select name="comment">
        <option>Izaberi komentar</option>
        <?php foreach($comments as $comment):?>
        <option value="<?=$comment->id_comment?>"><?=$comment->title?></option>
<?php endforeach; ?>

    
</select>
    </br>
    Naslov komentara:<input type="text" name="title"></br>
    Sadrzaj komentara:<input type="text" name="content"></br>
    <input type="submit" value="Edituj komentar">
</form>