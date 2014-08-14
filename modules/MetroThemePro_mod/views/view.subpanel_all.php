<?php
require_once('include/MVC/View/views/view.detail.php'); 

   function get_layout_defs($cbean,$reload = false, $layout_def_key = '', $original_only = false) { 
        $layout_defs[$cbean->module_dir] = array(); 
        $layout_defs[$layout_def_key] = array(); 
        if(file_exists('modules/' . $cbean->module_dir . '/metadata/subpaneldefs.php')) { 
            require('modules/' .$cbean->module_dir . '/metadata/subpaneldefs.php') ; 
        } 
        if(! $original_only && file_exists('custom/modules/' . $cbean->module_dir . '/Ext/Layoutdefs/layoutdefs.ext.php')) { 
            require('custom/modules/' . $cbean->module_dir . '/Ext/Layoutdefs/layoutdefs.ext.php'); 
        } 
        if(! empty($layout_def_key)) { 
            $layout_defs = $layout_defs[$layout_def_key]; 
        } else { 
            $layout_defs = $layout_defs[$cbean->module_dir]; 
        } 
        return $layout_defs; 
    }  
  function findRelationshipByModules($lhs, $rhs)
  {
          global $db,$dictionary,$beanList;
          $rel = new Relationship;
          if($rel_info = $rel->retrieve_by_sides($lhs, $rhs, $db)){
             return $rel_info['relationship_name'];
          }
          else
            if($rel_info = $rel->retrieve_by_sides($rhs, $lhs, $db)){
               return $rel_info['relationship_name'];
            }

          return(FALSE);
  }  
class Viewsubpanel_all extends SugarView {

	function Viewsubpanel_all() {
 		parent::SugarView();
	}


	function display() 
  {

    global $dictionary; 
    if(!empty($_REQUEST["subp"]))  // single subpanel
    {
        $bean = BeanFactory::getBean($_REQUEST['infomodule']);
        $bean->retrieve($_REQUEST['inforecord']);
        $links=get_layout_defs($bean);

        foreach ($links['subpanel_setup']  as $key =>$l ) {     
          if(!empty($l['subpanel_name'])) 
          {
           $list[] = array('name'=>$key,'module'=>$l['module']);
          }   
         } 
        print json_encode($list);
    }
    else
    {    
        $full=false;      // regola il ritorno della lista subpanels per il create o dei veri dettagli
        if(!empty($_REQUEST["spl"]))
          $full=true;
        
        $bean = BeanFactory::getBean($_REQUEST['infomodule']);
        $bean->retrieve($_REQUEST['inforecord']);
        $links=get_layout_defs($bean);
        $list=Array(); 
        $listsubp=Array(); 
        $listsubp2=Array();
        $timedate = new TimeDate;     
        foreach ($links['subpanel_setup']  as $l ) { 
          if(!empty($l['get_subpanel_data']))
          {
             if (!in_array($l['module'],$listsubp)) {     
                 $rel_name=findRelationshipByModules($_REQUEST['infomodule'], $l['module']);
                 $listsubp[]= $l['module'];     
                 $listsubp2[] = array('module'=>$l['module'],'rel'=>$rel_name);
                 if($full)
                 {
                   $bean->load_relationship($l['get_subpanel_data']);
                   foreach ($bean->$l['get_subpanel_data']->getBeans() as $subpan) {   
                        $date_modified=$timedate->swap_formats($subpan->date_modified, $timedate->get_date_time_format(), 'Y-m-d H:i:s');    
                        $list[] = array('id'=>$subpan->id,'name'=>$subpan->name,'date_modified'=>$date_modified,'user_id'=>$subpan->modified_user_id,'user_name'=>$subpan->modified_by_name,'module'=>$l['module']);      
                   }
                 } 
             } 
          }
          else
          {
          foreach ($l['collection_list']  as $l2 ) {
             if (!in_array($l2['module'],$listsubp)) {  
                  $rel_name=findRelationshipByModules($_REQUEST['infomodule'], $l2['module']);
                  $listsubp[]= $l2['module'];      
                  $listsubp2[] = array('module'=>$l2['module'],'rel'=>$rel_name);     
                 if($full)
                 {
                  $bean->load_relationship($l2['get_subpanel_data']);
                  if(!empty($bean->$l2['get_subpanel_data']))
                  {
                    foreach ($bean->$l2['get_subpanel_data']->getBeans() as $subpan) {                    
                     $date_modified=$timedate->swap_formats($subpan->date_modified, $timedate->get_date_time_format(), 'Y-m-d H:i:s');    
                     $list[] = array('id'=>$subpan->id,'name'=>$subpan->name,'date_modified'=>$date_modified,'user_id'=>$subpan->modified_user_id,'user_name'=>$subpan->modified_by_name,'module'=>$l2['module']);      
                    } 
                  }
                 } 
              }    
           }  
          }   
         } 
        if($full)
         {
            usort($list, 'cdate_compare');
            require_once 'modules/Configurator/Configurator.php';
            $configurator = new Configurator();
            $configurator->loadConfig(); 
            if(empty($configurator->config['MetroTheme_maxrelated']))
             $list=array_slice($list,0,10);
            else
             $list=array_slice($list,0,$configurator->config['MetroTheme_maxrelated']);      
            print json_encode(array('subp'=>$listsubp2,'list'=>$list));
         }
        else
         {
           print json_encode($listsubp2);
         }  
    }   
	} 
}          

               
function cdate_compare($date1, $date2){
     $date1 = strtotime($date1['date_modified']);
     $date2 = strtotime($date2['date_modified']);
     return $date2 - $date1;
}; 

?>
  