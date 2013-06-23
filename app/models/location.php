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

	/**/
	public function __construct() {
		// Call the Model constructor
        parent::__construct();
        
       
	}
	 //FIELDS
	const country_table = 'countries';
	const provinces_table = 'provinces';
	/**/
	#-----------------------------------------------------------------
	# COUNTRY FUNCKTION
	#
	# @param  string $countryCode
	# @return  null
	#
	#-----------------------------------------------------------------
	public function setCountry($countryCode) {
		$this->country = $countryCode;
	}
	#-----------------------------------------------------------------
	# LIST COUNTRYs FUNCKTION
	# List available countries
	#
	# @param  null
	# @return array(object) $countryResults->result();
	#
	#-----------------------------------------------------------------
	public function listCountries($default="ZA"){
		//FIRST FIND DEFAULT COUNTRY ID
		
		$sql = "SELECT ID FROM countries WHERE Code= ? ORDER BY ID";
		$results = $this->db->query( $sql, array($default) );
		//OUTPUT [ROW]
		foreach ($results->result() as $result) {
			$selectedCountry = $result->ID;
		}
		/**/
		//RUN PROVINCES QUERY
		if(empty($default) or empty($selectedCountry) ){
			throw new Exception("Unsupported country!");
			return;
		} else {
			$country_query = "SELECT * FROM countries ORDER BY ID";
			$countryResults = $this->db->query($country_query);
			/**
			if(class_exists('iDBug')){
				$debug = new iDBug();
				$debug->debug('countryResults',$countryResults->result());
			}
			/**/
			return $countryResults->result();
		}
		/**/
	}
	#-----------------------------------------------------------------
	# PROVINCE FUNCKTION
	# set Province scope
	#
	# @param  string $province
	# @return  null
	#
	#-----------------------------------------------------------------
	public function setProvince($province) {
		$this->province = $province;
	}
	#-----------------------------------------------------------------
	# LIST PROVINCEs FUNCKTION
	# List available provinces
	#
	# @param  string $countryCode
	# @return array(object) $provinceResults->result();
	#
	#-----------------------------------------------------------------
	public function listProvinces($countryCode){

		//FIRST FIND COUNTRY ID
		$sql = "SELECT ID FROM countries WHERE Code= ? ORDER BY ID";
		$results = $this->db->query( $sql, array($countryCode) );
		/**/
		if(class_exists('iDBug')){
			$debug = new iDBug();
			$debug->debug('results',$results->result());
		}
		/**/
		//OUTPUT [ROW]
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
		//RUN PROVINCES QUERY
		if(empty($countryCode) or empty($selectedCountry) ){
			throw new Exception("Unsupported country!");
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