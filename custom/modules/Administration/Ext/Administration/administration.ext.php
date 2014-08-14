<?php 
 //WARNING: The contents of this file are auto-generated

 
/**
 * Asterisk SugarCRM Integration 
 * (c) KINAMU Business Solutions AG 2009
 * 
 * Parts of this code are (c) 2006. RustyBrick, Inc.  http://www.rustybrick.com/
 * Parts of this code are (c) 2008 vertico software GmbH  
 * Parts of this code are (c) 2009 abcona e. K. Angelo Malaguarnera E-Mail admin@abcona.de
 * http://www.sugarforge.org/projects/yaai/
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact KINAMU Business Solutions AG at office@kinamu.com
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 */

$admin_option_defs=array();
$admin_option_defs['Administration']['asterisk_configurator']= array('Administration','LBL_MANAGE_ASTERISK','LBL_ASTERISK','./index.php?module=Configurator&action=asterisk_configurator');
$admin_option_defs['Administration']['asterisk_donate']= array('Opportunities','LBL_ASTERISK_DONATE','LBL_ASTERISK_DONATE_DESC','http://www.blakerobertson.com/yaai-donation-page');
$admin_option_defs['Administration']['asterisk_usermanual']= array('Support','LBL_ASTERISK_USERMANUAL','LBL_ASTERISK_USERMANUAL_DESC','https://github.com/blak3r/yaai/wiki/User-Manual');
$admin_option_defs['Administration']['asterisk_mailinglist']= array('Emails','LBL_ASTERISK_MAILINGLIST','LBL_ASTERISK_MAILINGLIST_DESC','http://eepurl.com/rmdML');

$admin_group_header[]=array('LBL_ASTERISK_TITLE','',false,$admin_option_defs, 'LBL_ASTERISK_DESC');



  
$admin_option_defs = array();

$admin_option_defs['MetroThemePro_mod']['config'] = array('Easy_Theme', 'LBL_METROTHEMEPRO_CONFIG_TITLE', 'LBL_METROTHEMEPRO_CONFIG_INFO', './index.php?module=Administration&action=MetroThemePro_manage');


$admin_group_header[]= array('LBL_METROTHEMEPRO_TITLE', '', false, $admin_option_defs, 'LBL_METROTHEMEPRO_ADMIN_DESC');



/**********************************************************************************
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
 * Portions created by SYNOLIA are Copyright (C) 2004-2007 SYNOLIA. You do not
 * have the right to remove SYNOLIA copyrights from the source code or user
 * interface.
 *
 * All Rights Reserved. For more information and to sublicense, resell,rent,
 * lease, redistribute, assign or otherwise transfer Your rights to the Software
 * contact SYNOLIA at contact@synolia.com
***********************************************************************************/
/**********************************************************************************
 * $Header:$
 * The Original Code is:     Integration by SYNOLIA
 *                          www.synolia.com - sugar@synolia.com
 * Contributor(s):          ______________________________________.
 * Description :            ______________________________________.
 **********************************************************************************/
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$synolia_plugins_installed = 0;
foreach($admin_group_header as $k => $v){
    if(!empty($v) && is_array($v)){
        if($v[0] == 'LBL_SYNOLIA'){
            $synolia_plugins_installed = $k;
        }
    }
}
if( empty($synolia_plugins_installed) ) {
    $admin_option_defs = array ();
    $admin_option_defs[] = array (
       'SYNO_Pdf_templates',
       'LBL_SYNO_PDF_TEMPLATES_TITLE',
       'LBL_SYNO_PDF_TEMPLATES_PARAM',
       './index.php?module=SYNO_Pdf_templates&action=index'
    );    
    $admin_group_header[] = array (
        'LBL_SYNOLIA',
        '',
        false,
        array("Administration" => $admin_option_defs),
        'LBL_SYNOLIA_ADMIN_DESC'
    );
} else {
    $admin_group_header[$synolia_plugins_installed][3]['Administration'][] = array (
        'SYNO_Pdf_templates',
        'LBL_SYNO_PDF_TEMPLATES_TITLE',
        'LBL_SYNO_PDF_TEMPLATES_PARAM',
        './index.php?module=SYNO_Pdf_templates&action=index'
    );
}


?>