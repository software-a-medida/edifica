<?php
defined('_EXEC') or die;

class Projects_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index( $params )
	{
		global $projects_sale, $projects_under_construction, $projects_finished;

		$projects_sale = $this->model->projects('sale');
		$projects_under_construction = $this->model->projects('under_construction');
		$projects_finished = $this->model->projects('finished');

		echo $this->view->render($this, 'index');
	}

	public function create( $params )
	{
		global $type_project, $count_slideshow;

		$count_slideshow['pos_home'] = $this->model->count_slideshow('pos_home');
		$count_slideshow['pos_portfolio'] = $this->model->count_slideshow('pos_portfolio');

		/* Action Ajax ------------------------------------------------------ */
		if ( Format::exist_ajax_request() )
		{
			$_POST['action'] = (isset($_POST['action'])) ? $_POST['action'] : '';

			switch ( $_POST['action'] )
			{
				case 'sale':
					$config_uploads = [
						'extensions' => [ 'images' => ['jpg', 'jpeg', 'png'], 'applications' => ['pdf'] ],
						'path_uploads' => PATH_UPLOADS,
						'set_name' => 'FILE_NAME_LAST_RANDOM'
					];

					$post['brochure'] = ( isset($_FILES['brochure']) && !empty($_FILES['brochure']) ) ? $_FILES['brochure'] : null;

					$post['image_cover'] = ( isset($_FILES['image_cover']) && !empty($_FILES['image_cover']) ) ? $_FILES['image_cover'] : null;
					$post['project_logotype'] = ( isset($_FILES['project_logotype']) && !empty($_FILES['project_logotype']) ) ? $_FILES['project_logotype'] : null;
					$post['image_content'] = ( isset($_FILES['image_content']) && !empty($_FILES['image_content']) ) ? $_FILES['image_content'] : null;
					$post['project_croquis'] = ( isset($_FILES['project_croquis']) && !empty($_FILES['project_croquis']) ) ? $_FILES['project_croquis'] : null;
					$post['gallery'] = ( isset($_FILES['gallery']) && !empty($_FILES['gallery']) ) ? Upload::order_array($_FILES['gallery']) : null;
					$post['gallery_deliveries'] = ( isset($_FILES['gallery_deliveries']) && !empty($_FILES['gallery_deliveries']) ) ? Upload::order_array($_FILES['gallery_deliveries']) : null;
					$post['gallery_ready_constructions'] = ( isset($_FILES['gallery_ready_constructions']) && !empty($_FILES['gallery_ready_constructions']) ) ? Upload::order_array($_FILES['gallery_ready_constructions']) : null;
					$post['gallery_portfolio'] = ( isset($_FILES['gallery_portfolio']) && !empty($_FILES['gallery_portfolio']) ) ? Upload::order_array($_FILES['gallery_portfolio']) : null;

					$post['name'] = ( isset($_POST['name']) && !empty($_POST['name']) ) ? $_POST['name'] : null;
					$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;
					$post['price'] = ( isset($_POST['price']) && !empty($_POST['price']) ) ? floatval(str_replace(',','', $_POST['price'])) : null;
					$post['price_text'] = ( isset($_POST['price_text']) && !empty($_POST['price_text']) ) ? $_POST['price_text'] : null;
					$post['map_lat'] = ( isset($_POST['map_lat']) && !empty($_POST['map_lat']) ) ? $_POST['map_lat'] : null;
					$post['map_long'] = ( isset($_POST['map_long']) && !empty($_POST['map_long']) ) ? $_POST['map_long'] : null;
					$post['slide_home'] = ( isset($_POST['slide_home']) && !empty($_POST['slide_home']) ) ? $_POST['slide_home'] : null;
					$post['slide_portfolio'] = ( isset($_POST['slide_portfolio']) && !empty($_POST['slide_portfolio']) ) ? $_POST['slide_portfolio'] : null;
					$post['description'] = ( isset($_POST['description']) && !empty($_POST['description']) ) ? $_POST['description'] : null;

					$labels = [];

					if ( !empty($post['brochure']['name']) )
					{
						$__valid = Upload::validate_file($post['brochure'], $config_uploads['extensions']['applications']);
						if ( $__valid['status'] === 'ERROR' )
						/*  */ array_push($labels, ['brochure', $__valid['message']]);
					}

					$__valid = Upload::validate_file($post['image_cover'], $config_uploads['extensions']['images']);
					if ( $__valid['status'] === 'ERROR' )
					/*  */ array_push($labels, ['image_cover', $__valid['message']]);

					$__valid = Upload::validate_file($post['project_logotype'], $config_uploads['extensions']['images']);
					if ( $__valid['status'] === 'ERROR' )
					/*  */ array_push($labels, ['project_logotype', $__valid['message']]);

					$__valid = Upload::validate_file($post['image_content'], $config_uploads['extensions']['images']);
					if ( $__valid['status'] === 'ERROR' )
					/*  */ array_push($labels, ['image_content', $__valid['message']]);

					if ( !empty($post['project_croquis']['name']) )
					{
						$__valid = Upload::validate_file($post['project_croquis'], $config_uploads['extensions']['images']);
						if ( $__valid['status'] === 'ERROR' )
						/*  */ array_push($labels, ['project_croquis', $__valid['message']]);
					}

					if ( is_null($post['name']) || strlen($post['name']) < 5 )
					/*  */ array_push($labels, ['name', 'Se requiere escribir nombre del proyecto.']);

					if ( is_null($post['title']) || strlen($post['title']) < 5 )
					/*  */ array_push($labels, ['title', 'Se requiere un titulo para el proyecto.']);

					if ( is_null($post['price']) || !is_numeric($post['price']) )
					/*  */ array_push($labels, ['price', '']);

					if ( is_null($post['price_text']) || strlen($post['price_text']) < 5 )
					/*  */ array_push($labels, ['price_text', '']);

					if ( is_null($post['description']) || strlen($post['price_text']) < 5 )
					/*  */ array_push($labels, ['description', 'Se requiere una descripción para el proyecto.']);

					if ( empty($labels) )
					{
						if ( !empty($post['brochure']['name']) )
						/*  */ $post['brochure'] = Upload::upload_file($post['brochure'], $config_uploads);
						else
						/*  */ $post['brochure'] = null;

						if ( !empty($post['project_croquis']['name']) )
						/*  */ $post['project_croquis'] = Upload::upload_file($post['project_croquis'], $config_uploads);
						else
						/*  */ $post['project_croquis'] = null;

						$post['image_cover'] = Upload::upload_file($post['image_cover'], $config_uploads);
						$post['project_logotype'] = Upload::upload_file($post['project_logotype'], $config_uploads);
						$post['image_content'] = Upload::upload_file($post['image_content'], $config_uploads);

						if ( !empty($post['gallery']) )
						/*  */ $post['gallery'] = Upload::upload_array($post['gallery'], $config_uploads);
						else
						/*  */ $post['gallery'] = null;

						if ( !empty($post['gallery_deliveries']) )
						/*  */ $post['gallery_deliveries'] = Upload::upload_array($post['gallery_deliveries'], $config_uploads);
						else
						/*  */ $post['gallery_deliveries'] = null;

						if ( !empty($post['gallery_ready_constructions']) )
						/*  */ $post['gallery_ready_constructions'] = Upload::upload_array($post['gallery_ready_constructions'], $config_uploads);
						else
						/*  */ $post['gallery_ready_constructions'] = null;

						if ( !empty($post['gallery_portfolio']) )
						/*  */ $post['gallery_portfolio'] = Upload::upload_array($post['gallery_portfolio'], $config_uploads);
						else
						/*  */ $post['gallery_portfolio'] = null;

						$post['url'] = $this->security->clean_string($post['name']);
						$post['url'] = strtolower(str_replace('_', '-', $post['url']));

						$this->model->insert_project_sale($post);

						echo json_encode([
							'status' => 'OK',
							'redirect' => 'index.php?c=projects'
						], JSON_PRETTY_PRINT);
					}
					else
					{
						echo json_encode([
							'status' => 'error',
							'labels' => $labels,
						], JSON_PRETTY_PRINT);
					}
					break;

				case 'under_construction':
					$config_uploads = [
						'extensions' => [ 'images' => ['jpg', 'jpeg', 'png'], 'applications' => ['pdf'] ],
						'path_uploads' => PATH_UPLOADS,
						'set_name' => 'FILE_NAME_LAST_RANDOM',
					];

					$post['image_cover'] = ( isset($_FILES['image_cover']) && !empty($_FILES['image_cover']) ) ? $_FILES['image_cover'] : null;

					$post['name'] = ( isset($_POST['name']) && !empty($_POST['name']) ) ? $_POST['name'] : null;
					$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;
					$post['slide_home'] = ( isset($_POST['slide_home']) && !empty($_POST['slide_home']) ) ? $_POST['slide_home'] : null;
					$post['slide_portfolio'] = ( isset($_POST['slide_portfolio']) && !empty($_POST['slide_portfolio']) ) ? $_POST['slide_portfolio'] : null;
					$post['gallery'] = ( isset($_FILES['gallery']) && !empty($_FILES['gallery']) ) ? Upload::order_array($_FILES['gallery']) : null;

					$labels = [];

					$__valid = Upload::validate_file($post['image_cover'], $config_uploads['extensions']['images']);
					if ( $__valid['status'] === 'ERROR' )
					/*  */ array_push($labels, ['image_cover', $__valid['message']]);

					if ( is_null($post['name']) || strlen($post['name']) < 5 )
					/*  */ array_push($labels, ['name', 'Se requiere escribir nombre del proyecto.']);

					if ( is_null($post['title']) || strlen($post['title']) < 5 )
					/*  */ array_push($labels, ['title', 'Se requiere un titulo para el proyecto.']);

					if ( empty($labels) )
					{
						$post['image_cover'] = Upload::upload_file($post['image_cover'], $config_uploads);

						if ( !empty($post['gallery']) )
						/*  */ $post['gallery'] = Upload::upload_array($post['gallery'], $config_uploads);
						else
						/*  */ $post['gallery'] = null;

						$this->model->insert_project_under_construction($post);

						echo json_encode([
							'status' => 'OK',
							'redirect' => 'index.php?c=projects'
						], JSON_PRETTY_PRINT);
					}
					else
					{
						echo json_encode([
							'status' => 'error',
							'labels' => $labels,
						], JSON_PRETTY_PRINT);
					}
					break;

				case 'finished':
					$config_uploads = [
						'extensions' => [ 'images' => ['jpg', 'jpeg', 'png'], 'applications' => ['pdf'] ],
						'path_uploads' => PATH_UPLOADS,
						'set_name' => 'FILE_NAME_LAST_RANDOM',
					];

					$post['image_cover'] = ( isset($_FILES['image_cover']) && !empty($_FILES['image_cover']) ) ? $_FILES['image_cover'] : null;

					$post['name'] = ( isset($_POST['name']) && !empty($_POST['name']) ) ? $_POST['name'] : null;
					$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;
					$post['slide_home'] = ( isset($_POST['slide_home']) && !empty($_POST['slide_home']) ) ? $_POST['slide_home'] : null;
					$post['slide_portfolio'] = ( isset($_POST['slide_portfolio']) && !empty($_POST['slide_portfolio']) ) ? $_POST['slide_portfolio'] : null;
					$post['gallery'] = ( isset($_FILES['gallery']) && !empty($_FILES['gallery']) ) ? Upload::order_array($_FILES['gallery']) : null;

					$labels = [];

					$__valid = Upload::validate_file($post['image_cover'], $config_uploads['extensions']['images']);
					if ( $__valid['status'] === 'ERROR' )
					/*  */ array_push($labels, ['image_cover', $__valid['message']]);

					if ( is_null($post['name']) || strlen($post['name']) < 5 )
					/*  */ array_push($labels, ['name', 'Se requiere escribir nombre del proyecto.']);

					if ( is_null($post['title']) || strlen($post['title']) < 5 )
					/*  */ array_push($labels, ['title', 'Se requiere un titulo para el proyecto.']);

					if ( empty($labels) )
					{
						$post['image_cover'] = Upload::upload_file($post['image_cover'], $config_uploads);

						if ( !empty($post['gallery']) )
						/*  */ $post['gallery'] = Upload::upload_array($post['gallery'], $config_uploads);
						else
						/*  */ $post['gallery'] = null;

						$this->model->insert_project_finished($post);

						echo json_encode([
							'status' => 'OK',
							'redirect' => 'index.php?c=projects'
						], JSON_PRETTY_PRINT);
					}
					else
					{
						echo json_encode([
							'status' => 'error',
							'labels' => $labels,
						], JSON_PRETTY_PRINT);
					}
					break;

				default:
					echo json_encode([
						'status' => 'fatal_error',
						'message' => 'Se produjo un error desconocido, vuelve a intentarlo.'
					], JSON_PRETTY_PRINT);
					break;
			}
		}
		else
		{
			if ( isset($params['type']) && !empty($params['type']) )
			/*  */ $type_project = $params['type'];

			echo $this->view->render($this, 'create');
		}
	}

	public function edit( $params )
	{
		global $project, $count_slideshow;

		if ( !isset($params['id']) || !isset($params['type']) )
			Errors::http('404');
		else
		{
			$project = $this->model->projects($params['type'], $params['id']);

			if ( !isset($project[0]) || empty($project[0]) )
			/*  */ Errors::http('404');
			else
			{
				$project = $project[0];

				if ( Format::exist_ajax_request() )
				{
					$_POST['action'] = (isset($_POST['action'])) ? $_POST['action'] : '';

					switch ( $_POST['action'] )
					{
						case 'sale':
							$config_uploads = [
								'extensions' => [ 'images' => ['jpg', 'jpeg', 'png'], 'applications' => ['pdf'] ],
								'path_uploads' => PATH_UPLOADS,
								'set_name' => 'FILE_NAME_LAST_RANDOM',
							];

							$post['brochure'] = ( isset($_FILES['brochure']) && !empty($_FILES['brochure']) ) ? $_FILES['brochure'] : null;

							$post['image_cover'] = ( isset($_FILES['image_cover']) && !empty($_FILES['image_cover']) ) ? $_FILES['image_cover'] : null;
							$post['project_logotype'] = ( isset($_FILES['project_logotype']) && !empty($_FILES['project_logotype']) ) ? $_FILES['project_logotype'] : null;
							$post['image_content'] = ( isset($_FILES['image_content']) && !empty($_FILES['image_content']) ) ? $_FILES['image_content'] : null;
							$post['project_croquis'] = ( isset($_FILES['project_croquis']) && !empty($_FILES['project_croquis']) ) ? $_FILES['project_croquis'] : null;
							$post['gallery'] = ( isset($_FILES['gallery']) && !empty($_FILES['gallery']) ) ? Upload::order_array($_FILES['gallery']) : null;
							$post['gallery_deliveries'] = ( isset($_FILES['gallery_deliveries']) && !empty($_FILES['gallery_deliveries']) ) ? Upload::order_array($_FILES['gallery_deliveries']) : null;
							$post['gallery_ready_constructions'] = ( isset($_FILES['gallery_ready_constructions']) && !empty($_FILES['gallery_ready_constructions']) ) ? Upload::order_array($_FILES['gallery_ready_constructions']) : null;
							$post['gallery_portfolio'] = ( isset($_FILES['gallery_portfolio']) && !empty($_FILES['gallery_portfolio']) ) ? Upload::order_array($_FILES['gallery_portfolio']) : null;

							$post['name'] = ( isset($_POST['name']) && !empty($_POST['name']) ) ? $_POST['name'] : null;
							$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;
							$post['price'] = ( isset($_POST['price']) && !empty($_POST['price']) ) ? floatval(str_replace(',','', $_POST['price'])) : null;
							$post['price_text'] = ( isset($_POST['price_text']) && !empty($_POST['price_text']) ) ? $_POST['price_text'] : null;
							$post['map_lat'] = ( isset($_POST['map_lat']) && !empty($_POST['map_lat']) ) ? $_POST['map_lat'] : null;
							$post['map_long'] = ( isset($_POST['map_long']) && !empty($_POST['map_long']) ) ? $_POST['map_long'] : null;
							$post['slide_home'] = ( isset($_POST['slide_home']) && !empty($_POST['slide_home']) ) ? $_POST['slide_home'] : null;
							$post['slide_portfolio'] = ( isset($_POST['slide_portfolio']) && !empty($_POST['slide_portfolio']) ) ? $_POST['slide_portfolio'] : null;
							$post['description'] = ( isset($_POST['description']) && !empty($_POST['description']) ) ? $_POST['description'] : null;

							$labels = [];

							if ( !empty($post['brochure']['name']) )
							{
								$__valid = Upload::validate_file($post['brochure'], $config_uploads['extensions']['applications']);
								if ( $__valid['status'] === 'ERROR' )
								/*  */ array_push($labels, ['brochure', $__valid['message']]);
							}

							if ( !empty($post['image_cover']['name']) )
							{
								$__valid = Upload::validate_file($post['image_cover'], $config_uploads['extensions']['images']);
								if ( $__valid['status'] === 'ERROR' )
								/*  */ array_push($labels, ['image_cover', $__valid['message']]);
							}

							if ( !empty($post['project_logotype']['name']) )
							{
								$__valid = Upload::validate_file($post['project_logotype'], $config_uploads['extensions']['images']);
								if ( $__valid['status'] === 'ERROR' )
								/*  */ array_push($labels, ['project_logotype', $__valid['message']]);
							}

							if ( !empty($post['image_content']['name']) )
							{
								$__valid = Upload::validate_file($post['image_content'], $config_uploads['extensions']['images']);
								if ( $__valid['status'] === 'ERROR' )
								/*  */ array_push($labels, ['image_content', $__valid['message']]);
							}

							if ( !empty($post['project_croquis']['name']) )
							{
								$__valid = Upload::validate_file($post['project_croquis'], $config_uploads['extensions']['images']);
								if ( $__valid['status'] === 'ERROR' )
								/*  */ array_push($labels, ['project_croquis', $__valid['message']]);
							}

							if ( is_null($post['name']) || strlen($post['name']) < 5 )
							/*  */ array_push($labels, ['name', 'Se requiere escribir nombre del proyecto.']);

							if ( is_null($post['title']) || strlen($post['title']) < 5 )
							/*  */ array_push($labels, ['title', 'Se requiere un titulo para el proyecto.']);

							if ( is_null($post['price']) || !is_numeric($post['price']) )
							/*  */ array_push($labels, ['price', '']);

							if ( is_null($post['price_text']) || strlen($post['price_text']) < 5 )
							/*  */ array_push($labels, ['price_text', '']);

							if ( is_null($post['description']) || strlen($post['price_text']) < 5 )
							/*  */ array_push($labels, ['description', 'Se requiere una descripción para el proyecto.']);

							if ( empty($labels) )
							{
								if ( !empty($post['brochure']['name']) )
								/*  */ $post['brochure'] = Upload::upload_file($post['brochure'], $config_uploads);
								else
								/*  */ $post['brochure'] = null;

								if ( !empty($post['image_cover']['name']) )
								/*  */ $post['image_cover'] = Upload::upload_file($post['image_cover'], $config_uploads);
								else
								/*  */ $post['image_cover'] = null;

								if ( !empty($post['project_logotype']['name']) )
								/*  */ $post['project_logotype'] = Upload::upload_file($post['project_logotype'], $config_uploads);
								else
								/*  */ $post['project_logotype'] = null;

								if ( !empty($post['image_content']['name']) )
								/*  */ $post['image_content'] = Upload::upload_file($post['image_content'], $config_uploads);
								else
								/*  */ $post['image_content'] = null;

								if ( !empty($post['project_croquis']['name']) )
								/*  */ $post['project_croquis'] = Upload::upload_file($post['project_croquis'], $config_uploads);
								else
								/*  */ $post['project_croquis'] = null;

								if ( !empty($post['gallery']) )
								/*  */ $post['gallery'] = Upload::upload_array($post['gallery'], $config_uploads);
								else
								/*  */ $post['gallery'] = null;

								if ( !empty($post['gallery_deliveries']) )
								/*  */ $post['gallery_deliveries'] = Upload::upload_array($post['gallery_deliveries'], $config_uploads);
								else
								/*  */ $post['gallery_deliveries'] = null;

								if ( !empty($post['gallery_ready_constructions']) )
								/*  */ $post['gallery_ready_constructions'] = Upload::upload_array($post['gallery_ready_constructions'], $config_uploads);
								else
								/*  */ $post['gallery_ready_constructions'] = null;

								if ( !empty($post['gallery_portfolio']) )
								/*  */ $post['gallery_portfolio'] = Upload::upload_array($post['gallery_portfolio'], $config_uploads);
								else
								/*  */ $post['gallery_portfolio'] = null;

								$post['id'] = $project['id'];

								if ( isset($_POST['image_delete']) && !empty($_POST['image_delete']) )
									$this->model->delete_images($_POST['image_delete']);

								$this->model->update_project_sale($post);

								echo json_encode([
									'status' => 'OK',
									'redirect' => 'index.php?c=projects'
								], JSON_PRETTY_PRINT);
							}
							else
							{
								echo json_encode([
									'status' => 'error',
									'labels' => $labels,
								], JSON_PRETTY_PRINT);
							}
							break;

						case 'under_construction':
							$config_uploads = [
								'extensions' => [ 'images' => ['jpg', 'jpeg', 'png'], 'applications' => ['pdf'] ],
								'path_uploads' => PATH_UPLOADS,
								'set_name' => 'FILE_NAME_LAST_RANDOM',
							];

							$post['image_cover'] = ( isset($_FILES['image_cover']) && !empty($_FILES['image_cover']) ) ? $_FILES['image_cover'] : null;
							$post['gallery'] = ( isset($_FILES['gallery']) && !empty($_FILES['gallery']) ) ? Upload::order_array($_FILES['gallery']) : null;
							$post['gallery_deliveries'] = ( isset($_FILES['gallery_deliveries']) && !empty($_FILES['gallery_deliveries']) ) ? Upload::order_array($_FILES['gallery_deliveries']) : null;
							$post['gallery_ready_constructions'] = ( isset($_FILES['gallery_ready_constructions']) && !empty($_FILES['gallery_ready_constructions']) ) ? Upload::order_array($_FILES['gallery_ready_constructions']) : null;
							$post['gallery_portfolio'] = ( isset($_FILES['gallery_portfolio']) && !empty($_FILES['gallery_portfolio']) ) ? Upload::order_array($_FILES['gallery_portfolio']) : null;

							$post['name'] = ( isset($_POST['name']) && !empty($_POST['name']) ) ? $_POST['name'] : null;
							$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;
							$post['slide_home'] = ( isset($_POST['slide_home']) && !empty($_POST['slide_home']) ) ? $_POST['slide_home'] : null;
							$post['slide_portfolio'] = ( isset($_POST['slide_portfolio']) && !empty($_POST['slide_portfolio']) ) ? $_POST['slide_portfolio'] : null;

							$labels = [];

							if ( !empty($post['image_cover']['name']) )
							{
								$__valid = Upload::validate_file($post['image_cover'], $config_uploads['extensions']['images']);
								if ( $__valid['status'] === 'ERROR' )
								/*  */ array_push($labels, ['image_cover', $__valid['message']]);
							}

							if ( is_null($post['name']) || strlen($post['name']) < 5 )
							/*  */ array_push($labels, ['name', 'Se requiere escribir nombre del proyecto.']);

							if ( is_null($post['title']) || strlen($post['title']) < 5 )
							/*  */ array_push($labels, ['title', 'Se requiere un titulo para el proyecto.']);

							if ( empty($labels) )
							{
								if ( !empty($post['image_cover']['name']) )
								/*  */ $post['image_cover'] = Upload::upload_file($post['image_cover'], $config_uploads);
								else
								/*  */ $post['image_cover'] = null;

								if ( !empty($post['gallery']) )
								/*  */ $post['gallery'] = Upload::upload_array($post['gallery'], $config_uploads);
								else
								/*  */ $post['gallery'] = null;

								if ( !empty($post['gallery_deliveries']) )
								/*  */ $post['gallery_deliveries'] = Upload::upload_array($post['gallery_deliveries'], $config_uploads);
								else
								/*  */ $post['gallery_deliveries'] = null;

								if ( !empty($post['gallery_ready_constructions']) )
								/*  */ $post['gallery_ready_constructions'] = Upload::upload_array($post['gallery_ready_constructions'], $config_uploads);
								else
								/*  */ $post['gallery_ready_constructions'] = null;

								if ( !empty($post['gallery_portfolio']) )
								/*  */ $post['gallery_portfolio'] = Upload::upload_array($post['gallery_portfolio'], $config_uploads);
								else
								/*  */ $post['gallery_portfolio'] = null;

								$post['id'] = $project['id'];

								if ( isset($_POST['image_delete']) && !empty($_POST['image_delete']) )
									$this->model->delete_images($_POST['image_delete']);

								$this->model->update_project_under_construction($post);

								echo json_encode([
									'status' => 'OK',
									'redirect' => 'index.php?c=projects'
								], JSON_PRETTY_PRINT);
							}
							else
							{
								echo json_encode([
									'status' => 'error',
									'labels' => $labels,
								], JSON_PRETTY_PRINT);
							}
							break;

						case 'finished':
							$config_uploads = [
								'extensions' => [ 'images' => ['jpg', 'jpeg', 'png'], 'applications' => ['pdf'] ],
								'path_uploads' => PATH_UPLOADS,
								'set_name' => 'FILE_NAME_LAST_RANDOM',
							];

							$post['image_cover'] = ( isset($_FILES['image_cover']) && !empty($_FILES['image_cover']) ) ? $_FILES['image_cover'] : null;
							$post['gallery'] = ( isset($_FILES['gallery']) && !empty($_FILES['gallery']) ) ? Upload::order_array($_FILES['gallery']) : null;
							$post['gallery_deliveries'] = ( isset($_FILES['gallery_deliveries']) && !empty($_FILES['gallery_deliveries']) ) ? Upload::order_array($_FILES['gallery_deliveries']) : null;
							$post['gallery_ready_constructions'] = ( isset($_FILES['gallery_ready_constructions']) && !empty($_FILES['gallery_ready_constructions']) ) ? Upload::order_array($_FILES['gallery_ready_constructions']) : null;
							$post['gallery_portfolio'] = ( isset($_FILES['gallery_portfolio']) && !empty($_FILES['gallery_portfolio']) ) ? Upload::order_array($_FILES['gallery_portfolio']) : null;

							$post['name'] = ( isset($_POST['name']) && !empty($_POST['name']) ) ? $_POST['name'] : null;
							$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;
							$post['slide_home'] = ( isset($_POST['slide_home']) && !empty($_POST['slide_home']) ) ? $_POST['slide_home'] : null;
							$post['slide_portfolio'] = ( isset($_POST['slide_portfolio']) && !empty($_POST['slide_portfolio']) ) ? $_POST['slide_portfolio'] : null;

							$labels = [];

							if ( !empty($post['image_cover']['name']) )
							{
								$__valid = Upload::validate_file($post['image_cover'], $config_uploads['extensions']['images']);
								if ( $__valid['status'] === 'ERROR' )
								/*  */ array_push($labels, ['image_cover', $__valid['message']]);
							}

							if ( is_null($post['name']) || strlen($post['name']) < 5 )
							/*  */ array_push($labels, ['name', 'Se requiere escribir nombre del proyecto.']);

							if ( is_null($post['title']) || strlen($post['title']) < 5 )
							/*  */ array_push($labels, ['title', 'Se requiere un titulo para el proyecto.']);

							if ( empty($labels) )
							{
								if ( !empty($post['image_cover']['name']) )
								/*  */ $post['image_cover'] = Upload::upload_file($post['image_cover'], $config_uploads);
								else
								/*  */ $post['image_cover'] = null;

								if ( !empty($post['gallery']) )
								/*  */ $post['gallery'] = Upload::upload_array($post['gallery'], $config_uploads);
								else
								/*  */ $post['gallery'] = null;

								if ( !empty($post['gallery_deliveries']) )
								/*  */ $post['gallery_deliveries'] = Upload::upload_array($post['gallery_deliveries'], $config_uploads);
								else
								/*  */ $post['gallery_deliveries'] = null;

								if ( !empty($post['gallery_ready_constructions']) )
								/*  */ $post['gallery_ready_constructions'] = Upload::upload_array($post['gallery_ready_constructions'], $config_uploads);
								else
								/*  */ $post['gallery_ready_constructions'] = null;

								if ( !empty($post['gallery_portfolio']) )
								/*  */ $post['gallery_portfolio'] = Upload::upload_array($post['gallery_portfolio'], $config_uploads);
								else
								/*  */ $post['gallery_portfolio'] = null;

								$post['id'] = $project['id'];

								if ( isset($_POST['image_delete']) && !empty($_POST['image_delete']) )
									$this->model->delete_images($_POST['image_delete']);

								$this->model->update_project_finished($post);

								echo json_encode([
									'status' => 'OK',
									'redirect' => 'index.php?c=projects'
								], JSON_PRETTY_PRINT);
							}
							else
							{
								echo json_encode([
									'status' => 'error',
									'labels' => $labels,
								], JSON_PRETTY_PRINT);
							}
							break;

						default:
							echo json_encode([
								'status' => 'fatal_error',
								'message' => 'Se produjo un error desconocido, vuelve a intentarlo.'
							], JSON_PRETTY_PRINT);
							break;
					}
				}
				else
				{
					$count_slideshow['pos_home'] = $this->model->count_slideshow('pos_home');
					$count_slideshow['pos_portfolio'] = $this->model->count_slideshow('pos_portfolio');

					echo $this->view->render($this, 'edit');
					// print_r($project);
				}
			}
		}
	}

	public function delete()
	{
		header('Content-type: application/json');

		$this->model->delete_project( $_POST['id'] );

		echo json_encode([
			'status' => 'OK',
			'redirect' => 'index.php?c=projects'
		], JSON_PRETTY_PRINT);
	}
}
