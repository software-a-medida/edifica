<?php
defined('_EXEC') or die;

class Settings_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_photo_team()
	{
		return $this->database->select('media', 'value', [
			'var_key' => 'team',
			'LIMIT' => 1
		]);
	}

	public function update_photo_team( $data = null )
	{
		if ( is_null($data) )
		/*  */ return;

		$this->database->update('media', [
			'value' => $data
		], [
			'var_key' => 'team'
		]);
	}
}
