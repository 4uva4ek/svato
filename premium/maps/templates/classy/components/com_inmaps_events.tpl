{add_js file='components/maps/js/ui.js'}
{add_js file='components/maps/js/ui.datepicker.js'}
{add_css file='components/maps/js/ui.css'}

<div>
    <div class="floatBar">
        <select name="cat_id" class="form-control input-sm" onchange="window.location.href='/maps/events/'+$(this).val()">
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
        {if !$item && !$cat}{$LANG.MAPS_EVENTS_ALL}{/if}
        {if $item}{$item.title}: {$LANG.MAPS_EVENTS}{/if}
        {if $cat}{$cat.title}: {$LANG.MAPS_EVENTS}{/if}
    </h1>
    <div class="clear"></div>
</div>

{if $items}
    <div class="modEvBlock">
        <div class="comDatePicker">
            <form class="form-inline" action="{if !$item}/maps/events/{$cat_id}{else}/maps/events-by/{$item.id}{/if}" method="post">
                <span style="margin-right:15px">События за период:</span>
                <input name="date_start" class="form-control" type="text" id="event_date_start" style="width:100px" value="{$date_start|escape:'html'}" />
                <span class="mbdash">&mdash;</span>
                <input name="date_end" class="form-control" type="text" id="event_date_end" style="width:100px" value="{$date_end|escape:'html'}" />
                <input type="submit" class="btn btn-default" name="submit" value="Показать" />
            </form>
        </div>
        {foreach key=n item=event from=$items}
            <div class="modEvItem modEvItem1">
                <div class="modEvItemImage">
                    <a href="/maps/{$event.obj_seolink}.html#tab_events" title="{$event.obj_title|escape:'html'}">
                        <img src="/images/photos/small/{$event.filename}" width="70" border="0" />
                    </a>
                </div>
                <div class="modEvElse">
                    <div class="evElseDate">
                        {if $event.is_today}<span class="today">{$LANG.MAPS_EVENT_TODAY}</span> {/if}
                        {if $event.is_tomorrow}<span class="tomorrow">{$LANG.MAPS_EVENT_TOMORROW}</span> {/if}
                        {if $event.days_to_start>1}<span class="days_to">{$LANG.MAPS_EVENT_DAYS_TO} {$event.days_to_start|spellcount:$LANG.DAY:$LANG.DAY2:$LANG.DAY10}</span>{/if},
                        продолжительность события: {$event.date},
                        место проведения: <a href="/maps/{$event.obj_seolink}.html#tab_events" title="{$event.obj_title|escape:'html'}">{$event.obj_title|escape:'html'}</a>
                    </div>
                    <div class="evElseLink">
                        <a class="allProLink" href="/maps/events/{$event.id}.html">{$event.title}</a>
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
    <div class="allProText">Нет объектов для отображения</div>
{/if}
