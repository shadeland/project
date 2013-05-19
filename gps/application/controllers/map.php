<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class map extends CI_Controller {

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
            $this->load->helper('url');
            $this->load->helper('string');
            $this->load->config('myconfig');
            $_deviceLanguge=$this->config->item('device_setting');
            $data['devicelang']=$_deviceLanguge;
            $this->load->view('map',$data);
            
             
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */