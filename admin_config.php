<?php

/**
 * Falling Snow plugin for CMS e107 v2
 *
 * @author OxigenO2 (oxigen.rg@gmail.com)
 * @copyright Copyright (C) 2017 OxigenO2
 * @license GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 * @link https://github.com/oxigeno2/falling_snow/
 */

require_once('../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

e107::lan('falling_snow',true,true);


class falling_snow_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'falling_snow_ui',
			'path' 			=> null,
			'ui' 			=> 'falling_snow_form_ui',
			'uipath' 		=> null
		),	

	);	
	
	protected $adminMenu = array(
			
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	

		// 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P')
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = LAN_SNOW_NAME;
}
				
class falling_snow_ui extends e_admin_ui
{
			
		protected $pluginTitle		= LAN_SNOW_NAME;
		protected $pluginName		= 'falling_snow';

		protected $fields 		= NULL;			
		protected $fieldpref = array();
		protected $prefs = array(
			'snow_on'		=> array('title'=> LAN_SNOW_ON, 'tab'=>0, 'type'=>'boolean', 'data' => 'str'),
			'snow_minsize'		=> array('title'=> LAN_SNOW_MINSIZE, 'tab'=>0, 'type'=>'number', 'data' => 'str', 'help'=>LAN_SNOW_HELP_MINSIZE),
			'snow_maxsize'		=> array('title'=> LAN_SNOW_MAXSIZE, 'tab'=>0, 'type'=>'number', 'data' => 'str', 'help'=>LAN_SNOW_HELP_MAXSIZE),
			'snow_newon'		=> array('title'=> LAN_SNOW_NEWON, 'tab'=>0, 'type'=>'number', 'data' => 'str', 'help'=>LAN_SNOW_HELP_NEWON),
			'snow_color'		=> array('title'=> LAN_SNOW_COLOR, 'tab'=>0, 'type'=>'text', 'data' => 'str', 'writeParms' => array('class' => 'cpicker'), 'help'=>LAN_SNOW_HELP_COLOR),
		); 

	/*	
		public function renderHelp()
		{
			$caption = LAN_HELP;
			$text = 'Some help text';

			return array('caption'=>$caption,'text'=> $text);

		}
			

		// optional - a custom page.  
		public function customPage()
		{
			$text = 'Hello World!';
			$otherField  = $this->getController()->getFieldVar('other_field_name');
			return $text;			
		}
	
	*/
			
}
				
class falling_snow_form_ui extends e_admin_form_ui
{

}		
	
new falling_snow_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

?>