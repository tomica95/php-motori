<?php
  include "php/allposts.php";
?>
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

        <?php include 'php/get_poll.php';

          echo $poll_question->question;

          echo "</br>";

          foreach ($answers as $answer)
          {
            echo "
            <input type='radio' name='poll' class='poll-answer' value='$answer->answer'>". $answer->answer."</br>";
            
          }

          echo "<input type='hidden' id='poll_id' value='$poll_question->id_poll'>";
          ?>
          <div id="poll_result"></div>
          
          
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
                  <a href="#">Motorcikli</a>
                  on <?= $post->created_at ?></p>
              </div>
              <hr>
          
          <?php endforeach;?>


    <hr>

   