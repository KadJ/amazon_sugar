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
 * by SugarCRM are Copyright (C) 2004-2006 SugarCRM, Inc.; All Rights Reserved.
 *
 * Portions created by SYNOLIA are Copyright (C) 2004-2010 SYNOLIA. You do not
 * have the right to remove SYNOLIA copyrights from the source code or user
 * interface.
 *
 * All Rights Reserved. For more information and to sublicense, resell,rent,
 * lease, redistribute, assign or otherwise transfer Your rights to the Software
 * contact SYNOLIA at contact@synolia.com
***********************************************************************************/
/**********************************************************************************
 * The Original Code is:    SYNOPDFMANAGER by SYNOLIA
 *                          www.synolia.com - sugar@synolia.com
 * Contributor(s):          ______________________________________.
 * Description :            ______________________________________.
 **********************************************************************************/
global $manifest;
global $installdefs;

$manifest = array (
    'acceptable_sugar_versions' => array (
          '6.0.*',
    ),
    'published_date' => '2010-11-17 17:00:00',
    'version' => '20101117',
    
    'author' => 'SYNOLIA',
    'description' => 'SynoPDFManager by SYNOLIA',
    'is_uninstallable' => true,
    'name' => 'SYNOLIA - PDF Manager',
    'type' => 'module',
    'remove_tables' => 'prompt',
);
$installdefs = array (

    'id' => 'SynoPDFManager',
    
    'pre_execute'=>array(
        0 => '<basepath>/actions/pre_install_actions.php',
    ),
    'post_execute'=>array(
        0 => '<basepath>/actions/post_install_actions.php',
    ),
    'pre_uninstall'=>array(
        0 => '<basepath>/actions/pre_uninstall_actions.php',
    ),
    'post_uninstall'=>array(
        0 => '<basepath>/actions/post_uninstall_actions.php',
    ),
    
    'logic_hooks' => array(
         array(
            'module'         => '',
            'hook'           => 'after_ui_frame',
            'order'          => 0,
            'description'    => 'includeJS',
            'file'           => 'modules/SYNO_Pdf_templates/SYNO_Pdf_templates_loadJS.php',
            'class'          => 'SYNO_Pdf_templates_loadJS',
            'function'       => 'includeJS',
        ),
    ),

    'image_dir' => '<basepath>/icons',

    'language'=> array(
        array(
            'from'=> '<basepath>/language/application.en_us.php',
            'to_module'=> 'application',
            'language'=>'en_us'
        ),
        array(
            'from'=> '<basepath>/language/application.fr_FR.php',
            'to_module'=> 'application',
            'language'=>'fr_FR'
        ),
        array(
            'from'=> '<basepath>/language/administration.en_us.php',
            'to_module'=> 'Administration',
            'language'=>'en_us'
        ),
        array(
            'from'=> '<basepath>/language/administration.fr_FR.php',
            'to_module'=> 'Administration',
            'language'=>'fr_FR'
        ),
    ),

    'administration' => array (
        array(
            'from' => '<basepath>/administration/syno_pdf_manager.php',
        ),
     ),

    'copy' => array(
        array (
            'from' => '<basepath>/new_files/modules/SYNO_Pdf_templates',
            'to' => 'modules/SYNO_Pdf_templates',
        ),
        array (
            'from' => '<basepath>/new_files/custom/include/Sugarpdf/sugarpdf/sugarpdf.synopdfview.php',
            'to' => 'custom/include/Sugarpdf/sugarpdf/sugarpdf.synopdfview.php',
        ),
    ),

    'beans' => array (
        array (
            'module' => 'SYNO_Pdf_templates',
            'class' => 'SYNO_Pdf_templates',
            'path' => 'modules/SYNO_Pdf_templates/SYNO_Pdf_templates.php',
            'tab' => false,
        ),
    ),

);
?>