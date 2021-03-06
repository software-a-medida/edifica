<?php
defined('_EXEC') or die;

class Home_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_blog( $id = null )
	{
		if ( is_null($id) )
			return null;

		return $this->database->select('blog', [
			'url',
			'title [Object]',
			'image',
		], [
			'id' => $id
		]);
	}

	public function get_slideshows_home()
	{
		return $this->database->select('slideshows', [
			'id',
			'id_key',
			'table',
			'pos_home',
		], [
			'pos_home[!]' => null,
			'ORDER' => [
				'pos_home' => 'ASC',
				'id' => 'DESC',
			]
		]);
		// return [
		// 	'home' => $this->database->select('slideshows', [
		// 		'id_key',
		// 		'table',
		// 		'pos_home',
		// 	], [
		// 		'AND' => [
		// 			'table' => ['projects', 'blog'],
		// 			'pos_home[!]' => null,
		// 		]
		// 	]),
		// 	'portfolio' => $this->database->select('slideshows', [
		// 		'id_key',
		// 		'pos_portfolio',
		// 	], [
		// 		'AND' => [
		// 			'table' => 'projects',
		// 			'pos_portfolio[!]' => null,
		// 		]
		// 	]),
		// ];
	}

	public function get_slideshows_portfolio()
	{
		return $this->database->select('slideshows', [
			'id',
			'id_key',
			'table',
			'pos_portfolio',
		], [
			'pos_portfolio[!]' => null,
			'ORDER' => [
				'pos_portfolio' => 'ASC',
				'id' => 'DESC',
			]
		]);
	}

	public function get_projects( $id = null )
	{
		$where = [];

		if ( !is_null($id) && is_numeric($id) )
		/*  */ $where['id'] = $id;

		$projects = $this->database->select('projects', [
			'id',
			'url',
			'type',
			'data [Object]'
		], $where);

		$ids = [];

		foreach ( $projects as $key => $value )
		/*  */ $ids[] = $value['id'];

		$media = $this->database->select('media', [
			'id_key',
			'var_key',
			'value'
		], [
			'id_key' => $ids,
		]);

		if ( !empty($media) )
		{
			foreach ( $media as $value )
			{
				$key = array_search($value['id_key'], array_column($projects, 'id'));

				if ( $value['var_key'] === 'gallery' )
				/*  */ $projects[$key]['gallery'][] = $value['value'];
				else if ( $value['var_key'] === 'gallery_deliveries' )
				/*  */ $projects[$key]['gallery_deliveries'][] = $value['value'];
				else if ( $value['var_key'] === 'gallery_ready_constructions' )
				/*  */ $projects[$key]['gallery_ready_constructions'][] = $value['value'];
				else if ( $value['var_key'] === 'gallery_portfolio' )
				/*  */ $projects[$key]['gallery_portfolio'][] = $value['value'];
				else
				/*  */ $projects[$key][$value['var_key']] = $value['value'];
			}
		}

		return $projects;
	}

	public function get_photo_team()
	{
		return $this->database->select('media', 'value', [
			'var_key' => 'team',
			'LIMIT' => 1
		]);
	}
}
