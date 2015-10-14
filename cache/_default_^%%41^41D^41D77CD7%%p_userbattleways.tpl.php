<?php /* Smarty version 2.6.28, created on 2015-08-16 13:59:39
         compiled from p_userbattleways.tpl */ ?>
<div class="faq_send_quest">
<a href="/battleways/add.html">Додати запис</a>
</div>
<br/><br/>



<h3>Бойовий шлях</h3>
	<div class="battleways_entries">
<?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['post']):
?>
<div style="padding:10px;border-top:1px solid green;padding:10px;margin:1px;">
<table width='100%'>
<tr class="nnn">
		<td width='20'><img src='/components/battleways/images/arrow.png' border='0' /></td>
		
		<td width='90'><span style='font-size:11px;color:#333333;'><?php echo $this->_tpl_vars['post']['datetime']; ?>
</td>
		
		<td><a href="/battleways/view_battleway<?php echo $this->_tpl_vars['post']['id']; ?>
.html"><?php echo $this->_tpl_vars['post']['title']; ?>
</a></td>
		
		<td width='100'>
		<a  href="/battleways/edit_battleway<?php echo $this->_tpl_vars['post']['id']; ?>
.html">Редагувати</a>
		</td>
		
		<td width='100'>
		<a class="msg_delete" href="/battleways/del<?php echo $this->_tpl_vars['post']['id']; ?>
.html" onclick="return confirm('Ви дійсно бажаєте видалити запис?')">Видалити</a>
		</td>
		
</tr>
</table>
</div>
		<?php endforeach; endif; unset($_from); ?>

<br/>

	</div>	

	<?php echo $this->_tpl_vars['pagination']; ?>

<p style="clear:both">	</p>