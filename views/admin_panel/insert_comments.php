<?php

   

    include "php/admin_panel/posts.php";
?>
<h1>Unos komentara</h1>
<form method="POST" action="php/admin_panel/insert_comments.php">
Naslov:<input type="text" name="title"></br>
Sadrzaj:<input type="text" name="content"></br>
<select name="com_select">
    <option value="0">Izaberite post</option>
    <?php foreach($posts as $post):?>
    <option value="<?=$post->id_post?>"><?=$post->title?></option>
<?php endforeach; ?>
</select></br>

<input type="submit" name="inscomment" value="Unesi komentar">
</form>
