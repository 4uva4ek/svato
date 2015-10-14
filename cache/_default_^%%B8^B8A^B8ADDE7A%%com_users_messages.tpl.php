<?php /* Smarty version 2.6.28, created on 2015-05-19 15:12:39
         compiled from com_users_messages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_users_messages.tpl', 68, false),array('function', 'profile_url', 'com_users_messages.tpl', 81, false),)), $this); ?>
<?php if ($this->_tpl_vars['friends'] || $this->_tpl_vars['is_admin']): ?>
    <div class="float_bar">
        <a href="javascript:void(0)" class="new_link" onclick="users.sendMess(0, 0, this);return false;" title="<?php echo $this->_tpl_vars['LANG']['NEW_MESS']; ?>
:"><span class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['WRITE']; ?>
</span></a>
    </div>
<?php endif; ?>
<div class="con_heading"><?php echo $this->_tpl_vars['LANG']['MY_MESS']; ?>
</div>

<div class="usr_msgmenu_tabs">
    <?php if ($this->_tpl_vars['opt'] == 'in'): ?>
        <span class="usr_msgmenu_active in_span"><?php echo $this->_tpl_vars['page_title']; ?>
 <?php if ($this->_tpl_vars['new_messages']['messages']): ?>(<?php echo $this->_tpl_vars['new_messages']['messages']; ?>
)<?php endif; ?></span>
        <a class="usr_msgmenu_link out_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages-sent.html"><?php echo $this->_tpl_vars['LANG']['SENT']; ?>
</a>
        <a class="usr_msgmenu_link notices_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages-notices.html"><?php echo $this->_tpl_vars['LANG']['NOTICES']; ?>
 <?php if ($this->_tpl_vars['new_messages']['notices']): ?>(<?php echo $this->_tpl_vars['new_messages']['notices']; ?>
)<?php endif; ?></a>
        <a class="usr_msgmenu_link history_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages-history.html"><?php echo $this->_tpl_vars['LANG']['DIALOGS']; ?>
</a>
    <?php elseif ($this->_tpl_vars['opt'] == 'out'): ?>
        <a class="usr_msgmenu_link in_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages.html"><?php echo $this->_tpl_vars['LANG']['INBOX']; ?>
 <?php if ($this->_tpl_vars['new_messages']['messages']): ?>(<?php echo $this->_tpl_vars['new_messages']['messages']; ?>
)<?php endif; ?></a>
        <span class="usr_msgmenu_active out_span"><?php echo $this->_tpl_vars['page_title']; ?>
</span>
        <a class="usr_msgmenu_link notices_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages-notices.html"><?php echo $this->_tpl_vars['LANG']['NOTICES']; ?>
 <?php if ($this->_tpl_vars['new_messages']['notices']): ?>(<?php echo $this->_tpl_vars['new_messages']['notices']; ?>
)<?php endif; ?></a>
        <a class="usr_msgmenu_link history_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages-history.html"><?php echo $this->_tpl_vars['LANG']['DIALOGS']; ?>
</a>
    <?php elseif ($this->_tpl_vars['opt'] == 'notices'): ?>
        <a class="usr_msgmenu_link in_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages.html"><?php echo $this->_tpl_vars['LANG']['INBOX']; ?>
 <?php if ($this->_tpl_vars['new_messages']['messages']): ?>(<?php echo $this->_tpl_vars['new_messages']['messages']; ?>
)<?php endif; ?></a>
        <a class="usr_msgmenu_link out_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages-sent.html"><?php echo $this->_tpl_vars['LANG']['SENT']; ?>
</a>
        <span class="usr_msgmenu_active notices_span"><?php echo $this->_tpl_vars['page_title']; ?>
 <?php if ($this->_tpl_vars['new_messages']['notices']): ?>(<?php echo $this->_tpl_vars['new_messages']['notices']; ?>
)<?php endif; ?></span>
        <a class="usr_msgmenu_link history_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages-history.html"><?php echo $this->_tpl_vars['LANG']['DIALOGS']; ?>
</a>
    <?php elseif ($this->_tpl_vars['opt'] == 'history'): ?>
        <a class="usr_msgmenu_link in_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages.html"><?php echo $this->_tpl_vars['LANG']['INBOX']; ?>
 <?php if ($this->_tpl_vars['new_messages']['messages']): ?>(<?php echo $this->_tpl_vars['new_messages']['messages']; ?>
)<?php endif; ?></a>
        <a class="usr_msgmenu_link out_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages-sent.html"><?php echo $this->_tpl_vars['LANG']['SENT']; ?>
</a>
        <a class="usr_msgmenu_link notices_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages-notices.html"><?php echo $this->_tpl_vars['LANG']['NOTICES']; ?>
 <?php if ($this->_tpl_vars['new_messages']['notices']): ?>(<?php echo $this->_tpl_vars['new_messages']['notices']; ?>
)<?php endif; ?></a>
        <span class="usr_msgmenu_active history_span"><?php echo $this->_tpl_vars['page_title']; ?>
</span>
    <?php endif; ?>
</div>
<div class="usr_msgmenu_bar">
    <strong><?php echo $this->_tpl_vars['LANG']['MESS_INBOX']; ?>
:</strong> <span id="msg_count"><?php echo $this->_tpl_vars['msg_count']; ?>
</span>
<?php if (( $this->_tpl_vars['opt'] != 'history' ) && $this->_tpl_vars['msg_count'] > 0): ?>
    <div style="float: right;"><a href="javascript:void(0)" onclick="users.cleanCat('/users/<?php echo $this->_tpl_vars['id']; ?>
/delmessages-<?php echo $this->_tpl_vars['opt']; ?>
.html');return false;"><?php echo $this->_tpl_vars['LANG']['CLEAN_CAT']; ?>
</a></div>
<?php endif; ?>
<?php if ($this->_tpl_vars['opt'] == 'history'): ?>
    <div style="float: right;">
        <form action="" id="history" method="post">
            <select name="with_id" id="with_id" style="width:360px;" onchange="changeFriend();">
                <option value="0"><?php echo $this->_tpl_vars['LANG']['FRIEND_FOR_DIALOGS']; ?>
</option>
                <?php if ($this->_tpl_vars['interlocutors']): ?>
                    <?php echo $this->_tpl_vars['interlocutors']; ?>

                <?php endif; ?>
            </select>
        </form>
    </div>
<?php endif; ?>
</div>

<?php if ($this->_tpl_vars['records']): ?>
    <?php $_from = $this->_tpl_vars['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['record']):
?>
    <div class="usr_msg_entry" id="usr_msg_entry_id_<?php echo $this->_tpl_vars['record']['id']; ?>
">
        <table style="width:100%" cellspacing="0">
        <tr>
            <td class="usr_msg_title" width=""><strong><?php echo $this->_tpl_vars['record']['authorlink']; ?>
</strong>, <span class="usr_msg_date"><?php echo $this->_tpl_vars['record']['fpubdate']; ?>
</span></td>
            <?php if ($this->_tpl_vars['record']['is_new']): ?>
                <?php if ($this->_tpl_vars['opt'] == 'in' || $this->_tpl_vars['opt'] == 'notices'): ?>
                    <td class="usr_msg_title" width="90" align="right"><span class="msg_new"><?php echo $this->_tpl_vars['LANG']['NEW']; ?>
!</span></td>
                <?php else: ?>
                    <td class="usr_msg_title" width="90" align="right"><a class="msg_delete" href="javascript:void(0)" onclick="users.deleteMessage('<?php echo $this->_tpl_vars['record']['id']; ?>
')"><span class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['CANCEL_MESS']; ?>
</span></a></td>
                <?php endif; ?>
            <?php else: ?>
                <td class="usr_msg_title" width="14" align="right">&nbsp;</td>
                <td class="usr_msg_title" width="20" align="right">&nbsp;</td>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['opt'] == 'in'): ?>
                <?php if ($this->_tpl_vars['record']['sender_id'] > 0): ?>
                    <td class="usr_msg_title" width="80" align="right"><a href="javascript:void(0)" class="msg_reply" onclick="users.sendMess('<?php echo $this->_tpl_vars['record']['from_id']; ?>
', '<?php echo $this->_tpl_vars['record']['id']; ?>
', this);return false;" title="<?php echo $this->_tpl_vars['LANG']['NEW_MESS']; ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['record']['author'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><span class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['REPLY']; ?>
</span></a></td>
                    <td class="usr_msg_title" width="80" align="right"><a class="msg_history" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages-history<?php echo $this->_tpl_vars['record']['from_id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['HISTORY']; ?>
</a></td>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['opt'] == 'in' || ( in_array ( $this->_tpl_vars['opt'] , array ( 'out' , 'history' , 'notices' ) ) && ! $this->_tpl_vars['record']['is_new'] )): ?>
                <td class="usr_msg_title" width="70" align="right"><a class="msg_delete" href="javascript:void(0)" onclick="users.deleteMessage('<?php echo $this->_tpl_vars['record']['id']; ?>
')"><span class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</span></a></td>
            <?php endif; ?>
        </tr>
        </table>
        <table cellspacing="4">
        <tr>
            <td width="70" height="70" valign="middle" align="center" style="border:solid 1px #C3D6DF; padding: 4px">
                <?php if ($this->_tpl_vars['record']['sender_id'] > 0): ?>
                    <a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['record']['author_login']), $this);?>
"><img border="0" class="usr_img_small" src="<?php echo $this->_tpl_vars['record']['user_img']; ?>
" /></a>
                <?php else: ?>
                    <img border="0" class="usr_img_small" src="<?php echo $this->_tpl_vars['record']['user_img']; ?>
" />
                <?php endif; ?>
                <div style="margin: 4px 0 0 0;"><?php echo $this->_tpl_vars['record']['online_status']; ?>
</div>
            </td>
            <td width="" valign="top"><div style="padding:6px"><?php echo $this->_tpl_vars['record']['message']; ?>
</div></td>
        </tr>
        </table>
    </div>
    <?php endforeach; endif; unset($_from); ?>
    <?php echo $this->_tpl_vars['pagebar']; ?>

<?php else: ?>
    <p style="padding:20px 10px"><?php echo $this->_tpl_vars['LANG']['NOT_MESS_IN_CAT']; ?>
</p>
<?php endif; ?>

<?php echo '
	<script type="text/javascript">
        function changeFriend(){
            fr_id = $("#with_id option:selected").val();
            if(fr_id != 0) {
                $("#history").attr("action", \'/users/'; ?>
<?php echo $this->_tpl_vars['id']; ?>
<?php echo '/messages-history\'+fr_id+\'.html\');
                $(\'#history\').submit();
            }
        }
	</script>
'; ?>