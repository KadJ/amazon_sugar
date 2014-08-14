<?php

class Viewgetnotifications extends SugarView {

	function Viewgetnotifications() {
 		parent::SugarView();
	}

	function display() 
  {
    global $current_user;
    global $moduleList;
    global $db;
    global $dictionary;
    global $app_list_strings;
    $timedate = new TimeDate;
    $notif=array();
    $module_List=$moduleList;
    asort($module_List);
    $tot=0;
    foreach ($module_List as &$mod) {
         $objectName = BeanFactory::getObjectName($mod);
         VardefManager::loadVardef($mod, $objectName, true);   
         $tb=$dictionary[$objectName]['table'];
         $mod_name = $app_list_strings['moduleList'][$mod];
         if(!empty($tb))
         {                                            
           $bean = BeanFactory::getBean($mod);
           $sql=$tb.".assigned_user_id =  '".$currentuser."'
                 AND ".$tb.".created_by <>   '".$currentuser."'
                 AND ".$tb.".modified_user_id <> '".$currentuser."'";
           $List = $bean->get_list("", $sql);
           foreach($List['list'] as $item)
           {     
            $date_modified=$timedate->swap_formats($item->date_modified, $timedate->get_date_time_format(), 'Y-m-d');            
            $notif[]= array ('id'=>$item->id,'date_modified'=>$date_modified,'name'=>$item->name,'module'=>$mod,'mod_name'=>$mod_name); 
            $tot++;
           }
           
         }  
     }  
    usort($notif, 'cdate_compare');
    if(!empty($_REQUEST["to_pdf"]))
      require_once 'modules/Configurator/Configurator.php';
      $configurator = new Configurator();
      $configurator->loadConfig(); 
      if(empty($configurator->config['MetroTheme_maxnotific']))
       $notif=array_slice($notif,0,10);
      else
       $notif=array_slice($notif,0,$configurator->config['MetroTheme_maxrelated']);      
    $list = array('tot'=>$tot,'notif_list'=>$notif);
    print json_encode($list);
           
  }          
  
}          
  function cdate_compare($date1, $date2){
     $date1 = strtotime($date1['date_modified']);
     $date2 = strtotime($date2['date_modified']);
     return $date2 - $date1;
  }; 


?>
  

  