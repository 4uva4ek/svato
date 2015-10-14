{if $cfg.news_enabled}
    {add_js file='includes/jquery/tabs/jquery.ui.min.js'}
    {*{add_css file='includes/jquery/tabs/tabs.css'}*}
    {literal}
        <script type="text/javascript">
            $(document).ready(function(){
                $("#itemtabs").tabs();
                $(".dentoTabs").tabs();
            });
        </script>
    {/literal}
{/if}
<div>
    <div class="floatBar">
        <div class="btn-group">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                Техническое меню <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                    {if $item.can_edit}
                        <li>
                            <a href="/maps/edit{$item.category_id}-{$item.id}.html">
                                {$LANG.EDIT}
                            </a>
                        </li>
                        {if !$item.on_moderate && $cfg.news_enabled}
                            <li>
                                <a href="/maps/news/{$item.id}/add.html">
                                    {$LANG.MAPS_ADD_NEWS}
                                </a>
                            </li>
                        {/if}
                    {/if}
                    {if $item.can_add_events && !$item.on_moderate && $cfg.events_enabled}
                        <li>
                            <a href="/maps/events/{$item.id}/add.html">
                                {$LANG.MAPS_ADD_EVENT}
                            </a>
                        </li>
                    {/if}
                    {if $item.on_moderate && $is_admin}
                        <li>
                            <a href="/maps/accept{$item.id}.html">
                                {$LANG.MAPS_ACCEPT}
                            </a>
                        </li>
                        <li>
                            <a href="/maps/delete{$item.id}.html">
                                {$LANG.DELETE}
                            </a>
                        </li>
                    {/if}
                    {if $cfg.items_abuses && !$item.is_user_abused}
                        <li>
                            <a href="/maps/abuse{$item.id}.html">{$LANG.MAPS_ITEM_ABUSE}</a>
                        </li>
                    {/if}

                    {if $cfg.items_embed}
                        <li>
                            <a href="/maps/embed-code/{$item.id}">{$LANG.MAPS_ITEM_EMBED}</a>
                        </li>
                    {/if}
            </ul>
        </div>
    </div>
    <h1 class="con_heading" style="float:left;">{$item.title}</h1>
    <div class="clear"></div>
