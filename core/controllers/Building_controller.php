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
				'gallery_deliveries' => ( isset($projects[$key]['gallery_deliveries']) && !empty($projects[$key]['gallery_deliveries']) ) ? $projects[$key]['gallery_deliveries'] : [],
				'gallery_ready_constructions' => ( isset($projects[$key]['gallery_ready_constructions']) && !empty($projects[$key]['gallery_ready_constructions']) ) ? $projects[$key]['gallery_ready_constructions'] : [],
				'gallery_portfolio' => ( isset($projects[$key]['gallery_portfolio']) && !empty($projects[$key]['gallery_portfolio']) ) ? $projects[$key]['gallery_portfolio'] : [],
				'position' => $value['pos_portfolio']
			];
		}

		echo $template = $this->view->render($this, 'index');
	}

}
