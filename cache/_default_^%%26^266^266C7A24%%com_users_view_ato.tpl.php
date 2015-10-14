<?php /* Smarty version 2.6.28, created on 2015-08-16 13:59:14
         compiled from com_users_view_ato.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_users_view_ato.tpl', 23, false),array('function', 'city_input', 'com_users_view_ato.tpl', 27, false),array('function', 'profile_url', 'com_users_view_ato.tpl', 67, false),)), $this); ?>
<?php if ($this->_tpl_vars['cfg']['sw_search']): ?>
<div id="users_search_link" class="float_bar"><a href="javascript:void(0)" onclick="<?php echo '$(\'#users_sbar\').slideToggle(\'fast\');'; ?>
"> <span><?php echo $this->_tpl_vars['LANG']['USERS_SEARCH']; ?>
</span> </a> </div>
<?php endif; ?>
<h1 class="con_heading"><?php echo $this->_tpl_vars['LANG']['USERS']; ?>
</h1>
<?php if ($this->_tpl_vars['cfg']['sw_search']): ?>
<div id="users_sbar" <?php if (! $this->_tpl_vars['stext']): ?>style="display:none;"<?php endif; ?>>
  <form name="usr_search_form" method="post" action="/users">
    <table cellpadding="2" width="100%">
      <tr>
        <td width="80"><?php echo $this->_tpl_vars['LANG']['FIND']; ?>
: </td>
        <td width="170"><select name="gender" id="gender" class="field" style="width:150px">
            <option value="f" <?php if ($this->_tpl_vars['gender'] == 'f'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['FIND_FEMALE']; ?>
</option>
            <option value="m" <?php if ($this->_tpl_vars['gender'] == 'm'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['FIND_MALE']; ?>
</option>
            <option value="all" <?php if (! $this->_tpl_vars['gender']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['FIND_ALL']; ?>
</option>
          </select></td>
        <td width="80"><?php echo $this->_tpl_vars['LANG']['AGE_FROM']; ?>
</td>
        <td><input style="width:60px" name="agefrom" type="text" id="agefrom" value="<?php if ($this->_tpl_vars['age_fr']): ?><?php echo $this->_tpl_vars['age_fr']; ?>
<?php endif; ?>"/>
          <?php echo $this->_tpl_vars['LANG']['TO']; ?>

          <input style="width:60px" name="ageto" type="text" id="ageto" value="<?php if ($this->_tpl_vars['age_to']): ?><?php echo $this->_tpl_vars['age_to']; ?>
<?php endif; ?>"/></td>
      </tr>
      <tr>
        <td> <?php echo $this->_tpl_vars['LANG']['NAME']; ?>
 </td>
        <td colspan="3"><input id="name" name="name" class="longfield" type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/></td>
      </tr>
      <tr>
        <td><?php echo $this->_tpl_vars['LANG']['CITY']; ?>
</td>
        <td colspan="3"><?php echo smarty_function_city_input(array('value' => $this->_tpl_vars['city'],'name' => 'city','width' => '408px'), $this);?>
</td>
      </tr>
      <tr>
        <td><?php echo $this->_tpl_vars['LANG']['HOBBY']; ?>
</td>
        <td colspan="3"><input style="" id="hobby" class="longfield" name="hobby" type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['hobby'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/></td>
      </tr>
    </table>
	<p><label for="online" style="display:inherit;"><input id="online" name="online" type="checkbox" value="1" <?php if ($this->_tpl_vars['only_online']): ?> checked="checked"<?php endif; ?>> <?php echo $this->_tpl_vars['LANG']['SHOW_ONLY_ONLINE']; ?>
</label></p>
    <p>
      <input name="gosearch" type="submit" id="gosearch" value="<?php if ($this->_tpl_vars['stext']): ?><?php echo $this->_tpl_vars['LANG']['SEARCH_IN_RESULTS']; ?>
<?php else: ?><?php echo $this->_tpl_vars['LANG']['SEARCH']; ?>
<?php endif; ?>" />
      <?php if ($this->_tpl_vars['stext']): ?>
      	<input type="button" value="<?php echo $this->_tpl_vars['LANG']['CANCEL_SEARCH_SHOWALL']; ?>
" onclick="centerLink('/users/all.html')" />
      <?php endif; ?>
      <input name="hide" type="button" id="hide" value="<?php echo $this->_tpl_vars['LANG']['HIDE']; ?>
" onclick="<?php echo '$(\'#users_sbar\').slideToggle();'; ?>
"/>
    </p>
  </form>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['stext'] && ! $this->_tpl_vars['cfg']['sw_search']): ?>
<div class="users_search_results"> <a href="javascript:void(0)" rel="nofollow" onclick="centerLink('/users/all.html')" style="float: right; margin:4px 0 0 0"><?php echo $this->_tpl_vars['LANG']['CANCEL_SEARCH_SHOWALL']; ?>
</a>
  <h3><?php echo $this->_tpl_vars['LANG']['SEARCH_RESULT']; ?>
</h3>
  <ul>
    <?php $_from = $this->_tpl_vars['stext']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['text']):
?>
    <li><?php echo $this->_tpl_vars['text']; ?>
</li>
    <?php endforeach; endif; unset($_from); ?>
  </ul>
</div>
<?php endif; ?>
  <div class="users_list_buttons">

    <div class="button selected"><a rel=”nofollow” href="/users/ato_members/list">Підтверджені часники АТО</a></div>
    <div class="button"><a rel=”nofollow” href="/users/preato_members/list">Нові часники АТО</a></div>

  </div>
  <div class="users_list">
    <table width="100%" cellspacing="0" cellpadding="0" class="users_list">
      <?php if ($this->_tpl_vars['total']): ?>
      <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['usr']):
?>
      <tr>
        <td width="80" valign="top"><div class="avatar"><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['usr']['login']), $this);?>
"><img alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="usr_img_small" src="<?php echo $this->_tpl_vars['usr']['avatar']; ?>
" /></a></div></td>
        <td valign="top">
          
          <div class="status">
		  <?php if ($this->_tpl_vars['usr']['group_alias'] == 'atos'): ?> <sup>учасник АТО</sup> <?php endif; ?> <?php if ($this->_tpl_vars['usr']['group_alias'] == 'volotners'): ?> <sup>волонтер</sup> <?php endif; ?>
          	<?php if ($this->_tpl_vars['usr']['is_online']): ?>
            	<span class="online"><?php echo $this->_tpl_vars['LANG']['ONLINE']; ?>
</span>

            <?php endif; ?>
          </div>
          <div class="nickname"><?php echo $this->_tpl_vars['usr']['user_link']; ?>
</div>
          <?php if ($this->_tpl_vars['usr']['microstatus']): ?>
          <div class="microstatus"><?php echo $this->_tpl_vars['usr']['microstatus']; ?>
</div>
          <?php endif; ?> </td>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
      <?php else: ?>
      <tr>
        <td><p><?php echo $this->_tpl_vars['LANG']['USERS_NOT_FOUND']; ?>
.</p></td>
      </tr>
      <?php endif; ?>
    </table>
  </div>
  <?php echo $this->_tpl_vars['pagebar']; ?>