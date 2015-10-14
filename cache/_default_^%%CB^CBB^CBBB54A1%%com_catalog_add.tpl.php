<?php /* Smarty version 2.6.28, created on 2015-07-27 16:12:01
         compiled from com_catalog_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_catalog_add.tpl', 15, false),array('function', 'wysiwyg', 'com_catalog_add.tpl', 92, false),)), $this); ?>
<div class="con_heading">
    <?php if ($this->_tpl_vars['do'] == 'add_item'): ?><?php echo $this->_tpl_vars['LANG']['ADD_ITEM']; ?>
<?php endif; ?>
    <?php if ($this->_tpl_vars['do'] == 'edit_item'): ?><?php echo $this->_tpl_vars['LANG']['EDIT_ITEM']; ?>
<?php endif; ?>
</div>

<div id="configtabs">

    <div id="form">
        <form id="add_form" method="post" action="/catalog/<?php echo $this->_tpl_vars['cat_id']; ?>
/submit.html" enctype="multipart/form-data">
        <table cellpadding="5" cellspacing="0" style="margin-bottom:10px" width="100%">
            <tr>
                <td width="210">
                    <strong><?php echo $this->_tpl_vars['LANG']['TITLE']; ?>
:</strong>
                </td>
                <td><input type="text" name="title" id="title" class="text-input" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" style="width:300px"/></td>
            </tr>
            <?php if ($this->_tpl_vars['is_admin']): ?>
            <tr>
                <td width="210">
                    <strong><?php echo $this->_tpl_vars['LANG']['CAT']; ?>
:</strong>
                </td>
                <td><select style="width:300px" class="text-input" name="new_cat_id" id="cat_id" ><?php echo $this->_tpl_vars['cats']; ?>
</select></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td width="">
                    <strong><?php echo $this->_tpl_vars['LANG']['IMAGE']; ?>
:</strong>
                </td>
                <td>
                    <?php if ($this->_tpl_vars['do'] == 'edit_item' && $this->_tpl_vars['item']['imageurl']): ?>
                        <div style="margin-bottom:4px;">
                            <a href="/images/catalog/<?php echo $this->_tpl_vars['item']['imageurl']; ?>
" target="_blank"><?php echo $this->_tpl_vars['item']['imageurl']; ?>
</a>
                        </div>
                    <?php endif; ?>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td><input name="imgfile" type="file" id="imgfile" style="width:300px" class="text-input" /></td>
                            <?php if ($this->_tpl_vars['do'] == 'edit_item' && $this->_tpl_vars['item']['imageurl']): ?>
                                <td style="padding-left:15px">
                                    <label>
                                        <input type="checkbox" value="1" name="delete_img" />
                                        <?php echo $this->_tpl_vars['LANG']['DELETE']; ?>

                                    </label>
                                </td>
                            <?php endif; ?>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php if ($this->_tpl_vars['cat']['view_type'] == 'shop'): ?>
            <tr>
                <td width="">
                    <strong><?php echo $this->_tpl_vars['LANG']['PRICE']; ?>
:</strong>
                </td>
                <td>
                    <input type="text" class="text-input" name="price" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" style="width:300px"/>
                </td>
            </tr>
            <tr>
                <td width="">
                    <strong><?php echo $this->_tpl_vars['LANG']['CAN_MANY']; ?>
:</strong>
                </td>
                <td>
                    <label><input type="radio" name="canmany" value="1" <?php if ($this->_tpl_vars['item']['canmany']): ?>checked="checked"<?php endif; ?>> <?php echo $this->_tpl_vars['LANG']['YES']; ?>
 </label>
                    <label><input type="radio" name="canmany" value="0" <?php if (! $this->_tpl_vars['item']['canmany']): ?>checked="checked"<?php endif; ?>> <?php echo $this->_tpl_vars['LANG']['NO']; ?>
 </label>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td width="">
                    <strong><?php echo $this->_tpl_vars['LANG']['TAGS']; ?>
:</strong><br/>
                    <span class="hint"><?php echo $this->_tpl_vars['LANG']['KEYWORDS']; ?>
</span>
                </td>
                <td>
                    <input type="text" name="tags" class="text-input" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['tags'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" style="width:300px"/>
                </td>
            </tr>
        <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['field']):
?>
            <tr>
                <?php if ($this->_tpl_vars['field']['ftype'] == 'link' || $this->_tpl_vars['field']['ftype'] == 'text'): ?>
                <td valign="top">
                    <strong><?php echo $this->_tpl_vars['field']['title']; ?>
:</strong>
                    <?php if ($this->_tpl_vars['field']['ftype'] == 'link'): ?> <br/><span class="hint"><?php echo $this->_tpl_vars['LANG']['TYPE_LINK']; ?>
</span><?php endif; ?>
                    <?php if ($this->_tpl_vars['field']['makelink']): ?> <br/><span class="hint"><?php echo $this->_tpl_vars['LANG']['COMMA_SEPARATE']; ?>
</span><?php endif; ?>
                </td>
                <td>
                    <input style="width:300px" name="fdata[<?php echo $this->_tpl_vars['id']; ?>
]" type="text" class="text-input" value="<?php if ($this->_tpl_vars['field']['value']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['field']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php endif; ?>"/>
                </td>
                <?php else: ?>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['field']['title']; ?>
:</strong></td>
                    <td>
                        <?php echo cmsSmartyWysiwyg(array('name' => "fdata[".($this->_tpl_vars['id'])."]",'value' => $this->_tpl_vars['field']['value'],'height' => 300,'width' => '98%','toolbar' => 'Basic'), $this);?>

                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_tpl_vars['is_admin']): ?>
            <tr>
                <td width="">
                    <strong><?php echo $this->_tpl_vars['LANG']['SEO_KEYWORDS']; ?>
:</strong><br/>
                    <span class="hint"><?php echo $this->_tpl_vars['LANG']['SEO_KEYWORDS_HINT']; ?>
</span>
                </td>
                <td>
                    <input type="text" name="meta_keys" class="text-input" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['meta_keys'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" style="width:300px"/>
                </td>
            </tr>
            <tr>
                <td width="">
                    <strong><?php echo $this->_tpl_vars['LANG']['SEO_DESCRIPTION']; ?>
:</strong>
                </td>
                <td>
                    <input type="text" name="meta_desc" class="text-input" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['meta_desc'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" style="width:300px"/>
                </td>
            </tr>
            <tr>
                <td width="">
                    <strong><?php echo $this->_tpl_vars['LANG']['IS_COMMENTS']; ?>
:</strong>
                </td>
                <td>
                    <label><input type="radio" name="is_comments" value="1" <?php if ($this->_tpl_vars['item']['is_comments']): ?>checked="checked"<?php endif; ?>> <?php echo $this->_tpl_vars['LANG']['YES']; ?>
 </label>
                    <label><input type="radio" name="is_comments" value="0" <?php if (! $this->_tpl_vars['item']['is_comments']): ?>checked="checked"<?php endif; ?>> <?php echo $this->_tpl_vars['LANG']['NO']; ?>
 </label>
                </td>
            </tr>
        <?php endif; ?>
        </table>
        <?php if ($this->_tpl_vars['cfg']['premod'] && ! $this->_tpl_vars['is_admin']): ?>
            <p style="margin-top:15px;color:red">
                <?php echo $this->_tpl_vars['LANG']['ITEM_PREMOD_NOTICE']; ?>

            </p>
        <?php endif; ?>
        <p style="margin-top:15px">
            <input type="hidden" name="opt" value="<?php if ($this->_tpl_vars['do'] == 'add_item'): ?>add<?php else: ?>edit<?php endif; ?>" />
            <?php if ($this->_tpl_vars['do'] == 'edit_item'): ?>
                <input type="hidden" id="item_id" name="item_id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />
            <?php endif; ?>
            <input type="submit" name="submit" value="<?php echo $this->_tpl_vars['LANG']['SAVE']; ?>
" style="font-size:18px" />
            <input type="button" name="back" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
"  style="font-size:18px" onClick="window.history.go(-1)" />
        </p>
        </form>
    </div>

</div>