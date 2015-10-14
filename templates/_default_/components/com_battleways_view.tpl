{* ================================================================================ *}
{* ========================= Просмотр записей ===================================== *}
{* ================================================================================ *}

<div class="con_heading">{$pagetitle}</div>

<div class="faq_send_quest">
    <a href="/battleways/add.html">Додати запис</a>
</div>
<br/><br/>
{* ============================== Список записей  ================================ *}

{if $is_posts==true}

<h3>Список</h3>
	<div class="battleways_entries">
		{foreach key=tid item=post from=$posts}
			<div style="padding:10px;border-top:1px solid green;padding:10px;margin:1px;">
			<table width='100%'>
			
			<tr>
			
			<td width='20'><img src='/components/battleways/images/arrow.png' border='0' /></td>
			
			<td width='90'><span style='font-size:11px;color:#333333;'>{$user_id.post.datetime}</td>
			
			<td><a href="/battleways/view_battleway{$user_id.post.id}.html">{$user_id.post.title}</a></td>
			
			<td width='100'><a  href="/battleways/edit_battleway{$user_id.post.id}.html">Редагувати</a></td>
			
			<td width='100'><a class="msg_delete" href="/battleways/del{$user_id.post.id}.html" onclick="return confirm('Ви дійсно бажаєте видалити запис?')">Видалити</a></td>
			
			
			</tr>
			
			</table>
			</div>
		{/foreach}		
	</div>	

	{$pagination}
<p style="clear:both">	</p>
{elseif  $is_posts==false and $is_posts_view==false}
	<p style="clear:both">Записи відсутні</p>
{/if}


{if $is_posts_view==true}
<br/>
<a href='/battleways/' style='margin-left:10px;'>Всі записи</a>
<br/>
<div style="border-bottom:1px solid green;padding:10px;border-top:1px solid green;padding:10px;margin:1px;">
{$content}
</div>
<br/><br/>

		<input name="cancel" type="button" onclick="window.history.go(-1)" value="&laquo; назад" />
{/if}