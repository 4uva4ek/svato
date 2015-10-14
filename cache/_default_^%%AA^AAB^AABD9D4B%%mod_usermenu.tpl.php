<?php /* Smarty version 2.6.28, created on 2015-08-07 02:20:41
         compiled from mod_usermenu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'profile_url', 'mod_usermenu.tpl', 4, false),)), $this); ?>
<div class="mod_user_menu">
<?php if ($this->_tpl_vars['id']): ?>
    <div class="my_profile">
   <a title="Мій профіль" href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['login']), $this);?>
"></a>
    </div>
 
    <?php if ($this->_tpl_vars['users_cfg']['sw_msg']): ?>
    <div  class="my_messages">
        <?php if ($this->_tpl_vars['newmsg']['total']): ?>
            <a title="Повідомлення" class="has_new" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages<?php if (! $this->_tpl_vars['newmsg']['messages']): ?>-notices<?php endif; ?>.html" title="<?php echo $this->_tpl_vars['LANG']['NEW_MESSAGES']; ?>
: <?php echo $this->_tpl_vars['newmsg']['messages']; ?>
, <?php echo $this->_tpl_vars['LANG']['NEW_NOTICES']; ?>
: <?php echo $this->_tpl_vars['newmsg']['notices']; ?>
">
			<span><?php echo $this->_tpl_vars['newmsg']['total']; ?>
</span>
			</a>
        <?php else: ?>
            <a title="Повідомлення" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/messages.html"></a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
  

    <div  class="logout">
        <a title="Вихід" href="/logout"></a>
    </div>
<?php else: ?>
    
<?php endif; ?>
</div>