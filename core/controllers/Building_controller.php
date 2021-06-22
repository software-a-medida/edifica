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

	public function download()
	{
		$projects = $this->model->get_projects();

		$gallery_portfolio = [];

		foreach ( $projects as $value )
		{
			if ( isset($value['gallery_portfolio']) && !empty($value['gallery_portfolio']) )
			{
				$gallery_portfolio[] = $value['gallery_portfolio'];
			}
		}

		$gallery_portfolio = array_reduce($gallery_portfolio, 'array_merge', array());

		$zip = new ZipArchive();

		$filename = date('d-m-Y') .'-'. $this->security->random_string(8);
		$filename = PATH_UPLOADS . $filename .'.zip';

		if ( $zip->open($filename, ZIPARCHIVE::CREATE) === true )
		{
			foreach ( $gallery_portfolio as $value )
			{
				$zip->addFile(PATH_UPLOADS . $value, $value);
			}

			$zip->close();

			if( !empty($filename) && file_exists($filename) )
			{
				// Define headers
				header("Cache-Control: public");
				header("Content-Description: File Transfer");
				header("Content-Disposition: attachment; filename=". basename($filename));
				header("Content-Type: application/zip");
				header("Content-Transfer-Encoding: binary");

				// Read the file
				readfile($filename);
				exit;
			}
			else
			{
				echo 'The file does not exist.';
			}
		}
		else
		{
			echo 'Error creando '.$filename;
		}
	}

}
