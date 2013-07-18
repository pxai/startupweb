<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HAuth extends CI_Controller
{
	/**
	* signin
	* offers some sign in sites links
	*/
	public function signin() {
				$this->load->view('hauth/home');
	}


	public function login($provider="")
	{
		log_message('debug', "controllers.HAuth.login($provider) called");

		try
		{
			log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
			$this->load->library('HybridAuthLib');

			if ($provider != "" && $this->hybridauthlib->serviceEnabled($provider))
			{
				log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
				$service = $this->hybridauthlib->authenticate($provider);

				if ($service->isUserConnected())
				{
					log_message('debug', 'YEAAAAAH');
					log_message('debug', 'controller.HAuth.login: user authenticated.');

					$user_profile = $service->getUserProfile();

					log_message('info', 'controllers.HAuth.login: user profile:'.PHP_EOL.print_r($user_profile, TRUE));

					$data['user_profile'] = $user_profile;
			

					$data['id_provider'] = $data['user_profile']->identifier."_".strtolower($provider);
					$data['profile'] = $data['user_profile']->profileURL;
					$data['avatar'] = $data['user_profile']->photoURL;
					
					$iduser = $this->initSession($data['id_provider'],$data['user_profile']->displayName,$data['user_profile']);			

					$data['name'] = $data['user_profile']->displayName;
					$data['iduser'] = $iduser;

					$this->session->set_userdata($data);

				
				 	//redirect('/home/', 'refresh');
				 	redirect('/', 'refresh');

				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
				case 0 : $error = 'Unspecified error.'; break;
				case 1 : $error = 'Hybriauth configuration error.'; break;
				case 2 : $error = 'Provider not properly configured.'; break;
				case 3 : $error = 'Unknown or disabled provider.'; break;
				case 4 : $error = 'Missing provider application credentials.'; break;
				case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				         //redirect();
				         if (isset($service))
				         {
				         	log_message('debug', 'controllers.HAuth.login: logging out from service.');
				         	$service->logout();
				         }
				         show_error('User has cancelled the authentication or the provider refused the connection.');
				         break;
				case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				         break;
				case 7 : $error = 'User not connected to the provider.';
				         break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.HAuth.login: '.$error);
			show_error('Error authenticating user: ' . $error);
		}
	}

	public function endpoint()
	{
		log_message('debug', 'controllers.HAuth.endpoint called.');
		log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: '.print_r($_REQUEST, TRUE));

		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
			$_GET = $_REQUEST;
		}

		log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
		require_once APPPATH.'/third_party/hybridauth/index.php';
	}

	private function initSession ($iduser,$name,$data) {

		$myid = -1;
		$this->load->model('user_model');
		
		// User exists?
		$sql = "select * from users where identifier =".$this->db->escape($iduser);
		$result = $this->db->query($sql);

		// If not exists
		if ($result->num_rows() == 0) {
			$data->identifier = $iduser;
			$myid = $this->user_model->create( (array) $data);
			//$sql = "INSERT INTO users (user,name,data) VALUES(".$this->db->escape($iduser).",".$this->db->escape($name).",".$this->db->escape($data).")";		
			//$result = $this->db->query($sql);
			//$myid = $this->db->insert_id();
		} else {
			$userdata = $this->user_model->readByIdentifier($iduser);
			$this->session->set_userdata($userdata);
		}

		return  $myid;
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */
