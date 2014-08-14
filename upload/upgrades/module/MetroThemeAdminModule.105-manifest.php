<?php
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version
 * 1.1.3 ("License"); You may not use this file except in compliance with the
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied.  See the License
 * for the specific language governing rights and limitations under the
 * License.
 * All copies of the Covered Code must include on each user interface screen:
 *    (i) the "Powered by SugarCRM" logo and
 *    (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2010 SugarCRM, Inc.; All Rights Reserved.
 *
 * Portions created by SYNOLIA are Copyright (C) 2004-2010 SYNOLIA. You do not
 * have the right to remove SYNOLIA copyrights from the source code or user
 * interface.
 *
 * All Rights Reserved. For more information and to sublicense, resell,rent,
 * lease, redistribute, assign or otherwise transfer Your rights to the Software
 * contact SYNOLIA at contact@synolia.com
***********************************************************************************/

global $manifest;
global $installdefs;


$manifest = array (
  0 => 
  array (
    'acceptable_sugar_versions' => array (
          '6.5.*'
    ),
  ),
  1 => 
  array (
    'acceptable_sugar_flavors' =>                
    array (                                               
      0 => 'CE',
      1 => 'PRO',
      2 => 'ENT',
    ),
  ),
  'readme' => '',
  'author' => 'Datamain',
  'description' => '',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'Metro Theme Pro Module by Datamain',
  'published_date' => '2013-05-24 10:50:06',
  'type' => 'module',
  'version' => '1.105',
  'remove_tables' => 'prompt',
);

$installdefs = array (
   'id' => 'MetroThemePro_mod',
   'beans' => 
      array (
        0 => 
        array (
          'module' => 'MetroThemePro_mod',
          'class' => 'MetroThemePro_mod',
          'path' => 'modules/MetroThemePro_mod/MetroThemePro_mod.php',
          'tab' => false,
        ),
      ),
    'layoutdefs' => 
    array (
    ),
    'relationships' => 
    array (
    ),
    'pre_execute'=>array(
        0 => '<basepath>/actions/pre_install_actions.php',
    ),
    'pre_uninstall'=>array(
        0 => '<basepath>/actions/pre_uninstall_actions.php',
    ),    
    'language'=> array(
    
    array(
          'from'=> '<basepath>/language/administration.en_us.php',
          'to_module'=> 'Administration',
          'language'=>'en_us'
        ),
    ),
    
    'copy' => array(
        array('from'=> '<basepath>/icons/MetroThemePro_mod.gif',
              'to'=> 'themes/default/images/MetroThemePro_mod.gif',
        ),
        array('from'=> '<basepath>/SugarModules/modules/MetroThemePro_mod/',
              'to'=> 'modules/MetroThemePro_mod',
        ),
        array (
            'from' => '<basepath>/SugarModules/modules/Administration/MetroThemePro_manage.php',
            'to' => 'modules/Administration/MetroThemePro_manage.php',
        ),
        array (
            'from' => '<basepath>/SugarModules/modules/Administration/MetroThemePro_manage.tpl',
            'to' => 'modules/Administration/MetroThemePro_manage.tpl',
        )

    ),
    
    'administration'=> array(
        array(
            'from'=>'<basepath>/administration/MetroThemePro_settings.php',
        ),                                     
    ),
);
?>