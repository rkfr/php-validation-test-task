<?php

class Validation {
  private $varcharLength = 50;
  public $errors;

  private function trimAndHtmlchars($str)
  {
    return htmlspecialchars(trim($str));
  }

  private function ifEmpty($str, $fieldName) {
    if (empty($str)) {
      $this->errors[$fieldName] = ucfirst($fieldName) . " field can'n be empty";

      return true;
    }

    return false;
  }

  public function validateName($name)
  {
    $name = $this->trimAndHtmlchars($name);

    if ($this->ifEmpty($name, 'name')) {
      return $name;
    }

    if (strlen($name) > $this->varcharLength) {
      $this->errors['name'] = 'Name must contains maximum 50 chars';
    }

    return $name;
  }

  public function validateEmail($email) {
    $email = $this->trimAndHtmlchars($email);

    if ($this->ifEmpty($email, 'email')) {
      return $email;
    }

    if (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', $email)) {
      $this->errors['email'] = 'Invalid email address.';
    }

    return $email;
  }

  public function validatePhone($phone)
  {
    $phone = $this->trimAndHtmlchars($phone);

    if ($this->ifEmpty($phone, 'phone')) {
      return $phone;
    }

    if (!preg_match('/^\+?3?8?(0\d{9})$/', $phone)) {
      $this->errors['phone'] = 'Invalid phone number';
    }

    if ($phone[0] === '+') {
      return substr($phone, 1);
    }

    return $phone;
  }
}
