{*
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2012 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

*} 
*
{literal}
<script>
{/literal}
    {if true==true}
       var show_preview=true;
    {else}
       var show_preview=false;
    {/if} 
    {if true==true}
     var show_related=true;
    {else}
     var show_related=false;
    {/if} 
{literal}
</script>
{/literal}

<div id="companyLogo" style="display:none;"><img src="{$COMPANY_LOGO_URL}" /></div>
{if $USE_GROUP_TABS}
<div id="moduleList">
<ul>
    {if true==false}
      {if $AUTHENTICATED}
      <li>
      <a style="padding:2px;margin:0px;" href="index.php?module=Home&action=index" border="0">
            <img id="companylogo" src="{$COMPANY_LOGO_URL}"  height="35px"
                alt="{sugar_translate label='LBL_COMPANY_LOGO'}" border="0"/>
      </a>
      </li>
      {/if} 
   {/if}   
   {if "Home" == $MODULE_TAB}
    <li class="active">
        <span >{sugar_link id="moduleTab_Home" module="Home"}</span>
    {else}
    <li>
       <span >{sugar_link id="moduleTab_Home" module="Home" data="Home"}</span>
    {/if}
    </li>
     
    {assign var="groupSelected" value=false}
    {foreach from=$groupTabs item=modules key=group name=groupList}
    {capture name=extraparams assign=extraparams}parentTab={$group}{/capture}
    {if ( ( $smarty.request.parentTab == $group || (!$smarty.request.parentTab && in_array($MODULE_TAB,$modules.modules)) ) && !$groupSelected ) || ($smarty.foreach.groupList.index == 0 && $defaultFirst)}
    <li>
        <span class="currentTab"><a  href="#" id="grouptab_{$smarty.foreach.groupList.index}">{$group}</a>
        </span>
        <ul>
	        {foreach from=$modules.modules item=module key=modulekey}  
           {if "Home" != $module} 
    	        <li>
    	        	{capture name=moduleTabId assign=moduleTabId}moduleTab_{$smarty.foreach.moduleList.index}_{$module}{/capture}
    	        	{sugar_link id=$moduleTabId module=$modulekey data=$module extraparams=$extraparams}
    	        </li>
           {/if}	      
	        {/foreach}
	        {if !empty($modules.extra)}
		        {foreach from=$modules.extra item=submodulename key=submodule}
    					<li>
    						<a href="{sugar_link module=$submodule link_only=1 extraparams=$extraparams}">{$submodulename}
    						</a>
    					</li>
		        {/foreach}
	        {/if}	        	        
        </ul>
        {assign var="groupSelected" value=true}
    {else}
    <li>
        <span><a href="#" id="grouptab_{$smarty.foreach.groupList.index}">{$group}</a></span>
        <ul>
	        {foreach from=$modules.modules item=module key=modulekey}
           {if "Home" != $module} 
    	        <li >
    	        	{capture name=moduleTabId assign=moduleTabId}moduleTab_{$smarty.foreach.moduleList.index}_{$module}{/capture}
    	        	{sugar_link id=$moduleTabId module=$modulekey data=$module extraparams=$extraparams}
    	        </li>
            {/if}	 
	        {/foreach}
	        {if !empty($modules.extra)}
		        {foreach from=$modules.extra item=submodulename key=submodule}
					<li>
						<a href="{sugar_link module=$submodule link_only=1 extraparams=$extraparams}">{$submodulename}
						</a>
					</li>
		        {/foreach}
          {/if}	        
        </ul>
    {/if}
    </li>
    {/foreach}
</ul>

{else}

