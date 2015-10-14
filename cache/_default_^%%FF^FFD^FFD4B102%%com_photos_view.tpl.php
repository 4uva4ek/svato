<?php /* Smarty version 2.6.28, created on 2015-05-19 13:07:14
         compiled from com_photos_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'template', 'com_photos_view.tpl', 5, false),array('function', 'math', 'com_photos_view.tpl', 60, false),array('modifier', 'nl2br', 'com_photos_view.tpl', 42, false),array('modifier', 'escape', 'com_photos_view.tpl', 50, false),array('modifier', 'truncate', 'com_photos_view.tpl', 83, false),array('modifier', 'spellcount', 'com_photos_view.tpl', 90, false),)), $this); ?>
<?php if ($this->_tpl_vars['album']['id'] == $this->_tpl_vars['root_album_id'] && $this->_tpl_vars['cfg']['showlat']): ?>
<div class="float_bar">
    <table cellspacing="0" cellpadding="0">
      <tr>
        <td width="23"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/calendar.png" /></td>
        <td style="padding-right: 10px"><a href="/photos/latest.html"><?php echo $this->_tpl_vars['LANG']['LAST_UPLOADED']; ?>
</a></td>
        <td width="23"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/rating.png" /></td>
        <td><a href="/photos/top.html"><?php echo $this->_tpl_vars['LANG']['BEST_PHOTOS']; ?>
</a></td>
      </tr>
    </table>
</div>
<?php elseif ($this->_tpl_vars['album']['id'] != $this->_tpl_vars['root_album_id'] && $this->_tpl_vars['album']['orderform']): ?>

    <div class="float_bar">
        <form action="" method="POST" style="float: left">
            <?php echo $this->_tpl_vars['LANG']['SORTING_PHOTOS']; ?>
:
            <select name="orderby" id="orderby">
                <option value="title" <?php if ($this->_tpl_vars['orderby'] == 'title'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_TITLE']; ?>
</option>
                <option value="pubdate" <?php if ($this->_tpl_vars['orderby'] == 'pubdate'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_DATE']; ?>
</option>
                <option value="rating" <?php if ($this->_tpl_vars['orderby'] == 'rating'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_RATING']; ?>
</option>
                <option value="hits" <?php if ($this->_tpl_vars['orderby'] == 'hits'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_HITS']; ?>
</option>
            </select>
            <select name="orderto" id="orderto">
                <option value="desc" <?php if ($this->_tpl_vars['orderto'] == 'desc'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_DESC']; ?>
</option>
                <option value="asc" <?php if ($this->_tpl_vars['orderto'] == 'asc'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['ORDERBY_ASC']; ?>
</option>
            </select>
            <input type="submit" value=">>" />
        </form>
        <?php if ($this->_tpl_vars['can_add_photo']): ?>
            <a class="photo_add_link" href="/photos/<?php echo $this->_tpl_vars['album']['id']; ?>
/addphoto.html"><?php echo $this->_tpl_vars['LANG']['ADD_PHOTO_TO_ALBUM']; ?>
</a>
        <?php endif; ?>
    </div>

<?php elseif ($this->_tpl_vars['can_add_photo'] && $this->_tpl_vars['album']['parent_id'] > 0): ?>
	<div class="float_bar"><a class="photo_add_link" href="/photos/<?php echo $this->_tpl_vars['album']['id']; ?>
/addphoto.html"><?php echo $this->_tpl_vars['LANG']['ADD_PHOTO_TO_ALBUM']; ?>
</a></div>
<?php endif; ?>

<h1 class="con_heading"><?php echo $this->_tpl_vars['album']['title']; ?>
 <?php if ($this->_tpl_vars['total']): ?>(<?php echo $this->_tpl_vars['total']; ?>
)<?php endif; ?></h1>

<div class="clear"></div>
<?php if ($this->_tpl_vars['album']['description']): ?>
	<p class="usr_photos_notice"><?php echo ((is_array($_tmp=$this->_tpl_vars['album']['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
<?php endif; ?>
<?php if ($this->_tpl_vars['subcats']): ?>
    <?php $this->assign('col', '1'); ?>
        <?php $_from = $this->_tpl_vars['subcats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['cat']):
?>
        <?php if ($this->_tpl_vars['col'] == 1): ?><div class="photo_row"><?php endif; ?>
            <div class="photo_album_tumb">
                <div class="photo_container">
                    <a href="/photos/<?php echo $this->_tpl_vars['cat']['id']; ?>
"><img class="photo_album_img" src="/images/photos/small/<?php echo $this->_tpl_vars['cat']['file']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" width="<?php echo $this->_tpl_vars['cat']['thumb1']; ?>
px" /></a>
                </div>
                <div class="photo_txt">
                    <ul>
                        <li class="photo_album_title"><a href="/photos/<?php echo $this->_tpl_vars['cat']['id']; ?>
"><?php echo $this->_tpl_vars['cat']['title']; ?>
</a> (<?php echo $this->_tpl_vars['cat']['content_count']; ?>
)</li>
                        <?php if ($this->_tpl_vars['cat']['description']): ?><li><?php echo $this->_tpl_vars['cat']['description']; ?>
</li><?php endif; ?>
                    </ul>
                </div>
            </div>

         <?php if ($this->_tpl_vars['col'] == $this->_tpl_vars['cfg']['maxcols']): ?><div class="blog_desc"></div></div> <?php $this->assign('col', '1'); ?> <?php else: ?> <?php echo smarty_function_math(array('equation' => "z + 1",'z' => $this->_tpl_vars['col'],'assign' => 'col'), $this);?>
  <?php endif; ?>

        <?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_tpl_vars['col'] > 1): ?>
            <div class="blog_desc"></div></div>
        <?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['photos']): ?>
<?php $this->assign('col', '1'); ?>
<div class="photo_gallery">
    <table cellpadding="0" cellspacing="0">
    <?php $_from = $this->_tpl_vars['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['photo']):
?>
        <?php if ($this->_tpl_vars['col'] == 1): ?> <tr> <?php endif; ?>
        <td align="center" valign="middle" width="<?php echo smarty_function_math(array('equation' => "100/x",'x' => $this->_tpl_vars['album']['maxcols']), $this);?>
%">
            <div class="<?php echo $this->_tpl_vars['album']['cssprefix']; ?>
photo_thumb" align="center">
                <?php if ($this->_tpl_vars['album']['showtype'] == 'lightbox'): ?>
                <a class="lightbox-enabled" rel="lightbox-galery" href="/images/photos/medium/<?php echo $this->_tpl_vars['photo']['file']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
                <?php else: ?>
                <a href="/photos/photo<?php echo $this->_tpl_vars['photo']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
                <?php endif; ?>
                    <img src="/images/photos/small/<?php echo $this->_tpl_vars['photo']['file']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
                </a><br />
                <a href="/photos/photo<?php echo $this->_tpl_vars['photo']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 18) : smarty_modifier_truncate($_tmp, 18)); ?>
</a>
                <?php if ($this->_tpl_vars['album']['showdate']): ?>
                    <div class="mod_lp_albumlink"><div class="mod_lp_details">
                    <table cellpadding="2" cellspacing="0" align="center"><tr>
                        <td><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/calendar.png" /></td>
                        <td><?php echo $this->_tpl_vars['photo']['pubdate']; ?>
</td>
                        <td><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/comment-small.png" /></td>
                        <td><a href="/photos/photo<?php echo $this->_tpl_vars['photo']['id']; ?>
.html#c" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['comments'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['COMMENT1'], $this->_tpl_vars['LANG']['COMMENT2'], $this->_tpl_vars['LANG']['COMMENT10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['COMMENT1'], $this->_tpl_vars['LANG']['COMMENT2'], $this->_tpl_vars['LANG']['COMMENT10'])); ?>
"><?php echo $this->_tpl_vars['photo']['comments']; ?>
</a></td>
                    </tr></table>
                    </div></div>
                <?php endif; ?>
                <?php if (! $this->_tpl_vars['photo']['published']): ?>
                    <div style="color:#F00; font-size:12px"><?php echo $this->_tpl_vars['LANG']['WAIT_MODERING']; ?>
</div>
                <?php endif; ?>
        	</div>
        </td>
    <?php if ($this->_tpl_vars['col'] == $this->_tpl_vars['album']['maxcols']): ?> </tr> <?php $this->assign('col', '1'); ?> <?php else: ?> <?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['col'],'assign' => 'col'), $this);?>
 <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php if ($this->_tpl_vars['col'] > 1): ?>
        <td colspan="<?php echo smarty_function_math(array('equation' => "x - y + 1",'x' => $this->_tpl_vars['col'],'y' => $this->_tpl_vars['album']['maxcols']), $this);?>
">&nbsp;</td></tr>
    <?php endif; ?>
    </table>
</div>
<?php echo $this->_tpl_vars['pagebar']; ?>

<?php else: ?>
	<?php if ($this->_tpl_vars['album']['parent_id'] > 0): ?><p><?php echo $this->_tpl_vars['LANG']['NOT_PHOTOS_IN_ALBUM']; ?>
</p><?php endif; ?>
<?php endif; ?>