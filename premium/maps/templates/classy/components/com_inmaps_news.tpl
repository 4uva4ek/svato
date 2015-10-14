
<div>
    <div class="floatBar">
        <select name="cat_id" class="form-control input-sm" onchange="window.location.href='/maps/news/'+$(this).val()">
            <option value="all" {if $cat_id=='all'}selected="selected"{/if}>{$LANG.MAPS_ALL_CATS}</option>
            {foreach key=i item=c from=$cats}
                <option value="{$c.id}" {if $cat_id==$c.id}selected="selected"{/if}>
                    {math equation="(x-1) * 3" x=$c.NSLevel assign="pad"}
                    {'-'|str_repeat:$pad} {$c.title}
                </option>
            {/foreach}
        </select>
    </div>
    <h1 class="con_heading" style="float:left;">
        {if !$item && !$cat}{$LANG.MAPS_NEWS_ALL}{/if}
        {if $item}{$item.title}: {$LANG.MAPS_NEWS}{/if}
        {if $cat}{$cat.title}: {$LANG.MAPS_NEWS}{/if}
    </h1>
    <div class="clear"></div>
</div>

{if $items}
    <div class="modEvBlock">
        {foreach key=n item=news from=$items}
            <div class="modEvItem modEvItem1">
                <div class="modEvItemImage">
                    <a href="/maps/{$news.obj_seolink}.html#tab_news" title="{$news.obj_title|escape:'html'}">
                        <img src="/images/photos/small/{$news.filename}" width="70" border="0" />
                    </a>
                </div>
                <div class="modEvElse">
                    <div class="evElseDate">
                        Дата публикации: {$news.pubdate},
                        объект: <a href="/maps/{$news.obj_seolink}.html#tab_news" title="{$news.obj_title|escape:'html'}">{$news.obj_title|escape:'html'}</a>
                    </div>
                    <div class="evElseLink">
                        <a class="allProLink" href="/maps/news/{$news.id}.html">{$news.title}</a>
                    </div>
                </div>
            </div>
        {/foreach}
        {if $pagebar}
            <div>
                {$pagebar}
            </div>
        {/if}
    </div>
{else}
    <div class="allProText">{$LANG.MAPS_NO_NEWS}</div>
{/if}