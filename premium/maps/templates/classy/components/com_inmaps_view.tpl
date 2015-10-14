{* ================================================================================ *}
{* =================== Cписок [под]рубрик и товаров магазина ====================== *}
{* ================================================================================ *}
<div>
    {if $root_cat.id!=1}
        <div class="floatBar">
            <div class="btn-group">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                    Техническое меню <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    {if $cfg.city_sel != 'none'}
                        <li class="inmapsCity">
                            <a href="javascript:selectCity('{$cfg.city_sel}')" title="{$LANG.MAPS_SELECT_CITY_LINK}">
                                {if $location.city}{$location.city}{else}Все города{/if}
                            </a>
                        </li>
                    {/if}
                    {if $cfg.show_rss}
                        <li class="inmapsRss">
                            <a href="/rss/maps/{$root_cat.id}/feed.rss">
                                RSS
                            </a>
                        </li>
                    {/if}
                    {if $is_can_add}
                        <li class="inmapsAdd">
                            <a href="/maps/add{$root_cat.id}.html">
                                {$LANG.MAPS_ADD_OBJECT}
                            </a>
                        </li>
                    {/if}
                    {if $cfg.events_enabled}
                        <li class="inmapsEvents">
                            <a href="/maps/events/{$root_cat.id}">
                                {$LANG.MAPS_EVENTS}
                            </a>
                        </li>
                    {/if}
                    {if $cfg.news_enabled}
                        <li class="inmapsNews">
                            <a href="/maps/news/{$root_cat.id}">
                                {$LANG.MAPS_NEWS}
                            </a>
                        </li>
                    {/if}
                </ul>
            </div>
        </div>
    {/if}

    <h1 class="con_heading" style="float:left;">{$root_cat.title}</h1>
    <div class="clear"></div>
</div>

{add_css file='components/maps/city_select/nyromodal.css'}
{add_js file='components/maps/city_select/nyromodal.js'}
{add_js file='components/maps/city_select/select.js'}

<div style="clear:both"></div>

{if $root_cat.description}
    <div style="margin-bottom:10px">{$root_cat.description}</div>
{/if}

{if $is_homepage || ($root_cat.id==1 && $cfg.show_map) || ($root_cat.id>1 && $cfg.show_map_in_cats)}
    {if $cfg.show_cats_pos == 'bottom'}
        {include file='com_inmaps_map.tpl'}
    {/if}
{/if}

{if $cfg.show_subcats && $subcats && (!$is_homepage || $cfg.show_homepage=='all')}
    <ul class="maps_cat_list">
        {foreach key=tid item=cat from=$subcats}
            <li class="maps_cat_item" style="background:url(/images/photos/small/{$cat.config.icon}) no-repeat left center;">
                <div class="mapCats">
                    <a class="allProLink" href="/maps/{$cat.seolink}">{$cat.title}</a>
                    {if $cat.subcats && $cfg.show_subcats2}
                        (
                        {foreach key=num item=subcat from=$cat.subcats}
                           <a class="allProSubLink" href="/maps/{$subcat.seolink}">{$subcat.title}</a>{if $num<sizeof($cat.subcats)-1}, {/if}
                        {/foreach}
                        )
                    {/if}
                </div>
                {*{if $cat.subcats && $cfg.show_subcats2}*}
                    {*<div class="subcats">*}
                        {*{foreach key=num item=subcat from=$cat.subcats}*}
                            {*<a href="/maps/{$subcat.seolink}">{$subcat.title}</a>{if $num<sizeof($cat.subcats)-1}, {/if}*}
                        {*{/foreach}*}
                    {*</div>*}
                {*{/if}*}
            </li>
        {/foreach}
    </ul>
{/if}

{if $is_homepage || ($root_cat.id==1 && $cfg.show_map) || ($root_cat.id>1 && $cfg.show_map_in_cats)}
    {if $cfg.show_cats_pos == 'top'}
        {include file='com_inmaps_map.tpl'}
    {/if}
{/if}

{if $items && !$city_has_objects}
    <p style="float:right;padding:4px;padding-left:20px;background:url(/components/maps/images/info.png) no-repeat left center">
        В вашем городе объекты не найдены. Показаны объекты из других городов
    </p>
{/if}

{if $cfg.show_filter && ($items || $filter) && $filter_chars}
<div class="maps_filter_link">
    <a href="javascript:" onclick="$('.maps_filter').toggle()">{$LANG.MAPS_FILTER}</a> {if $filter}Найдено объектов: {$total}{/if}
