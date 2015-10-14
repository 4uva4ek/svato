<?php /* Smarty version 2.6.28, created on 2015-08-16 13:59:38
         compiled from com_users_wall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'csrf_token', 'com_users_wall.tpl', 10, false),array('function', 'profile_url', 'com_users_wall.tpl', 18, false),)), $this); ?>
<input type="hidden" name="target_id" value="<?php echo $this->_tpl_vars['target_id']; ?>
" />
<input type="hidden" name="component" value="<?php echo $this->_tpl_vars['component']; ?>
" />

<?php if ($this->_tpl_vars['total']): ?>

    <?php $_from = $this->_tpl_vars['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['record']):
?>
        <div class="usr_wall_entry" id="wall_entry_<?php echo $this->_tpl_vars['record']['id']; ?>
">
            
            <?php if ($this->_tpl_vars['my_profile'] || $this->_tpl_vars['record']['author_id'] == $this->_tpl_vars['user_id'] || $this->_tpl_vars['is_admin']): ?>
                <div class="usr_wall_delete"><a class="ajaxlink" href="javascript:void(0)" onclick="deleteWallRecord('<?php echo $this->_tpl_vars['component']; ?>
', '<?php echo $this->_tpl_vars['target_id']; ?>
', '<?php echo $this->_tpl_vars['record']['id']; ?>
', '<?php echo smarty_function_csrf_token(array(), $this);?>
');return false;"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a></div>
            <?php endif; ?>

            <table style="width:100%; margin-bottom:2px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="70" valign="top" align="center" style="text-align:center">
				
                    <div class="usr_wall_avatar">
                        <a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['record']['author_login']), $this);?>
"><img border="0" class="usr_img_small" src="<?php echo $this->_tpl_vars['record']['avatar']; ?>
" /></a>
                    </div>
					
                </td>
                <td  valign="top" class="usr_wall_text">
				
				<div class="usr_wall_title">
				<?php echo $this->_tpl_vars['record']['author']; ?>
<br>
				<span><?php echo $this->_tpl_vars['record']['fpubdate']; ?>
<?php if ($this->_tpl_vars['record']['is_today']): ?> <?php echo $this->_tpl_vars['LANG']['BACK']; ?>
<?php endif; ?></span>
				</div>
				
				<?php echo $this->_tpl_vars['record']['content']; ?>

				
				</td>
            </tr>
            </table>
        </div>
    <?php endforeach; endif; unset($_from); ?>

	<?php echo $this->_tpl_vars['pagebar']; ?>


<?php else: ?>
    <p><?php echo $this->_tpl_vars['LANG']['NOT_POSTS_ON_WALL_TEXT']; ?>
</p>
<?php endif; ?>