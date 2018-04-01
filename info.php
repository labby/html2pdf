<?php

/**
 *  @module      	Library html2pdf
 *  @version        see info.php of this module
 *  @author         cms-lab
 *  @copyright      2017-2018 CMS-LAB
 *  @license        Open Software License v. 3.0 (OSL-3.0)
 *  @license terms  see info.php of this addon
 *  @platform       see info.php of this addon
 */

// include class.secure.php to protect this file and the whole CMS!
if (defined('LEPTON_PATH')) {	
	include(LEPTON_PATH.'/framework/class.secure.php'); 
} else {
	$oneback = "../";
	$root = $oneback;
	$level = 1;
	while (($level < 10) && (!file_exists($root.'/framework/class.secure.php'))) {
		$root .= $oneback;
		$level += 1;
	}
	if (file_exists($root.'/framework/class.secure.php')) { 
		include($root.'/framework/class.secure.php'); 
	} else {
		trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
	}
}
// end include class.secure.php



$module_directory = 'lib_html2pdf';
$module_name      = 'html2pdf Library';
$module_function  = 'library';
$module_version   = '5.1.0.0';
$module_platform  = '4.x';
$module_delete	  =  true;
$module_author    = 'cms-lab';
$module_license   = 'https://github.com/spipu/html2pdf/blob/master/LICENSE.md';
$module_license_terms   = '-';
$module_description = 'html2pdf allows the conversion of valid HTML in PDF format, to generate documents like invoices, documentation.';
$module_guid      = '66519ed9-d6c1-4339-bcee-7bf955cd2488';
$module_home      = 'http://cms-lab.com';

?>