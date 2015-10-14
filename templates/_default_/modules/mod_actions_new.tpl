{if $actions}
{literal}
<style type="text/css">
    div.u_online {
        background: #648028;
        color: #fff;
        font-size: 10px;
        height: 15px;
        line-height: 15px;
        text-align: center;
        border-top: 1px solid #fff;
    }
    div.u_offline {
        background: #ccc;
        color: #333;
        font-size: 10px;
        height: 15px;
        line-height: 15px;
        text-align: center;
        border-top: 1px solid #fff;
    }
    div.actions_list {
        font-size: 11px;
    }
    .action_details img {
        max-width: 50px;
    }
    .action_user, .action_title {
        font-size: 12px;
    }

</style>
{/literal}
    <div class="actions_list">
        <table cellpadding="5" width="100%">
            {foreach key=aid item=action from=$actions}
                <tr>
                    <td width="40" valign="top" style="border-bottom: 1px dotted #ccc;">
                        {if $action.user_ava}
                            <a href="{$action.user_url}">
                                <img src="/images/users/avatars/small/{$action.user_ava}" alt="" width="40" height="40">
                            </a>
                        {else}
                            <a href="{$action.user_url}">
                                <img src="/images/users/avatars/small/nopic.jpg" alt=""  width="40" height="40">
                            </a>
                        {/if}

                        {if $action.user_online}
                            <div class="u_online">online</div>
                        {else}
                            <div class="u_offline">offline</div>
                        {/if}

                    </td>
                    <td valign="top" style="border-bottom: 1px dotted #ccc;">
                       <div class="action_title" style="float: left; padding-right: 10px;">
                            <a href="{$action.user_url}" class="action_user">{$action.user_nickname}</a>
                            {if $action.message}
                                {$action.message}{if $action.description}:{/if}
                            {else}
                                {if $action.description}
                                    &rarr; {$action.description}
                                {/if}
                            {/if}
                        </div>
                        <div class="act_{$action.name}" style="height: 20px; width: 20px; float: left; padding-bottom: 2px !important;"></div>
                        {if $action.message}
                            {if $action.description}
                                <div class="action_details">{$action.description}</div>
                            {/if}
                        {/if}
                    </td>
                    <td width="100" valign="top" style="border-bottom: 1px dotted #ccc;"><div class="action_date{if $action.is_new} is_new{/if}">{$action.pubdate} {$LANG.BACK}</div></td>
                </tr>
            {/foreach}
        </table>
    </div>
	<div style="clear:both; height:10px;"></div>	
    {if $cfg.show_link}
    <p>
        <a href="/actions" class="mod_act_all">Все лента активности</a>
    </p>
    {/if}
{/if}