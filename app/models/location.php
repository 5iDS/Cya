<?php
#-----------------------------------------------------------------
# LOCATION CLASS
#
# @param  string $template
# @param  array $vars
#
# @return
#
# @package origami
# @since 0.5.0
# @a.Work.of.Hip.Hop...www.5ivedesign.co.za
#
#-----------------------------------------------------------------
class Location extends CI_Model {
	
	//FIELDS
	public $country_table = 'countries';
	public $provinces_table = 'provinces';
	
	/**/
	public function __construct() {
		// Call the Model constructor
        parent::__construct();	
	}
	/**/

	//COUNTRY
	public function setCountry($countryCode) {
		$this->country = $countryCode;
	}
	
	//PROVINCE
	public function setProvince($province) {
		$this->province = $province;
	}
	
	public function listProvinces($countryCode){

		//$this->load->database();
		//FIRST FIND COUNTRY ID
		$sql = "SELECT ID FROM countries WHERE Code= ? ORDER BY ID";
		$results = $this->db->query( $sql, array($countryCode) );
		/**
		if(class_exists('iDBug')){
			$debug = new iDBug();
			$debug->debug('results',$results->result());
		}
		/**/
		// Output the rows
		foreach ($results->result() as $result) {
			$selectedCountry = $result->ID;
		}
		/**
		if(class_exists('iDBug')){
			$debug = new iDBug();
			$debug->debug('selectedCountry',$selectedCountry);
		}
		/**/
		/**/
		if(empty($countryCode)){
			//throw new Exception("Unsupported country!");
			return;
		} else {
			$province_query = "SELECT * FROM provinces WHERE Country=? ORDER BY ID";
			$provinceResults = $this->db->query($province_query, array($selectedCountry));
			/**
			if(class_exists('iDBug')){
				$debug = new iDBug();
				$debug->debug('provinceResults',$provinceResults->result());
			}
			/**/
			return $provinceResults->result();
		}
		/**/
	}
}

?>