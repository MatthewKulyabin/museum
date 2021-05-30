<?php
class Controller_Admin extends Controller
{
  function __construct()
	{
    $this->model = new Model_Admin();
		$this->view = new View();
	}

	function action_index()
	{
    $data = $this->model->get_data();
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}

  function action_out()
  {
    $this->model->out();
    header("LOCATION: $URL/admin");
  }

  function action_login()
  {
    $this->model->login($_POST);
    header("LOCATION: $URL/admin");
  }
  
  // User table

  function action_detail_user()
  {
    $data = $this->model->get_detail_user_data($_POST);
    $this->view->generate('user_detail_view.php', 'template_view.php', $data);
  }

  function action_change_user()
  {
    $this->model->change_user($_POST);
    header("LOCATION: $URL/admin");
  }

  function action_delete_user()
  {
    $this->model->delete_user($_POST);
    header("LOCATION: $URL/admin");
  }

  function action_add_user()
  {
    $this->model->add_user($_POST);
    header("LOCATION: $URL/admin");
  }
}
?>
