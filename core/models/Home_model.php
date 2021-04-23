<?php
defined('_EXEC') or die;

class Home_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_slideshows()
	{
		return [
			'home' => $this->database->select('slideshows', [
				'id_key',
				'pos_home',
			], [
				'AND' => [
					'table' => 'projects',
					'pos_home[!]' => null,
				]
			]),
			'portfolio' => $this->database->select('slideshows', [
				'id_key',
				'pos_portfolio',
			], [
				'AND' => [
					'table' => 'projects',
					'pos_portfolio[!]' => null,
				]
			]),
		];
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

				if ( $value['var_key'] !== 'gallery' )
				/*  */ $projects[$key][$value['var_key']] = $value['value'];
				else
				/*  */ $projects[$key]['gallery'][] = $value['value'];
			}
		}

		return $projects;
	}
}
