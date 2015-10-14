{* ================================================================================ *}
{* ============================ Просмотр новости объекта ========================== *}
{* ================================================================================ *}

<div>
    {if $is_can_edit}
        <div class="floatBar">
            <div class="btn-group">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                    Техническое меню <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/maps/news/edit{$news.id}.html">
                            {$LANG.EDIT}
                        </a>
                    </li>
                    <li>
                        <a href="/maps/news/delete{$news.id}.html">
                            {$LANG.DELETE}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    {/if}
    <h1 class="con_heading" style="float:left;">{$news.title}</h1>
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
                    Информация о новости
                </li>
                <li>
                    <span class="quest">
                        Дата:
                    </span>
                    <span class="answer">
                        {$news.pubdate}
                    </span>
                </li>
                <li class="grp">
                    Описание новости
                </li>
                <li>
                    <div class="normShr">
                        {$news.content}
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