<div id="moduleList">
<ul>
    {assign var="totmodules" value=10}
    {counter start=0 assign=curr_module print=false}
    {foreach from=$moduleTopMenu item=module key=name name=moduleList}
    {counter}
    {if $name == "Home"}
      {if true==false}
          {if $AUTHENTICATED}
            <li>
            <a style="padding:2px;margin:0px;" href="index.php?module=Home&action=index" border="0">
                  <img id="companylogo" src="{$COMPANY_LOGO_URL}"  height="35px"
                      alt="{sugar_translate label='LBL_COMPANY_LOGO'}" border="0"/>
            </a>
            </li>
          {/if} 
      {else}
        <li>
          <div>
           <span style="float:left">{sugar_link id="moduleTab_$name" module=$name data=$module}</span>
          </div>
        </li>
      {/if}      
    {else}
      {if $name == $MODULE_TAB} 
        <li class="active">
          <div>
            <span  style="float:left">{sugar_link id="moduleTab_$name" module=$name}</span>
           <div class="arrowdown arrowdownactive">
            <ul id="divmenu{$name}">
             {foreach from=$shortcutTopMenu[$name] item=item}            
                    <li><a href="{$item.URL}">{$item.LABEL}</a></li>
              {/foreach}
            </ul>
           </div>
          </div>
      {else}
        <li>
          <div>
           <span style="float:left">{sugar_link id="moduleTab_$name" module=$name data=$module}</span>
           <div class="arrowdown">
           <ul id="divmenu{$name}">
             {foreach from=$shortcutTopMenu[$name] item=item}            
                    <li><a href="{$item.URL}">{$item.LABEL}</a></li>
            {/foreach}
            </ul>
           </div>
          </div>
      {/if}
     {/if} 
    </li>
  {/foreach}
      
  {assign var="totmodulesflat" value=$curr_module}    
  {if $curr_module < $totmodules}
      {if count($moduleExtraMenu) > 0}   
          {foreach from=$moduleExtraMenu item=module key=name name=moduleList}
          {if $curr_module < $totmodules}
              {assign var="lastmodule" value=$module}   
              {counter}
              {if $name == $MODULE_TAB}
              <li class="active">
                  <div>
                  <span  style="float:left">{sugar_link id="moduleTab_$name" module=$name}</span>
                  <div class="arrowdown arrowdownactive">
                   <ul id="divmenu{$name}">
                     {foreach from=$shortcutExtraMenu[$name] item=item}            
                         <li><a href="{$item.URL}">{$item.LABEL}</a></li>
                    {/foreach}                      
                    </ul>
                  </div>
                  </div>
              {else}
              <li>
                  <div>
                   <span  style="float:left">{sugar_link id="moduleTab_$name" module=$name data=$module}</span>
                   <div class="arrowdown">
                     <ul id="divmenu{$name}">
                       {foreach from=$shortcutExtraMenu[$name] item=item}            
                         <li><a href="{$item.URL}">{$item.LABEL}</a></li>
                       {/foreach}    
                      </ul>                   
                   </div>
                  </div>
              {/if}
              </li>
          {/if}              
          {/foreach}  
      {/if}   
    {/if}
    {if count($moduleExtraMenu)+$totmodulesflat > $totmodules}
    {assign var="printmodule" value=false}
    <li>
        <a href="#">
        {sugar_getimage name="submenu" ext=".png" alt=$APP.LBL_SEARCH other_attributes='border="0" '}</a>
        <ul class="moremenu">
            {foreach from=$moduleExtraMenu item=module key=name name=moduleList}
              {counter}
              {if (($printmodule==true)&&( curr_module< $totmodules))}
                  <li>
                   <span  style="float:left;width:100%;">{sugar_link id="moduleTab_$name" module=$name data=$module}</span>
                   <div class="arrowdown" style="display:none;">
                     <ul id="divmenu{$name}">
                     {foreach from=$shortcutExtraMenu[$name] item=item}            
                          <li><a href="{$item.URL}">{$item.LABEL}</a></li>
                      {/foreach}    
                      </ul>                   
                   </div>
                  
                  </li>
              {/if}              
              {if $module==$lastmodule}
                {assign var="printmodule" value=true}
              {/if}
            {/foreach}
        </ul>        
    </li>
    {/if}
</ul>  
{/if}
{if $AUTHENTICATED}
  <div id="toptools" >
       <div class="iconmore" title="{$APP.LBL_MOREDETAIL}" >
         <ul >
         <li style="margin-left:-132px;"> 
             <ul id="ulmore">
                {if "Home" == $MODULE_TAB}                                               
                  <li class="profileactions-profile">
                    <a id="add_dashlets" title="" href="#" onclick="return SUGAR.mySugar.showDashletsDialog();"/>{$APP.LBL_ADD_DASHLETS}</a>	
                  </li>
                {/if}
                <li class="profileactions-profile">
                     <a id="welcome_link" title="" href='index.php?module=Users&action=EditView&record={$CURRENT_USER_ID}'><b>{$CURRENT_USER}</b></a>
                </li>
                {foreach from=$GCLS item=GCL name=gcl key=gcl_key}
                  <li>                                                                             
                    <a id="{$gcl_key}_link" title="" href="{$GCL.URL}"{if !empty($GCL.ONCLICK)} onclick="{$GCL.ONCLICK}"{/if}>
                      {sugar_getimage name=$gcl_key ext=".png" other_attributes='border="0"'}&nbsp;&nbsp;
                    {$GCL.LABEL}</a>
                  </li> 
                {/foreach}
                <li class="profileactions-logout"><a title="" id="logout_link" href='{$LOGOUT_LINK}' class='utilsLink'>
                    {sugar_getimage name="logout" ext=".png" other_attributes='border="0"'}&nbsp;&nbsp;{$LOGOUT_LABEL}</a></li>
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
            <div style="float:left;"><input type="text" name="query_string" id="query_string" size="20" value="{$SEARCH}"></div>
            <div class="iconsearch" onclick="$('#UnifiedSearch').submit();" title="{$APP.LBL_SEARCH}"></div>
         </form>
       </div>      
     {if true==true}
      <div id="notifications" title="{$APP.LBL_ASSIGNED_TO_NAME} {$CURRENT_USER}" ></div>
     {/if}     
      
      <div class="iconrecents" title="{$APP.LBL_LAST_VIEWED}" >
       <ul>
        <li style="margin-left:-60px;"> 
           <ul id="ulrecents">
            {foreach from=$recentRecords item=item name=lastViewed}
            <li>                                                                             
                <a title="{$item.item_summary}"
                    accessKey="{$smarty.foreach.lastViewed.iteration}"
                    href="{sugar_link module=$item.module_name action='DetailView' record=$item.item_id link_only=1}">
                    {$item.image}&nbsp;&nbsp;{$item.item_summary_short}
                </a>
            </li>
            {foreachelse}
            <li>  
            {$APP.NTC_NO_ITEMS_DISPLAY}
            {/foreach}
             </li>  
           </ul>   
       </ul>      
      </div>
     {if "Home" != $MODULE_TAB}
         <div id="createtop" title="{$APP.LBL_QUICK_CREATE_TITLE}" onclick="goto_create();"></div>
     {/if}
   </div>        
{/if} 
</div>
<div class="clear"></div> 
{if $AUTHENTICATED}
  {if $USE_GROUP_TABS}
    {include file="_headerShortcuts.tpl" theme_template=true}
  {/if}
{/if}


 
