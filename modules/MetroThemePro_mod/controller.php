<?php
class MetroThemePro_modController extends SugarController {
    function action_subpanel_all() {
        $this->view = 'subpanel_all';
    }
    function action_getnotifications() {
        $this->view = 'getnotifications';
    }
    function action_getrecordname() {
        $this->view = 'getrecordname';
    }
   
}
?>