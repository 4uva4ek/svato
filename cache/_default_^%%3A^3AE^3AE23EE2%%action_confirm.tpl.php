<?php /* Smarty version 2.6.28, created on 2015-07-27 15:34:45
         compiled from action_confirm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'action_confirm.tpl', 4, false),array('modifier', 'default', 'action_confirm.tpl', 4, false),array('function', 'csrf_token', 'action_confirm.tpl', 6, false),)), $this); ?>
<div class="con_heading"><?php echo $this->_tpl_vars['confirm']['title']; ?>
</div>
<p style="font-size:18px"><?php echo $this->_tpl_vars['confirm']['text']; ?>
</p>
<div style="margin-top:20px">
    <form action="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['confirm']['action'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" method="<?php echo ((is_array($_tmp=@$this->_tpl_vars['confirm']['method'])) ? $this->_run_mod_handler('default', true, $_tmp, 'POST') : smarty_modifier_default($_tmp, 'POST')); ?>
">
            <?php echo $this->_tpl_vars['confirm']['other']; ?>

            <input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
            <input style="font-size:24px; width:100px"
                   type="<?php echo ((is_array($_tmp=@$this->_tpl_vars['confirm']['yes_button']['type'])) ? $this->_run_mod_handler('default', true, $_tmp, 'submit') : smarty_modifier_default($_tmp, 'submit')); ?>
"
                   name="<?php echo ((is_array($_tmp=@$this->_tpl_vars['confirm']['yes_button']['name'])) ? $this->_run_mod_handler('default', true, $_tmp, 'go') : smarty_modifier_default($_tmp, 'go')); ?>
"
                   value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['confirm']['yes_button']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['LANG']['YES']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['LANG']['YES'])); ?>
"
                   onclick="<?php echo ((is_array($_tmp=@$this->_tpl_vars['confirm']['yes_button']['onclick'])) ? $this->_run_mod_handler('default', true, $_tmp, 'true') : smarty_modifier_default($_tmp, 'true')); ?>
"
            />
            <input style="font-size:24px; width:100px"
                   type="<?php echo ((is_array($_tmp=@$this->_tpl_vars['confirm']['no_button']['type'])) ? $this->_run_mod_handler('default', true, $_tmp, 'button') : smarty_modifier_default($_tmp, 'button')); ?>
"
                   name="<?php echo ((is_array($_tmp=@$this->_tpl_vars['confirm']['no_button']['name'])) ? $this->_run_mod_handler('default', true, $_tmp, 'cancel') : smarty_modifier_default($_tmp, 'cancel')); ?>
"
                   value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['confirm']['no_button']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['LANG']['NO']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['LANG']['NO'])); ?>
"
                   onclick="<?php echo ((is_array($_tmp=@$this->_tpl_vars['confirm']['no_button']['onclick'])) ? $this->_run_mod_handler('default', true, $_tmp, 'window.history.go(-1)') : smarty_modifier_default($_tmp, 'window.history.go(-1)')); ?>
"
            />
	</form>
</div>