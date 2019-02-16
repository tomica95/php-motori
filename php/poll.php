<?php

  session_start();

  include 'connection.php';

  $answer = $_POST['answer'];
  $user_id = $_SESSION['user']->id_user;
  $poll_id = $_POST['poll_id'];

  $check_if_voted = "SELECT * FROM poll_user WHERE user_id= :user_id";

  $stmt = $connection->prepare($check_if_voted);

  $stmt->execute([
    'user_id' => $user_id
  ]);

  $user = $stmt->fetch();

  if ($user)
  {
    echo "Vec ste glasali";
    die();
  }

  $insert_answer = "INSERT INTO poll_user VALUES('', :id_user, :id_poll)";

  $stmt = $connection->prepare($insert_answer);

  $stmt->execute([
    'id_user' => $user_id,
    'id_poll' => $poll_id
  ]);

  $update_sum = "UPDATE poll_answer SET sum = sum +1 WHERE poll_id = :poll_id AND answer =:answer";

  $stmt = $connection->prepare($update_sum);

  $stmt->execute([
    'poll_id' => $poll_id,
    'answer' => $answer
  ]);
 
  $get_result = "SELECT * FROM poll_answer WHERE poll_id = :poll_id";

  $stmt = $connection->prepare($get_result);

  $stmt->execute([
    'poll_id' => $poll_id
  ]);

  $result = $stmt->fetchAll();

  echo json_encode($result);