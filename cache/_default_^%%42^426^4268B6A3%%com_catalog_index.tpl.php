<?php /* Smarty version 2.6.28, created on 2015-06-13 06:39:01
         compiled from com_catalog_index.tpl */ ?>
<?php if ($this->_tpl_vars['cfg']['is_rss']): ?>
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td><h1 class="con_heading"><?php echo $this->_tpl_vars['title']; ?>
</h1></td>
			<td valign="top" style="padding-left:6px">
                <div class="con_rss_icon">
                    <a href="/rss/catalog/all/feed.rss" title="<?php echo $this->_tpl_vars['LANG']['RSS']; ?>
"><img src="/images/markers/rssfeed.png" border="0" alt="<?php echo $this->_tpl_vars['LANG']['RSS']; ?>
"/></a>
                </div>
			</td>
		</tr>
	</table>
<?php else: ?>
	<h1 class="con_heading"><?php echo $this->_tpl_vars['title']; ?>
</h1>
<?php endif; ?>

<?php if ($this->_tpl_vars['cats_html']): ?>
    <?php echo $this->_tpl_vars['cats_html']; ?>

<?php else: ?>
    <?php echo $this->_tpl_vars['LANG']['NO_CAT_IN_CATALOG']; ?>

<?php endif; ?>