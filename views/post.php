
    <?php
      include "php/single_post.php";
      
    ?>
   
    <!-- Post Content -->
    <article class="post">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
          <h1><?= $post->title ?></h1>
          <h4><?= $post->subtitle?></h4>
          <img src="<?= $post->src?>">
           <p class="text"><?= $post->text?></p>
            
            <p class="author"><i class="fas fa-user"></i> Autor: <span><?= $post->username ?></span></p>
             
          </div>
        </div>
      </div>
    </article>

  
  <?php if(isset($_SESSION['user'])):?>


   


  <!--Komentari -->
<div class="komentar-forma container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="naslov">
        <h6>Dodaj komentar</h6>
      </div>
    <form>
      <input type="hidden" id="vracaPostId" value="<?=$post->id_post?>">
  <div class="form-group">
    <label class="sr-only" for="comment">Ime</label>
    <input type="text" class="form-control" name="title" id="title">
  </div>
  <div class="form-group">
  <label for="comment">Komentar</label>
  <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
</div>
  <button type="button" id="unesi-komentar"name="submit" class="btn btn-default">Submit</button>
</form>
    </div>
  </div>
  </div>

<div id="primac-komentara">



<?php endif; ?>
<?php include "php/comments.php" ?>
  <div class="komentari container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="naslov">
        <h6>Komentari</h6>
      </div>
    </div>
    </div>
  </div>
<?php foreach($comments as $comment):?>
  
  <div class="komentari container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      
      <div class="item">
        <p class="naslov"><?=$comment->title?></p>
        <p class="tekst"><?=$comment->body?></p>
        <p class="author"><i class="fas fa-user"></i> Autor: <span><?=$comment->username?></span></p>
      </div>
      
    </div>
    </div>
  </div>


<?php endforeach; ?>

</div>