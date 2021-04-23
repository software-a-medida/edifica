<?php
defined('_EXEC') or die;

class Index_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index( $params )
	{
		$this->system->go_to_location('projects');
	}
}
