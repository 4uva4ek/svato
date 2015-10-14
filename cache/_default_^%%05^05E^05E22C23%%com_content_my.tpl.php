<?php /* Smarty version 2.6.28, created on 2015-07-27 16:20:51
         compiled from com_content_my.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'template', 'com_content_my.tpl', 37, false),)), $this); ?>
<div class="float_bar">
    <a href="/content/add.html" class="usr_article_add"><?php echo $this->_tpl_vars['LANG']['ADD_ARTICLE']; ?>
</a>
</div>

<h1 class="con_heading"><?php echo $this->_tpl_vars['LANG']['MY_ARTICLES']; ?>
 (<?php echo $this->_tpl_vars['total']; ?>
)</h1>

<?php if ($this->_tpl_vars['articles']): ?>
    <?php echo '
		<style type="text/css">
        .art_list {
			border: 1px solid #ccc;
			border-collapse: collapse;
        }
        .art_list thead {
			background: #333;
			color: #fff;
        }
        </style>
    '; ?>


<table width="100%" cellpadding="8" cellspacing="0" border="0" class="art_list">
	<thead>
		<tr class="thead">
			<td width="100"><strong><?php echo $this->_tpl_vars['LANG']['DATE']; ?>
</strong></td>
			<td colspan="2"><strong><?php echo $this->_tpl_vars['LANG']['ARTICLE']; ?>
</strong></td>
			<td width="100" align="center"><strong><?php echo $this->_tpl_vars['LANG']['STATUS']; ?>
</strong></td>
			<td width="16">&nbsp;</td>
			<td width="20">&nbsp;</td>
			<td width="100"><strong><?php echo $this->_tpl_vars['LANG']['CAT']; ?>
</strong></td>
			<td width="70" align="center"><strong><?php echo $this->_tpl_vars['LANG']['ACTION']; ?>
</strong></td>
		</tr>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['article']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['article']['fpubdate']; ?>
</td>
			<td><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/article.png" border="0"></td>
			<td><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></td>
			<td align="center">
            	<?php if ($this->_tpl_vars['article']['published']): ?>
                	<span style="color:green"><?php echo $this->_tpl_vars['LANG']['PUBLISHED']; ?>
</span>
                <?php else: ?>
                	<span style="color:#CC0000"><?php echo $this->_tpl_vars['LANG']['NO_PUBLISHED']; ?>
</span>
                 <?php endif; ?>
            </td>
			<td><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/comments.png" border="0"></td>
			<td><?php echo $this->_tpl_vars['article']['comments']; ?>
</td>
			<td><a href="<?php echo $this->_tpl_vars['article']['cat_url']; ?>
"><?php echo $this->_tpl_vars['article']['cat_title']; ?>
</a></td>
			<td align="center">
				<a href="/content/edit<?php echo $this->_tpl_vars['article']['id']; ?>
.html" title="<?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/edit.png" border="0"/></a>
				<?php if ($this->_tpl_vars['user_can_delete']): ?>
					<a href="/content/delete<?php echo $this->_tpl_vars['article']['id']; ?>
.html" title="<?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/delete.png" border="0"/></a>
				<?php endif; ?>
			</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>

<?php echo $this->_tpl_vars['pagebar']; ?>

<?php echo '
<script type="text/javascript">
$(document).ready(function(){

	zebra();

	function zebra() {
	   $(\'.art_list tr\').not(\'.thead\').removeClass(\'search_row1\').removeClass(\'search_row2\');
	   $(\'.art_list tr:odd\').not(\'.thead\').addClass(\'search_row1\');
	   $(\'.art_list tr:even\').not(\'.thead\').addClass(\'search_row2\');
	}

});
</script>
'; ?>

<?php else: ?>
	<p><?php echo $this->_tpl_vars['LANG']['NO_YOUR_ARTICL_ON_SITE']; ?>
</p>
<?php endif; ?>