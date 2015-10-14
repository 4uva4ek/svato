{add_js file='includes/jquery/tabs/jquery.ui.min.js'}
{add_css file='includes/jquery/tabs/tabs.css'}

{literal}
	<script type="text/javascript">
        $(function(){$(".uitabs").tabs();});
	</script>
{/literal}

 

{*Профіль учасника АТО*}
{if $usr.group_alias=='atos'}
{include file='ato_user_profile.tpl'}
{*Профіль волонтера*} 
{elseif $usr.group_alias=='volonters'}
{include file='vol_user_profile.tpl'}
{else}
{include file='vol_user_profile.tpl'}
{/if}

 