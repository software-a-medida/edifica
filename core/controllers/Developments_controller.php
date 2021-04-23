<?php
defined('_EXEC') or die;

class Developments_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		define('_title', '{$vkye_webpage} by codemonkey.com.mx');

		global $projects_sale, $projects_under_construction, $projects_finished;

		$projects = $this->model->get_projects();

		$projects_sale = [];
		$projects_under_construction = [];
		$projects_finished = [];

		foreach ( $projects as $value )
		{
			if ( $value['type'] == 'sale' )
			/*  */ $projects_sale[] = $value;

			if ( $value['type'] == 'under_construction' )
			/*  */ $projects_under_construction[] = $value;

			if ( $value['type'] == 'finished' )
			/*  */ $projects_finished[] = $value;
		}

		echo $this->view->render($this, 'index');
	}

	public function view( $params )
	{
		global $project;

		$project = $this->model->get_projects($params[0]);

		if ( !isset($project[0]) && empty($project[0]) )
		/*  */ Errors::http(404);
		else
		{
			define('_title', '{$vkye_webpage} by codemonkey.com.mx');

			$project = $project[0];

			echo $this->view->render($this, 'view');
		}
	}

}
