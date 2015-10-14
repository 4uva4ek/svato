<?php /* Smarty version 2.6.28, created on 2015-05-24 09:28:30
         compiled from com_search_text.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'com_search_text.tpl', 22, false),array('modifier', 'spellcount', 'com_search_text.tpl', 52, false),)), $this); ?>
<div class="photo_details">
<form id="sform"action="/search" method="GET" enctype="multipart/form-data" style="clear:both">
    <strong><?php echo $this->_tpl_vars['LANG']['SEARCH_ON_SITE']; ?>
: </strong>
    <input type="text" name="query" id="query" size="40" value="<?php echo $this->_tpl_vars['query']; ?>
" class="text-input" />
    <select name="look" style="width:100px" onchange="$('form#sform').submit();	">
            <option value="allwords" <?php if ($this->_tpl_vars['look'] == 'allwords' || $this->_tpl_vars['look'] == ''): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ALL_WORDS']; ?>
</option>
            <option value="anyword" <?php if ($this->_tpl_vars['look'] == 'anyword' || $this->_tpl_vars['look'] == ''): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ANY_WORD']; ?>
</option>
            <option value="phrase" <?php if ($this->_tpl_vars['look'] == 'phrase' || $this->_tpl_vars['look'] == ''): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['PHRASE']; ?>
</option>
    </select>
    <input type="submit" value="<?php echo $this->_tpl_vars['LANG']['FIND']; ?>
"/>
    <a href="javascript:" onclick="$('#from_search').fadeIn('slow');" class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['SEARCH_PARAMS']; ?>
</a>
    <div id="from_search">
    <strong><?php echo $this->_tpl_vars['LANG']['WHERE_TO_FIND']; ?>
:</strong>
	<table width="" border="0" cellspacing="0" cellpadding="3">
          <?php $this->assign('col', '1'); ?>
            <?php $_from = $this->_tpl_vars['enable_components']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['enable_component']):
?>
                <?php if ($this->_tpl_vars['col'] == 1): ?> <tr> <?php endif; ?>
                <td width="">
                <label id="l_<?php echo $this->_tpl_vars['enable_component']['link']; ?>
" <?php if (in_array ( $this->_tpl_vars['enable_component']['link'] , $this->_tpl_vars['from_component'] ) || ! $this->_tpl_vars['from_component']): ?>class="selected"<?php endif; ?>>
                	<input name="from_component[]" onclick="toggleInput('l_<?php echo $this->_tpl_vars['enable_component']['link']; ?>
')" type="checkbox" value="<?php echo $this->_tpl_vars['enable_component']['link']; ?>
" <?php if (in_array ( $this->_tpl_vars['enable_component']['link'] , $this->_tpl_vars['from_component'] ) || ! $this->_tpl_vars['from_component']): ?>checked="checked"<?php endif; ?> />
                    <?php echo $this->_tpl_vars['enable_component']['title']; ?>
</label></td>
                <?php if ($this->_tpl_vars['col'] == 5): ?> </tr> <?php $this->assign('col', '1'); ?> <?php else: ?> <?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['col'],'assign' => 'col'), $this);?>
 <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            <?php if ($this->_tpl_vars['col'] > 1): ?>
                <td colspan="<?php echo smarty_function_math(array('equation' => "x - y + 1",'x' => $this->_tpl_vars['col'],'y' => 5), $this);?>
">&nbsp;</td></tr>
            <?php endif; ?>
        </table>
        <p><strong><?php echo $this->_tpl_vars['LANG']['PUBDATE']; ?>
:</strong></p>
        <select name="from_pubdate" style="width:200px">
          <option value="" <?php if (! $this->_tpl_vars['from_pubdate']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ALL']; ?>
</option>
          <option value="d" <?php if ($this->_tpl_vars['from_pubdate'] == 'd'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['F_D']; ?>
</option>
          <option value="w" <?php if ($this->_tpl_vars['from_pubdate'] == 'w'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['F_W']; ?>
</option>
          <option value="m" <?php if ($this->_tpl_vars['from_pubdate'] == 'm'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['F_M']; ?>
</option>
          <option value="y" <?php if ($this->_tpl_vars['from_pubdate'] == 'y'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['F_Y']; ?>
</option>
        </select>
        <label id="order_by_date" <?php if ($this->_tpl_vars['order_by_date']): ?>class="selected"<?php endif; ?>>
                	<input name="order_by_date" onclick="toggleInput('order_by_date')" type="checkbox" value="1" <?php if ($this->_tpl_vars['order_by_date']): ?>checked="checked"<?php endif; ?> />
                    <?php echo $this->_tpl_vars['LANG']['SORT_BY_PUBDATE']; ?>
</label>
        <div style="position:absolute; top:0; right:0; font-size:10px;">
        	<a href="javascript:" onclick="$('#from_search').fadeOut();" class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['HIDE']; ?>
</a>
        </div>
        <div style="position:absolute; bottom:0; right:0; font-size:10px;">
        	<a href="javascript:void(0);" onclick="$('#sform input:checkbox').prop('checked', true);$('#from_search label').addClass('selected');" class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['SELECT_ALL']; ?>
</a> |
			<a href="javascript:void(0);" onclick="$('#sform input:checkbox').prop('checked', false);$('#from_search label').removeClass('selected');" class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['REMOVE_ALL']; ?>
</a>
        </div>
    </div>
</form>
</div>

<?php if ($this->_tpl_vars['results']): ?>
	<?php $this->assign('num', '1'); ?>
	<p class="usr_photos_notice"><strong><?php echo $this->_tpl_vars['LANG']['FOUND']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['1_MATERIALS'], $this->_tpl_vars['LANG']['2_MATERIALS'], $this->_tpl_vars['LANG']['10_MATERIALS']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['1_MATERIALS'], $this->_tpl_vars['LANG']['2_MATERIALS'], $this->_tpl_vars['LANG']['10_MATERIALS'])); ?>
</strong></p>
    <?php $_from = $this->_tpl_vars['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['item']):
?>
	<div class="search_block">
            <?php if ($this->_tpl_vars['item']['pubdate']): ?>
            	<div class="search_date"><?php echo $this->_tpl_vars['item']['pubdate']; ?>
</div>
            <?php endif; ?>
            <div class="search_result_title">
                <span><?php echo $this->_tpl_vars['num']; ?>
</span>
                <a href="<?php echo $this->_tpl_vars['item']['link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['item']['s_title']; ?>
</a>
            </div>
            <div class="search_result_desc">
            	<?php if ($this->_tpl_vars['item']['description']): ?>
            		<p><?php echo $this->_tpl_vars['item']['description']; ?>
</p>
                <?php endif; ?>
            <a href="<?php echo $this->_tpl_vars['item']['placelink']; ?>
"><?php echo $this->_tpl_vars['item']['place']; ?>
</a>
                &mdash; <span style="color:green"><?php echo $this->_tpl_vars['host']; ?>
<?php echo $this->_tpl_vars['item']['link']; ?>
</span>
            </div>
     </div>
     <?php echo smarty_function_math(array('equation' => "z + 1",'z' => $this->_tpl_vars['num'],'assign' => 'num'), $this);?>

    <?php endforeach; endif; unset($_from); ?>
    <?php echo $this->_tpl_vars['pagebar']; ?>

<?php else: ?>
	<?php if ($this->_tpl_vars['query']): ?>
		<p class="usr_photos_notice"><?php echo $this->_tpl_vars['LANG']['BY_QUERY']; ?>
 <strong>"<?php echo $this->_tpl_vars['query']; ?>
"</strong> <?php echo $this->_tpl_vars['LANG']['NOTHING_FOUND']; ?>
. <a href="<?php echo $this->_tpl_vars['external_link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['LANG']['FIND_EXTERNAL']; ?>
</a></p>
    <?php endif; ?>
<?php endif; ?>
<?php echo '
<script type="text/javascript">
		$(document).ready(function(){
			$(\'#query\').focus();
            $(\'.search_block\').hover(
                function() {
					$(this).css(\'background\',\'#E8FFDB\');
                },
                function() {
					$(this).css(\'background\',\'#FFF\');
                }
            );
        });
		function toggleInput(id){
			$(\'#from_search label#\'+id).toggleClass(\'selected\');
		}
		function paginator(page){
			$(\'form#sform\').append(\'<input type="hidden" name="page" value="\'+page+\'" />\');
			$(\'form#sform\').submit();
		}
</script>
'; ?>