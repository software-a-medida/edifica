<?php
defined('_EXEC') or die;

class Developments_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_projects( $url = null )
	{
		$where = [];

		if ( !is_null($url) )
		/*  */ $where['url'] = $url;

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
