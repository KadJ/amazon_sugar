<?php

class Viewgetrecordname extends SugarView {

	function Viewgetrecordname() {
 		parent::SugarView();
	}

	function display() 
  {

    $bean = BeanFactory::getBean($_REQUEST['infomodule']);   
    $bean->retrieve($_REQUEST['inforecord']); 
    echo $bean->name;
    
	} 
}                                    
 
?>