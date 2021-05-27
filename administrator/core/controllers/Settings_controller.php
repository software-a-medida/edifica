<?php
defined('_EXEC') or die;

class Settings_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index( $params )
	{
		global $get_photo_team;

		$get_photo_team = $this->model->get_photo_team()[0];

		echo $this->view->render($this, 'index');
	}

	public function upload_photo_team()
	{
		/* Action Ajax ------------------------------------------------------ */
		if ( Format::exist_ajax_request() )
		{
			$post['image'] = ( isset($_FILES['image']) && !empty($_FILES['image']) ) ? $_FILES['image'] : null;

			$labels = [];

			$__valid = Upload::validate_file($post['image'], ['jpg', 'jpeg', 'png']);
			if ( $__valid['status'] === 'ERROR' )
			/*  */ array_push($labels, ['image', $__valid['message']]);

			if ( empty($labels) )
			{
				$post['image'] = Upload::upload_file($post['image'], [
					'path_uploads' => PATH_UPLOADS,
					'set_name' => 'FILE_NAME_LAST_RANDOM'
				]);

				$this->model->update_photo_team($post['image']['file']);

				echo json_encode([
					'status' => 'OK',
					'redirect' => 'index.php?c=settings'
				], JSON_PRETTY_PRINT);
			}
			else
			{
				echo json_encode([
					'status' => 'error',
					'labels' => $labels,
				], JSON_PRETTY_PRINT);
			}
		}
		else
		/*  */ Errors::http('404');
	}
}
