<?php

require_once 'classes/Validation.php';

function sendJson($message, $errors) {
  header('Content-Type: application/json');

  echo json_encode([
    'message' => $message,
    'errors'  => $errors,
  ]);

  die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $body = file_get_contents("php://input");
  $data = json_decode($body);

  $validation = new Validation();

  $name = $validation->validateName($data->name);
  $email = $validation->validateEmail($data->email);
  $phone = $validation->validatePhone($data->phone);

  if (!empty($validation->errors)) {
    sendJson('', $validation->errors);
  }

  file_put_contents('formData.txt', "$name $email $phone \n", FILE_APPEND | LOCK_EX);

  sendJson('Data was sent successfully', []);
}
