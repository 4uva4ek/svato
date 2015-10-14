<?php /* Smarty version 2.6.28, created on 2015-08-07 02:22:02
         compiled from com_content_read.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'profile_url', 'com_content_read.tpl', 7, false),array('function', 'math', 'com_content_read.tpl', 22, false),array('modifier', 'escape', 'com_content_read.tpl', 37, false),)), $this); ?>
<?php if ($this->_tpl_vars['article']['showtitle']): ?>
    <h1 class="con_heading"><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
<?php endif; ?>

<?php if ($this->_tpl_vars['article']['showdate']): ?>
	<div class="con_pubdate">
		<?php if (! $this->_tpl_vars['article']['published']): ?><span style="color:#CC0000"><?php echo $this->_tpl_vars['LANG']['NO_PUBLISHED']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['article']['pubdate']; ?>
<?php endif; ?> - <a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['article']['user_login']), $this);?>
"><?php echo $this->_tpl_vars['article']['author']; ?>
</a>
	</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['is_pages']): ?>
	<div class="con_pt" id="pt">
		<span class="con_pt_heading">
			<a class="con_pt_hidelink" href="javascript:void;" onClick="<?php echo '$(\'#pt_list\').toggle();'; ?>
"><?php echo $this->_tpl_vars['LANG']['CONTENT']; ?>
</a>
			<?php if ($this->_tpl_vars['cfg']['pt_hide']): ?> [<a href="javascript:void(0);" onclick="<?php echo '$(\'#pt\').hide();'; ?>
"><?php echo $this->_tpl_vars['LANG']['HIDE']; ?>
</a>] <?php endif; ?>
		</span>
		<div id="pt_list" style="<?php if ($this->_tpl_vars['cfg']['pt_disp']): ?>display: block;<?php else: ?>display: none;<?php endif; ?> width:100%">
			<div>
				<ul id="con_pt_list">
				<?php $_from = $this->_tpl_vars['pt_pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['pages']):
?>
					<?php if (( $this->_tpl_vars['tid']+1 != $this->_tpl_vars['page'] )): ?>
						<?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['tid'],'assign' => 'key'), $this);?>

						<li><a href="<?php echo $this->_tpl_vars['pages']['url']; ?>
"><?php echo $this->_tpl_vars['pages']['title']; ?>
</a></li>
					<?php else: ?>
						<li><?php echo $this->_tpl_vars['pages']['title']; ?>
</li>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<ul>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="con_text" style="overflow:hidden">
    <?php if ($this->_tpl_vars['article']['image']): ?>
        <div class="con_image" style="float:left;margin-top:10px;margin-right:20px;margin-bottom:20px">
            <img src="/images/photos/medium/<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/>
        </div>
    <?php endif; ?>
    <?php echo $this->_tpl_vars['article']['content']; ?>

</div>

<?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] || $this->_tpl_vars['is_author']): ?>
    <div class="blog_comments">
        <?php if (! $this->_tpl_vars['article']['published'] && ( $this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] )): ?>
        	<a class="blog_moderate_yes" href="/content/publish<?php echo $this->_tpl_vars['article']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['ARTICLE_ALLOW']; ?>
</a> |
        <?php endif; ?>
        <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] || $this->_tpl_vars['is_author_del']): ?>
        	<a class="blog_moderate_no" href="/content/delete<?php echo $this->_tpl_vars['article']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a> |
        <?php endif; ?>
        <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_editor'] || $this->_tpl_vars['is_author']): ?>
        	<a href="/content/edit<?php echo $this->_tpl_vars['article']['id']; ?>
.html" class="blog_entry_edit"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a>
        <?php endif; ?>
    </div>
<?php endif; ?>

 
 
