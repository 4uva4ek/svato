<?php /* Smarty version 2.6.28, created on 2015-06-25 14:27:30
         compiled from com_users_not_allow.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_users_not_allow.tpl', 14, false),array('function', 'template', 'com_users_not_allow.tpl', 21, false),)), $this); ?>
<div id="usertitle">
    <div class="con_heading" id="nickname">
        <?php echo $this->_tpl_vars['usr']['nickname']; ?>

    </div>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:14px">
	<tr>
		<td width="200" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td align="center" valign="middle">
                        <div class="usr_avatar">
                            <img alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="usr_img" src="<?php echo $this->_tpl_vars['usr']['avatar']; ?>
" />
                        </div>
						<?php if ($this->_tpl_vars['is_auth']): ?>
							<div id="usermenu">
                            <div class="usr_profile_menu">
                                <table cellpadding="0" cellspacing="6" ><tr>
                                        <tr>
                                            <td><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/profile/friends.png" border="0"/></td>
                                            <td><a class="ajaxlink" href="javascript:void(0)" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onclick="users.addFriend('<?php echo $this->_tpl_vars['usr']['id']; ?>
', this);return false;"><?php echo $this->_tpl_vars['LANG']['ADD_TO_FRIEND']; ?>
</a></td>

                                        </tr>
                                </table>
                                </div>
                            </div>
                        <?php endif; ?>
					</td>
				</tr>
			</table>
	    </td>
    	<td valign="top" style="padding-left:10px">
					<h3><?php echo $this->_tpl_vars['LANG']['ACCESS_SECURITY']; ?>
</h3>
                    <div><?php echo $this->_tpl_vars['LANG']['LAST_VISIT']; ?>
: <?php echo $this->_tpl_vars['usr']['flogdate']; ?>
</div>
	</td>
  </tr>
</table>