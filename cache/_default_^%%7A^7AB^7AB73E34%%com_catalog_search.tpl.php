<?php /* Smarty version 2.6.28, created on 2015-05-20 08:56:59
         compiled from com_catalog_search.tpl */ ?>
<h1 class="con_heading"><?php echo $this->_tpl_vars['LANG']['SEARCH_IN_CAT']; ?>
</h1>
<div class="uc_search_in_cat">
	<a href="/catalog/<?php echo $this->_tpl_vars['cat']['id']; ?>
"><?php echo $this->_tpl_vars['cat']['title']; ?>
</a>
</div>

<p><strong><?php echo $this->_tpl_vars['LANG']['FILL_FIELDS']; ?>
:</strong></p>

<form action="/catalog/<?php echo $this->_tpl_vars['id']; ?>
/search.html" name="searchform" method="post" >
    <div class="uc_cat_search">
        <table width="100%" border="0" cellspacing="5">
            <tr>
                <td width="160" valign="top"><?php echo $this->_tpl_vars['LANG']['TITLE']; ?>
: </td>
                <td valign="top"><input name="title" type="text" id="title" size="35" value="" /></td>
            </tr>
        </table>
        <?php $_from = $this->_tpl_vars['fstruct']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['value']):
?>
            <table width="100%" border="0" cellspacing="5">
                <tr>
                    <td width="160" valign="top"><?php echo $this->_tpl_vars['value']; ?>
: </td>
                    <td valign="top"><input name="fdata[<?php echo $this->_tpl_vars['tid']; ?>
]" type="text" id="fdata[]" size="35" value="" /> </td>
                </tr>
            </table>
        <?php endforeach; endif; unset($_from); ?>
        <table width="100%" border="0" cellspacing="5">
            <tr>
                <td width="160" valign="top"><?php echo $this->_tpl_vars['LANG']['TAGS']; ?>
: </td>
                <td valign="top"><input name="tags" type="text" id="tags" size="35" value="" /><br/><?php echo '<?php'; ?>
 echo tagsList($id);<?php echo '?>'; ?>
</td>
            </tr>
        </table>
    </div>
	<p>
		<input type="submit" name="gosearch" value="<?php echo $this->_tpl_vars['LANG']['SEARCH_IN_CAT']; ?>
" />
		<input type="button" onclick="window.history.go(-1);" name="cancel" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
" />
	</p>
</form>