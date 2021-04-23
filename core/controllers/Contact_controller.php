<?php
defined('_EXEC') or die;

class Contact_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (Format::exist_ajax_request() == true)
		{
			$errors = [];

			if (empty($_POST['name']))
				array_push($errors, ['No deje el nombre vacío']);

			if (empty($_POST['email']))
				array_push($errors, ['No deje el correo vacío']);

			if (empty($_POST['phone']))
				array_push($errors, ['No deje el teléfono vacío']);

			if (empty($_POST['message']))
				array_push($errors, ['No deje el mensaje vacío']);

			if (empty($errors))
			{
				$mail = new Mailer(true);

				try
				{
					$mail->setFrom('noreply@edifica67.mx', 'Edifica');
					$mail->addAddress('ventas@edifica67.mx', 'Edifica');
					$mail->addAddress('acharruf@edifica67.mx', 'Edifica');
					$mail->Subject = 'Nuevo contacto';
					$mail->Body = 'Nombre: ' . $_POST['name'] . '<br>Correo: ' . $_POST['email'] . '<br>Teléfono: ' . $_POST['phone'] . '<br>Mensaje: ' . $_POST['message'];
					$mail->send();
				}
				catch (Exception $e) {}

				echo json_encode([
					'status' => 'success'
				]);
			}
			else
			{
				echo json_encode([
					'status' => 'error',
					'errors' => $errors
				]);
			}
		}
		else
		{
			define('_title', '{$vkye_webpage} by codemonkey.com.mx');

			$template = $this->view->render($this, 'index');

			echo $template;
		}
	}

}
