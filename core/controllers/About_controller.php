<?php
defined('_EXEC') or die;

class About_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		define('_title', '{$vkye_webpage} by codemonkey.com.mx');
		$template = $this->view->render($this, 'index');

		echo $template;
	}

}
