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
<div>
   <a href="#" onmouseover="document.getElementById('divlastview').style.visibility='visible';" ">{$APP.LBL_LAST_VIEWED}<img border="0" src="themes/Sugar5/images/MoreDetail.png"></a>
   <ul id="divlastview" style="margin-top:-1px;" class="cssmenulastview"  onmouseover="document.getElementById('divlastview').style.visibility='visible';">  
    {foreach from=$recentRecords item=item name=lastViewed}
    <li>                                                                             
        <a title="{$item.item_summary}"
            accessKey="{$smarty.foreach.lastViewed.iteration}"
            href="{sugar_link module=$item.module_name action='DetailView' record=$item.item_id link_only=1}">
            {$item.image}&nbsp;<span>{$item.item_summary_short}</span>
        </a>
    </li>
    {foreachelse}
    {$APP.NTC_NO_ITEMS_DISPLAY}
    {/foreach}
    </ul>
</div>
