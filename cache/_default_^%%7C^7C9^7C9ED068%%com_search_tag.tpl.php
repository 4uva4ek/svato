<?php /* Smarty version 2.6.28, created on 2015-06-26 13:35:39
         compiled from com_search_tag.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'spellcount', 'com_search_tag.tpl', 17, false),)), $this); ?>
<div class="photo_details">
<div id="found_search"><strong><?php echo $this->_tpl_vars['LANG']['SEARCH_BY_TAG']; ?>
:</strong> &laquo;<?php echo $this->_tpl_vars['query']; ?>
&raquo;, <?php echo $this->_tpl_vars['LANG']['SEARCH_FOR']; ?>
 <a href="javascript:" onclick="searchOtherTag()" class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['ANOTHER_TAG']; ?>
</a></div>
<div id="other_tag" style="display:none">
    <form id="sform"action="/search" method="post" enctype="multipart/form-data">
        <strong><?php echo $this->_tpl_vars['LANG']['SEARCH_BY_TAG']; ?>
: </strong>
        <input type="hidden" name="do" value="tag" />
        <input type="text" name="query" id="query" size="40" value="" class="text-input" />
		<script type="text/javascript">
            <?php echo $this->_tpl_vars['autocomplete_js']; ?>

        </script>
        <input type="submit" value="<?php echo $this->_tpl_vars['LANG']['FIND']; ?>
"/> <input type="button" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
" onclick="$('#other_tag').hide();$('#found_search').fadeIn('slow');"/>
    </form>
</div>
</div>

<?php if ($this->_tpl_vars['results']): ?>
<p class="usr_photos_notice"><strong><?php echo $this->_tpl_vars['LANG']['FOUND']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['1_MATERIALS'], $this->_tpl_vars['LANG']['2_MATERIALS'], $this->_tpl_vars['LANG']['10_MATERIALS']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['1_MATERIALS'], $this->_tpl_vars['LANG']['2_MATERIALS'], $this->_tpl_vars['LANG']['10_MATERIALS'])); ?>
</strong></p>
    <table width="100%" cellpadding="5" cellspacing="0" border="0">
	<?php $_from = $this->_tpl_vars['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['item']):
?>
        <tr>
  <td class="<?php echo $this->_tpl_vars['item']['class']; ?>
">
                    <div class="tagsearch_item">
                    <table><tr>
                        <td><img src="/components/search/tagicons/<?php echo $this->_tpl_vars['item']['target']; ?>
.gif"/></td>
                        <td><?php echo $this->_tpl_vars['item']['itemlink']; ?>
</td>
                    </tr></table>
                    </div>
                    <div class="tagsearch_bar"><?php echo $this->_tpl_vars['item']['tag_bar']; ?>
</div>
          </td>
        </tr>
	<?php endforeach; endif; unset($_from); ?>
    </table>
	<?php echo $this->_tpl_vars['pagebar']; ?>

<?php else: ?>
<p class="usr_photos_notice"><?php echo $this->_tpl_vars['LANG']['BY_TAG']; ?>
 <strong>"<?php echo $this->_tpl_vars['query']; ?>
"</strong> <?php echo $this->_tpl_vars['LANG']['NOTHING_FOUND']; ?>
. <a href="<?php echo $this->_tpl_vars['external_link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['LANG']['CONTINUE_TO_SEARCH']; ?>
?</a></p>
<?php endif; ?>
<?php echo '
<script type="text/javascript">
function searchOtherTag(){
$(\'#found_search\').hide();$(\'#other_tag\').fadeIn(\'slow\');$(\'.text-input\').focus();
}
</script>
'; ?>