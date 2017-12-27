<?php
/**
 * Falling Snow plugin for CMS e107 v2
 *
 * @author OxigenO2 (oxigen.rg@gmail.com)
 * @copyright Copyright (C) 2017 OxigenO2
 * @license GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 * @link https://github.com/oxigeno2/falling_snow/
 */

if (!defined('e107_INIT')) { exit; }

$snowPrefs = e107::getPlugConfig('falling_snow')->getPref();

if(vartrue($snowPrefs['snow_on'], false))
	{

	if(USER_AREA) // prevents inclusion of JS/CSS/meta in the admin area.
	{

		e107::js('falling_snow', 'js/jquery.snow.min.js');
		e107::js("footer-inline", 	"
		$(document).ready( function(){
    	$.fn.snow({
    		flakeChar	: '&#10054;',
			minSize	: ".varset($snowPrefs['snow_minsize']).",
			maxSize	: ".varset($snowPrefs['snow_maxsize']).",
			newOn		: ".varset($snowPrefs['snow_newon']).",
			flakeColor	: ['".varset($snowPrefs['snow_color'])."']
			});
		});
		");
	}
}
?>