<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        error_reporting(-1);
        ini_set('display_errors', TRUE);
//        $this->load->library('gpsdata');
//        $this->gpsdata->parseStatus();
//        $this->load->model('m_vehicle_incident');
//       print_r($this->m_vehicle_incident->findVehiclesForIncident(34,'1'));
//		$this->load->view('welcome_message');
        $this->load->library('jalaliDate');
       echo $this->jalalidate->mds_date("Y/m/d", "now", 1);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */