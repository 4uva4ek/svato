<?php /* Smarty version 2.6.28, created on 2015-06-29 23:54:36
         compiled from com_blog_view_posts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'profile_url', 'com_blog_view_posts.tpl', 50, false),array('modifier', 'rating', 'com_blog_view_posts.tpl', 52, false),array('modifier', 'spellcount', 'com_blog_view_posts.tpl', 54, false),)), $this); ?>
<div class="con_heading"><?php echo $this->_tpl_vars['pagetitle']; ?>
</div>

<div class="blog_type_menu">

        <?php if (! $this->_tpl_vars['ownertype']): ?>
            <span class="blog_type_active"><?php echo $this->_tpl_vars['LANG']['POSTS_RSS']; ?>
 (<?php echo $this->_tpl_vars['total']; ?>
)</span>
        <?php else: ?>
            <a class="blog_type_link" href="/blogs"><?php echo $this->_tpl_vars['LANG']['POSTS_RSS']; ?>
</a>
        <?php endif; ?>

         <?php if ($this->_tpl_vars['ownertype'] == 'all'): ?>
            <span class="blog_type_active"><?php echo $this->_tpl_vars['LANG']['ALL_BLOGS']; ?>
</span>
         <?php else: ?>
            <a class="blog_type_link" href="/blogs/all.html"><?php echo $this->_tpl_vars['LANG']['ALL_BLOGS']; ?>
</a>
         <?php endif; ?>

        <?php if ($this->_tpl_vars['ownertype'] == 'single'): ?>
            <span class="blog_type_active"><?php echo $this->_tpl_vars['LANG']['PERSONALS']; ?>
</span>
        <?php else: ?>
            <a class="blog_type_link" href="/blogs/single.html"><?php echo $this->_tpl_vars['LANG']['PERSONALS']; ?>
</a>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['ownertype'] == 'multi'): ?>
            <span class="blog_type_active"><?php echo $this->_tpl_vars['LANG']['COLLECTIVES']; ?>
</span>
        <?php else: ?>
            <a class="blog_type_link" href="/blogs/multi.html"><?php echo $this->_tpl_vars['LANG']['COLLECTIVES']; ?>
</a>
        <?php endif; ?>

</div>

<?php if ($this->_tpl_vars['posts']): ?>
	<div class="blog_entries">
		<?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['post']):
?>
			<div class="blog_entry">
				<table width="100%" cellspacing="0" cellpadding="0" class="blog_records">
					<tr>
						<td width="" class="blog_entry_title_td">
							<div class="blog_entry_title">
                                <?php if ($this->_tpl_vars['post']['blog_url']): ?>
                                    <a href="<?php echo $this->_tpl_vars['post']['blog_url']; ?>
" style="color:gray"><?php echo $this->_tpl_vars['post']['blog_title']; ?>
</a> &rarr;
                                <?php endif; ?>
                                <a href="<?php echo $this->_tpl_vars['post']['url']; ?>
"><?php echo $this->_tpl_vars['post']['title']; ?>
</a>
                            </div>
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