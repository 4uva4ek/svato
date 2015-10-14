<?php /* Smarty version 2.6.28, created on 2015-05-19 16:12:16
         compiled from com_clubs_view_photo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'rating', 'com_clubs_view_photo.tpl', 2, false),array('modifier', 'nl2br', 'com_clubs_view_photo.tpl', 7, false),array('modifier', 'escape', 'com_clubs_view_photo.tpl', 15, false),array('function', 'profile_url', 'com_clubs_view_photo.tpl', 2, false),array('function', 'csrf_token', 'com_clubs_view_photo.tpl', 2, false),)), $this); ?>
<div class="float_bar">
<strong><?php echo $this->_tpl_vars['LANG']['RATING']; ?>
: </strong><span id="karmapoints"><?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['rating'])) ? $this->_run_mod_handler('rating', true, $_tmp) : smarty_modifier_rating($_tmp)); ?>
</span> | <strong><?php echo $this->_tpl_vars['LANG']['HITS']; ?>
: </strong> <?php echo $this->_tpl_vars['photo']['hits']; ?>
 | <?php if (! $this->_tpl_vars['photo']['published']): ?><span id="pub_photo_wait" style="color:#F00;"><?php echo $this->_tpl_vars['LANG']['WAIT_MODERING']; ?>
</span><span id="pub_photo_date" style="display:none;"><?php echo $this->_tpl_vars['photo']['pubdate']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['photo']['pubdate']; ?>
<?php endif; ?> | <a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['photo']['login']), $this);?>
"><?php echo $this->_tpl_vars['photo']['nickname']; ?>
</a> <?php if ($this->_tpl_vars['is_author'] || $this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder']): ?>| <a class="ajaxlink" href="javascript:void(0)" onclick="clubs.editPhoto(<?php echo $this->_tpl_vars['photo']['id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a> <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder']): ?><?php if (! $this->_tpl_vars['photo']['published']): ?><span id="pub_photo_link">  | <a class="ajaxlink" href="javascript:void(0)" onclick="clubs.publishPhoto(<?php echo $this->_tpl_vars['photo']['id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['PUBLISH']; ?>
</a></span><?php endif; ?> | <a class="ajaxlink" href="javascript:void(0)" onclick="clubs.deletePhoto(<?php echo $this->_tpl_vars['photo']['id']; ?>
, '<?php echo smarty_function_csrf_token(array(), $this);?>
');return false;"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a><?php endif; ?><?php endif; ?>
</div>

<h1 class="con_heading"><?php echo $this->_tpl_vars['photo']['title']; ?>
</h1>
<?php if ($this->_tpl_vars['photo']['description']): ?>
    <p class="photo_desc"> <?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
 </p>
<?php endif; ?>
<table width="100%" cellspacing="0" cellpadding="3" border="0">
  <tbody>
    <tr>
      <td width="150px" valign="middle" align="center">
      <?php if ($this->_tpl_vars['photo']['previd']): ?>
        <cite><?php echo $this->_tpl_vars['LANG']['PREVIOUS']; ?>
</cite><br>
        <a href="/clubs/photo<?php echo $this->_tpl_vars['photo']['previd']['id']; ?>
.html#main"><img border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['previd']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" src="/images/photos/small/<?php echo $this->_tpl_vars['photo']['previd']['file']; ?>
"></a>
      <?php endif; ?>
      </td>
      <td align="center" valign="top">
      	<img src="/images/photos/medium/<?php echo $this->_tpl_vars['photo']['file']; ?>
" border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" id="view_photo" />
      </td>
      <td width="150px" valign="middle" align="center">
      <?php if ($this->_tpl_vars['photo']['nextid']): ?>
      	<cite><?php echo $this->_tpl_vars['LANG']['NEXT']; ?>
</cite><br>
        <a href="/clubs/photo<?php echo $this->_tpl_vars['photo']['nextid']['id']; ?>
.html#main"><img border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['nextid']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" src="/images/photos/small/<?php echo $this->_tpl_vars['photo']['nextid']['file']; ?>
"></a>
      <?php endif; ?>
      </td>
    </tr>
  </tbody>
</table>
<?php if ($this->_tpl_vars['photo']['karma_buttons']): ?>
	<div class="club_photo"><?php echo $this->_tpl_vars['photo']['karma_buttons']; ?>
</div>
<?php endif; ?>