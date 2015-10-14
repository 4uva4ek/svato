<?php /* Smarty version 2.6.28, created on 2015-06-23 17:06:31
         compiled from com_blog_edit_post.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_blog_edit_post.tpl', 7, false),)), $this); ?>
<div class="con_heading"><?php echo $this->_tpl_vars['pagetitle']; ?>
</div>

<form style="margin-top:15px" action="" method="post" name="msgform" enctype="multipart/form-data">
	<table width="100%" border="0" cellpadding="6" cellspacing="0">
		<tr>
			<td width="160"><strong><?php echo $this->_tpl_vars['LANG']['TITLE_POST']; ?>
: </strong></td>
		  	<td><input name="title" class="text-input" type="text" id="title" style="width:400px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mod']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/></td>
		</tr>

		<?php if ($this->_tpl_vars['blog']['showcats'] && $this->_tpl_vars['cat_list']): ?>
			<tr>
				<td><strong><?php echo $this->_tpl_vars['LANG']['BLOG_CAT']; ?>
:</strong></td>
				<td>
					<select name="cat_id" id="cat_id" style="width:407px">
						<option value="0" <?php if (! isset ( $this->_tpl_vars['mod']['cat_id'] ) || $this->_tpl_vars['mod']['cat_id'] == 0): ?>  selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['WITHOUT_CAT']; ?>
</option>
						<?php echo $this->_tpl_vars['cat_list']; ?>

					</select>
				</td>
			</tr>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['myblog'] || $this->_tpl_vars['is_admin']): ?>
			<tr>
				<td><strong><?php echo $this->_tpl_vars['LANG']['SHOW_POST']; ?>
:</strong></td>
				<td>
					<select name="allow_who" id="allow_who" style="width:407px">
						<option value="all" <?php if (! isset ( $this->_tpl_vars['mod']['allow_who'] ) || $this->_tpl_vars['mod']['allow_who'] == 'all'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_ALL']; ?>
</option>
						<option value="friends" <?php if ($this->_tpl_vars['mod']['allow_who'] == 'friends'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_MY_FRIENDS']; ?>
</option>
						<option value="nobody" <?php if ($this->_tpl_vars['mod']['allow_who'] == 'nobody'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_ONLY_ME']; ?>
</option>
					</select>
				</td>
			</tr>
		<?php else: ?>
			<input type="hidden" name="allow_who" value="<?php echo $this->_tpl_vars['blog']['allow_who']; ?>
" />
		<?php endif; ?>

		
		
        <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['user_can_iscomments']): ?>
		<tr>
            <td valign="top">
				<strong><?php echo $this->_tpl_vars['LANG']['COMMENTS']; ?>
:</strong>
			</td>
			<td>
                <select name="comments" id="comments" style="width:407px">
                    <option value="0" <?php if (! $this->_tpl_vars['mod']['comments']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['NO']; ?>
</option>
                    <option value="1" <?php if ($this->_tpl_vars['mod']['comments']): ?>selected="selected"<?php endif; ?> ><?php echo $this->_tpl_vars['LANG']['YES']; ?>
</option>
                </select><br />
                <span class="hinttext" style="font-size:11px"><?php echo $this->_tpl_vars['LANG']['IS_COMMENTS']; ?>
</span>
			</td>
		</tr>
        <?php endif; ?>
		<tr>
			<td valign="top">
				<strong><?php echo $this->_tpl_vars['LANG']['TAGS']; ?>
:</strong>
			</td>
			<td>
				<input name="tags" class="text-input" type="text" id="tags" style="width:400px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mod']['tags'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/><br />
				<span class="hinttext" style="font-size:11px"><?php echo $this->_tpl_vars['LANG']['KEYWORDS']; ?>
</span>
				<script type="text/javascript">
					<?php echo $this->_tpl_vars['autocomplete_js']; ?>

				</script>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="usr_msg_bbcodebox"><?php echo $this->_tpl_vars['bb_toolbar']; ?>
</div>
				<?php echo $this->_tpl_vars['smilies']; ?>

				<?php echo $this->_tpl_vars['autogrow']; ?>

                <div class="cm_editor"><textarea rows="15" class="ajax_autogrowarea" name="content" id="message"><?php echo ((is_array($_tmp=$this->_tpl_vars['mod']['content'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea></div>
                <div style="margin-top:12px;margin-bottom:15px;" class="hinttext">
                    <strong><?php echo $this->_tpl_vars['LANG']['IMPORTANT']; ?>
:</strong> <?php echo $this->_tpl_vars['LANG']['CUT_TEXT']; ?>
,<br/>
                    <a href="javascript:addTagCut('message');" class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['ADD_CUT_TAG']; ?>
</a> <?php echo $this->_tpl_vars['LANG']['BETWEEN']; ?>
.
                </div>
			</td>
		</tr>
	</table>
	<p>
		<input name="goadd" type="submit" id="goadd" value="<?php echo $this->_tpl_vars['LANG']['SAVE_POST']; ?>
" />
		<input name="cancel" type="button" onclick="window.history.go(-1)" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
" />
	</p>
</form>
<?php echo '
<script type="text/javascript">
    $(document).ready(function(){
        $(\'#title\').focus();
    });
</script>
'; ?>