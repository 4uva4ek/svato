<h3>{$LANG.SUBSCRIBERS} (<span id="real_count_subscribe">{$channel.count_subscribe}</span>) {if $channel.more_subscribe}<a href="javascript:;" onclick="getSubscribe({$channel.more_subscribe}, '{$usr.id}');" title="{$LANG.SEE_NEXT}"><img src="/templates/_default_/images/video/reload.png" alt="{$LANG.SEE_NEXT}" border="0" style=" vertical-align:middle"/></a>{/if}</h3>
{if $channel.subscribe}
    {foreach key=tid item=s_user from=$channel.subscribe}
        <div class="chan_subs_usr">
            <div class="mov_selected chan_subs_to_ch"><a href="/video/channel/{$s_user.login}.html">{$LANG.VIEW_TO_CHANNEL}</a></div>
            <div><a href="{profile_url login=$s_user.login}" title="{$s_user.nickname|escape:'html'}"><img src="{$s_user.avatar_url}" alt="{$s_user.nickname|escape:'html'}" border="0"/></a></div>
            <a href="{profile_url login=$s_user.login}" title="{$s_user.nickname|escape:'html'}">{$s_user.nickname}</a>
        </div>
    {/foreach}
    <div style="clear:both;"></div>
{else}
    <p class="not_found">{$LANG.NOT_SUBSCRIBERS}...</p>
{/if}
<script type="text/javascript">
	{literal}
	$(document).ready(function(){
		$('.chan_subs_usr').hover(
			function() {
				$(this).find('.chan_subs_to_ch').fadeIn();
			},
			function() {
				$(this).find('.chan_subs_to_ch').fadeOut();
			}
		);
	});
{/literal}
</script>