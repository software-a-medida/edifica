<?php
defined('_EXEC') or die;

class Building_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		define('_title', '{$vkye_webpage} by codemonkey.com.mx');

		global $slideshows_portfolio;

		$slideshows = $this->model->get_slideshows();
		$projects = $this->model->get_projects();

		$slideshows_portfolio = [];

		foreach ( $slideshows['portfolio'] as $value )
		{
			$key = array_search($value['id_key'], array_column($projects, 'id'));

			$slideshows_portfolio[] = [
				'image_cover' => $projects[$key]['image_cover'],
				'name' => $projects[$key]['data']['name'],
				'gallery' => ( isset($projects[$key]['gallery']) && !empty($projects[$key]['gallery']) ) ? $projects[$key]['gallery'] : [],
				'position' => $value['pos_portfolio']
			];
		}

		echo $template = $this->view->render($this, 'index');
	}

}
