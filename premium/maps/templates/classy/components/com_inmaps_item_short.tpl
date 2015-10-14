<div style="display:block">
<table cellpadding="0" cellspacing="0" border="0" class="maps_item_short" style="">
    <tr>
        <td valign="top" class="image_td">
            <div class="image">
                <a href="/maps/{$item.seolink}.html" target="_top">
                    <img src="/images/photos/small/{$item.filename}" border="0" />
                </a>
            </div>
        </td>
        <td valign="top" class="details_td">
            <div class="details">
                <div class="category">
                    <a href="/maps/{$item.category.seolink}" target="_top">{$item.category.title}</a>
                </div>
                <div class="title">
                    <a href="/maps/{$item.seolink}.html" target="_top">{$item.title}</a>
                </div>
                {if $item.address}
                <div class="address">
                    <span>{$item.address}</span>
                </div>
                {/if}

                {if $item.contacts.phone || $item.contacts.fax || $item.contacts.url || $item.contacts.email || $item.contacts.icq || $item.contacts.skype}
                    <div class="contacts">
                        {if $item.contacts.phone}<span class="phone">{$item.contacts.phone}</span>{/if}
                        {if $item.contacts.fax}<span class="fax">{$item.contacts.fax}</span>{/if}
                        {if $item.contacts.url}<span class="url"><a href="{$item.contacts.url}" target="_blank">{$item.contacts.url_short}</a></span>{/if}
                        {if $item.contacts.email}<span class="email"><a href="mailto:{$item.contacts.email}">{$item.contacts.email}</a></span>{/if}
                        {if $item.contacts.icq}<span class="icq">{$item.contacts.icq}</span>{/if}
                        {if $item.contacts.skype}<span class="skype"><a href="skype:{$item.contacts.skype}">{$item.contacts.skype}</a></span>{/if}
                    </div>
                {/if}
            </div>
        </td>
    </tr>
</table>

<div class="details_td">

    <div class="desc">{$item.shortdesc}</div>

    <div class="details_links">
        {if $cfg.comments}
            <div class="comments">
                <a href="/maps/{$item.seolink}.html#c" target="_top">
                    {$item.comments|spellcount:$LANG.COMMENT:$LANG.COMMENT2:$LANG.COMMENT10}
                </a>
            </div>
        {/if}

        {if $cfg.news_enabled}
            {if $news_count}
                <div class="news">
                    <a href="/maps/{$item.seolink}.html#tab_news" target="_top">
                        {$LANG.MAPS_NEWS}
                    </a>
                </div>
            {/if}
        {/if}

        {if $cfg.events_enabled}
            {if $events_count}
                <div class="events">
                    <a href="/maps/{$item.seolink}.html#tab_events" target="_top">
                        {$LANG.MAPS_EVENTS}
                    </a>
                </div>
            {/if}
        {/if}
    </div>

</div>

</div>
