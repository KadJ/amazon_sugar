<?php /* Smarty version 2.6.11, created on 2014-08-07 11:38:11
         compiled from themes/MetroThemePro/tpls/_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getimagepath', 'themes/MetroThemePro/tpls/_head.tpl', 51, false),array('function', 'sugar_getjspath', 'themes/MetroThemePro/tpls/_head.tpl', 69, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html <?php echo $this->_tpl_vars['langHeader']; ?>
>
<head>
<link rel="SHORTCUT ICON" href="<?php echo $this->_tpl_vars['FAVICON_URL']; ?>
">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['APP']['LBL_CHARSET']; ?>
">
<title><?php echo $this->_tpl_vars['APP']['LBL_BROWSER_TITLE']; ?>
</title>
<?php echo $this->_tpl_vars['SUGAR_CSS']; ?>

<?php echo $this->_tpl_vars['SUGAR_JS']; ?>

<?php echo '
<script type="text/javascript">
<!--
SUGAR.themes.theme_name      = \'';  echo $this->_tpl_vars['THEME'];  echo '\';
SUGAR.themes.theme_ie6compat = ';  echo $this->_tpl_vars['THEME_IE6COMPAT'];  echo ';
SUGAR.themes.hide_image      = \'';  echo smarty_function_sugar_getimagepath(array('file' => "hide.gif"), $this); echo '\';
SUGAR.themes.show_image      = \'';  echo smarty_function_sugar_getimagepath(array('file' => "show.gif"), $this); echo '\';
SUGAR.themes.loading_image      = \'';  echo smarty_function_sugar_getimagepath(array('file' => "img_loading.gif"), $this); echo '\';
SUGAR.themes.allThemes       = eval(';  echo $this->_tpl_vars['allThemes'];  echo ');
if ( YAHOO.env.ua )
    UA = YAHOO.env.ua;
-->
</script>
'; ?>

<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<script src="themes/MetroThemePro/js/metroprotheme.js" type="text/javascript"></script>

<script src="themes/MetroThemePro/js/jquery.hoverIntent.js" type="text/javascript"></script>
<script src="themes/MetroThemePro/js/jquery.autoellipsis-1.0.10.min.js" type="text/javascript"></script>

<script type="text/javascript" src="themes/MetroThemePro/js/jquery.easing.1.3.js"></script>


<script type="text/javascript" src='<?php echo smarty_function_sugar_getjspath(array('file' => "cache/include/javascript/sugar_field_grp.js"), $this);?>
'></script>
<style>
<?php if (! $this->_tpl_vars['AUTHENTICATED']): ?>
  <?php echo '
  #moduleList
  {
  height:auto;
  }
  '; ?>

<?php endif; ?> 
<?php if ($this->_tpl_vars['USE_GROUP_TABS']): ?>
 <?php echo '
  #moduleList ul ul 
   {
    margin-left:0;
   }
 '; ?>
 
 <?php endif; ?> 
<?php if (! $this->_tpl_vars['AUTHENTICATED']): ?>
 <?php echo '
 #header
 {
  border-style:solid;
  border-width:0px;
  border-bottom-width:3px;  
 }
'; ?>
 
<?php endif; ?>
 </style>
</head>