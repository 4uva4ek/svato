<div class="faq_send_quest">
<a href="/battleways/add.html">Додати запис</a>
</div>
<br/><br/>
{* {if $is_posts==true } ============================== Список записей в закладке  {elseif  $is_posts==false and $is_posts_view==false}
	<p style="clear:both">Записи відсутні</p>
{/if}================================ *}



<h3>Бойовий шлях</h3>
	<div class="battleways_entries">
{foreach key=id item=post from=$posts}
<div style="padding:10px;border-top:1px solid green;padding:10px;margin:1px;">
<table width='100%'>
<tr class="nnn">
		<td width='20'><img src='/components/battleways/images/arrow.png' border='0' /></td>
		
		<td width='90'><span style='font-size:11px;color:#333333;'>{$post.datetime}</td>
		
		<td><a href="/battleways/view_battleway{$post.id}.html">{$post.title}</a></td>
		
		<td width='100'>
		<a  href="/battleways/edit_battleway{$post.id}.html">Редагувати</a>
		</td>
		
		<td width='100'>
		<a class="msg_delete" href="/battleways/del{$post.id}.html" onclick="return confirm('Ви дійсно бажаєте видалити запис?')">Видалити</a>
		</td>
		
</tr>
</table>
</div>
		{/foreach}

<br/>

	</div>	

	{$pagination}
<p style="clear:both">	</p>
