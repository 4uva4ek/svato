{* ================================================================================ *}
{* ============================ Просмотр события объекта ========================== *}
{* ================================================================================ *}
<div>
    {if $is_can_edit || ($cfg.events_attend && $is_user)}
        <div class="floatBar">
            <div class="btn-group">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                    Техническое меню <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    {if $cfg.events_attend && $is_user}
                        {if !$event.is_user_attend}
                            <li>
                                <a href="/maps/attend/event/{$event.id}">
                                    {$LANG.MAPS_EVENT_ATTEND}
                                </a>
                            </li>
                        {else}
                            <li>
                                <a href="/maps/unattend/event/{$event.id}">
                                    {$LANG.MAPS_EVENT_UNATTEND}
                                </a>
                            </li>
                        {/if}
                        {if $is_can_edit}
                            <li>
                                <a href="/maps/events/edit{$event.id}.html">
                                    {$LANG.EDIT}
                                </a>
                            </li>
                            <li>
                                <a href="/maps/events/delete{$event.id}.html">
                                    {$LANG.DELETE}
                                </a>
                            </li>
                        {/if}
                    {/if}
                </ul>
            </div>
        </div>
    {/if}
    <h1 class="con_heading" style="float:left;">{$event.title}</h1>
    <div class="clear"></div>
</div>
<div class="objMapBlock">
    <div class="objMapBlockRight">
        <div class="eventTitle">
            <a class="allProLink" href="/maps/{$item.seolink}.html">{$item.title}</a>
        </div>
        <div class="objAdr">
            <div class="addressBlock">
                {$item.map_address}
            </div>
        </div>
        <div class="objMainImage">
            <img src="/images/photos/medium/{$item.filename}" border="0" />
        </div>
        {if $item.contacts.phone || $item.contacts.fax || $item.contacts.url || $item.contacts.email || $item.contacts.icq || $item.contacts.skype}
            <div class="dentoBlock">
                {if $item.contacts.phone}
                    <div class="dentoItem">
                        <div class="dentoItemLeft dentoPhone">
                            {$LANG.MAPS_CONTACTS_PHONE}:
                        </div>
                        <div class="dentoItemRight">
                            {$item.contacts.phone}
                        </div>
                    </div>
                {/if}
                {if $item.addresses}
                    {foreach key=m item=address from=$item.addresses}
                        {if $address.phone}
                            <div class="dentoItem">
                                <div class="dentoItemLeft dentoPhone">
                                    {$LANG.MAPS_CONTACTS_PHONE}:
                                </div>
                                <div class="dentoItemRight">
                                    {$address.phone}
                                    &mdash;
                                    {if $cfg.mode=='world'}
                                        {$address.full}
                                    {else}
                                        {$address.short}
                                    {/if}
                                </div>
                            </div>
                        {/if}
                    {/foreach}
                {/if}
                {if $item.contacts.fax}
                    <div class="dentoItem">
                        <div class="dentoItemLeft dentoFax">
                            {$LANG.MAPS_CONTACTS_FAX}:
                        </div>
                        <div class="dentoItemRight">
                            {$item.contacts.fax}
                        </div>
                    </div>
                {/if}
                {if $item.contacts.url}
                    <div class="dentoItem">
                        <div class="dentoItemLeft  dentoUrl">
                            {$LANG.MAPS_CONTACTS_URL}:
                        </div>
                        <div class="dentoItemRight">
                            <a href="{$item.contacts.url}" target="_blank">{$item.contacts.url_short}</a>
                        </div>
                    </div>
                {/if}
                {if $item.contacts.email}
                    <div class="dentoItem">
                        <div class="dentoItemLeft  dentoMail">
                            {$LANG.MAPS_CONTACTS_EMAIL}:
                        </div>
                        <div class="dentoItemRight">
                            <a href="mailto:{$item.contacts.email}">{$item.contacts.email}</a>
                        </div>
                    </div>
                {/if}
                {if $item.contacts.icq}
                    <div class="dentoItem dentoIcq">
                        <div class="dentoItemLeft">
                            {$LANG.MAPS_CONTACTS_ICQ}:
                        </div>
                        <div class="dentoItemRight">
                            {$item.contacts.icq}
                        </div>
                    </div>
                {/if}
                {if $item.contacts.skype}
                    <div class="dentoItem">
                        <div class="dentoItemLeft dentoSkype">
                            {$LANG.MAPS_CONTACTS_SKYPE}:
                        </div>
                        <div class="dentoItemRight">
                            <a href="skype:{$item.contacts.skype}">{$item.contacts.skype}</a>
                        </div>
                    </div>
                {/if}
            </div>
        {/if}
    </div>
    <div class="objMapBlockLeft">
        <div>
            <ul class="chars_list">
                <li class="grp">
                    Информация о событии
                </li>
                <li>
                    <span class="quest">
                        Сколько ждать:
                    </span>
                    <span class="answer">
                        {if $event.is_today}
                           {$LANG.MAPS_EVENT_TODAY}
                        {/if}
                        {if $event.is_tomorrow}
                            {$LANG.MAPS_EVENT_TOMORROW}
                        {/if}
                        {if $event.days_to_start>1}
                            {$LANG.MAPS_EVENT_DAYS_TO} {$event.days_to_start|spellcount:$LANG.DAY:$LANG.DAY2:$LANG.DAY10}
                        {/if}
                    </span>
                </li>
                <li>
                    <span class="quest">
                        Дата:
                    </span>
                    <span class="answer">
                        {$event.date}
                    </span>
                </li>
                <li>
                    <span class="quest">
                        {$LANG.MAPS_ITEM_ADDED_BY}:
                    </span>
                    <span class="answer">
                        <a href="{profile_url login=$event.user_login}">{$event.user_name}</a>
                    </span>
                </li>
                <li class="grp">
                    Описание события
                </li>
                <li>
                    <div class="normShr">
                        {$event.content}
                    </div>
                </li>
                {if $cfg.events_attend}
                    <li class="grp">
                        {$LANG.MAPS_EVENT_ATTEND_LIST}
                    </li>
                    <li>
                        <div class="list">
                            {if !$event.attend_users}
                                {$LANG.MAPS_EVENT_NO_ATTEND}
                            {else}
                                {foreach key=u item=user from=$event.attend_users}
                                    {$user}
                                {/foreach}
                            {/if}
                        </div>
                    </li>
                {/if}
            </ul>
        </div>
    </div>
</div>
