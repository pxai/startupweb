<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('demos/index.php');
	}

	public function page($page,$subpage="")
	{
		if ($subpage == "") {
			$this->load->view('demos/'.$page.'/index.php');
		} else {
			$this->load->view('demos/'.$page.'/'.$subpage.'.php');
		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */