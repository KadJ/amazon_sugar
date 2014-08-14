<?php /* Smarty version 2.6.11, created on 2014-08-07 11:38:11
         compiled from themes/MetroThemePro/tpls/header.tpl */ ?>
  

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/MetroThemePro/tpls/_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body onMouseOut="closeMenus();">
<a name="top"></a>
<?php echo $this->_tpl_vars['SUGAR_DCJS']; ?>

<div id="header">
    <?php if (! $this->_tpl_vars['AUTHENTICATED']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/MetroThemePro/tpls/_companyLogo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>    
      <div class="clear"></div>
    <br /><br />
    <?php endif; ?>
     <div id="ajaxHeader">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/MetroThemePro/tpls/_headerModuleList.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
     </div>
</div>         

<?php echo '
<iframe id=\'ajaxUI-history-iframe\' src=\'index.php?entryPoint=getImage&imageName=blank.png\'  title=\'empty\' style=\'display:none\'></iframe>
<input id=\'ajaxUI-history-field\' type=\'hidden\'>
<script type=\'text/javascript\'>
if (SUGAR.ajaxUI && !SUGAR.ajaxUI.hist_loaded)
{
    YAHOO.util.History.register(\'ajaxUILoc\', "", SUGAR.ajaxUI.go);
    ';  if ($_REQUEST['module'] != 'ModuleBuilder'): ?>    YAHOO.util.History.initialize("ajaxUI-history-field", "ajaxUI-history-iframe");
    <?php endif;  echo '
}
</script>
'; ?>

 <div class="clear"></div>
<div id="main">
    <div id="content" <?php if (! $this->_tpl_vars['AUTHENTICATED']): ?>class="noLeftColumn" <?php endif; ?>>
        <table style="width:100%"><tr><td>