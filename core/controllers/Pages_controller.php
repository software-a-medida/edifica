<?php
defined('_EXEC') or die;

class Pages_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function home()
	{
		define('_title', '{$vkye_webpage} by codemonkey.com.mx');
		$template = $this->view->render($this, 'index');

		echo $template;
	}

	public function login()
	{
		if ( Format::exist_ajax_request() )
		{
			header('Content-type: application/json');

			$post['email'] = ( isset($_POST['email']) && !empty($_POST['email']) ) ? $_POST['email'] : null;
			$post['password'] = ( isset($_POST['password']) && !empty($_POST['password']) ) ? $_POST['password'] : null;

			$labels = [];

			if ( is_null($post['email']) ) array_push($labels, ['email', 'Por favor, escriba el correo electrónico con el que está registrado.']);
			if ( is_null($post['password']) ) array_push($labels, ['password', 'Por favor, escriba una contraseña.']);

			if ( empty($labels) )
			{
			}
			else
			{
				echo json_encode([
					'status' => 'error',
					'labels' => $labels,
					'message' => 'Por favor, inicie sesión.'
				], JSON_PRETTY_PRINT);
			}
		}
		else
		{
			define('_title', 'Iniciar sesión en {$vkye_webpage}');
			$template = $this->view->render($this, 'login');

			echo $template;
		}
	}

	public function register()
	{
		if ( Format::exist_ajax_request() )
		{
			header('Content-type: application/json');

			$post['name'] = ( isset($_POST['name']) && !empty($_POST['name']) ) ? $_POST['name'] : null;
			$post['email'] = ( isset($_POST['email']) && !empty($_POST['email']) ) ? $_POST['email'] : null;
			$post['phone'] = ( isset($_POST['phone']) && !empty($_POST['phone']) ) ? '+'. str_replace(['(',')','-',' '], '', $_POST['prefix'] . $_POST['phone']) : null;
			$post['password'] = ( isset($_POST['password']) && !empty($_POST['password']) ) ? $_POST['password'] : null;
			$post['r-password'] = ( isset($_POST['r-password']) && !empty($_POST['r-password']) ) ? $_POST['r-password'] : null;

			$labels = [];

			if ( is_null($post['name']) ) array_push($labels, ['name', '']);
			if ( is_null($post['email']) ) array_push($labels, ['email', '']);
			if ( is_null($post['phone']) ) array_push($labels, ['phone', '']);
			if ( strlen($post['password']) < 8 ) array_push($labels, ['password', 'Tu contraseña debe ser mayor a 8 caracteres.']);
			if ( $post['password'] !== $post['r-password'] ) array_push($labels, ['r-password', 'Las contraseñas no son iguales.']);
			// if ( !empty($this->model->get_user($post)) ) array_push($labels, ['email', 'Este correo electrónico ya se encuentra registrado.']);

			if ( empty($labels) )
			{
			}
			else
			{
				echo json_encode([
					'status' => 'error',
					'labels' => $labels
				], JSON_PRETTY_PRINT);
			}
		}
		else
		{
			global $ladas;

			$ladas = $this->format->import_file(PATH_INCLUDES, 'code_countries_lada', 'json');

			define('_title', 'Registrarme en {$vkye_webpage}');
			echo $this->view->render($this, 'register');
		}
	}

}
