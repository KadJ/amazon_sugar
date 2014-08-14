<?php /* Smarty version 2.6.11, created on 2014-08-07 11:43:43
         compiled from themes/MetroThemePro/tpls/_headerModuleList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_translate', 'themes/MetroThemePro/tpls/_headerModuleList.tpl', 65, false),array('function', 'sugar_link', 'themes/MetroThemePro/tpls/_headerModuleList.tpl', 72, false),array('function', 'counter', 'themes/MetroThemePro/tpls/_headerModuleList.tpl', 136, false),array('function', 'sugar_getimage', 'themes/MetroThemePro/tpls/_headerModuleList.tpl', 227, false),)), $this); ?>
 
*
<?php echo '
<script>
'; ?>

    <?php if (true == true): ?>
       var show_preview=true;
    <?php else: ?>
       var show_preview=false;
    <?php endif; ?> 
    <?php if (true == true): ?>
     var show_related=true;
    <?php else: ?>
     var show_related=false;
    <?php endif; ?> 
<?php echo '
</script>
'; ?>


<div id="companyLogo" style="display:none;"><img src="<?php echo $this->_tpl_vars['COMPANY_LOGO_URL']; ?>
" /></div>
<?php if ($this->_tpl_vars['USE_GROUP_TABS']): ?>
<div id="moduleList">
<ul>
    <?php if (true == false): ?>
      <?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
      <li>
      <a style="padding:2px;margin:0px;" href="index.php?module=Home&action=index" border="0">
            <img id="companylogo" src="<?php echo $this->_tpl_vars['COMPANY_LOGO_URL']; ?>
"  height="35px"
                alt="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COMPANY_LOGO'), $this);?>
" border="0"/>
      </a>
      </li>
      <?php endif; ?> 
   <?php endif; ?>   
   <?php if ('Home' == $this->_tpl_vars['MODULE_TAB']): ?>
    <li class="active">
        <span ><?php echo smarty_function_sugar_link(array('id' => 'moduleTab_Home','module' => 'Home'), $this);?>
</span>
    <?php else: ?>
    <li>
       <span ><?php echo smarty_function_sugar_link(array('id' => 'moduleTab_Home','module' => 'Home','data' => 'Home'), $this);?>
</span>
    <?php endif; ?>
    </li>
     
    <?php $this->assign('groupSelected', false); ?>
    <?php $_from = $this->_tpl_vars['groupTabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['groupList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groupList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group'] => $this->_tpl_vars['modules']):
        $this->_foreach['groupList']['iteration']++;
?>
    <?php ob_start(); ?>parentTab=<?php echo $this->_tpl_vars['group'];  $this->_smarty_vars['capture']['extraparams'] = ob_get_contents();  $this->assign('extraparams', ob_get_contents());ob_end_clean(); ?>
    <?php if (( ( $_REQUEST['parentTab'] == $this->_tpl_vars['group'] || ( ! $_REQUEST['parentTab'] && in_array ( $this->_tpl_vars['MODULE_TAB'] , $this->_tpl_vars['modules']['modules'] ) ) ) && ! $this->_tpl_vars['groupSelected'] ) || ( ($this->_foreach['groupList']['iteration']-1) == 0 && $this->_tpl_vars['defaultFirst'] )): ?>
    <li>
        <span class="currentTab"><a  href="#" id="grouptab_<?php echo ($this->_foreach['groupList']['iteration']-1); ?>
"><?php echo $this->_tpl_vars['group']; ?>
</a>
        </span>
        <ul>
	        <?php $_from = $this->_tpl_vars['modules']['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['modulekey'] => $this->_tpl_vars['module']):
?>  
           <?php if ('Home' != $this->_tpl_vars['module']): ?> 
    	        <li>
    	        	<?php ob_start(); ?>moduleTab_<?php echo ($this->_foreach['moduleList']['iteration']-1); ?>
_<?php echo $this->_tpl_vars['module'];  $this->_smarty_vars['capture']['moduleTabId'] = ob_get_contents();  $this->assign('moduleTabId', ob_get_contents());ob_end_clean(); ?>
    	        	<?php echo smarty_function_sugar_link(array('id' => $this->_tpl_vars['moduleTabId'],'module' => $this->_tpl_vars['modulekey'],'data' => $this->_tpl_vars['module'],'extraparams' => $this->_tpl_vars['extraparams']), $this);?>

    	        </li>
           <?php endif; ?>	      
	        <?php endforeach; endif; unset($_from); ?>
	        <?php if (! empty ( $this->_tpl_vars['modules']['extra'] )): ?>
		        <?php $_from = $this->_tpl_vars['modules']['extra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submodule'] => $this->_tpl_vars['submodulename']):
?>
    					<li>
    						<a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['submodule'],'link_only' => 1,'extraparams' => $this->_tpl_vars['extraparams']), $this);?>
"><?php echo $this->_tpl_vars['submodulename']; ?>

    						</a>
    					</li>
		        <?php endforeach; endif; unset($_from); ?>
	        <?php endif; ?>	        	        
        </ul>
        <?php $this->assign('groupSelected', true); ?>
    <?php else: ?>
    <li>
        <span><a href="#" id="grouptab_<?php echo ($this->_foreach['groupList']['iteration']-1); ?>
"><?php echo $this->_tpl_vars['group']; ?>
</a></span>
        <ul>
	        <?php $_from = $this->_tpl_vars['modules']['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['modulekey'] => $this->_tpl_vars['module']):
?>
           <?php if ('Home' != $this->_tpl_vars['module']): ?> 
    	        <li >
    	        	<?php ob_start(); ?>moduleTab_<?php echo ($this->_foreach['moduleList']['iteration']-1); ?>
_<?php echo $this->_tpl_vars['module'];  $this->_smarty_vars['capture']['moduleTabId'] = ob_get_contents();  $this->assign('moduleTabId', ob_get_contents());ob_end_clean(); ?>
    	        	<?php echo smarty_function_sugar_link(array('id' => $this->_tpl_vars['moduleTabId'],'module' => $this->_tpl_vars['modulekey'],'data' => $this->_tpl_vars['module'],'extraparams' => $this->_tpl_vars['extraparams']), $this);?>

    	        </li>
            <?php endif; ?>	 
	        <?php endforeach; endif; unset($_from); ?>
	        <?php if (! empty ( $this->_tpl_vars['modules']['extra'] )): ?>
		        <?php $_from = $this->_tpl_vars['modules']['extra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submodule'] => $this->_tpl_vars['submodulename']):
?>
					<li>
						<a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['submodule'],'link_only' => 1,'extraparams' => $this->_tpl_vars['extraparams']), $this);?>
"><?php echo $this->_tpl_vars['submodulename']; ?>

						</a>
					</li>
		        <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>	        
        </ul>
    <?php endif; ?>
    </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>

<?php else: ?>

<div id="moduleList">
<ul>
    <?php $this->assign('totmodules', 10); ?>
    <?php echo smarty_function_counter(array('start' => 0,'assign' => 'curr_module','print' => false), $this);?>

    <?php $_from = $this->_tpl_vars['moduleTopMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>
    <?php echo smarty_function_counter(array(), $this);?>

    <?php if ($this->_tpl_vars['name'] == 'Home'): ?>
      <?php if (true == false): ?>
          <?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
            <li>
            <a style="padding:2px;margin:0px;" href="index.php?module=Home&action=index" border="0">
                  <img id="companylogo" src="<?php echo $this->_tpl_vars['COMPANY_LOGO_URL']; ?>
"  height="35px"
                      alt="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COMPANY_LOGO'), $this);?>
" border="0"/>
            </a>
            </li>
          <?php endif; ?> 
      <?php else: ?>
        <li>
          <div>
           <span style="float:left"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module']), $this);?>
</span>
          </div>
        </li>
      <?php endif; ?>      
    <?php else: ?>
      <?php if ($this->_tpl_vars['name'] == $this->_tpl_vars['MODULE_TAB']): ?> 
        <li class="active">
          <div>
            <span  style="float:left"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name']), $this);?>
</span>
           <div class="arrowdown arrowdownactive">
            <ul id="divmenu<?php echo $this->_tpl_vars['name']; ?>
">
             <?php $_from = $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>            
                    <li><a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</a></li>
              <?php endforeach; endif; unset($_from); ?>
            </ul>
           </div>
          </div>
      <?php else: ?>
        <li>
          <div>
           <span style="float:left"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module']), $this);?>
</span>
           <div class="arrowdown">
           <ul id="divmenu<?php echo $this->_tpl_vars['name']; ?>
">
             <?php $_from = $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>            
                    <li><a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</a></li>
            <?php endforeach; endif; unset($_from); ?>
            </ul>
           </div>
          </div>
      <?php endif; ?>
     <?php endif; ?> 
    </li>
  <?php endforeach; endif; unset($_from); ?>
      
  <?php $this->assign('totmodulesflat', $this->_tpl_vars['curr_module']); ?>    
  <?php if ($this->_tpl_vars['curr_module'] < $this->_tpl_vars['totmodules']): ?>
      <?php if (count ( $this->_tpl_vars['moduleExtraMenu'] ) > 0): ?>   
          <?php $_from = $this->_tpl_vars['moduleExtraMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>
          <?php if ($this->_tpl_vars['curr_module'] < $this->_tpl_vars['totmodules']): ?>
              <?php $this->assign('lastmodule', $this->_tpl_vars['module']); ?>   
              <?php echo smarty_function_counter(array(), $this);?>

              <?php if ($this->_tpl_vars['name'] == $this->_tpl_vars['MODULE_TAB']): ?>
              <li class="active">
                  <div>
                  <span  style="float:left"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name']), $this);?>
</span>
                  <div class="arrowdown arrowdownactive">
                   <ul id="divmenu<?php echo $this->_tpl_vars['name']; ?>
">
                     <?php $_from = $this->_tpl_vars['shortcutExtraMenu'][$this->_tpl_vars['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>            
                         <li><a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</a></li>
                    <?php endforeach; endif; unset($_from); ?>                      
                    </ul>
                  </div>
                  </div>
              <?php else: ?>
              <li>
                  <div>
                   <span  style="float:left"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module']), $this);?>
</span>
                   <div class="arrowdown">
                     <ul id="divmenu<?php echo $this->_tpl_vars['name']; ?>
">
                       <?php $_from = $this->_tpl_vars['shortcutExtraMenu'][$this->_tpl_vars['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>            
                         <li><a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</a></li>
                       <?php endforeach; endif; unset($_from); ?>    
                      </ul>                   
                   </div>
                  </div>
              <?php endif; ?>
              </li>
          <?php endif; ?>              
          <?php endforeach; endif; unset($_from); ?>  
      <?php endif; ?>   
    <?php endif; ?>
    <?php if (count ( $this->_tpl_vars['moduleExtraMenu'] ) + $this->_tpl_vars['totmodulesflat'] > $this->_tpl_vars['totmodules']): ?>
    <?php $this->assign('printmodule', false); ?>
    <li>
        <a href="#">
        <?php echo smarty_function_sugar_getimage(array('name' => 'submenu','ext' => ".png",'alt' => $this->_tpl_vars['APP']['LBL_SEARCH'],'other_attributes' => 'border="0" '), $this);?>
</a>
        <ul class="moremenu">
            <?php $_from = $this->_tpl_vars['moduleExtraMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>
              <?php echo smarty_function_counter(array(), $this);?>

              <?php if (( ( $this->_tpl_vars['printmodule'] == true ) && ( curr_module < $this->_tpl_vars['totmodules'] ) )): ?>
                  <li>
                   <span  style="float:left;width:100%;"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module']), $this);?>
</span>
                   <div class="arrowdown" style="display:none;">
                     <ul id="divmenu<?php echo $this->_tpl_vars['name']; ?>
">
                     <?php $_from = $this->_tpl_vars['shortcutExtraMenu'][$this->_tpl_vars['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>            
                          <li><a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</a></li>
                      <?php endforeach; endif; unset($_from); ?>    
                      </ul>                   
                   </div>
                  
                  </li>
              <?php endif; ?>              
              <?php if ($this->_tpl_vars['module'] == $this->_tpl_vars['lastmodule']): ?>
                <?php $this->assign('printmodule', true); ?>
              <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </ul>        
    </li>
    <?php endif; ?>
</ul>  
<?php endif; ?>
<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
  <div id="toptools" >
       <div class="iconmore" title="<?php echo $this->_tpl_vars['APP']['LBL_MOREDETAIL']; ?>
" >
         <ul >
         <li style="margin-left:-132px;"> 
             <ul id="ulmore">
                <?php if ('Home' == $this->_tpl_vars['MODULE_TAB']): ?>                                               
                  <li class="profileactions-profile">
                    <a id="add_dashlets" title="" href="#" onclick="return SUGAR.mySugar.showDashletsDialog();"/><?php echo $this->_tpl_vars['APP']['LBL_ADD_DASHLETS']; ?>
</a>	
                  </li>
                <?php endif; ?>
                <li class="profileactions-profile">
                     <a id="welcome_link" title="" href='index.php?module=Users&action=EditView&record=<?php echo $this->_tpl_vars['CURRENT_USER_ID']; ?>
'><b><?php echo $this->_tpl_vars['CURRENT_USER']; ?>
</b></a>
                </li>
                <?php $_from = $this->_tpl_vars['GCLS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gcl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gcl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gcl_key'] => $this->_tpl_vars['GCL']):
        $this->_foreach['gcl']['iteration']++;
?>
                  <li>                                                                             
                    <a id="<?php echo $this->_tpl_vars['gcl_key']; ?>
_link" title="" href="<?php echo $this->_tpl_vars['GCL']['URL']; ?>
"<?php if (! empty ( $this->_tpl_vars['GCL']['ONCLICK'] )): ?> onclick="<?php echo $this->_tpl_vars['GCL']['ONCLICK']; ?>
"<?php endif; ?>>
                      <?php echo smarty_function_sugar_getimage(array('name' => $this->_tpl_vars['gcl_key'],'ext' => ".png",'other_attributes' => 'border="0"'), $this);?>
&nbsp;&nbsp;
                    <?php echo $this->_tpl_vars['GCL']['LABEL']; ?>
</a>
                  </li> 
                <?php endforeach; endif; unset($_from); ?>
                <li class="profileactions-logout"><a title="" id="logout_link" href='<?php echo $this->_tpl_vars['LOGOUT_LINK']; ?>
' class='utilsLink'>
                    <?php echo smarty_function_sugar_getimage(array('name' => 'logout','ext' => ".png",'other_attributes' => 'border="0"'), $this);?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['LOGOUT_LABEL']; ?>
</a></li>
             </ul>
         </li>
         </ul>      
       </div>
       <div class="divsearch">
          <form name='UnifiedSearch' id='UnifiedSearch'  action='index.php' onsubmit='return SUGAR.unifiedSearchAdvanced.checkUsaAdvanced()'>
            <input type="hidden" name="action" value="UnifiedSearch">
            <input type="hidden" name="module" value="Home">
            <input type="hidden" name="search_form" value="false">
            <input type="hidden" name="advanced" value="false">
            <div style="float:left;"><input type="text" name="query_string" id="query_string" size="20" value="<?php echo $this->_tpl_vars['SEARCH']; ?>
"></div>
            <div class="iconsearch" onclick="$('#UnifiedSearch').submit();" title="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH']; ?>
"></div>
         </form>
       </div>      
     <?php if (true == true): ?>
      <div id="notifications" title="<?php echo $this->_tpl_vars['APP']['LBL_ASSIGNED_TO_NAME']; ?>
 <?php echo $this->_tpl_vars['CURRENT_USER']; ?>
" ></div>
     <?php endif; ?>     
      
      <div class="iconrecents" title="<?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
" >
       <ul>
        <li style="margin-left:-60px;"> 
           <ul id="ulrecents">
            <?php $_from = $this->_tpl_vars['recentRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
            <li>                                                                             
                <a title="<?php echo $this->_tpl_vars['item']['item_summary']; ?>
"
                    accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
"
                    href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
">
                    <?php echo $this->_tpl_vars['item']['image']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['item']['item_summary_short']; ?>

                </a>
            </li>
            <?php endforeach; else: ?>
            <li>  
            <?php echo $this->_tpl_vars['APP']['NTC_NO_ITEMS_DISPLAY']; ?>

            <?php endif; unset($_from); ?>
             </li>  
           </ul>   
       </ul>      
      </div>
     <?php if ('Home' != $this->_tpl_vars['MODULE_TAB']): ?>
         <div id="createtop" title="<?php echo $this->_tpl_vars['APP']['LBL_QUICK_CREATE_TITLE']; ?>
" onclick="goto_create();"></div>
     <?php endif; ?>
   </div>        
<?php endif; ?> 
</div>
<div class="clear"></div> 
<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
  <?php if ($this->_tpl_vars['USE_GROUP_TABS']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/MetroThemePro/tpls/_headerShortcuts.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>
<?php endif; ?>


 