</div>
<div class="objMapBlock">
    <div class="objMapBlockRight">
        <div class="objMainImage">
            <img src="/images/photos/medium/{$item.filename}" border="0" />
        </div>
        {if $item.images}
            <div class="trioImage">
                {foreach key=num item=file from=$item.images}
                    <a href="/images/photos/medium/{$file}" class="lightbox-enabled" rel="lightbox-galery" title="{$item.title|htmlspecialchars} ({$LANG.MAPS_PHOTO} {$num+1})">
                        <img src="/images/photos/small/{$file}" border="0" width="110">
                    </a>
                {/foreach}
            </div>
        {/if}
        {if sizeof($item.addresses) > 1}
            <div class="objSelect">
                <select class="form-control" id="map_marker" onchange="changeMap()">
                    {foreach key=addr_id item=address from=$item.addresses}
                        <option value="{$address.lat}|{$address.lng}" {if $addr_id==$item.current_marker.id}selected="selected"{/if}>{$address.short}</option>
                    {/foreach}
                </select>
            </div>
        {/if}
        <div class="objMapYa">
            <div id="map_wrapper" style="z-index: 199">
                <div id="citypanel">
                    <div id="fullscreen_link">
                        <a href="#" onclick="toggleMapSize('#placemap')" class="maximize_button">На весь экран</a>
                    </div>
                </div>
                <div id="placemap"></div>
            </div>
        </div>

    </div>
    <div class="objMapBlockLeft">
        {if $item.on_moderate}
            <div class="onModerate">{$LANG.MSG_ITEM_PENDING}</div>
        {/if}
        <div class="objAdr">
            {if $item.addresses}
                {foreach key=m item=address from=$item.addresses}
                    <div class="addressBlock">
                        <span>
                            {if $cfg.mode=='world'}
                                {$address.full}
                            {else}
                                {$address.short}
                            {/if}
                        </span>
                    </div>
                {/foreach}
            {else}
                <div class="addressBlock">
                    <span>
                        {if $cfg.mode=='world'}
                            {$item.map_address}
                        {else}
                            {$item.address}
                        {/if}
                    </span>
                </div>
            {/if}
        </div>

        {if $item.on_moderate}
            <p style="color:red; margin:15px 0">{$LANG.MSG_ITEM_PENDING}</p>
        {/if}

        {if $cfg.ratings}
            {add_js file='components/maps/js/rating/jquery.MetaData.js'}
            {add_js file='components/maps/js/rating/jquery.rating.js'}
            {add_css file='components/maps/js/rating/jquery.rating.css'}
            <div class="objItRat">
                <form action="/maps/rate" method="POST">
                    <input type="hidden" name="item_id" value="{$item.id}" />
                    {section name=rate start=1 loop=6 step=1}
                        <input name="rate" type="radio" class="star" value="{$smarty.section.rate.index}" {if $item.rating>=$smarty.section.rate.index}checked="checked"{/if} {if !$is_user || $item.user_voted}disabled="disabled"{/if} />
                    {/section}
                </form>
                {if $item.rating}
                    &nbsp;<small>Оценка: {$item.rating} / <span style="color:gray">{$item.rating_votes|spellcount:$LANG.MAPS_VOTES:$LANG.MAPS_VOTES2:$LANG.MAPS_VOTES10}</span></small>
                {/if}
            </div>
        {/if}
        <div class="dentoBlock">
            {if $cfg.show_user}
                <div class="dentoItem">
                    <div class="dentoItemLeft dentoUser">
                        {$LANG.MAPS_ITEM_ADDED_BY}:
                    </div>
                    <div class="dentoItemRight">
                        <a href="{profile_url login=$item.user_login}">{$item.user_name}</a>
                    </div>
                </div>
            {/if}
            {if $cfg.show_cats}
                <div class="dentoItem">
                    <div class="dentoItemLeft dentoCat">
                        {$LANG.MAPS_ITEM_CATS}:
                    </div>
                    <div class="dentoItemRight">
                        {foreach key=num item=cat from=$item.cats}
                            <a href="/maps/{$item.cats_data[$num].seolink}">{$item.cats_data[$num].title}</a>{if $num<sizeof($item.cats)-1}, {/if}
                        {/foreach}
                    </div>
                </div>
            {/if}
            {if $cfg.show_vendors && $item.vendor}
                <div class="dentoItem">
                    <div class="dentoItemLeft dentoVendor">
                        {$LANG.MAPS_ITEM_VENDOR}:
                    </div>
                    <div class="dentoItemRight">
                        <a href="/maps/vendors/{$item.vendor_id}">{$item.vendor}</a>
                    </div>
                </div>
            {/if}
            <div style="height: 10px;"></div>
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
        <div class="dentoTabs">

            {if $cfg.news_enabled || $cfg.events_enabled}
                <ul id="tabs">
                    {if $cfg.show_full_desc}
                        <li><a href="#tab_desc"><span>{$LANG.MAPS_TAB_DESC}</span></a></li>
                    {/if}
                    {if $cfg.news_enabled && $item.news}
                        <li><a href="#tab_news"><span>{$LANG.MAPS_TAB_NEWS}</span></a></li>
                    {/if}
                    {if $cfg.events_enabled && $item.events}
                        <li><a href="#tab_events"><span>{$LANG.MAPS_TAB_EVENTS}</span></a></li>
                    {/if}
                </ul>
            {/if}

            {if $cfg.show_full_desc}
                <div id="tab_desc">
                    <div class="dentoDesc">{$item.description}</div>
                    {if $item.chars || $cfg.items_attend}
                        {assign var=last_grp value=""}
                        <ul class="chars_list">
                            {if $item.chars}
                                {foreach key=num item=char from=$item.chars}
                                    {if $cfg.show_char_grp}
                                        {if $char.fieldgroup && ($char.fieldgroup!=$last_grp)}
                                            <li class="grp">{$char.fieldgroup}</li>
                                        {/if}
                                        {assign var=last_grp value=$char.fieldgroup}
                                    {/if}
                                    {if $char.value}
                                        <li><span class="quest">{$char.title}:</span> <span class="answer">{$char.value}</span></li>
                                    {/if}
                                {/foreach}
                            {/if}
                            {if $cfg.items_attend}
                                <li class="grp">{$LANG.MAPS_ITEM_ATTEND_LIST}</li>
                                {if !$item.attend_users}
                                    <li>{$LANG.MAPS_ITEM_NO_ATTEND}</li>
                                {else}
                                    <li>
                                        {foreach key=u item=user from=$item.attend_users}
                                            {$user}
                                        {/foreach}
                                    </li>
                                {/if}
                                {if $is_user}
                                    <li class="grp">
                                        {if !$item.is_user_attend}
                                            <input type="button" class="btn btn-default" id="attend" onclick="window.location.href='/maps/attend/item/{$item.id}'" value="{$LANG.MAPS_ITEM_ATTEND}" />
                                        {else}
                                            <input type="button" class="btn btn-default" id="unattend" onclick="window.location.href='/maps/unattend/item/{$item.id}'" value="{$LANG.MAPS_ITEM_UNATTEND}" />
                                        {/if}
                                    </li>
                                {/if}
                            {/if}
                        </ul>
                    {/if}
                </div>
            {/if}

            {if $cfg.news_enabled}
                {if $item.news}
                    <div id="tab_news">
                        <div class="modEvBlock">
                            {foreach key=n item=news from=$item.news}
                                <div class="modEvItem">
                                    <div class="modEvElse modEvElse1">
                                        <div class="evElseDate">
                                            {$news.pubdate}
                                        </div>
                                        <div class="evElseLink">
                                            <a class="allProLink" href="/maps/news/{$news.id}.html">{$news.title}</a>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                            <div class="workLinkBlock">
                                <a class="workLink" href="/maps/news-by/{$item.id}">{$LANG.MAPS_NEWS_ARCHIVE}</a>
                            </div>
                        </div>
                    </div>
                {/if}
            {/if}

            {if $cfg.events_enabled}
                {if $item.events}
                    <div id="tab_events">
                        <div class="modEvBlock">
                            {foreach key=n item=event from=$item.events}
                                <div class="modEvItem">
                                    <div class="modEvElse modEvElse2">
                                        <div class="evElseDate">
                                            {if $event.is_today}<span class="today">{$LANG.MAPS_EVENT_TODAY}</span> {/if}
                                            {if $event.is_tomorrow}<span class="tomorrow">{$LANG.MAPS_EVENT_TOMORROW}</span> {/if}
                                            {if $event.days_to_start>1}  <span class="days_to">{$LANG.MAPS_EVENT_DAYS_TO} {$event.days_to_start|spellcount:$LANG.DAY:$LANG.DAY2:$LANG.DAY10}</span>{/if}
                                            , продолжительность события: {$event.date}
                                        </div>
                                        <div class="evElseLink">
                                            <a class="allProLink" href="/maps/news/{$event.id}.html">{$event.title}</a>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                            <div class="workLinkBlock">
                                <a class="workLink" href="/maps/events-by/{$item.id}">{$LANG.MAPS_EVENTS_ARCHIVE}</a>
                            </div>
                        </div>
                    </div>
                {/if}
            {/if}
        </div>
    </div>
</div>
<script type="text/javascript">

    var options = {literal}{{/literal}
            zoom_min: {$cfg.zoom_min},
            zoom_max: {$cfg.zoom_max},
            map_type: '{$cfg.minimap_type}',
            zoom: '{$cfg.zoom_minimap}'
    {literal}}{/literal};

    {literal}
        $(document).ready(function(){
    {/literal}
            initPlaceMapXY('{$item.current_marker.lng}', '{$item.current_marker.lat}', "{$item.title|escape:'html'}", options);
    {literal}
        });
    {/literal}

    {literal}
    function changeMap(){
        var coords = $('#map_marker').val();
    {/literal}

        latlng = coords.split('|');
        initPlaceMapXY(latlng[1], latlng[0], "{$item.title|escape:'html'}", options);

    {literal}
    }
    {/literal}

    {if $cfg.ratings}
        {literal}
            $('.star').rating({
                callback: function(value, link){
                    this.form.submit();
                }
            });
        {/literal}
    {/if}

</script>