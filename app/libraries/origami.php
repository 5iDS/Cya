<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * CYA ORIGAMI SPACEWALKIN'
 *
 * ---------------------------------------------------
 *
 * Initiate user locale; setup bigmomma....ascend
 *
 * @package	CYA
 * @since	0.5.0
 * @author	a.Work.of.Hip.Hop...www.5ivedesign.co.za
 *
 * --------------------------------------------------*/

class origami {
	
		public function __construct($region = "GP") {
			
			//INITIATE SOME CONTSTANTS
			//if (!defined("INI"))    define("INI",1);

			//INITIATE BIGMOMMA
			$BIGMOMMA;
			$allRanks = listRanks($region); // 1 x n dimensional array of connected rank IDs
			$n = count($allRanks); // Length of ranks IDs array; (n)
			#-------------------------------------
			# Populate Diagnals which are [n][n];
			#-------------------------------------
			popul8Diag($n,$BIGMOMMA);
			#------------------------
			# Fill the Origami Space
			#-----------------------
			$counter = 0;
			while ($counter <= $n ) {
				//Get Rank ID
				$rankID = $allRanks[$counter];
	
				//Check for direct routes on rankID
				$connectedRanks = getConnections($rankID);  // 1xn array of tru?false
	
				//populate column of bigMatrix downwards from point of diagonal using $connectedRanks results.
				$diagCol = $counter;
				$nu_N = $n;
				while ($counter < $nu_N) {
					//foreach diagonal check for direct routes starting from furtherst position (shortest direct route)
					$BIGMOMMA[$nu_N][$diagCol] = $connectedRanks[$nu_N]; // 0 / 1 :: Tru?False
		
					$nu_N--;
				};
	
				$counter++; //diagonal position
			};
		}
		
		/*--------------------------------------------------
		 * Method to find all Ranks in selected region
		 * 
		 * @param string $name	-> name of selected region
		 * @returns array.
		 --------------------------------------------------*/
		public function listRanks($region)
		{
			global $post,$wpdb;
			
			switch($region) {
				case 'EC':
					$table_name = $wpdb->prefix . "taxi_rankmeta"; 
					break;
				case 'FC':
					$table_name = $wpdb->prefix . "taxi_rankmeta"; 
					break;
				case 'GP':
					$table_name = $wpdb->prefix . "taxi_rankmeta";  
					break;
				case 'KZN':
					$table_name = $wpdb->prefix . "taxi_rankmeta";
					break;
				case 'MP':
					$table_name = $wpdb->prefix . "taxi_rankmeta"; 
					break;
				case 'NC':
					$table_name = $wpdb->prefix . "taxi_rankmeta"; 
					break;
				case 'NW':
					$table_name = $wpdb->prefix . "taxi_rankmeta";  
					break;
				case 'PLK':
					$table_name = $wpdb->prefix . "taxi_rankmeta";
					break;
				case 'WC':
					$table_name = $wpdb->prefix . "taxi_rankmeta";
					break;
			}
			/**
			$table_name = $wpdb->prefix . "taxi_rankmeta";
			$taxi_ranks = get_terms( 'taxi_rank', array(
							'orderby' => 'title',
							'order' => 'asc'
						)
			);
			/**/
			if (!empty($taxi_ranks)) {
				
				$allRanks = array(); 
				
				if (is_object($taxi_ranks) || is_array($taxi_ranks)) {
					
					foreach( $taxi_ranks as $taxi_rank ){
						$allRanks[]=$taxi_rank->term_id;
					}

				} else {
					$allRanks[]=$taxi_ranks;
				}				
				return $allRanks;
			}
		}
		
		/*--------------------------------------------------
		 * Method to Find All Direct Routes for routeID
		 * 
		 * @param int $id	-> id of route
		 * @returns array.
		 --------------------------------------------------*/
		 public function direct_routes($id)
		{
			global $wpdb;
	
			if ( empty( $id ) )
				exit();
				
			$destination = array();
			/**
			while (have_posts()) : the_post();
		
				$destination[] = get_post_meta($post->ID, 'fids_route_area_point_2', true);
        
			endwhile;
	
			wp_reset_query();
			/**/
			$final_destination = array_values(array_unique($destination));  // (1xn dimensional array of unique connected taxi rank ids)

			return $final_destination;
		
		}
		/*--------------------------------------------------
		 * Method to Populate Diagnals which are [n][n];
		 * 
		 * @param int $id	-> length of BigMomma
		 * @param array $BigMomma	-> BigMomma Matrix
		 * @returns array.
		 --------------------------------------------------*/
		 public function popul8Diag($length_of_bigMatrix,$bigMatrix){
			$i = 0;
			while ( $i <= $length_of_bigMatrix) {
				$bigMatrix[$i][$i] = 1; // Diagonals
				$i++;
			};
		}
		 
}
 
 
//Check each rank for direct route 
/*
 *	:: initiate n x n matrix (length of no. of ranks)
 *	:: move along the diagonal ( for col : n -> for row : n -- connect = [col(n),row(n)]; )
 *
 */



#------------------------------------------
#	:: RelationShips Advice
#------------------------------------------

function checkConnections($id,$relatedID) {
	//take in rankID;s and evalute whether
	//is it a direct route yes or no? with respect to all the other rankIDs
	///if tru, return rankID else return 0.
	

}

/*
function getConnections ($id) {
	//SQL GET ARRAY OF DIRECT ROUTES // msx of n-1 no. of queries
	$query = 0;
	$new_n = $n;
	
	//find $id position in $allRanks array and remove it; leaving array of rankIDs
	$relatatedRankIDs;
	
	while($query < $new_n)  {
		
		$sqlQueryResults = checkConnections($id,$relatatedRankIDs[$query]); //tru?false
		
		//is result true or false? 1 : 0
		if($sqlQueryResults){
			$resultsArray[]= 1; //(1xn dimensional array of 0?1)
			$resultsID[]= $sqlQueryResults; //(1xn dimensional array of connected ids)
		} else {
			$resultsArray[]= 0;
			$resultsID[]= 0;
		};
		
		$query++;
	}

	return $resultsArray;
	
};
*/


#------------------------------------------
#	:: Traverse Origami Space aka get Results (relevant rank ids)
#------------------------------------------
$startRank = 13;
$allConnectedRanks = direct_routes($startRank); // 1 x n dimensional array of connected rank IDs



?>