<?php /* Smarty version 2.6.28, created on 2015-07-27 15:35:22
         compiled from com_board_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_board_edit.tpl', 21, false),array('modifier', 'spellcount', 'com_board_edit.tpl', 130, false),array('function', 'city_input', 'com_board_edit.tpl', 35, false),array('function', 'captcha', 'com_board_edit.tpl', 184, false),)), $this); ?>
<h1 class="con_heading"><?php echo $this->_tpl_vars['pagetitle']; ?>
</h1>
<form action="<?php echo $this->_tpl_vars['action']; ?>
" method="post" enctype="multipart/form-data">
	<table cellpadding="5">
		<tr>
            <td height="30"><span><?php echo $this->_tpl_vars['LANG']['CAT_BOARD']; ?>
:</span></td>
            <td>
                <select name="category_id" id="category_id" class="text-input" style="width:407px" onchange="getRubric();">
                    <option value="0">-- <?php echo $this->_tpl_vars['LANG']['SELECT_CAT']; ?>
 --</option>
                    <?php echo $this->_tpl_vars['catslist']; ?>

                </select>
            </td>
		</tr>
		<tr>
			<td width="180">
				<span><?php echo $this->_tpl_vars['LANG']['TITLE']; ?>
:</span>
			</td>
			<td height="35">
				<select name="obtype" id="obtype" style="width:160px">
					<option value="0">-- <?php echo $this->_tpl_vars['LANG']['SELECT_CAT']; ?>
 --</option>
				</select>
				<input name="title" type="text" id="title" class="text-input" style="width:240px" maxlength="250"  value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/>
			</td>
		</tr>
		<tr id="from_search">
			<td></td>
			<td height="35">
				<input name="title_fake" type="text" id="title_fake" maxlength="250"  value=""/>
			</td>
		</tr>
		<tr class="proptable">
			<td>
				<span><?php echo $this->_tpl_vars['LANG']['CITY']; ?>
:</span>
			</td>
			<td height="35" valign="top">
                <?php echo smarty_function_city_input(array('value' => $this->_tpl_vars['item']['city'],'name' => 'city','width' => '403px'), $this);?>

			</td>
		</tr>
		<tr id="before_form">
			<td valign="top">
				<span><?php echo $this->_tpl_vars['LANG']['TEXT_ADV']; ?>
:</span>
			</td>
			<td height="100" valign="top">
				<textarea name="content" class="text-input" style="width:403px" rows="5" id="content"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
			</td>
		</tr>
        <?php if ($this->_tpl_vars['formsdata']): ?>
        	<?php $_from = $this->_tpl_vars['formsdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['form']):
?>
            <tr class="cat_form">
                <td valign="top">
                    <span><?php echo $this->_tpl_vars['form']['title']; ?>
:</span>
                    <?php if ($this->_tpl_vars['form']['description']): ?>
                    	<div style="color:gray"><?php echo $this->_tpl_vars['form']['description']; ?>
</div>
                    <?php endif; ?>
                </td>
                <td valign="top">
                    <?php echo $this->_tpl_vars['form']['field']; ?>

                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
		<?php if ($this->_tpl_vars['cfg']['photos'] && $this->_tpl_vars['cat']['is_photos']): ?>
			<tr>
				<td><span><?php echo $this->_tpl_vars['LANG']['PHOTO']; ?>
:</span></td>
				<td><input name="Filedata" type="file" id="picture" style="width:407px;" /></td>
			</tr>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['form_do'] == 'edit'): ?>
			<tr>
				<td height="35"><span><?php echo $this->_tpl_vars['LANG']['PERIOD_PUBL']; ?>
:</span></td>
				<td height="35"><?php echo $this->_tpl_vars['item']['pubdays']; ?>
 <?php echo $this->_tpl_vars['LANG']['DAYS']; ?>
, <?php echo $this->_tpl_vars['LANG']['DAYS_TO']; ?>
 <?php echo $this->_tpl_vars['item']['pubdate']; ?>
.</td>
			</tr>
		<?php elseif ($this->_tpl_vars['cfg']['srok']): ?>
			<tr>
				<td><span><?php echo $this->_tpl_vars['LANG']['PERIOD_PUBL']; ?>
:</span></td>
				<td>
					<select name="pubdays" id="pubdays">
						<option value="5">5</option>
						<option value="10" selected="selected">10</option>
						<option value="14">14</option>
						<option value="30">30</option>
						<option value="50">50</option>
					</select> <?php echo $this->_tpl_vars['LANG']['DAYS']; ?>

				</td>
			</tr>
		<?php endif; ?>
        <?php if ($this->_tpl_vars['cfg']['extend'] && $this->_tpl_vars['form_do'] == 'edit' && ! $this->_tpl_vars['item']['published'] && $this->_tpl_vars['item']['is_overdue']): ?>
        	<?php if ($this->_tpl_vars['cfg']['srok']): ?>
                <tr>
                    <td height="35"><span><?php echo $this->_tpl_vars['LANG']['ADV_EXTEND']; ?>
:</span></td>
                    <td height="35">
                        <select name="pubdays" id="pubdays">
                            <option value="5">5</option>
                            <option value="10" selected="selected">10</option>
                            <option value="14">14</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                        </select>  <?php echo $this->_tpl_vars['LANG']['DAYS']; ?>
</td>
                </tr>
            <?php else: ?>
                <tr>
                    <td height="35"><span><?php echo $this->_tpl_vars['LANG']['ADV_EXTEND']; ?>
:</span></td>
                    <td height="35"><?php echo $this->_tpl_vars['LANG']['ADV_EXTEND_SROK']; ?>
 <?php echo $this->_tpl_vars['item']['pubdays']; ?>
 <?php echo $this->_tpl_vars['LANG']['DAYS']; ?>
</td>
                </tr>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['form_do'] == 'edit' && $this->_tpl_vars['item']['is_vip']): ?>
			<tr>
				<td height="35"><span><?php echo $this->_tpl_vars['LANG']['VIP_STATUS']; ?>
:</span></td>
				<td height="35"><?php echo $this->_tpl_vars['LANG']['UNTIL']; ?>
 <?php echo $this->_tpl_vars['item']['vipdate']; ?>
</td>
			</tr>
        <?php endif; ?>

		<?php if ($this->_tpl_vars['is_admin'] || ( $this->_tpl_vars['is_billing'] && $this->_tpl_vars['cfg']['vip_enabled'] && ( $this->_tpl_vars['form_do'] == 'add' || ( $this->_tpl_vars['form_do'] == 'edit' && $this->_tpl_vars['cfg']['vip_prolong'] ) ) )): ?>
			<tr>
				<td>
                    <span><?php if ($this->_tpl_vars['form_do'] == 'add' || ! $this->_tpl_vars['item']['is_vip']): ?><?php echo $this->_tpl_vars['LANG']['MARK_AS_VIP']; ?>
<?php else: ?><?php echo $this->_tpl_vars['LANG']['EXTEND_MARK_AS_VIP']; ?>
<?php endif; ?>:</span>
                    <div style="color:gray">
                        <?php echo $this->_tpl_vars['LANG']['VIP_STATUS_HINT']; ?>

                    </div>
                </td>
				<td valign="top" style="padding-top:5px">
                    <select id="vipdays" name="vipdays" <?php if (! $this->_tpl_vars['is_admin']): ?>onchange="calculateVip()"<?php endif; ?>>
                        <option value="0"><?php if ($this->_tpl_vars['form_do'] == 'add' || ! $this->_tpl_vars['item']['is_vip']): ?><?php echo $this->_tpl_vars['LANG']['DO_NOT_DO']; ?>
<?php else: ?><?php echo $this->_tpl_vars['LANG']['LEAVE_AS_IS']; ?>
<?php endif; ?></option>
                        <?php if ($this->_tpl_vars['form_do'] == 'edit' && $this->_tpl_vars['item']['is_vip']): ?>
                            <option value="-1"><?php echo $this->_tpl_vars['LANG']['DELETE_MARK_AS_VIP']; ?>
</option>
                        <?php endif; ?>
                        <?php unset($this->_sections['vipdays']);
$this->_sections['vipdays']['name'] = 'vipdays';
$this->_sections['vipdays']['start'] = (int)1;
$this->_sections['vipdays']['loop'] = is_array($_loop=$this->_tpl_vars['cfg']['vip_max_days']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vipdays']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['vipdays']['show'] = true;
$this->_sections['vipdays']['max'] = $this->_sections['vipdays']['loop'];
if ($this->_sections['vipdays']['start'] < 0)
    $this->_sections['vipdays']['start'] = max($this->_sections['vipdays']['step'] > 0 ? 0 : -1, $this->_sections['vipdays']['loop'] + $this->_sections['vipdays']['start']);
else
    $this->_sections['vipdays']['start'] = min($this->_sections['vipdays']['start'], $this->_sections['vipdays']['step'] > 0 ? $this->_sections['vipdays']['loop'] : $this->_sections['vipdays']['loop']-1);
if ($this->_sections['vipdays']['show']) {
    $this->_sections['vipdays']['total'] = min(ceil(($this->_sections['vipdays']['step'] > 0 ? $this->_sections['vipdays']['loop'] - $this->_sections['vipdays']['start'] : $this->_sections['vipdays']['start']+1)/abs($this->_sections['vipdays']['step'])), $this->_sections['vipdays']['max']);
    if ($this->_sections['vipdays']['total'] == 0)
        $this->_sections['vipdays']['show'] = false;
} else
    $this->_sections['vipdays']['total'] = 0;
if ($this->_sections['vipdays']['show']):

            for ($this->_sections['vipdays']['index'] = $this->_sections['vipdays']['start'], $this->_sections['vipdays']['iteration'] = 1;
                 $this->_sections['vipdays']['iteration'] <= $this->_sections['vipdays']['total'];
                 $this->_sections['vipdays']['index'] += $this->_sections['vipdays']['step'], $this->_sections['vipdays']['iteration']++):
$this->_sections['vipdays']['rownum'] = $this->_sections['vipdays']['iteration'];
$this->_sections['vipdays']['index_prev'] = $this->_sections['vipdays']['index'] - $this->_sections['vipdays']['step'];
$this->_sections['vipdays']['index_next'] = $this->_sections['vipdays']['index'] + $this->_sections['vipdays']['step'];
$this->_sections['vipdays']['first']      = ($this->_sections['vipdays']['iteration'] == 1);
$this->_sections['vipdays']['last']       = ($this->_sections['vipdays']['iteration'] == $this->_sections['vipdays']['total']);
?>
                            <option value="<?php echo $this->_sections['vipdays']['index']; ?>
">
                                <?php echo ((is_array($_tmp=$this->_sections['vipdays']['index'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['DAY1'], $this->_tpl_vars['LANG']['DAY2'], $this->_tpl_vars['LANG']['DAY10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['DAY1'], $this->_tpl_vars['LANG']['DAY2'], $this->_tpl_vars['LANG']['DAY10'])); ?>

                            </option>
                        <?php endfor; endif; ?>
                    </select>

                    <?php if (! $this->_tpl_vars['is_admin']): ?>
                        <input type="hidden" id="vip_day_cost" name="vip_day_cost" value="<?php echo $this->_tpl_vars['cfg']['vip_day_cost']; ?>
" />
                        <input type="hidden" id="balance" name="balance" value="<?php echo $this->_tpl_vars['balance']; ?>
" />
                        <div id="vip_cost" style="margin-top:10px;display: none">
                            <?php echo $this->_tpl_vars['LANG']['BILLING_COST']; ?>
: <span>0</span> <?php echo $this->_tpl_vars['LANG']['BILLING_POINT10']; ?>

                        </div>

                        <script type="text/javascript">
                            var LANG_BUY_ERROR = '<?php echo $this->_tpl_vars['LANG']['VIP_BUY_ERROR']; ?>
';
                            var LANG_ERROR     = '<?php echo $this->_tpl_vars['LANG']['ERROR']; ?>
';
                            <?php echo '
                                function calculateVip(){

                                    var days = $(\'#vipdays\').val();
                                    var cost = $(\'#vip_day_cost\').val();

                                    if (Number(days)==0){
                                        $(\'#vip_cost\').hide().find(\'span\').html(\'0\');
                                    } else {
                                        var summ = days * cost;
                                        $(\'#vip_cost\').show().find(\'span\').html(summ);
                                    }

                                }

                                function checkBalance(){
                                    var cost    = Number($(\'#vip_cost span\').html());
                                    var balance = Number($(\'#balance\').val());

                                    if (balance < cost){
                                        core.alert(LANG_BUY_ERROR, LANG_ERROR);
                                        return false;
                                    } else {
                                        return true;
                                    }
                                }
                            '; ?>

                        </script>
                    <?php endif; ?>

				</td>
			</tr>
		<?php endif; ?>
        <?php if (! $this->_tpl_vars['is_user']): ?>
        <tr>
            <td valign="top" class="">
                <div><strong><?php echo $this->_tpl_vars['LANG']['SECUR_SPAM']; ?>
: </strong></div>
                <div><small><?php echo $this->_tpl_vars['LANG']['SECUR_SPAM_TEXT']; ?>
</small></div>
            </td>
            <td valign="top" class=""><?php echo smarty_function_captcha(array(), $this);?>
</td>
        </tr>
        <?php endif; ?>
		<tr>
			<td height="40" colspan="2" valign="middle">
				<input name="submit" type="submit" id="submit" style="margin-top:10px;font-size:18px" value="<?php echo $this->_tpl_vars['LANG']['SAVE_ADV']; ?>
" <?php if ($this->_tpl_vars['is_admin'] || ( $this->_tpl_vars['is_billing'] && $this->_tpl_vars['cfg']['vip_enabled'] )): ?>onclick="if(!checkBalance())return false;"<?php endif; ?> />
			</td>
		</tr>
	</table>
</form>
<?php echo '
<script type="text/javascript">
	function getRubric(){
		$("#category_id").prop("disabled", false);
		$("#obtype").prop("disabled", true);
		var category_id = $(\'select[name=category_id]\').val();
		if(category_id != 0){
			$.post("/components/board/ajax/get_rubric.php", {value: category_id, obtype: \''; ?>
<?php echo $this->_tpl_vars['item']['obtype']; ?>
<?php echo '\'}, function(data) {
				$("#obtype").prop("disabled", false);
				$("#obtype").html(data);
			});
			'; ?>

			<?php if ($this->_tpl_vars['form_do'] == 'add'): ?>
			<?php echo '
			$.post("/components/board/ajax/get_form.php", {value: category_id}, function(dataform) {
				if(dataform!=1){
					$(\'.cat_form\').remove();
					$("#before_form").after(dataform);
				}else{
					$(\'.cat_form\').remove();
				}
			});
			'; ?>

			<?php endif; ?>
			<?php echo '
		} else {
			$("#obtype").html(\'<option value="0">-- '; ?>
<?php echo $this->_tpl_vars['LANG']['SELECT_CAT']; ?>
<?php echo ' --</option>\');
			$("#obtype").prop("disabled", true);
			$(\'.cat_form\').remove();
		}
	}
	$(document).ready(function() {
		$(\'#title\').focus();
		$(\'#from_search\').hide();
		getRubric();
	});
</script>
'; ?>