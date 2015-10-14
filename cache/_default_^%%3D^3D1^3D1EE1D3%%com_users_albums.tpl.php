<?php /* Smarty version 2.6.28, created on 2015-05-19 22:47:14
         compiled from com_users_albums.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'profile_url', 'com_users_albums.tpl', 8, false),array('modifier', 'escape', 'com_users_albums.tpl', 18, false),array('modifier', 'spellcount', 'com_users_albums.tpl', 26, false),)), $this); ?>
<?php if ($this->_tpl_vars['my_profile']): ?>
    <div class="float_bar">
        <a href="/users/addphoto.html" class="usr_photo_add"><?php echo $this->_tpl_vars['LANG']['ADD_PHOTO']; ?>
</a>
    </div>
<?php endif; ?>

<div class="con_heading">
    <a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['user']['login']), $this);?>
"><?php echo $this->_tpl_vars['user']['nickname']; ?>
</a> &rarr; <?php echo $this->_tpl_vars['LANG']['PHOTOALBUMS']; ?>

</div>

<?php if ($this->_tpl_vars['albums']): ?>

    <div class="usr_albums_block" style="margin-top:30px">
        <ul class="usr_albums_list">
            <?php $_from = $this->_tpl_vars['albums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['album']):
?>
                <li>
                    <div class="usr_album_thumb">
                        <a href="/users/<?php echo $this->_tpl_vars['user']['login']; ?>
/photos/<?php echo $this->_tpl_vars['album']['type']; ?>
<?php echo $this->_tpl_vars['album']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['album']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
                            <img src="<?php echo $this->_tpl_vars['album']['imageurl']; ?>
" width="64" height="64" border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['album']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
                        </a>
                    </div>
                    <div class="usr_album">
                        <div class="link">
                            <a href="/users/<?php echo $this->_tpl_vars['user']['login']; ?>
/photos/<?php echo $this->_tpl_vars['album']['type']; ?>
<?php echo $this->_tpl_vars['album']['id']; ?>
.html"><?php echo $this->_tpl_vars['album']['title']; ?>
</a>
                        </div>
                        <div class="count"><?php echo ((is_array($_tmp=$this->_tpl_vars['album']['photos_count'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['PHOTO'], $this->_tpl_vars['LANG']['PHOTO2'], $this->_tpl_vars['LANG']['PHOTO10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['PHOTO'], $this->_tpl_vars['LANG']['PHOTO2'], $this->_tpl_vars['LANG']['PHOTO10'])); ?>
</div>
                        <div class="date"><?php echo $this->_tpl_vars['album']['pubdate']; ?>
</div>
                    </div>
                </li>
            <?php endforeach; endif; unset($_from); ?>
         </ul>
         <div class="blog_desc"></div>
    </div>

<?php else: ?>
    <p><?php echo $this->_tpl_vars['LANG']['NOT_PHOTOS']; ?>
</p>
<?php endif; ?>