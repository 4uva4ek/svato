<?php /* Smarty version 2.6.28, created on 2015-05-25 12:19:39
         compiled from com_users_photos_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_users_photos_view.tpl', 21, false),)), $this); ?>
<?php if ($this->_tpl_vars['is_allow']): ?>

    <?php if ($this->_tpl_vars['myprofile'] || $this->_tpl_vars['is_admin']): ?>
        <div class="float_bar" style="background: none">
            <a class="usr_photo_link_edit" href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/editphoto<?php echo $this->_tpl_vars['photo']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a>
            <a class="usr_photo_link_delete"  href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/delphoto<?php echo $this->_tpl_vars['photo']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a>
        </div>
    <?php endif; ?>

    <div class="con_heading"><?php echo $this->_tpl_vars['photo']['title']; ?>
</div>

    <div class="bar">
        <?php echo $this->_tpl_vars['photo']['genderlink']; ?>
 &mdash; <?php echo $this->_tpl_vars['photo']['pubdate']; ?>
 &mdash; <strong><?php echo $this->_tpl_vars['LANG']['HITS']; ?>
:</strong> <?php echo $this->_tpl_vars['photo']['hits']; ?>

    </div>

    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>

            <td width="50%">
                <?php if ($this->_tpl_vars['previd']): ?>
                    <a class="usr_photo_prev_link" href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/photo<?php echo $this->_tpl_vars['previd']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['previd']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"></a>
                <?php else: ?>
                    &nbsp;
                <?php endif; ?>
            </td>

            <td>
                <div class="usr_photo_view">
                    <?php if ($this->_tpl_vars['nextid']): ?><a href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/photo<?php echo $this->_tpl_vars['nextid']['id']; ?>
.html"><?php endif; ?>
                        <img border="0" src="/images/users/photos/medium/<?php echo $this->_tpl_vars['photo']['imageurl']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
                    <?php if ($this->_tpl_vars['nextid']): ?></a><?php endif; ?>
                </div>
            </td>

            <td width="50%">
                <?php if ($this->_tpl_vars['nextid']): ?>
                    <a class="usr_photo_next_link" href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/photo<?php echo $this->_tpl_vars['nextid']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['nextid']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"></a>
                <?php else: ?>
                    &nbsp;
                <?php endif; ?>
            </td>

        </tr>
    </table>

    <?php if ($this->_tpl_vars['photo']['description']): ?>
        <div class="photo_desc"><?php echo $this->_tpl_vars['photo']['description']; ?>
</div>
    <?php endif; ?>

    <?php echo $this->_tpl_vars['tagbar']; ?>


<?php else: ?>
    <div class="con_heading"><?php echo $this->_tpl_vars['photo']['title']; ?>
</div>

    <div class="bar">
        <?php echo $this->_tpl_vars['photo']['genderlink']; ?>
 &mdash; <?php echo $this->_tpl_vars['photo']['pubdate']; ?>
 &mdash; <strong><?php echo $this->_tpl_vars['LANG']['HITS']; ?>
:</strong> <?php echo $this->_tpl_vars['photo']['hits']; ?>

    </div>

    <table cellpadding="0" cellspacing="0" border="0" width="100%" height="300">
        <tr>

            <td width="30%">
                <?php if ($this->_tpl_vars['previd']): ?>
                    <a class="usr_photo_prev_link" href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/photo<?php echo $this->_tpl_vars['previd']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['previd']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"></a>
                <?php else: ?>
                    &nbsp;
                <?php endif; ?>
            </td>

            <td width="40%">
                <div class="usr_photo_view">
                    <?php if ($this->_tpl_vars['nextid']): ?><a href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/photo<?php echo $this->_tpl_vars['nextid']['id']; ?>
.html"><?php endif; ?>
                        <span><?php echo $this->_tpl_vars['LANG']['PHOTO_NOT_FOUND_TEXT']; ?>
</span>
                    <?php if ($this->_tpl_vars['nextid']): ?></a><?php endif; ?>
                </div>
            </td>

            <td width="30%">
                <?php if ($this->_tpl_vars['nextid']): ?>
                    <a class="usr_photo_next_link" href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/photo<?php echo $this->_tpl_vars['nextid']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['nextid']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"></a>
                <?php else: ?>
                    &nbsp;
                <?php endif; ?>
            </td>

        </tr>
    </table>

<?php endif; ?>