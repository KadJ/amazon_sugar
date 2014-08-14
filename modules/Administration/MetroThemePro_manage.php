<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
  
  global $current_user, $beanList,  $current_language, $mod_strings, $beanList;
  if (!is_admin($current_user)) sugar_die("Unauthorized access to administration.");
  
  require_once('include/Sugar_Smarty.php');
  $sugar_smarty   = new Sugar_Smarty();
  require_once 'modules/Configurator/Configurator.php';
  $configurator = new Configurator();
  $configurator->loadConfig(); 
  
  echo get_module_title('', $mod_strings['LBL_METROTHEMEPRO_TITLE'], false);
  
  $configurationsaved="";
  


  if(isset($_REQUEST['process']) && $_REQUEST['process'] == 'true') {

                                                    
   $configurator->config['MetroTheme_show_logo'] = $_REQUEST['input_show_logo'];      
   $configurator->config['MetroTheme_show_preview'] = $_REQUEST['input_showpreview'];
   $configurator->config['MetroTheme_show_related'] = $_REQUEST['input_showrelated'];
   $configurator->config['MetroTheme_show_notific'] = $_REQUEST['input_shownotific'];
   $maxrelated=  (int)$_REQUEST['input_maxrelated'];
   if(!empty($maxrelated))
    if (is_int($maxrelated))
       $configurator->config['MetroTheme_maxrelated'] = $maxrelated;
    else
       $configurator->config['MetroTheme_maxrelated'] = 10;    
   else
       $configurator->config['MetroTheme_maxrelated'] = 10;

   $maxnotific=  (int)$_REQUEST['input_maxnotific'];
   if(!empty($_REQUEST['input_maxnotific']))
    if (is_int($maxnotific))
       $configurator->config['MetroTheme_maxnotific'] = $maxnotific;
    else
       $configurator->config['MetroTheme_maxnotific'] = 10;    
   else
       $configurator->config['MetroTheme_maxnotific'] = 10;


   $configurator->saveConfig();
   
   $show_preview= $_REQUEST['input_showpreview'];
   $show_related= $_REQUEST['input_showrelated'];
   $show_notific= $_REQUEST['input_shownotific'];
 
   $sugar_smarty->left_delimiter = '<!--{';             
   $sugar_smarty->right_delimiter = '}-->';    
  
   if($_REQUEST['input_show_logo']=='show')
         $show_logo="show"; 
      else
         $show_logo="hide";
   if($_REQUEST['input_show_logo']=='show')
         $logo="true"; 
      else
         $logo="false";

   if($_REQUEST['input_showrelated']=='show')
       $sugar_smarty->assign('show_related', 'true'); 
   else
       $sugar_smarty->assign('show_related', 'false');
       
   if($_REQUEST['input_showpreview']=='show')
       $sugar_smarty->assign('show_preview', 'true'); 
   else
       $sugar_smarty->assign('show_preview', 'false');
       
   if($_REQUEST['input_shownotific']=='show')
       $sugar_smarty->assign('show_notific', 'true'); 
   else
       $sugar_smarty->assign('show_notific', 'false');

   $sugar_smarty->assign('show_logo', $logo);
   $filename='themes/MetroThemePro/tpls/_headerModuleList'; 
   if(file_exists($filename.'.tpl.tpl')) {
     $strfile = $sugar_smarty->fetch($filename.'.tpl.tpl');
     file_put_contents($filename.'.tpl', $strfile);  
    }
   $sugar_smarty->left_delimiter = '{';             
   $sugar_smarty->right_delimiter = '}';     

   $configurationsaved="Your changes have been saved. You have to run Quick repair in SugarCRM Administration and to clean cache of your browser."; 
  }
  else
  {
   if($configurator->config['MetroTheme_show_logo']=='show')
         $show_logo="show"; 
      else
         $show_logo="hide";
   
   if(empty($configurator->config['MetroTheme_show_notific']))
      $show_notific='show';
   else
      $show_notific=$configurator->config['MetroTheme_show_notific'];   
 
   if(empty($configurator->config['MetroTheme_show_preview']))
      $show_preview='show';
   else
      $show_preview=$configurator->config['MetroTheme_show_preview'];
   
   if(empty($configurator->config['MetroTheme_show_related']))
      $show_related='show';
   else
     $show_related=$configurator->config['MetroTheme_show_related'];

  }

    if(empty($configurator->config['MetroTheme_maxrelated']))
    $maxrel=10;
  else
    $maxrel=$configurator->config['MetroTheme_maxrelated'];
  
  if(empty($configurator->config['MetroTheme_maxnotific']))
    $maxnotific=10;
  else
    $maxnotific=$configurator->config['MetroTheme_maxnotific'];
  
  $tpl = 'modules/Administration/MetroThemePro_manage.tpl';
  $sugar_smarty->assign('MOD', $mod_strings);
  $sugar_smarty->assign('APP', $app_strings);
  $sugar_smarty->assign('show_logo',$show_logo  );
  $sugar_smarty->assign('show_notific', $show_notific );
  $sugar_smarty->assign('show_preview', $show_preview  );
  $sugar_smarty->assign('show_related', $show_related );
  $sugar_smarty->assign('maxrelated', $maxrel);
  $sugar_smarty->assign('maxnotific', $maxnotific);
  $sugar_smarty->assign('configurationsaved', $configurationsaved);
  $sugar_smarty->display($tpl);

?>                            