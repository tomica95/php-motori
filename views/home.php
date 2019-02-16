<?php
  include "php/allposts.php";
?>
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
          
          <?php foreach($posts as $post): ?>

              <div class="post-preview">
                <a href="index.php?page=post&post_id=<?=$post->id_post?>">
                  <h2 class="post-title">
                    <?= $post->title ?>
                  </h2>
                  <h3 class="post-subtitle">
                    <?= $post->subtitle?>
                  </h3>
                </a>
                <p class="post-meta">Posted by <?= $post->username ?>
                  <a href="#">Start Bootstrap</a>
                  on <?= $post->created_at ?></p>
              </div>
              <hr>
          
          <?php endforeach;?>


    <hr>

   