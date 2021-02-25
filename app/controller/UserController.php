<?php

namespace App\Controller;

use PDO;
use PDOException;

class UserController
{
  private $db;
  private $sql;
  public  $error = array();
  function __construct($db_con)
  {
    $this->db = $db_con;
    //$this->error = $error;
  }
  public function login($username, $password)
  {
    try {
      $smt = $this->db->prepare("SELECT * FROM registration WHERE username = :username OR email =:email");
      $smt->execute(array(':username' => $username, ':email' => $username));
      $userRow = $smt->fetch(PDO::FETCH_ASSOC);

      if ($smt->rowCount() > 0) {

        if (password_verify($password, $userRow['password'])) {
          $_SESSION['user'] = $userRow['id'];
          return true;
        } else {
          return false;
        }
      }
    } catch (PDOException $e) {
      $this->error[] = $e->getMessage();
      return false;
    }
  }
  public function is_logedin()
  {
    if (!empty($_SESSION['user'])) {
      return true;
    }
  }
  function redirect($url)
  {
    header("location:{$url}");
  }
  public function registerUser($username, $email, $pass)
  {

    try {
      $new_pass = password_hash($pass, PASSWORD_DEFAULT);
      $stmt = $this->db->prepare("INSERT INTO registration(username,email,password)
          VALUES(:uname, :umail, :upass)");
      $stmt->bindparam(":uname", $username);
      $stmt->bindparam(":umail", $email);
      $stmt->bindparam(":upass", $new_pass);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {

      $this->error[] = $e->getMessage();
      return false;
    }
  }
  public function getsqlError()
  {
    if (empty($this->error)) {
      $this->error[] = "No SQL error";
      return $this->error;
    } else {
      return $this->error;
    }
  }
}
