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
		/**
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
	#-----------------------------------------------------------------
	# LIST AREAS FUNCKTION
	# List available areas in city / province
	#
	# @param  null
	# @return array(object) $countryResults->result();
	#
	#-----------------------------------------------------------------
	public function listAreas($default="GP"){
		
		//FIRST FIND DEFAULT PROVINCE/REGION ID
		$sql1 = "SELECT ID FROM provinces WHERE Code= ? ORDER BY ID";
		$provinceID = $this->db->query( $sql1, array($default) );
		/**
		if(class_exists('iDBug')){
			$debug = new iDBug();
			$debug->debug('provinceID',$provinceID->result());
		}
		/**/
		foreach ($provinceID->result() as $id) {
			$workingRegionID = $id->ID;
		}
		/**
		if(class_exists('iDBug')){
			$debug = new iDBug();
			$debug->debug('workingRegionID',$workingRegionID);
		}
		/**/

		$sql2 = "SELECT ID FROM areas WHERE Province= ? ORDER BY ID";
		$results = $this->db->query( $sql2, array($workingRegionID) );
		//OUTPUT [ROW]
		foreach ($results->result() as $result) {
			$workingRegion = $result->ID;
		}
		/**/
		//RUN PROVINCES QUERY
		if(empty($default) or empty($workingRegion) ){
			throw new Exception("Unsupported area!");
			return;
		} else {
			$area_query = "SELECT * FROM areas ORDER BY ID";
			$areaResults = $this->db->query($area_query);
			/**
			if(class_exists('iDBug')){
				$debug = new iDBug();
				$debug->debug('countryResults',$countryResults->result());
			}
			/**/
			return $areaResults->result();
		}
		/**/
	}
}

?>