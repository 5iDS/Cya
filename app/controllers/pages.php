<?php

/* --------------------------------------
 * This controller renders the home page 
 * --------------------------------------*/
class Pages extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

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
		$GetProvinces = $this->Location->listProvinces('ZA');
		$GetCountries = $this->Location->listCountries('ZA');
		/**
		if(class_exists('iDBug')){
			$debug = new iDBug();
			$debug->debug('GetProvinces',$GetProvinces);
		}
		/**/
		$data = array(
				'countriesArray' => $GetCountries,
				'ProvincesArray' => $GetProvinces
		);
		
		$this->load->view('templates/_header');
		$this->load->view('pages/home',$data);
		$this->load->view('templates/_footer');
	}
}

?>