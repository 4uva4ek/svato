<?php /* Smarty version 2.6.28, created on 2015-05-19 20:42:05
         compiled from p_usertab.tpl */ ?>
<?php if ($this->_tpl_vars['total']): ?>
	<table class="contentlist" cellspacing="2" border="0" width="">
		<tr>
		<div class="float_bar">
		<a class="usr_article_add" href="/content/add.html">Додати статтю</a>
		</div>
		 </tr>
		<?php $_from = $this->_tpl_vars['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['article']):
?>
	
            <tr>
                <td width="20">
                    <img src="/images/markers/article.png" border="0" class="con_icon"/>
                </td>
                <td>
                    <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="con_titlelink"><?php echo $this->_tpl_vars['article']['title']; ?>
</a>
                </td>
            </tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php else: ?>
	<p><?php echo $this->_tpl_vars['LANG']['PU_USER_NO_ADD_ART']; ?>
</p>
	<table class="contentlist" cellspacing="2" border="0" width="">
		<tr>
		<div class="float_bar">
		<a class="usr_article_add" href="/content/add.html">Додати статтю</a>
		</div>
		 </tr>

	</table>
<?php endif; ?>