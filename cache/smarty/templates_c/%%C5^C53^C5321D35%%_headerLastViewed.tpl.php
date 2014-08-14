<?php /* Smarty version 2.6.11, created on 2014-08-07 11:48:02
         compiled from themes/ModernAqua/tpls/_headerLastViewed.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_link', 'themes/ModernAqua/tpls/_headerLastViewed.tpl', 43, false),)), $this); ?>
<div id="lastView" class="headerList">
<span><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</span>
<ul>
<?php $_from = $this->_tpl_vars['recentRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
	<li><a title="<?php echo $this->_tpl_vars['item']['item_summary']; ?>
 [<?php echo $this->_tpl_vars['APP']['LBL_ALT_HOT_KEY'];  echo $this->_foreach['lastViewed']['iteration']; ?>
]" 
		accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
" 
		href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
">
		<?php echo $this->_tpl_vars['item']['image']; ?>
&nbsp;<span><?php echo $this->_tpl_vars['item']['item_summary_short']; ?>
</span>
	</a></li>
<?php endforeach; else: ?>
	<?php echo $this->_tpl_vars['APP']['NTC_NO_ITEMS_DISPLAY']; ?>

<?php endif; unset($_from); ?>
</ul>
</div>