<?php /* Smarty version 2.6.28, created on 2015-06-25 16:05:05
         compiled from com_battleways_view.tpl */ ?>

<div class="con_heading"><?php echo $this->_tpl_vars['pagetitle']; ?>
</div>

<div class="faq_send_quest">
    <a href="/battleways/add.html">Додати запис</a>
</div>
<br/><br/>

<?php if ($this->_tpl_vars['is_posts'] == true): ?>

<h3>Список</h3>
	<div class="battleways_entries">
		<?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['post']):
?>
			<div style="padding:10px;border-top:1px solid green;padding:10px;margin:1px;">
			<table width='100%'>
			
			<tr>
			
			<td width='20'><img src='/components/battleways/images/arrow.png' border='0' /></td>
			
			<td width='90'><span style='font-size:11px;color:#333333;'><?php echo $this->_tpl_vars['user_id']['post']['datetime']; ?>
</td>
			
			<td><a href="/battleways/view_battleway<?php echo $this->_tpl_vars['user_id']['post']['id']; ?>
.html"><?php echo $this->_tpl_vars['user_id']['post']['title']; ?>
</a></td>
			
			<td width='100'><a  href="/battleways/edit_battleway<?php echo $this->_tpl_vars['user_id']['post']['id']; ?>
.html">Редагувати</a></td>
			
			<td width='100'><a class="msg_delete" href="/battleways/del<?php echo $this->_tpl_vars['user_id']['post']['id']; ?>
.html" onclick="return confirm('Ви дійсно бажаєте видалити запис?')">Видалити</a></td>
			
			
			</tr>
			
			</table>
			</div>
		<?php endforeach; endif; unset($_from); ?>		
	</div>	

	<?php echo $this->_tpl_vars['pagination']; ?>

<p style="clear:both">	</p>
<?php elseif ($this->_tpl_vars['is_posts'] == false && $this->_tpl_vars['is_posts_view'] == false): ?>
	<p style="clear:both">Записи відсутні</p>
<?php endif; ?>


<?php if ($this->_tpl_vars['is_posts_view'] == true): ?>
<br/>
<a href='/battleways/' style='margin-left:10px;'>Всі записи</a>
<br/>
<div style="border-bottom:1px solid green;padding:10px;border-top:1px solid green;padding:10px;margin:1px;">
<?php echo $this->_tpl_vars['content']; ?>

</div>
<br/><br/>

		<input name="cancel" type="button" onclick="window.history.go(-1)" value="&laquo; назад" />
<?php endif; ?>