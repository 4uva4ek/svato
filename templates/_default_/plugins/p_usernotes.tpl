<div class="faq_send_quest">
    <a href="/notes/add.html">Добавить запись</a>
</div>
<br/><br/>
{* ============================== Список записей  ================================ *}

{if $is_posts==true}
{literal}
<style>
.nnn:hover {background-color:#f5ffe8;}
</style>
{/literal}

<div style="border-bottom:1px solid green;padding:10px;border-top:1px solid green;padding:10px;margin:1px;">
<a href='/notes/' style='background: green;border-radius: 3px;color: #ffffff;display: inline-block;height: 19px;margin: -3px 0px 0px;outline: #FFFFFF 0px;padding: 1px 4px;text-decoration: none;text-indent: 0px;vertical-align: middle;white-space: nowrap;'>&nbsp;Все метки:&nbsp;</a>

{$mark}

</div>



<h3>Список</h3>
	<div class="notes_entries">
		{foreach key=tid item=post from=$posts}
<div style="border-bottom:1px solid green;padding:10px;border-top:1px solid green;padding:10px;margin:1px;">
<table width='100%'>
<tr class="nnn">
<td width='20'><img src='/components/notes/images/arrow.png' border='0' /><td width='90'><span style='font-size:11px;color:#333333;'>{$post.datetime}</td><td  >{$post.status} <a href="/notes/view_note{$post.id}.html">{$post.title}</a></td><td width='100'><a class="msg_delete" href="/notes/del{$post.id}.html" onclick="return confirm('Вы действительно хотите удалить запись?')">удалить</a></td>
</tr>
</table>
</div>
		{/foreach}

<br/>
<a href="/notes/">&raquo; Все записи</a>
		
	</div>	

	{$pagination}
<p style="clear:both">	</p>
{elseif  $is_posts==false and $is_posts_view==false}
	<p style="clear:both">Нет записей</p>
{/if}