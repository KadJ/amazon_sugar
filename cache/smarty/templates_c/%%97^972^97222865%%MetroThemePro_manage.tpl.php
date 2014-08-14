<?php /* Smarty version 2.6.11, created on 2014-08-07 11:43:24
         compiled from modules/Administration/MetroThemePro_manage.tpl */ ?>
<form action="index.php" method="POST" name="MetroThemePro_manage" id="MetroThemePro_manage">
<input type="hidden" name="module" value="Administration">
<input type="hidden" name="action" value="MetroThemePro_manage">
<input type="hidden" name="process" value="true">
<?php if ($this->_tpl_vars['ERRORS'] != ''): ?>
<p class="error">
    <?php echo $this->_tpl_vars['ERRORS']; ?>

    <br />&nbsp;
</p>
<?php endif; ?>

<table  style="width:60%;margin:auto;clear:both;"><tbody><tr><td><div class="moduleTitle">
<h2><?php echo $this->_tpl_vars['MOD']['LBL_METROTHEMEPRO_CONFIG_TITLE']; ?>
</h2>
<div class="clear"></div></div>
<?php echo '
<style>div#rollover {position: relative;float: left;margin: none;text-decoration: none;}div#rollover a:hover {padding: 0;text-decoration: none;}div#rollover a span {display: none;}div#rollover a:hover span {text-decoration: none;display: block;width: 250px;margin-top: 5px;margin-left: 5px;position: absolute;padding: 10px;color: #333;	border: 1px solid #ccc;	background-color: #fff;	font-size: 12px;z-index: 1000;}</style>
'; ?>

<div class="clear"></div>
<strong><?php echo $this->_tpl_vars['configurationsaved']; ?>
</strong>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="edit view">
  <tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
              <tr>
      					<th align="left" colspan="4" scope="row">
      						<h4>
      							<?php echo $this->_tpl_vars['MOD']['LBL_METROTHEMEPRO_CONFIG_INFO']; ?>

      						</h4>
      					</th>
      				</tr>				

               <tr>    
                    <td width="40%" scope="row">
                        <?php echo $this->_tpl_vars['MOD']['LBL_SHOWLOGO']; ?>
: 
                    </td>
                    <td>
                    <?php if ($this->_tpl_vars['show_logo'] == 'show'): ?>
                        <select name="input_show_logo"><option selected=true value="show"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWLOGOTRUE']; ?>
</option><option value="hide"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWLOGOFALSE']; ?>
</option></select>
                    <?php else: ?> 
                        <select name="input_show_logo"><option value="show"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWLOGOTRUE']; ?>
</option><option selected=true value="hide"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWLOGOFALSE']; ?>
</option></select>
                    <?php endif; ?>    
                    </td>
                </tr>
               <tr>    
                    <td width="40%" scope="row">
                        <?php echo $this->_tpl_vars['MOD']['LBL_SHOWPREVIEW']; ?>
: 
                    </td>
                    <td>
                    <?php if ($this->_tpl_vars['show_preview'] == 'show'): ?>
                        <select name="input_showpreview"><option selected=true value="show"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWTRUE']; ?>
</option><option value="hide"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWFALSE']; ?>
</option></select>
                    <?php else: ?> 
                        <select name="input_showpreview"><option value="show"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWTRUE']; ?>
</option><option selected=true value="hide"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWFALSE']; ?>
</option></select>
                    <?php endif; ?>    
                    </td>
                </tr>  
               <tr>    
                   <td width="40%" scope="row">
                        <?php echo $this->_tpl_vars['MOD']['LBL_SHOWNOTIFIC']; ?>
: 
                    </td>
                    <td>
                    <?php if ($this->_tpl_vars['show_notific'] == 'show'): ?>
                        <select name="input_shownotific"><option selected=true value="show"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWTRUE']; ?>
</option><option value="hide"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWFALSE']; ?>
</option></select>
                    <?php else: ?> 
                        <select name="input_shownotific"><option value="show"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWTRUE']; ?>
</option><option selected=true value="hide"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWFALSE']; ?>
</option></select>
                    <?php endif; ?>    
                    </td>
                </tr> 
              <tr>                
                    <td width="40%" scope="row">
                        <?php echo $this->_tpl_vars['MOD']['LBL_MAXNOTIFIC']; ?>
: 
                    </td>
                    <td>
                        <input id="input_maxnotific" type="text" size="10" maxlength="2" name="input_maxnotific" value="<?php echo $this->_tpl_vars['maxnotific']; ?>
" tabindex='1'>
                    </td>
               </tr>                             
               <tr>    
                    <td width="40%" scope="row">
                        <?php echo $this->_tpl_vars['MOD']['LBL_SHOWRELATED']; ?>
: 
                    </td>
                    <td>
                    <?php if ($this->_tpl_vars['show_related'] == 'show'): ?>
                        <select name="input_showrelated"><option selected=true value="show"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWTRUE']; ?>
</option><option value="hide"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWFALSE']; ?>
</option></select>
                    <?php else: ?> 
                        <select name="input_showrelated"><option value="show"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWTRUE']; ?>
</option><option selected=true value="hide"><?php echo $this->_tpl_vars['MOD']['LBL_SHOWFALSE']; ?>
</option></select>
                    <?php endif; ?>    
                    </td>
                </tr>               
              <tr>
                    <td width="40%" scope="row">
                        <?php echo $this->_tpl_vars['MOD']['LBL_MAXRELATED']; ?>
: 
                    </td>
                    <td>
                        <input id="input_maxrelated" type="text" size="10" maxlength="2" name="input_maxrelated" value="<?php echo $this->_tpl_vars['maxrelated']; ?>
" tabindex='1'>
                    </td>
               </tr>   
            </table>
        </td>
    </tr>
</table>
<div style="padding-top:2px;">
            <input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
"  class="button" type="submit" name="save" onclick="return verify_data('MetroThemePro_manage');" value="  <?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
  " >
            <input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
"  onclick="document.location.href='index.php?module=Administration&action=index'" class="button"  type="button" name="cancel" value="  <?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
  " >
</div>
</td>
</tr>
</tbody>
</table>
</form>
