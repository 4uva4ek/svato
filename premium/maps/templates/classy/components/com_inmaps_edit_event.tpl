{* ================================================================================ *}
{* ========================== Редактирование события объекта ====================== *}
{* ================================================================================ *}

{add_js file='components/maps/js/ui.js}
{add_js file='components/maps/js/ui.datepicker.js}
{add_css file='components/maps/js/ui.css}


<h1 class="con_heading">
    {if $do=='add_event'}{$LANG.MAPS_ADD_EVENT}{else}{$LANG.MAPS_EDIT_EVENT}{/if}
</h1>

<table cellpadding="0" cellspacing="0" width="100%" border="0">
    <Tr>
        <td valign="top">
            <div>
                {if $limit_reach}
                    <p class="news_limit_reach">{$LANG.MAPS_EVENTS_LIMIT_REACH}</p>
                    <p>
                        <div>{$LANG.MAPS_EVENTS_LIMIT}</div>
                    </p>
                    <p style="margin-top:20px">
                        {if !$limit_reach}
                            <input type="button" name="save" value="{$LANG.SAVE}" onclick="checkForm()" />
                        {/if}
                        <input type="button" name="cancel" value="{$LANG.CANCEL}" onclick="window.history.go(-1)" />
                    </p>
                {else}
                    <form id="event_form" action="/maps/events/submit" method="POST">

                        <input type="hidden" name="id" value="{$id}" />
                        <input type="hidden" name="action" value="{$do}" />
                        <input type="hidden" name="item_id" value="{$item_id}" />

                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <tr>
                                <td>
                                    <div style="margin-bottom:5px"><strong>{$LANG.MAPS_EVENT_TITLE}</strong>:</div>
                                    <div>
                                        <input name="title" class="text-input" type="text" id="event_title" style="width:99%" value="{$event.title|escape:'html'}" />
                                    </div>
                                </td>
                                <td width="150">
                                    <div style="margin-bottom:5px"><strong>{$LANG.MAPS_EVENT_DATE_START}</strong>:</div>
                                    <div>
                                        <input name="date_start" class="text-input" type="text" id="event_date_start" style="width:140px" value="{if $do=='add_event'}{php}echo date('d.m.Y');{/php}{else}{$event.date_start|escape:'html'}{/if}" />
                                    </div>
                                </td>
                                <td width="140">
                                    <div style="margin-bottom:5px"><strong>{$LANG.MAPS_EVENT_DATE_END}</strong>:</div>
                                    <div>
                                        <input name="date_end" class="text-input" type="text" id="event_date_end" style="width:140px" value="{$event.date_end|escape:'html'}" />
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                        </table>

                        <div style="margin-bottom:5px;margin-top: 20px"><strong>{$LANG.MAPS_EVENT_CONTENT}</strong>:</div>
                        <div>
                            {if $cfg.news_html}
                                {wysiwyg name='content' value=$event.content height=300 width='100%' toolbar='Basic'}
                            {else}
                                <textarea name="content" id="news_content" style="width:100%;height:300px">{$event.content}</textarea>
                            {/if}
                        </div>

                        <p style="margin-top:20px">
                            <input type="button" name="save" value="{$LANG.SAVE}" onclick="checkForm()" />
                            <input type="button" name="cancel" value="{$LANG.CANCEL}" onclick="window.history.go(-1)" />
                        </p>

                    </form>
                {/if}
            </div>
        </td>
        <td valign="top" width="250">
            <div class="side_block">
                <div>
                    <div>
                        <strong>{$LANG.MAPS_EVENT_OBJECT}:</strong><br/>
                        <a href="/maps/{$item.seolink}.html">{$item.title}</a>
                    </div>
                    <img src="/images/photos/small/{$item.filename}" border="0" />
                </div>
            </div>
            {if !$limit_reach || $is_admin}
            <div class="side_block">
                <div>{$LANG.MAPS_EVENTS_LIMIT}</div>
                {if !$is_admin}
                    <div class="last">{$LANG.MAPS_EVENTS_LIMIT_USED}</div>
                {/if}
            </div>
            {/if}
        </td>
    </Tr>
</table>

{if !$limit_reach}
    <script type="text/javascript">
        {literal}
        $(document).ready(function(){
            var datePickerOptions = {showStatus: true, showOn: "focus"};
            $('#event_date_start').datepicker(datePickerOptions);
            $('#event_date_end').datepicker(datePickerOptions);
        });

        function checkForm(){
            if ($('input#event_title').val()=='') {
                $('input#event_title').focus();
                alert('Пожалуйста, укажите заголовок события');
                return false;
            } else {
                if ($('input#event_date_start').val()==''){
                    $('input#event_title').focus();
                    alert('Пожалуйста, укажите дату проведения события');
                    return false;
                } else {
                    $('form#event_form').submit();
                }
            }
        }
        {/literal}
    </script>
{/if}