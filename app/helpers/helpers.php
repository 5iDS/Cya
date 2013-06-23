<?php
/* ---------------------------------------------------
 * These are helper functions 
 * -------------------------------------------------*/
 
#-----------------------------------------------------------------
# RENDER FUNCTION
#
# @param  string $template
# @param  array $vars
#
# @return
#
#-----------------------------------------------------------------
function render($template,$vars = array()){
	
	// This function takes the name of a template and
	// a list of variables, and renders it.
	
	// This will create variables from the array:
	extract($vars);
	
	// It can also take an array of objects
	// instead of a template name.
	if(is_array($template)){
		
		// If an array was passed, it will loop
		// through it, and include a partial view
		foreach($template as $k){
			
			// This will create a local variable
			// with the name of the object's class
			
			$cl = strtolower(get_class($k));
			$$cl = $k;
			
			include "views/_$cl.php";
		}
		
	}
	else {
		include "views/$template.php";
	}
}
#-----------------------------------------------------------------
# formatTitle FUNCTION
# Helper function for title formatting
#
# @param string $title :: default empty;
#
# @return
#
#-----------------------------------------------------------------
function formatTitle($title = ''){
	if($title){
		$title.= ' | ';
	}
	
	$title .= $GLOBALS['defaultTitle'];
	
	return $title;
}

#-----------------------------------------------------------------
# strEnc / strDec FUNCTION
# Simple string encode/decode functions
#
# @param string $s
#
# @return string decoded
#
#-----------------------------------------------------------------
$strEncOffset = 19; // set to a unique number for offset (must be same as number set in "contact-send.php")

function strEnc($s) {
    for( $i = 0; $i < strlen($s); $i++ )
        $r[] = ord($s[$i]) + $strEncOffset;
	if (!empty($r)) {
		return implode('.', $r);
	}
}
 
function strDec($s) {
    $s = explode(".", $s);
    for( $i = 0; $i < count($s); $i++ )
        $s[$i] = chr($s[$i] - $strEncOffset);
	if (!empty($r)) {
	    return implode('', $s);
	}
}
#-----------------------------------------------------------------
# get_all_img_urls FUNCTION
# Get all image urls from an html document
#
# @param string $data :: html doc-data
#
# @return array $images :: array of urls of images
#
#-----------------------------------------------------------------
function get_all_img_urls( $data )
{
$images = array();
preg_match_all( '/(img|src)\=(\"|\')[^\"\'\>]+/i', $data, $media );
unset( $data );
$data=preg_replace( '/(img|src)(\"|\'|\=\"|\=\')(.*)/i',"$3",$media[0] );
foreach( $data as $url )
{
	$info = pathinfo( $url );
	if (isset($info['extension']))
	{
		if (( $info['extension'] == 'jpg') || ( $info['extension'] == 'jpeg' ) ||
		( $info['extension'] == 'gif') || ( $info['extension'] == 'png' ))
		array_push( $images, $url );
	}
}
return $images;
}

#-----------------------------------------------------------------
# only_characters FUNCTION
# only_characters
#
# @param string $string :: text
#
# @return string $clean ::sanitized string
#
#-----------------------------------------------------------------
function only_characters( $string )
{
	$pattern = '/[^A-Za-z0-9:.\/_-]/';
	$clean = preg_replace( $pattern,'',$string );
	return $clean;
}

/*************************** round to the nearest value used in pagination ***************************/

function pagination_round( $num, $tonearest ) {
   return floor( $num/$tonearest )*$tonearest;
}


/*************************** checks whether string begins with given string. i.e. if (string_starts_with($host, 'http://localhost/')) { //do stuff } ***************************/

function check_str_starts_with( $string, $search ) {
    return ( strncmp( $string, $search, strlen( $search ) ) == 0 );
}

#-----------------------------------------------------------------
# for_numbers_only FUNCTION
# strip out everything except for numbers
#
# @param string $string :: text
#
# @return string $string :: strip out everything except for numbers
#
#-----------------------------------------------------------------
function for_numbers_only( $string ) {
    $string = preg_replace( '/[^0-9]/', '', $string );
    return $string;
}


#-----------------------------------------------------------------
# for_letters_only FUNCTION
# strip out everything except for letters
#
# @param string $string :: text
#
# @return string $string :: strip out everything except for letters
#
#-----------------------------------------------------------------
function for_letters_only( $string ) {
    $string = preg_replace( '/[^a-z]/i', '', $string );
    return $string;
}

#-----------------------------------------------------------------
# for_numbers_letters_only FUNCTION
# strip out everything except numbers and letters
#
# @param string $string :: text
#
# @return string $string :: strip out everything except numbers and letters
#
#-----------------------------------------------------------------
function for_numbers_letters_only( $string ) {
    $string = preg_replace( '/[^a-z0-9]/i', '', $string );
    return $string;
}


/*************************** for the price field to make only numbers, periods, and commas ***************************/

function make_clean_price( $string ) {
    $string = preg_replace( '/[^0-9.,]/', '', $string );
    return $string;
}


/*************************** for the tags field to remove any invalid characters ***************************/

function make_clean_tags( $string ) {
    $string = preg_replace( '/\s*,\s*/', ',', rtrim( trim( $string ), ' ,' ) );
    return $string;
}


/*************************** pass strings in to clean ***************************/

function fids_clean( $string ) {
    $string = stripslashes( $string );
    $string = trim( $string );
    return $string;
}


/*************************** strip tags and limit characters to 5,000 ***************************/

function fids_filter( $text ) {
    $text = strip_tags( $text );
    $text = trim( $text );
    $char_limit = 5000;
    if( strlen ( $text ) > $char_limit ) {
        $text = substr( $text, 0, $char_limit );
    }
    return $text;
}


/*************************** This function separates the extension from the rest of the file name and returns it ***************************/

function fids_find_ext ( $filename ) {
    $filename = strtolower( $filename );
    $exts = split( "[/\\.]", $filename );
    $n = count( $exts )-1;
    $exts = $exts[$n];
    return $exts;
}


/*************************** error message output function ****************************/

function fids_error_msg( $error_msg ) {
    $msg_string = '';
    foreach ( $error_msg as $value ) {
        if( !empty( $value ) )
            $msg_string = $msg_string . '<div class="error">' . $msg_string = $value.'</div>';
    }
    return $msg_string;
}


/*************************** replace all \n with just <br /> ***************************/

function fids_nl2br( $text ) {
   return strtr( $text, array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />' ) );
}

?>