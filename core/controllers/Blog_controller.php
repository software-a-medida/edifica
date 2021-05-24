<?php
defined('_EXEC') or die;

class Blog_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();

		global $countries_iso;

		$countries_iso = $this->format->import_file(PATH_INCLUDES, 'codes_countries_iso', 'json');
	}

	public function list()
	{
		global $data;

		$data = $this->model->get_list_blog();

		define('_title', 'Consejos de inversión para la economía digital - {$vkye_webpage}');
		echo $this->view->render($this, 'list');
	}

	public function view( $params )
	{
		global $countries_iso, $data;

		$data = $this->model->get_article_blog( $params[0] );

		if ( !empty($data) )
		{
			define('_title', $data[0]['title'][Configuration::$lang_default]);
			echo $this->view->render('Blog', 'article');
		}
		else Errors::http('404');
	}
}
