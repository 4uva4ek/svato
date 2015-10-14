<?php /* Smarty version 2.6.28, created on 2015-06-08 19:01:01
         compiled from com_users_addwall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'csrf_token', 'com_users_addwall.tpl', 6, false),)), $this); ?>
<form action="/core/ajax/wall.php" method="POST" id="add_wall_form">
    <input type="hidden" name="target_id" value="<?php echo $this->_tpl_vars['target_id']; ?>
" />
    <input type="hidden" name="component" value="<?php echo $this->_tpl_vars['component']; ?>
" />
    <input type="hidden" name="do_wall" value="add" />
    <input type="hidden" name="submit" value="1" />
    <input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
    <div class="usr_msg_bbcodebox"><?php echo $this->_tpl_vars['bb_toolbar']; ?>
</div>
    <div class="cm_smiles"><?php echo $this->_tpl_vars['smilies']; ?>
</div>
    <div class="cm_editor">
        <textarea name="message" id="message" class="ajax_autogrowarea"></textarea>
    </div>
</form>
<script type="text/javascript" src="/includes/jquery/jquery.form.js"></script>
<?php echo '
<script type="text/javascript">
    $(document).ready(function(){
        $(\'#message\').focus();
    });
</script>
'; ?>