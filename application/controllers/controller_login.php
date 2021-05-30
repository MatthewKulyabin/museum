<?php
class Controller_Login extends Controller
{
	function __construct()
	{
    $this->model = new Model_Login();
		$this->view = new View();
	}
	
	function action_index()
	{
    $data = $this->model->get_data();
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}

  function action_login()
  {
    $this->model->login($_POST);
    header("LOCATION: $URL/login");
  }

  function action_add_exhibit()
  {
    $this->model->add_exhibit($_POST);
    header("LOCATION: $URL/login");
  }

  function action_detail_exhibit()
  {
    $data = $this->model->get_detail_data($_POST);
    $this->view->generate('detail_exhibit.php', 'template_view.php', $data);
  }

  function action_change_exhibit()
  {
    $this->model->change_exhibit($_POST);
    header("LOCATION: $URL/login");
  }

  function action_delete_exhibit()
  {
    $this->model->delete_exhibit($_POST);
    header("LOCATION: $URL/login");
  }

  function action_out()
  {
    $this->model->out();
    header("LOCATION: $URL/login");
  }
}
?>
