<?php /* Smarty version 2.6.28, created on 2015-07-27 16:19:53
         compiled from com_content_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_content_edit.tpl', 11, false),array('modifier', 'str_repeat', 'com_content_edit.tpl', 40, false),array('modifier', 'spellcount', 'com_content_edit.tpl', 42, false),array('function', 'wysiwyg', 'com_content_edit.tpl', 80, false),)), $this); ?>
<div class="con_heading"><?php echo $this->_tpl_vars['pagetitle']; ?>
</div>

<form id="addform" name="addform" method="post" action="" enctype="multipart/form-data">
    <div class="bar" style="padding:15px 10px">
    <table width="700" cellspacing="5" cellpadding="3" class="proptable">
        <tr>
            <td width="230" valign="top">
                <strong><?php echo $this->_tpl_vars['LANG']['TITLE']; ?>
:</strong>
            </td>
            <td valign="top">
                <input name="title" type="text" class="text-input" id="title" style="width:350px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mod']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
            </td>
        </tr>
        <tr>
            <td valign="top">
                <strong><?php echo $this->_tpl_vars['LANG']['TAGS']; ?>
:</strong><br />
                <span class="hinttext"><?php echo $this->_tpl_vars['LANG']['KEYWORDS_TEXT']; ?>
</span>
            </td>
            <td valign="top">
                <input name="tags" type="text" class="text-input" id="tags" style="width:350px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mod']['tags'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
                <script type="text/javascript">
                    <?php echo $this->_tpl_vars['autocomplete_js']; ?>

                </script>
            </td>
        </tr>
        <?php if ($this->_tpl_vars['do'] == 'addarticle'): ?>
        <tr>
            <td valign="top">
                <strong><?php echo $this->_tpl_vars['LANG']['CAT']; ?>
:</strong><br />
                <div><span class="hinttext"><?php echo $this->_tpl_vars['LANG']['WHERE_LOCATE_ARTICLE']; ?>
</span></div>
                <?php if ($this->_tpl_vars['is_admin']): ?>
                    <div style="margin-top:10px"><span class="hinttext"><?php echo $this->_tpl_vars['LANG']['FOR_ADD_ARTICLE_ON']; ?>
 <a href="/admin/index.php?view=tree"><?php echo $this->_tpl_vars['LANG']['IN_CONFIG']; ?>
</a> <?php echo $this->_tpl_vars['LANG']['FOR_ADD_ARTICLE_ON_TEXT']; ?>
</span></div>
                <?php endif; ?>
            </td>
            <td valign="top">
                <select name="category_id" id="category_id" style="width:357px">
                        <option value=""><?php echo $this->_tpl_vars['LANG']['SELECT_CAT']; ?>
</option>
                    <?php $_from = $this->_tpl_vars['pubcats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p'] => $this->_tpl_vars['pubcat']):
?>
                        <option value="<?php echo $this->_tpl_vars['pubcat']['id']; ?>
" <?php if ($this->_tpl_vars['mod']['category_id'] == $this->_tpl_vars['pubcat']['id']): ?>selected="selected"<?php endif; ?>>
                            <?php echo ((is_array($_tmp='--')) ? $this->_run_mod_handler('str_repeat', true, $_tmp, $this->_tpl_vars['pubcat']['NSLevel']) : str_repeat($_tmp, $this->_tpl_vars['pubcat']['NSLevel'])); ?>
 <?php echo $this->_tpl_vars['pubcat']['title']; ?>

                            <?php if ($this->_tpl_vars['is_billing'] && $this->_tpl_vars['pubcat']['cost'] && $this->_tpl_vars['dynamic_cost']): ?>
                                (<?php echo $this->_tpl_vars['LANG']['BILLING_COST']; ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['pubcat']['cost'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['BILLING_POINT1'], $this->_tpl_vars['LANG']['BILLING_POINT2'], $this->_tpl_vars['LANG']['BILLING_POINT10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['BILLING_POINT1'], $this->_tpl_vars['LANG']['BILLING_POINT2'], $this->_tpl_vars['LANG']['BILLING_POINT10'])); ?>
)
                            <?php endif; ?>
                        </option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
        </tr>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['cfg']['img_users']): ?>
        <tr>
            <td valign="top" style="padding-top:8px">
                <strong><?php echo $this->_tpl_vars['LANG']['IMAGE']; ?>
:</strong>
            </td>
            <td>
                <?php if ($this->_tpl_vars['mod']['image']): ?>
                    <div style="padding-bottom:10px">
                        <img src="/images/photos/small/<?php echo $this->_tpl_vars['mod']['image']; ?>
" border="0" />
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td width="16"><input type="checkbox" id="delete_image" name="delete_image" value="1" /></td>
                            <td><label for="delete_image"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</label></td>
                        </tr>
                    </table>
                <?php endif; ?>
                <input type="file" name="picture" style="width:350px" />
            </td>
        </tr>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['do'] == 'editarticle'): ?>
            <input type="hidden" name="category_id" value="<?php echo $this->_tpl_vars['mod']['category_id']; ?>
" />
        <?php endif; ?>
    </table>
    </div>
	<table width="100%" border="0">
		<tr>
			<td>
                <h3><?php echo $this->_tpl_vars['LANG']['ARTICLE_ANNOUNCE']; ?>
</h3>
				<div><?php echo cmsSmartyWysiwyg(array('name' => 'description','value' => $this->_tpl_vars['mod']['description'],'height' => 200,'width' => '100%'), $this);?>
</div>

				<h3><?php echo $this->_tpl_vars['LANG']['ARTICLE_TEXT']; ?>
</h3>
				<div><?php echo cmsSmartyWysiwyg(array('name' => 'content','value' => $this->_tpl_vars['mod']['content'],'height' => 450,'width' => '100%'), $this);?>
</div>
			</td>
		</tr>
	</table>

    <script type="text/javascript">
        var LANG_SELECT_CAT = '<?php echo $this->_tpl_vars['LANG']['SELECT_CAT']; ?>
';
        var LANG_REQ_TITLE  = '<?php echo $this->_tpl_vars['LANG']['REQ_TITLE']; ?>
';
        var LANG_ERROR      = '<?php echo $this->_tpl_vars['LANG']['ERROR']; ?>
';
        <?php echo '
            function submitArticle(){
                if (!$(\'input#title\').val()){ core.alert(LANG_REQ_TITLE, LANG_ERROR); return false; }
        '; ?>

            <?php if ($this->_tpl_vars['do'] == 'addarticle'): ?>
                <?php echo '
                    if (!$(\'select#category_id\').val()){ core.alert(LANG_SELECT_CAT, LANG_ERROR); return false; }
                '; ?>

            <?php endif; ?>
        <?php echo '
                $(\'form#addform\').submit();
            }
        '; ?>

    </script>

	<p style="margin-top:15px">
        <input name="add_mod" type="hidden" value="1" />
		<input name="savebtn" type="button" onclick="submitArticle()" id="add_mod" <?php if ($this->_tpl_vars['do'] == 'addarticle'): ?> value="<?php echo $this->_tpl_vars['LANG']['ADD_ARTICLE']; ?>
" <?php else: ?> value="<?php echo $this->_tpl_vars['LANG']['SAVE_CHANGES']; ?>
" <?php endif; ?> />
		<input name="back" type="button" id="back" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
" onclick="window.history.back();"/>
		<?php if ($this->_tpl_vars['do'] == 'editarticle'): ?>
			<input name="id" type="hidden" value="<?php echo $this->_tpl_vars['mod']['id']; ?>
" />
		<?php endif; ?>
	</p>
</form>