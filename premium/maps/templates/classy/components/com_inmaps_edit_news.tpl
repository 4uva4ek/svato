{* ================================================================================ *}
{* ========================== Редактирование новости объекта ====================== *}
{* ================================================================================ *}

<h1 class="con_heading">
    {if $do=='add_news'}{$LANG.MAPS_ADD_NEWS}{else}{$LANG.MAPS_EDIT_NEWS}{/if}
</h1>

<table cellpadding="0" cellspacing="0" width="100%" border="0">
    <Tr>
        <td valign="top">
            <div>
                {if $limit_reach}
                    <p class="news_limit_reach">{$LANG.MAPS_NEWS_LIMIT_REACH}</p>
                    <p>
                        <div>{$LANG.MAPS_NEWS_LIMIT}</div>
                    </p>
                    <p style="margin-top:20px">
                        {if !$limit_reach}
                            <input type="button" name="save" value="{$LANG.SAVE}" onclick="checkForm()" />
                        {/if}
                        <input type="button" name="cancel" value="{$LANG.CANCEL}" onclick="window.history.go(-1)" />
                    </p>
                {else}
                    <form id="news_form" action="/maps/news/submit" method="POST">

                        <input type="hidden" name="id" value="{$id}" />
                        <input type="hidden" name="action" value="{$do}" />
                        <input type="hidden" name="item_id" value="{$item_id}" />

                        <div style="margin-bottom:5px"><strong>{$LANG.MAPS_NEWS_TITLE}</strong>:</div>
                        <div>
                            <input name="title" class="text-input" type="text" id="news_title" style="width:99%" value="{$news.title|escape:'html'}" />
                        </div>

                        <div style="margin-bottom:5px;margin-top: 20px"><strong>{$LANG.MAPS_NEWS_CONTENT}</strong>:</div>
                        <div>
                            {if $cfg.news_html}
                                {wysiwyg name='content' value=$news.content height=300 width='100%' toolbar='Basic'}
                            {else}
                                <textarea name="content" id="news_content" style="width:100%;height:300px">{$news.content}</textarea>
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
                        <strong>{$LANG.MAPS_NEWS_OBJECT}:</strong><br/>
                        <a href="/maps/{$item.seolink}.html">{$item.title}</a>
                    </div>
                    <img src="/images/photos/small/{$item.filename}" border="0" />
                </div>
            </div>
            {if !$limit_reach || $is_admin}
            <div class="side_block">
                <div>{$LANG.MAPS_NEWS_LIMIT}</div>
                {if !$is_admin}
                    <div class="last">{$LANG.MAPS_NEWS_LIMIT_USED}</div>
                {/if}
            </div>
            {/if}
        </td>
    </Tr>
</table>

{if !$limit_reach}
    <script type="text/javascript">
        {literal}
        function checkForm(){
            if ($('input#news_title').val()=='') {
                $('input#news_title').focus();
                alert('Пожалуйста, укажите заголовок новости');
                return false;
            } else {
                $('form#news_form').submit();
            }
        }
        {/literal}
    </script>
{/if}