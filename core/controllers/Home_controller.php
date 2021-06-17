<?php
defined('_EXEC') or die;

class Home_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		define('_title', '{$vkye_webpage} by codemonkey.com.mx');

		global $slideshows_home, $slideshows_portfolio, $projects_sale, $projects_under_construction, $projects_finished, $get_photo_team;

		$projects = $this->model->get_projects();
		$slideshows['home'] = $this->model->get_slideshows_home();
		$slideshows['portfolio'] = $this->model->get_slideshows_portfolio();
		$get_photo_team = $this->model->get_photo_team()[0];

		$slideshows_home = [];
		$slideshows_portfolio = [];

		foreach ( $slideshows['home'] as $value )
		{
			$key = array_search($value['id_key'], array_column($projects, 'id'));

			if ( $value['table'] == 'projects' )
			{
				$slideshows_home[] = [
					'type' => 'project',
					'image_cover' => $projects[$key]['image_cover'],
					'project_logotype' => ( isset($projects[$key]['project_logotype']) ) ? $projects[$key]['project_logotype'] : null,
					'url' => ( isset($projects[$key]['url']) ) ? $projects[$key]['url'] : null,
					'position' => $value['pos_home']
				];
			}

			if ( $value['table'] == 'blog' )
			{
				$blog = $this->model->get_blog($value['id_key']);

				if ( isset($blog[0]) && !empty($blog[0]) && !is_null($blog[0]) )
				{
					$slideshows_home[] = [
						'type' => 'blog',
						'image_cover' => $blog[0]['image'],
						'url' => $blog[0]['url'],
						'title' => $blog[0]['title'],
						'position' => $value['pos_home']
					];
				}
			}
		}

		foreach ( $slideshows['portfolio'] as $value )
		{
			$key = array_search($value['id_key'], array_column($projects, 'id'));

			$slideshows_portfolio[] = [
				'image_cover' => $projects[$key]['image_cover'],
				'gallery_deliveries' => ( isset($projects[$key]['gallery_deliveries']) && !empty($projects[$key]['gallery_deliveries']) ) ? $projects[$key]['gallery_deliveries'] : [],
				'gallery_ready_constructions' => ( isset($projects[$key]['gallery_ready_constructions']) && !empty($projects[$key]['gallery_ready_constructions']) ) ? $projects[$key]['gallery_ready_constructions'] : [],
				'gallery_portfolio' => ( isset($projects[$key]['gallery_portfolio']) && !empty($projects[$key]['gallery_portfolio']) ) ? $projects[$key]['gallery_portfolio'] : [],
				'position' => $value['pos_portfolio']
			];
		}

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

		// define('_title', '{$vkye_webpage} by codemonkey.com.mx');
		//
		// global $slideshows_home, $slideshows_portfolio, $projects_sale, $projects_under_construction, $projects_finished, $get_photo_team;
		//
		// $slideshows = $this->model->get_slideshows();
		// $projects = $this->model->get_projects();
		// $get_photo_team = $this->model->get_photo_team()[0];
		//
		// $slideshows_home = [];
		// $slideshows_portfolio = [];
		//
		// foreach ( $slideshows['home'] as $value )
		// {
		// 	$key = array_search($value['id_key'], array_column($projects, 'id'));
		//
		// 	if ( $value['table'] == 'projects' )
		// 	{
		// 		$slideshows_home[] = [
		// 			'type' => 'project',
		// 			'image_cover' => $projects[$key]['image_cover'],
		// 			'project_logotype' => ( isset($projects[$key]['project_logotype']) ) ? $projects[$key]['project_logotype'] : null,
		// 			'url' => ( isset($projects[$key]['url']) ) ? $projects[$key]['url'] : null,
		// 			'position' => $value['pos_home']
		// 		];
		// 	}
		//
		// 	if ( $value['table'] == 'blog' )
		// 	{
		// 		$blog = $this->model->get_blog($value['id_key']);
		//
		// 		if ( isset($blog[0]) && !empty($blog[0]) && !is_null($blog[0]) )
		// 		{
		// 			$slideshows_home[] = [
		// 				'type' => 'blog',
		// 				'image_cover' => $blog[0]['image'],
		// 				'url' => $blog[0]['url'],
		// 				'title' => $blog[0]['title'],
		// 				'position' => $value['pos_home']
		// 			];
		// 		}
		// 	}
		// }
		//
		// foreach ( $slideshows['portfolio'] as $value )
		// {
		// 	$key = array_search($value['id_key'], array_column($projects, 'id'));
		//
		// 	$slideshows_portfolio[] = [
		// 		'image_cover' => $projects[$key]['image_cover'],
		// 		'gallery' => ( isset($projects[$key]['gallery_portfolio']) && !empty($projects[$key]['gallery_portfolio']) ) ? $projects[$key]['gallery_portfolio'] : [],
		// 		'position' => $value['pos_portfolio']
		// 	];
		// }
		//
		// $projects_sale = [];
		// $projects_under_construction = [];
		// $projects_finished = [];
		//
		// foreach ( $projects as $value )
		// {
		// 	if ( $value['type'] == 'sale' )
		// 	/*  */ $projects_sale[] = $value;
		//
		// 	if ( $value['type'] == 'under_construction' )
		// 	/*  */ $projects_under_construction[] = $value;
		//
		// 	if ( $value['type'] == 'finished' )
		// 	/*  */ $projects_finished[] = $value;
		// }
		//
		// echo $this->view->render($this, 'index');
	}

}
