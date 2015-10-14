<?php /* Smarty version 2.6.28, created on 2015-05-19 16:11:30
         compiled from com_blog_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'rating', 'com_blog_view.tpl', 3, false),array('modifier', 'nl2br', 'com_blog_view.tpl', 108, false),array('modifier', 'spellcount', 'com_blog_view.tpl', 130, false),array('function', 'component', 'com_blog_view.tpl', 4, false),array('function', 'template', 'com_blog_view.tpl', 5, false),array('function', 'csrf_token', 'com_blog_view.tpl', 59, false),array('function', 'profile_url', 'com_blog_view.tpl', 126, false),)), $this); ?>
<div class="con_rss_icon">
    <span class="blog_entry_date"><?php echo $this->_tpl_vars['blog']['pubdate']; ?>
</span>
    <span class="post_karma"><?php echo ((is_array($_tmp=$this->_tpl_vars['blog']['rating'])) ? $this->_run_mod_handler('rating', true, $_tmp) : smarty_modifier_rating($_tmp)); ?>
</span>
    <a href="/rss/<?php echo cmsSmartyCurrentComponent(array(), $this);?>
/<?php echo $this->_tpl_vars['blog']['id']; ?>
/feed.rss" title="<?php echo $this->_tpl_vars['LANG']['RSS']; ?>
">
        <?php echo $this->_tpl_vars['LANG']['RSS']; ?>
 <img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/rss.png" border="0" alt="<?php echo $this->_tpl_vars['LANG']['RSS']; ?>
"/>
    </a>
</div>
<h1 class="con_heading"><?php echo $this->_tpl_vars['blog']['title']; ?>
</h1>

<?php if (! $this->_tpl_vars['myblog']): ?>
	<?php if ($this->_tpl_vars['blog']['ownertype'] == 'single'): ?>
		<table cellspacing="0" cellpadding="5" class="blog_desc">
			<tr>
				<td width=""><strong><?php echo $this->_tpl_vars['LANG']['BLOG_AVTOR']; ?>
:</strong></td>
				<td width=""><?php echo $this->_tpl_vars['blog']['author']; ?>
</td>
			</tr>
		</table>
	<?php else: ?>
		<table cellspacing="0" cellpadding="2" class="blog_desc">
			<tr>
				<td width=""><strong><?php echo $this->_tpl_vars['LANG']['BLOG_ADMIN']; ?>
:</strong></td>
				<td width=""><?php echo $this->_tpl_vars['blog']['author']; ?>
</td>
                <?php if ($this->_tpl_vars['blog']['forall']): ?>
                	<td width=""><span class="blog_authorsall">(<?php echo $this->_tpl_vars['LANG']['BLOG_OPENED_FOR_ALL']; ?>
)</span></td>
                <?php endif; ?>
			</tr>
		</table>
	<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['myblog'] || $this->_tpl_vars['is_writer'] || $this->_tpl_vars['is_admin']): ?>
    <div class="blog_toolbar">
	<?php if ($this->_tpl_vars['myblog'] || $this->_tpl_vars['is_admin']): ?>

		<table cellspacing="0" cellpadding="2">
			<tr>
				<?php if ($this->_tpl_vars['on_moderate']): ?>
					<td width="16"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/folder_table.png" border="0"/></td>
					<td width=""><a class="blog_moderate_link" href="<?php echo $this->_tpl_vars['blog']['moderate_link']; ?>
"><?php echo $this->_tpl_vars['LANG']['MODERATING']; ?>
 (<?php echo $this->_tpl_vars['on_moderate']; ?>
)</a></td>
				<?php endif; ?>
				<td width="16"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/edit.png" border="0"/></td>
				<td width=""><a href="<?php echo $this->_tpl_vars['blog']['add_post_link']; ?>
"><?php echo $this->_tpl_vars['LANG']['NEW_POST']; ?>
</a></td>
                <td width="16"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/addcat.png" border="0"/></td>
                <td width=""><a class="ajaxlink" href="javascript:void(0)" onclick="$('#opt_cat').toggle();"><?php echo $this->_tpl_vars['LANG']['CATS']; ?>
</a></td>
                <?php if ($this->_tpl_vars['is_config']): ?>
                    <td width="16"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/settings.png" border="0"/></td>
                    <td width=""><a class="ajaxlink" href="javascript:void(0)" onclick="<?php echo cmsSmartyCurrentComponent(array(), $this);?>
.editBlog(<?php echo $this->_tpl_vars['blog']['id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['CONFIG']; ?>
</a></td>
                <?php endif; ?>
			</tr>
		</table>

        <table cellspacing="0" cellpadding="5" id="opt_cat" style="display:none; background-color:#E0EAEF;position: absolute;right: 54px;top: 32px;">
            <tr><td width="16"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/addcat.png" border="0"/></td>
            <td width=""><a class="ajaxlink" href="javascript:void(0)" onclick="<?php echo cmsSmartyCurrentComponent(array(), $this);?>
.addBlogCat(<?php echo $this->_tpl_vars['blog']['id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['NEW_CAT']; ?>
</a></td><tr>
        <?php if ($this->_tpl_vars['cat_id'] > 0): ?>
            <tr><td width="16"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/editcat.png" border="0"/></td>
            <td width=""><a class="ajaxlink" href="javascript:void(0)" onclick="<?php echo cmsSmartyCurrentComponent(array(), $this);?>
.editBlogCat(<?php echo $this->_tpl_vars['cat_id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['RENAME_CAT']; ?>
</a></td><tr>
            <tr><td width="16"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/deletecat.png" border="0"/></td>
            <td width=""><a class="ajaxlink" href="javascript:void(0)" onclick="<?php echo cmsSmartyCurrentComponent(array(), $this);?>
.deleteCat(<?php echo $this->_tpl_vars['cat_id']; ?>
, '<?php echo smarty_function_csrf_token(array(), $this);?>
');return false;"><?php echo $this->_tpl_vars['LANG']['DEL_CAT']; ?>
</a></td><tr>
        <?php endif; ?>
        </table>

	<?php elseif ($this->_tpl_vars['is_writer']): ?>
		<table cellspacing="0" cellpadding="5">
			<tr>
				<td width="16"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/edit.png" border="0"/></td>
				<td width=""><a href="<?php echo $this->_tpl_vars['blog']['add_post_link']; ?>
"><?php echo $this->_tpl_vars['LANG']['NEW_POST']; ?>
</a></td>
			</tr>
		</table>
	<?php endif; ?>
    </div>
<?php endif; ?>

<?php if ($this->_tpl_vars['blogcats']): ?>
<div class="blog_catlist">

	<div class="blog_cat">
		<table cellspacing="0" cellpadding="1">
			<tr>
				<td width="16"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/folder.png" border="0" /></td>
				<?php if ($this->_tpl_vars['cat_id']): ?>
					<td><a href="<?php echo $this->_tpl_vars['blog']['blog_link']; ?>
"><?php echo $this->_tpl_vars['LANG']['ALL_CATS']; ?>
</a> <span style="color:#666666">(<?php echo $this->_tpl_vars['all_total']; ?>
)</span></td>
				<?php else: ?>
					<td><?php echo $this->_tpl_vars['LANG']['ALL_CATS']; ?>
 <span style="color:#666666">(<?php echo $this->_tpl_vars['total']; ?>
)</span></td>
				<?php endif; ?>
			</tr>
		</table>
	</div>

	<?php $_from = $this->_tpl_vars['blogcats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['cat']):
?>
		<div class="blog_cat">
			<table cellspacing="0" cellpadding="2">
				<tr>
					<td width="16"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/folder.png" border="0" /></td>
					<?php if ($this->_tpl_vars['cat_id'] != $this->_tpl_vars['cat']['id']): ?>
						<td><a href="<?php echo $this->_tpl_vars['blog']['blog_link']; ?>
/cat-<?php echo $this->_tpl_vars['cat']['id']; ?>
"><?php echo $this->_tpl_vars['cat']['title']; ?>
</a> <span style="color:#666666">(<?php echo $this->_tpl_vars['cat']['post_count']; ?>
)</span></td>
					<?php else: ?>
						<td><?php echo $this->_tpl_vars['cat']['title']; ?>
 <span style="color:#666666">(<?php echo $this->_tpl_vars['cat']['post_count']; ?>
)</span></td>
                        <?php $this->assign('cur_cat', $this->_tpl_vars['cat']); ?>
					<?php endif; ?>
				</tr>
			</table>
		</div>
	<?php endforeach; endif; unset($_from); ?>

</div>
<?php if ($this->_tpl_vars['cur_cat']['description']): ?>
	<div class="usr_photos_notice"><?php echo ((is_array($_tmp=$this->_tpl_vars['cur_cat']['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['posts']): ?>
	<div class="blog_entries">
		<?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['post']):
?>
			<div class="blog_entry">
				<table width="100%" cellspacing="0" cellpadding="0" class="blog_records">
					<tr>
						<td width="" class="blog_entry_title_td">
							<div class="blog_entry_title"><a href="<?php echo $this->_tpl_vars['post']['url']; ?>
"><?php echo $this->_tpl_vars['post']['title']; ?>
</a></div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="blog_entry_text"><?php echo $this->_tpl_vars['post']['content_html']; ?>
</div>
							<div class="blog_comments">
                            <a class="blog_user" href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['post']['login']), $this);?>
"><?php echo $this->_tpl_vars['post']['author']; ?>
</a>
                            <span class="blog_entry_date"><?php if (! $this->_tpl_vars['post']['published']): ?><span style="color:#CC0000"><?php echo $this->_tpl_vars['LANG']['ON_MODERATE']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['post']['fpubdate']; ?>
<?php endif; ?></span>
                            <span class="post_karma"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']['rating'])) ? $this->_run_mod_handler('rating', true, $_tmp) : smarty_modifier_rating($_tmp)); ?>
</span>
                            <?php if (( $this->_tpl_vars['post']['comments_count'] > 0 )): ?>
                                <a class="blog_comments_link" href="<?php echo $this->_tpl_vars['post']['url']; ?>
#c"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']['comments_count'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['COMMENT'], $this->_tpl_vars['LANG']['COMMENT2'], $this->_tpl_vars['LANG']['COMMENT10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['COMMENT'], $this->_tpl_vars['LANG']['COMMENT2'], $this->_tpl_vars['LANG']['COMMENT10'])); ?>
</a>
                            <?php else: ?>
                                <a class="blog_comments_link" href="<?php echo $this->_tpl_vars['post']['url']; ?>
#c"><?php echo $this->_tpl_vars['LANG']['NOT_COMMENTS']; ?>
</a>
                            <?php endif; ?>
							<?php if ($this->_tpl_vars['post']['tagline'] != false): ?>
								 <span class="tagline"><?php echo $this->_tpl_vars['post']['tagline']; ?>
</span>
							<?php endif; ?>
							</div>
						</td>
					</tr>
				</table>
			</div>
		<?php endforeach; endif; unset($_from); ?>
	</div>

	<?php echo $this->_tpl_vars['pagination']; ?>

<?php else: ?>
	<p style="clear:both"><?php echo $this->_tpl_vars['LANG']['NOT_POSTS']; ?>
</p>
<?php endif; ?>