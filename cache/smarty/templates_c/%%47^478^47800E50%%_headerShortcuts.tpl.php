<?php /* Smarty version 2.6.11, created on 2014-08-07 11:38:11
         compiled from themes/MetroThemePro/tpls/_headerShortcuts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_link', 'themes/MetroThemePro/tpls/_headerShortcuts.tpl', 77, false),)), $this); ?>

    <div id="shortcuts" class="headerList" > 
    <?php if ('Home' == $this->_tpl_vars['MODULE_TAB']): ?>    
        <?php echo '
        <style>
                #dashletLinkSpan
                {
                visibility:visible;
                width:56px;
                }       

                #sitemapLink
                {
                 display:none;
                }

        </style>
        '; ?>

    <?php endif; ?> 
    <?php if ('Administration' == $this->_tpl_vars['MODULE_TAB']): ?>    
        <?php echo '
        <style>
                #dashletLinkSpan
                {
                visibility:hidden;
                width:1px;               
                }       
                #sitemapLink
                {
                display:none;
                }
        </style>
        '; ?>

    <?php endif; ?>     
    <?php if ($this->_tpl_vars['USE_GROUP_TABS']): ?>                          
        <?php $_from = $this->_tpl_vars['moduleTopMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>  
              <?php if ($this->_tpl_vars['name'] == $this->_tpl_vars['MODULE_TAB']): ?>
               <?php if (! empty ( $this->_tpl_vars['SHORTCUT_MENU'] )): ?>
                <span style="weight:700;font-size:120%;white-space:nowrap;"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name']), $this);?>
:&nbsp;&nbsp;</span>   
               <?php endif; ?>
              <?php endif; ?>  
          <?php endforeach; endif; unset($_from); ?>
     <?php endif; ?>     
     <span>
     <?php $_from = $this->_tpl_vars['SHORTCUT_MENU']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
       
     <span style="white-space:nowrap;">
          <?php if ($this->_tpl_vars['item']['URL'] == "-"): ?>
            <a></a><span>&nbsp;</span>
          <?php else: ?>
            <a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><?php echo $this->_tpl_vars['item']['IMAGE']; ?>
&nbsp;<span><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</span></a>
          <?php endif; ?>
      </span>
      <?php endforeach; endif; unset($_from); ?>
      </span>
    </div>

   