<?php
require_once('DBController.php');
require_once('Variables/user.php');


$user = new User;
class UserController
{

  private $DB;

  private $user;


  public function __construct()
  {
    $this->DB = DBController::getInstance();
  }

  public function addUser(User $user)
  {
    if ($this->DB->OpenCon()) {
      $stmt = "insert into user values('','$user->email','$user->password','$user->fname','$user->lname','$user->image')";
      $this->DB->insert($stmt);
      return true;
    } else {
      return false;
    }

  }


  public function getByID(User $user)
  {
    if ($this->DB->OpenCon()) {
      $stmt = "select id,email,fname,lname,password,image from user where id ='{$user->id}'";

      return $this->DB->Select($stmt);


    } else {
      return false;
    }

  }

  public function getIDByEmail(User $user)
  {
    if ($this->DB->OpenCon()) {
      $stmt = "select id from user where email ='{$user->email}'";
      return $this->DB->Select($stmt);
    } else {
      return false;
    }


  }
  public function validateEmail(User $user)
  {
    if ($this->DB->OpenCon()) {
      $stmt = "select email from user where email ='{$user->email}'";
      $res = $this->DB->Select($stmt);
      if (count($res) > 0) {
        return false;
      } else {
        return true;
      }
    }

  }


}

?>