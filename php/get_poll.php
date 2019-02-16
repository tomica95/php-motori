<?php 

  $get_active_polls = "SELECT * FROM polls WHERE active = 1";

  $stmt = $connection->prepare($get_active_polls);

  $stmt->execute();

  $poll_question = $stmt->fetch();

  $get_answers = "SELECT * FROM poll_answer INNER JOIN polls on polls.id_poll = poll_answer.poll_id WHERE active = 1 AND poll_id =:id";

  $stmt = $connection->prepare($get_answers);

  $stmt->execute([
    'id' => $poll_question->id_poll
  ]);

  $answers = $stmt->fetchAll();