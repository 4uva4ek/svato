<div class="mod_user_menu">
{if $id}
    <div class="my_profile">
   <a title="Мій профіль" href="{profile_url login=$login}"></a>
    </div>
 
    {if $users_cfg.sw_msg}
    <div  class="my_messages">
        {if $newmsg.total}
            <a title="Повідомлення" class="has_new" href="/users/{$id}/messages{if !$newmsg.messages}-notices{/if}.html" title="{$LANG.NEW_MESSAGES}: {$newmsg.messages}, {$LANG.NEW_NOTICES}: {$newmsg.notices}">
			<span>{$newmsg.total}</span>
			</a>
        {else}
            <a title="Повідомлення" href="/users/{$id}/messages.html"></a>
        {/if}
    </div>
    {/if}
  

    <div  class="logout">
        <a title="Вихід" href="/logout"></a>
    </div>
{else}
    
{/if}
</div>
