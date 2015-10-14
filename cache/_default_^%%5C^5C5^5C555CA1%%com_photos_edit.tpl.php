<?php /* Smarty version 2.6.28, created on 2015-05-19 13:07:43
         compiled from com_photos_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_photos_edit.tpl', 6, false),)), $this); ?>
<form action="<?php echo $this->_tpl_vars['form_action']; ?>
" method="post" id="edit_photo_form">
<input type="hidden" value="1" name="edit_photo" />
<table width="100%" border="0" cellspacing="0" cellpadding="3" style="margin:10px">
  <tr>
    <td width="175" valign="top"><strong><?php echo $this->_tpl_vars['LANG']['PHOTO_TITLE']; ?>
:</strong></td>
    <td><input name="title" type="text" class="text-input" size="40" maxlength="250" style="width:350px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/></td>
  </tr>
  <tr>
    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['PHOTO_DESC']; ?>
:</strong></td>
    <td><textarea name="description" cols="39" rows="5" style="width:350px" class="text-input"><?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea></td>
  </tr>
<?php if (! $this->_tpl_vars['no_tags']): ?>
  <tr>
    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['TAGS']; ?>
:</strong></td>
    <td><input name="tags" type="text" class="text-input" style="width:350px" size="40" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['tags'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/><br /><span><small><?php echo $this->_tpl_vars['LANG']['KEYWORDS']; ?>
</small></span></td>
  </tr>
<?php endif; ?>
  <tr>
    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['REPLACE_FILE']; ?>
:</strong></td>
    <td><input name="Filedata" type="file" class="text-input" style="width:350px" /><br><br><img alt="" src="/images/photos/small/<?php echo $this->_tpl_vars['photo']['file']; ?>
" border="0" /></td>
  </tr>
<?php if ($this->_tpl_vars['is_admin']): ?>
  <tr>
    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['COMMENT_PHOTO']; ?>
:</strong></td>
    <td><select name="comments" style="width:60px">
            <option value="0" <?php if (! $this->_tpl_vars['photo']['comments']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['NO']; ?>
</option>
            <option value="1" <?php if ($this->_tpl_vars['photo']['comments']): ?>selected="selected"<?php endif; ?> ><?php echo $this->_tpl_vars['LANG']['YES']; ?>
</option>
        </select>
    </td>
  </tr>
<?php endif; ?>
</table>
</form>
<script type="text/javascript" src="/includes/jquery/jquery.form.js"></script>