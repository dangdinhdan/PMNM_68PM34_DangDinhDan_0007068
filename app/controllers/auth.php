<?php
session_start();
class auth
{
  protected $user = [
    'admin' => '1',
    'user1' => '1',
    'user2' => '1'
  ];
  public function login()
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'] ?? '';
      $password = $_POST['password'] ?? '';

      if (isset($this->user[$username]) && $this->user[$username] === $password) {
        $_SESSION['username'] = $username;
        header('Location: /sinhvien');
        exit();
      } else {
        header('Location: /auth/login');
        exit();
      }
    }
  }
}
