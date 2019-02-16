
    <?php
      include "php/single_post.php";
      
    ?>
   
    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
          <h1><?= $post->title ?></h1>
          <h4><?= $post->subtitle?></h4>
          <h3><?= $post->text?></h3>
          <img src="<?= $post->src?>">
           <p></p>
            Text by <?= $post->username ?>
             
          </div>
        </div>
      </div>
    </article>

    <hr>
  <?php if(isset($_SESSION['user'])):?>


   


  <!--Komentari -->
    <form>
      <input type="hidden" id="vracaPostId" value="<?=$post->id_post?>">
  <div class="form-group">
  <label for="comment">Naslov:</label>
    <label class="sr-only" for="title">Naslov</label>
    <input type="text" class="form-control" name="title" id="title">
  </div>
  <div class="form-group">
  <label for="comment">Komentar:</label>
  <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
</div>
  <button type="button" id="unesi-komentar"name="submit" class="btn btn-default">Submit</button>
</form>

<div id="primac-komentara">



<?php endif; ?>
<?php include "php/comments.php" ?>
<?php foreach($comments as $comment):?>

  Title:<?=$comment->title?></br>
  Body:<?=$comment->body?></br>
  Post napisao:<?=$comment->username?></br>


<?php endforeach; ?>

</div>