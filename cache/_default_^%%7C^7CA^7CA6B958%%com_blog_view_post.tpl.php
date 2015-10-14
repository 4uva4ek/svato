<?php /* Smarty version 2.6.28, created on 2015-06-19 14:20:32
         compiled from com_blog_view_post.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'component', 'com_blog_view_post.tpl', 3, false),array('function', 'csrf_token', 'com_blog_view_post.tpl', 3, false),array('function', 'profile_url', 'com_blog_view_post.tpl', 12, false),array('modifier', 'spellcount', 'com_blog_view_post.tpl', 23, false),)), $this); ?>
<?php if ($this->_tpl_vars['myblog'] || $this->_tpl_vars['is_admin'] || ( $this->_tpl_vars['is_writer'] && $this->_tpl_vars['is_author'] )): ?>
    <div class="float_bar">
        <?php if (! $this->_tpl_vars['post']['published'] && ( $this->_tpl_vars['is_admin'] )): ?><span id="pub_link"><a class="ajaxlink" href="javascript:void(0)" onclick="<?php echo cmsSmartyCurrentComponent(array(), $this);?>
.publishPost(<?php echo $this->_tpl_vars['post']['id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['PUBLISH']; ?>
</a> | </span><?php endif; ?><a href="/<?php echo cmsSmartyCurrentComponent(array(), $this);?>
/editpost<?php echo $this->_tpl_vars['post']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a> | <a class="ajaxlink" href="javascript:void(0)" onclick="<?php echo cmsSmartyCurrentComponent(array(), $this);?>
.deletePost(<?php echo $this->_tpl_vars['post']['id']; ?>
, '<?php echo smarty_function_csrf_token(array(), $this);?>
');return false;"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a>
    </div>
<?php endif; ?>
<h1 class="con_heading"><?php echo $this->_tpl_vars['post']['title']; ?>
</h1>

<table width="100%" cellpadding="4" cellspacing="0">
	<tr>
        <td width="70" valign="top" align="center">
        	<div><strong><?php echo $this->_tpl_vars['LANG']['AVTOR']; ?>
</strong></div>
            <div class="blog_post_avatar"><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['post']['author_login']), $this);?>
"><img border="0" class="usr_img_small" src="<?php echo $this->_tpl_vars['post']['author_avatar']; ?>
" /></a></div>
            <div><strong><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['post']['author_login']), $this);?>
"><?php echo $this->_tpl_vars['post']['author_nickname']; ?>
</a></strong></div>
        </td>
		<td>
			<div class="blog_post_data" valign="top">
				<div><strong><?php echo $this->_tpl_vars['LANG']['PUBLISHED']; ?>
:</strong> <?php if (! $this->_tpl_vars['post']['published']): ?><span id="pub_wait" style="color:#F00;"><?php echo $this->_tpl_vars['LANG']['ON_MODERATE']; ?>
</span><span id="pub_date" style="display:none;"><?php echo $this->_tpl_vars['post']['fpubdate']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['post']['fpubdate']; ?>
<?php endif; ?></div>
				
				<?php if ($this->_tpl_vars['blog']['showcats'] && $this->_tpl_vars['cat']): ?>
					<div><strong><?php echo $this->_tpl_vars['LANG']['CAT']; ?>
:</strong> <a href="/<?php echo cmsSmartyCurrentComponent(array(), $this);?>
/<?php echo $this->_tpl_vars['blog']['seolink']; ?>
/cat-<?php echo $this->_tpl_vars['cat']['id']; ?>
"><?php echo $this->_tpl_vars['cat']['title']; ?>
</a></div>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['post']['edit_times']): ?>
					<div><strong><?php echo $this->_tpl_vars['LANG']['EDITED']; ?>
:</strong> <?php echo ((is_array($_tmp=$this->_tpl_vars['post']['edit_times'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['TIME1'], $this->_tpl_vars['LANG']['TIME2'], $this->_tpl_vars['LANG']['TIME10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['TIME1'], $this->_tpl_vars['LANG']['TIME2'], $this->_tpl_vars['LANG']['TIME10'])); ?>
 &mdash; <?php if ($this->_tpl_vars['post']['edit_times'] > 1): ?><?php echo $this->_tpl_vars['LANG']['LATS_TIME']; ?>
<?php endif; ?> <?php echo $this->_tpl_vars['post']['feditdate']; ?>
</div>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['post']['music']): ?>
					<div><strong><?php echo $this->_tpl_vars['LANG']['PLAYING']; ?>
:</strong> <?php echo $this->_tpl_vars['post']['music']; ?>
</div>
				<?php endif; ?>
			</div>
		</td>
	
	
	</tr>
</table>

<div class="blog_post_body"><?php echo $this->_tpl_vars['post']['content_html']; ?>
</div>
<?php echo $this->_tpl_vars['post']['tags']; ?>

<?php if ($this->_tpl_vars['navigation'] && ( $this->_tpl_vars['navigation']['prev'] || $this->_tpl_vars['navigation']['next'] )): ?>
	<div class="blog_post_nav">
    	<?php if ($this->_tpl_vars['navigation']['prev']): ?><a href="<?php echo $this->_tpl_vars['navigation']['prev']['url']; ?>
" class="prev"><?php echo $this->_tpl_vars['navigation']['prev']['title']; ?>
</a><?php endif; ?>
        <?php if ($this->_tpl_vars['navigation']['next']): ?><a href="<?php echo $this->_tpl_vars['navigation']['next']['url']; ?>
" class="next"><?php echo $this->_tpl_vars['navigation']['next']['title']; ?>
</a><?php endif; ?>
    </div>
<?php endif; ?>