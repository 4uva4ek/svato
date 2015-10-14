<?php /* Smarty version 2.6.28, created on 2015-08-16 13:59:40
         compiled from com_users_profile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'add_js', 'com_users_profile.tpl', 1, false),array('function', 'add_css', 'com_users_profile.tpl', 2, false),)), $this); ?>
<?php echo cmsSmartyAddJS(array('file' => 'includes/jquery/tabs/jquery.ui.min.js'), $this);?>

<?php echo cmsSmartyAddCSS(array('file' => 'includes/jquery/tabs/tabs.css'), $this);?>


<?php echo '
	<script type="text/javascript">
        $(function(){$(".uitabs").tabs();});
	</script>
'; ?>


 

<?php if ($this->_tpl_vars['usr']['group_alias'] == 'atos'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ato_user_profile.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 
<?php elseif ($this->_tpl_vars['usr']['group_alias'] == 'volonters'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vol_user_profile.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vol_user_profile.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

 