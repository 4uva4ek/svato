<?php /* Smarty version 2.6.28, created on 2015-05-19 13:07:41
         compiled from com_photos_view_photo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'csrf_token', 'com_photos_view_photo.tpl', 3, false),array('modifier', 'nl2br', 'com_photos_view_photo.tpl', 11, false),array('modifier', 'escape', 'com_photos_view_photo.tpl', 18, false),array('modifier', 'rating', 'com_photos_view_photo.tpl', 41, false),)), $this); ?>
<?php if ($this->_tpl_vars['is_author'] || $this->_tpl_vars['is_admin']): ?>
<div class="float_bar">
<a class="ajaxlink" href="javascript:void(0)" onclick="photos.editPhoto(<?php echo $this->_tpl_vars['photo']['id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a><?php if ($this->_tpl_vars['is_admin']): ?>  | <a class="ajaxlink" href="javascript:void(0)" onclick="photos.movePhoto(<?php echo $this->_tpl_vars['photo']['id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['MOVE']; ?>
</a><?php if (! $this->_tpl_vars['photo']['published']): ?><span id="pub_photo_link">  | <a class="ajaxlink" href="javascript:void(0)" onclick="photos.publishPhoto(<?php echo $this->_tpl_vars['photo']['id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['PUBLISH']; ?>
</a></span><?php endif; ?><?php endif; ?>   | <a class="ajaxlink" href="javascript:void(0)" onclick="photos.deletePhoto(<?php echo $this->_tpl_vars['photo']['id']; ?>
, '<?php echo smarty_function_csrf_token(array(), $this);?>
');return false;"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</a>
</div>
<?php endif; ?>

<h1 class="con_heading"><?php echo $this->_tpl_vars['photo']['title']; ?>
</h1>

<?php if ($this->_tpl_vars['photo']['description']): ?>
    <div class="photo_desc">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

    </div>
<?php endif; ?>

<table cellpadding="0" cellspacing="0" border="0" class="photo_layout">
    <tr>
        <td valign="top" style="padding-right:15px">
            <img src="/images/photos/medium/<?php echo $this->_tpl_vars['photo']['file']; ?>
" border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />

            <?php if ($this->_tpl_vars['photo']['album_nav']): ?>
                <div align="center" style="margin:5px 0 0 0">
                    <?php if ($this->_tpl_vars['previd']): ?>
                        &larr; <a href="/photos/photo<?php echo $this->_tpl_vars['previd']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['PREVIOUS']; ?>
</a>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['previd'] && $this->_tpl_vars['nextid']): ?> | <?php endif; ?>
                    <?php if ($this->_tpl_vars['nextid']): ?>
                        <a href="/photos/photo<?php echo $this->_tpl_vars['nextid']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['NEXT']; ?>
</a> &rarr;
                    <?php endif; ?>
                </div>
			<?php endif; ?>
        </td>
        <td width="7" class="photo_larr">&nbsp;

        </td>
        <td width="250" valign="top">
            <div class="photo_details">

                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                        <td>
                            <p><strong><?php echo $this->_tpl_vars['LANG']['RATING']; ?>
: </strong><span id="karmapoints"><?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['rating'])) ? $this->_run_mod_handler('rating', true, $_tmp) : smarty_modifier_rating($_tmp)); ?>
</span></p>
                            <p><strong><?php echo $this->_tpl_vars['LANG']['HITS']; ?>
: </strong> <?php echo $this->_tpl_vars['photo']['hits']; ?>
</p>
                        </td>
                        <?php if ($this->_tpl_vars['photo']['karma_buttons']): ?>
                            <td width="25"><?php echo $this->_tpl_vars['photo']['karma_buttons']; ?>
</td>
                        <?php endif; ?>
                    </tr>
                </table>

                <div class="photo_date_details">
                    <p><?php if (! $this->_tpl_vars['photo']['published']): ?><span id="pub_photo_wait" style="color:#F00;"><?php echo $this->_tpl_vars['LANG']['WAIT_MODERING']; ?>
</span><span id="pub_photo_date" style="display:none;"><?php echo $this->_tpl_vars['photo']['pubdate']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['photo']['pubdate']; ?>
<?php endif; ?></p>
                    <p><?php echo $this->_tpl_vars['photo']['genderlink']; ?>
</p>
                </div>

                <?php if ($this->_tpl_vars['cfg']['link']): ?>
                    <p class="photo_date_details"><a class="lightbox-enabled" rel="lightbox-galery" href="/images/photos/<?php echo $this->_tpl_vars['photo']['file']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><?php echo $this->_tpl_vars['LANG']['OPEN_ORIGINAL']; ?>
</a></p>
                <?php endif; ?>

            </div>

            <?php if ($this->_tpl_vars['photo']['album_nav']): ?>
                <div class="photo_sub_details">
                    <?php echo $this->_tpl_vars['LANG']['BACK_TO']; ?>
 <a href="/photos/<?php echo $this->_tpl_vars['photo']['album_id']; ?>
"><?php echo $this->_tpl_vars['LANG']['TO_ALBUM']; ?>
</a><br/>
                    <?php echo $this->_tpl_vars['LANG']['BACK_TO']; ?>
  <a href="/photos"><?php echo $this->_tpl_vars['LANG']['TO_LIST_ALBUMS']; ?>
</a>
                </div>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['photo']['a_bbcode']): ?>
            <div class="photo_details" style="margin-top:5px;font-size: 12px">
                <?php echo $this->_tpl_vars['LANG']['CODE_INPUT_TO_FORUMS']; ?>
:<br/>
                <input type="text" class="photo_bbinput" value="<?php echo $this->_tpl_vars['bbcode']; ?>
"/>
            </div>
            <?php endif; ?>

            <div class="photo_sub_details" style="padding:0px 20px">
                <?php echo $this->_tpl_vars['tagbar']; ?>

            </div>

        </td>
    </tr>
</table>