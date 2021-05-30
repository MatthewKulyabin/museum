<?php
class Model_Admin extends Model
{
	function __construct()
	{
		$this->auth = new AuthClass();
	}

	public function get_data()
	{	
		$data = array();
		$data['users'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM users;");
		return $data;
	}

	public function add_user($post)
	{
		$login = $post['login'];
		$password = $post['password'];
		$role = ($post['role'] === 'admin') ? 1 : 2;
		$query = "INSERT INTO users (login, password, role_id) VALUES('$login', '$password', $role)";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
      echo "Error from post to table";
    } else {
      echo "Success!";
    }
	}

	public function delete_user($post)
	{
		$id = $post['id'];
    $query = "DELETE FROM users WHERE id=$id";
    if (!changeTable($GLOBALS['mysqli'], $query)) {
      echo "Error from delete from table";
    } else {
      echo "Success!";
    }
	}

	public function get_detail_user_data($post)
	{
		$id = $post['id'];
    $query = "SELECT * FROM users WHERE id = $id";
		$data = array();
		$data['id'] = $id;
		$data['user'] = getFromTable($GLOBALS['mysqli'], $query)[0];
    return $data;
	}

	public function change_user($post)
	{
		$id = $post['id'];
		$login = $post['login'];
		echo $login;
    $password = $post['password'];
		echo $password;
    $query = "UPDATE users SET login='$login', password='$password' WHERE id=$id";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
    	echo "Error from post to table";
    } else {
      echo "Success!";
    }
	}

	public function out()
	{
		$this->auth->out();
	}

	public function login($post)
	{
		$result = $this->auth->auth($post['login'], $post['password']);
    if (!$result) {
      echo "The Login and Password is incorrect";
    } else {
      echo "You've loged in";
    }
	}
}
?>
