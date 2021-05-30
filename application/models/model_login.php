<?php
class Model_Login extends Model
{
	function __construct()
  {
    $this->auth = new AuthClass();
  }

  public function get_data()
	{	
		$data = array();
		$data['exhibits'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM exhibits;");
		return $data;
	}

  public function get_detail_data($post)
  {
    $id = $post['id'];
    return getFromTable($GLOBALS['mysqli'], "SELECT * FROM exhibits WHERE id=$id")[0];
  }

  public function add_exhibit($post)
  {
    $title = $post['title'];
		$description = $post['description'];
		$query = "INSERT INTO exhibits (title, description) VALUES('$title', '$description')";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
      echo "Error from post to table";
    } else {
      echo "Success!";
    }
  }

  public function change_exhibit($post)
  {
    $id = $post['id'];
		$title = $post['title'];
    $description = $post['description'];
    $query = "UPDATE exhibits SET title='$title', description='$description' WHERE id=$id";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
    	echo "Error from post to table";
    } else {
      echo "Success!";
    }
  }

  public function delete_exhibit($post)
	{
		$id = $post['id'];
    $query = "DELETE FROM exhibits WHERE id=$id";
    if (!changeTable($GLOBALS['mysqli'], $query)) {
      echo "Error from delete from table";
    } else {
      echo "Success!";
    }
	}

  public function login($post)
  {
    $login = $post['login'];
    $password = $post['password'];
    if (!$this->auth->auth($login, $password)) {
      echo "The Login and Password is incorrect";
    } else {
      echo "You've loged in";
    }
  }

  public function out()
  {
    $this->auth->out();
  }
}
?>
