<form action="index.php" method="POST" name="MetroThemePro_manage" id="MetroThemePro_manage">
<input type="hidden" name="module" value="Administration">
<input type="hidden" name="action" value="MetroThemePro_manage">
<input type="hidden" name="process" value="true">
{if $ERRORS neq ''}
<p class="error">
    {$ERRORS}
    <br />&nbsp;
</p>
{/if}

<table  style="width:60%;margin:auto;clear:both;"><tbody><tr><td><div class="moduleTitle">
<h2>{$MOD.LBL_METROTHEMEPRO_CONFIG_TITLE}</h2>
<div class="clear"></div></div>
{literal}
<style>div#rollover {position: relative;float: left;margin: none;text-decoration: none;}div#rollover a:hover {padding: 0;text-decoration: none;}div#rollover a span {display: none;}div#rollover a:hover span {text-decoration: none;display: block;width: 250px;margin-top: 5px;margin-left: 5px;position: absolute;padding: 10px;color: #333;	border: 1px solid #ccc;	background-color: #fff;	font-size: 12px;z-index: 1000;}</style>
{/literal}
<div class="clear"></div>
<strong>{$configurationsaved}</strong>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="edit view">
  <tr>
		<td>
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
              <tr>
      					<th align="left" colspan="4" scope="row">
      						<h4>
      							{$MOD.LBL_METROTHEMEPRO_CONFIG_INFO}
      						</h4>
      					</th>
      				</tr>				

               <tr>    
                    <td width="40%" scope="row">
                        {$MOD.LBL_SHOWLOGO}: 
                    </td>
                    <td>
                    {if $show_logo eq "show"}
                        <select name="input_show_logo"><option selected=true value="show">{$MOD.LBL_SHOWLOGOTRUE}</option><option value="hide">{$MOD.LBL_SHOWLOGOFALSE}</option></select>
                    {else} 
                        <select name="input_show_logo"><option value="show">{$MOD.LBL_SHOWLOGOTRUE}</option><option selected=true value="hide">{$MOD.LBL_SHOWLOGOFALSE}</option></select>
                    {/if}    
                    </td>
                </tr>
               <tr>    
                    <td width="40%" scope="row">
                        {$MOD.LBL_SHOWPREVIEW}: 
                    </td>
                    <td>
                    {if $show_preview eq "show"}
                        <select name="input_showpreview"><option selected=true value="show">{$MOD.LBL_SHOWTRUE}</option><option value="hide">{$MOD.LBL_SHOWFALSE}</option></select>
                    {else} 
                        <select name="input_showpreview"><option value="show">{$MOD.LBL_SHOWTRUE}</option><option selected=true value="hide">{$MOD.LBL_SHOWFALSE}</option></select>
                    {/if}    
                    </td>
                </tr>  
               <tr>    
                   <td width="40%" scope="row">
                        {$MOD.LBL_SHOWNOTIFIC}: 
                    </td>
                    <td>
                    {if $show_notific eq "show"}
                        <select name="input_shownotific"><option selected=true value="show">{$MOD.LBL_SHOWTRUE}</option><option value="hide">{$MOD.LBL_SHOWFALSE}</option></select>
                    {else} 
                        <select name="input_shownotific"><option value="show">{$MOD.LBL_SHOWTRUE}</option><option selected=true value="hide">{$MOD.LBL_SHOWFALSE}</option></select>
                    {/if}    
                    </td>
                </tr> 
              <tr>                
                    <td width="40%" scope="row">
                        {$MOD.LBL_MAXNOTIFIC}: 
                    </td>
                    <td>
                        <input id="input_maxnotific" type="text" size="10" maxlength="2" name="input_maxnotific" value="{$maxnotific}" tabindex='1'>
                    </td>
               </tr>                             
               <tr>    
                    <td width="40%" scope="row">
                        {$MOD.LBL_SHOWRELATED}: 
                    </td>
                    <td>
                    {if $show_related eq "show"}
                        <select name="input_showrelated"><option selected=true value="show">{$MOD.LBL_SHOWTRUE}</option><option value="hide">{$MOD.LBL_SHOWFALSE}</option></select>
                    {else} 
                        <select name="input_showrelated"><option value="show">{$MOD.LBL_SHOWTRUE}</option><option selected=true value="hide">{$MOD.LBL_SHOWFALSE}</option></select>
                    {/if}    
                    </td>
                </tr>               
              <tr>
                    <td width="40%" scope="row">
                        {$MOD.LBL_MAXRELATED}: 
                    </td>
                    <td>
                        <input id="input_maxrelated" type="text" size="10" maxlength="2" name="input_maxrelated" value="{$maxrelated}" tabindex='1'>
                    </td>
               </tr>   
            </table>
        </td>
    </tr>
</table>
<div style="padding-top:2px;">
            <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  class="button" type="submit" name="save" onclick="return verify_data('MetroThemePro_manage');" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " >
            <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}"  onclick="document.location.href='index.php?module=Administration&action=index'" class="button"  type="button" name="cancel" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  " >
</div>
</td>
</tr>
</tbody>
</table>
</form>