</div>

    <div class="maps_filter" >

        <div class="filter_body">
            <form action="/maps/{$root_cat.seolink}" method="post">

                <table cellpadding="2" cellspacing="0" border="0" width="100%">
                    {foreach key=tid item=char from=$filter_chars}
                        {if $char.is_filter}
                            <tr>
                                <td colspan="3" style="padding-top:8px;"><strong>{$char.title}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    {if $char.values}
                                        {if $char.is_filter_many}
                                            {foreach key=vid item=val from=$char.values_arr}
                                                <div>
                                                    <label><input type="checkbox" value="{$val|trim}" name="filter[{$char.id}][]" {if in_array(trim($val), $filter[$char.id])}checked="checked"{/if} /> {$val}</label>
                                                </div>
                                            {/foreach}
                                        {else}
                                            <select class="form-control input-sm" name="filter[{$char.id}]" style="width:100%">
                                                <option value="" {if !$filter[$char.id]}selected="selected"{/if}>{$LANG.MAPS_FILTER_ALL}</option>
                                                {foreach key=vid item=val from=$char.values_arr}
                                                    <option value="{$val}" {if trim($filter[$char.id]) == trim($val)}selected="selected"{/if}>{$val}</option>
                                                {/foreach}
                                            </select>
                                        {/if}
                                    {else}
                                        <input type="text" name="filter[{$char.id}]" class="input" value="{$filter[$char.id]}" style="width:99%"/>
                                    {/if}
                                </td>
                            </tr>
                        {/if}
                    {/foreach}
                </table>
                <p>
                    <input type="submit" class="btn btn-default" value="{$LANG.MAPS_FILTER_SUBMIT}" />
                    {if $filter}<input type="button" class="btn btn-default" value="{$LANG.MAPS_FILTER_CANCEL}" onclick="window.location.href='/maps/{$root_cat.seolink}'" />{/if}
                </p>
            </form>
        </div>
    </div>
{/if}

{if $items}
    {include file='com_inmaps_items.tpl'}
{else}
    {if $filter}
        <p>{$LANG.MAPS_ITEMS_NOT_FOUND}</p>
    {/if}
{/if}


{*{if $root_cat.id!=1}*}
    {*<div class="float_bar">*}
        {*{if $cfg.city_sel != 'none'}*}
            {*<div class="inmaps_city">*}
                {*<div>*}
                    {*<a href="javascript:selectCity('{$cfg.city_sel}')" title="{$LANG.MAPS_SELECT_CITY_LINK}">*}
                        {*{if $location.city}{$location.city}{else}Все города{/if}*}
                    {*</a>*}
                {*</div>*}
            {*</div>*}
        {*{/if}*}
        {*{if $cfg.show_rss}*}
            {*<div class="inmaps_rss">*}
                {*<a href="/rss/maps/{$root_cat.id}/feed.rss">RSS</a>*}
            {*</div>*}
        {*{/if}*}
        {*{if $is_can_add}*}
            {*<div class="inmaps_add">*}
                {*<a href="/maps/add{$root_cat.id}.html">{$LANG.MAPS_ADD_OBJECT}</a>*}
            {*</div>*}
        {*{/if}*}
        {*{if $cfg.events_enabled}*}
            {*<div class="inmaps_events">*}
                {*<a href="/maps/events/{$root_cat.id}">{$LANG.MAPS_EVENTS}</a>*}
            {*</div>*}
        {*{/if}*}
        {*{if $cfg.news_enabled}*}
            {*<div class="inmaps_news">*}
                {*<a href="/maps/news/{$root_cat.id}">{$LANG.MAPS_NEWS}</a>*}
            {*</div>*}
        {*{/if}*}
    {*</div>*}
{*{/if}*}

{*<h1 class="con_heading" style="float:left">{$root_cat.title}</h1>*}

{*{add_css file='components/maps/city_select/nyromodal.css'}*}
{*{add_js file='components/maps/city_select/nyromodal.js'}*}
{*{add_js file='components/maps/city_select/select.js'}*}

{*<div style="clear:both"></div>*}

{*{if $root_cat.description}*}
    {*<div style="margin-bottom:10px">{$root_cat.description}</div>*}
{*{/if}*}

{*{if $is_homepage || ($root_cat.id==1 && $cfg.show_map) || ($root_cat.id>1 && $cfg.show_map_in_cats)}*}
    {*{if $cfg.show_cats_pos == 'bottom'}*}
        {*{include file='com_inmaps_map.tpl'}*}
    {*{/if}*}
{*{/if}*}

