{$APP_LIST_STRINGS.lm_ts_status_work_list[$ts.STATUS_WORK]}
{if $ts.STATUS_WORK == 'verify'}
	<A href="#" onclick="if(confirm('Вы действительно считаете, что все работы по данной заявке выполнены?')){ldelim}location.href='index.php?module=lm_TechnicalSupport&action=setStatusWork&status=closed&record={$ts.ID}'{rdelim}else {ldelim}return false{rdelim}" onmouseout="return nd();" onmouseover="return overlib('Нажатием ссылки &quot;Все ОК&quot; Вы подтвердждаете согласие с тем, что все работы по текущей заявке выполнены в полном объеме!', FGCLASS, 'olFgClass', CGCLASS, 'olCgClass', BGCLASS, 'olBgClass', TEXTFONTCLASS, 'olFontClass', CAPTIONFONTCLASS, 'olCapFontClass', CLOSEFONTCLASS, 'olCloseFontClass', WIDTH, -1, NOFOLLOW, 'ol_nofollow' );" style="color: green;">Все ОК</A> | <A href="#" onclick="location.href='index.php?module=lm_TechnicalSupport&action=setStatusWork&status=completion&record={$ts.ID}'" style="color: red;">Доработать</A>
{/if}