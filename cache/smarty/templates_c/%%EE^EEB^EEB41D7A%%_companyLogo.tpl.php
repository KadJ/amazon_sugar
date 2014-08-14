<?php /* Smarty version 2.6.11, created on 2014-08-08 11:14:59
         compiled from themes/MetroThemePro/tpls/_companyLogo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_translate', 'themes/MetroThemePro/tpls/_companyLogo.tpl', 42, false),)), $this); ?>
 <?php if (! $this->_tpl_vars['AUTHENTICATED']): ?>
      <div id="companyLogoHome">
          <a href="index.php?module=Home&action=index" border="0">
          <img src="<?php echo $this->_tpl_vars['COMPANY_LOGO_URL']; ?>
" 
             alt="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COMPANY_LOGO'), $this);?>
" border="0"/>
          </a>
      </div>
 <?php endif; ?> 