{*{if $cfg.show_subcats && $subcats && (!$is_homepage || $cfg.show_homepage=='all')}*}
    {*<ul class="maps_cat_list">*}
        {*{foreach key=tid item=cat from=$subcats}*}
            {*<li class="maps_cat_item" style="background:url(/images/photos/small/{$cat.config.icon}) no-repeat left center;">*}
                {*<div class="mapCats">*}
                    {*<a class="allProLink" href="/maps/{$cat.seolink}">{$cat.title}</a>*}
                    {*{if $cat.subcats && $cfg.show_subcats2}*}
                        {*(*}
                        {*{foreach key=num item=subcat from=$cat.subcats}*}
                           {*<a class="allProSubLink" href="/maps/{$subcat.seolink}">{$subcat.title}</a>{if $num<sizeof($cat.subcats)-1}, {/if}*}
                        {*{/foreach}*}
                        {*)*}
                    {*{/if}*}
                {*</div>*}
                {*{if $cat.subcats && $cfg.show_subcats2}*}
                    {*<div class="subcats">*}
                        {*{foreach key=num item=subcat from=$cat.subcats}*}
                            {*<a href="/maps/{$subcat.seolink}">{$subcat.title}</a>{if $num<sizeof($cat.subcats)-1}, {/if}*}
                        {*{/foreach}*}
                    {*</div>*}
                {*{/if}*}
            {*</li>*}
        {*{/foreach}*}
    {*</ul>*}
{*{/if}*}

{*{if $is_homepage || ($root_cat.id==1 && $cfg.show_map) || ($root_cat.id>1 && $cfg.show_map_in_cats)}*}
    {*{if $cfg.show_cats_pos == 'top'}*}
        {*{include file='com_inmaps_map.tpl'}*}
    {*{/if}*}
{*{/if}*}

{*{if $items && !$city_has_objects}*}
    {*<p style="float:right;padding:4px;padding-left:20px;background:url(/components/maps/images/info.png) no-repeat left center">*}
        {*В вашем городе объекты не найдены. Показаны объекты из других городов*}
    {*</p>*}
{*{/if}*}

{*{if $cfg.show_filter && ($items || $filter) && $filter_chars}*}
{*<div class="maps_filter_link">*}
    {*<a href="javascript:" onclick="$('.maps_filter').toggle()">{$LANG.MAPS_FILTER}</a> {if $filter}Найдено объектов: {$total}{/if}*}
{*</div>*}

    {*<div class="maps_filter" >*}

        {*<div class="filter_body">*}
            {*<form action="/maps/{$root_cat.seolink}" method="post">*}

                {*<table cellpadding="2" cellspacing="0" border="0" width="100%">*}
                    {*{foreach key=tid item=char from=$filter_chars}*}
                        {*{if $char.is_filter}*}
                            {*<tr>*}
                                {*<td colspan="3" style="padding-top:8px;"><strong>{$char.title}</strong></td>*}
                            {*</tr>*}
                            {*<tr>*}
                                {*<td colspan="3">*}
                                    {*{if $char.values}*}
                                        {*{if $char.is_filter_many}*}
                                            {*{foreach key=vid item=val from=$char.values_arr}*}
                                                {*<div>*}
                                                    {*<label><input type="checkbox" value="{$val|trim}" name="filter[{$char.id}][]" {if in_array(trim($val), $filter[$char.id])}checked="checked"{/if} /> {$val}</label>*}
                                                {*</div>*}
                                            {*{/foreach}*}
                                        {*{else}*}
                                            {*<select name="filter[{$char.id}]" style="width:100%">*}
                                                {*<option value="" {if !$filter[$char.id]}selected="selected"{/if}>{$LANG.MAPS_FILTER_ALL}</option>*}
                                                {*{foreach key=vid item=val from=$char.values_arr}*}
                                                    {*<option value="{$val}" {if trim($filter[$char.id]) == trim($val)}selected="selected"{/if}>{$val}</option>*}
                                                {*{/foreach}*}
                                            {*</select>*}
                                        {*{/if}*}
                                    {*{else}*}
                                        {*<input type="text" name="filter[{$char.id}]" class="input" value="{$filter[$char.id]}" style="width:99%"/>*}
                                    {*{/if}*}
                                {*</td>*}
                            {*</tr>*}
                        {*{/if}*}
                    {*{/foreach}*}
                {*</table>*}
                {*<p>*}
                    {*<input type="submit" value="{$LANG.MAPS_FILTER_SUBMIT}" />*}
                    {*{if $filter}<input type="button" value="{$LANG.MAPS_FILTER_CANCEL}" onclick="window.location.href='/maps/{$root_cat.seolink}'" />{/if}*}
                {*</p>*}
            {*</form>*}
        {*</div>*}
    {*</div>*}
{*{/if}*}

{*{if $items}*}
    {*{include file='com_inmaps_items.tpl'}*}
{*{else}*}
    {*{if $filter}*}
        {*<p>{$LANG.MAPS_ITEMS_NOT_FOUND}</p>*}
    {*{/if}*}
{*{/if}*}

<script type="text/javascript">
    {literal}
        function openCity(city){
            window.location.href="/components/maps/city_select/set.php?city="+city;
        }
    {/literal}
</script>