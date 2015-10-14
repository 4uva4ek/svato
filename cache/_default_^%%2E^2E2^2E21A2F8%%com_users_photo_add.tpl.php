<?php /* Smarty version 2.6.28, created on 2015-05-25 11:27:39
         compiled from com_users_photo_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'spellcount', 'com_users_photo_add.tpl', 3, false),array('function', 'add_js', 'com_users_photo_add.tpl', 7, false),array('function', 'add_css', 'com_users_photo_add.tpl', 11, false),)), $this); ?>
<h1 class="con_heading"><?php echo $this->_tpl_vars['LANG']['ADD_PHOTOS']; ?>
</h1>
<?php if ($this->_tpl_vars['total_no_pub']): ?>
<p class="usr_photos_add_limit"><?php echo $this->_tpl_vars['LANG']['NO_PUBLISHED_PHOTO']; ?>
: <a href="/users/<?php echo $this->_tpl_vars['user_login']; ?>
/photos/submit"><?php echo ((is_array($_tmp=$this->_tpl_vars['total_no_pub'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['PHOTO'], $this->_tpl_vars['LANG']['PHOTO2'], $this->_tpl_vars['LANG']['PHOTO10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['PHOTO'], $this->_tpl_vars['LANG']['PHOTO2'], $this->_tpl_vars['LANG']['PHOTO10'])); ?>
</a></p>
<?php endif; ?>
<?php if (! $this->_tpl_vars['stop_photo']): ?>
	<?php if ($this->_tpl_vars['uload_type'] == 'multi'): ?>
<?php echo cmsSmartyAddJS(array('file' => 'includes/swfupload/swfupload.js'), $this);?>

<?php echo cmsSmartyAddJS(array('file' => 'includes/swfupload/swfupload.queue.js'), $this);?>

<?php echo cmsSmartyAddJS(array('file' => 'includes/swfupload/fileprogress.js'), $this);?>

<?php echo cmsSmartyAddJS(array('file' => 'includes/swfupload/handlers.js'), $this);?>

<?php echo cmsSmartyAddCSS(array('file' => 'includes/swfupload/swfupload.css'), $this);?>


<script type="text/javascript">
    <?php echo '
    var swfu;
    var uploadedCount = 0;

    window.onload = function() {
        var settings = {
            flash_url : "/includes/swfupload/swfupload.swf",
            upload_url: "/users/photos/upload",
            post_params: {"PHPSESSID" :'; ?>
 "<?php echo $this->_tpl_vars['sess_id']; ?>
"<?php echo '},
            file_size_limit : "20 MB",
            file_types : "*.jpg;*.png;*.gif;*.jpeg;*.JPG;*.PNG;*.GIF;*.JPEG",
            file_types_description : "'; ?>
<?php echo $this->_tpl_vars['LANG']['ALL_PHOTOS']; ?>
<?php echo '",
    '; ?>

            file_upload_limit : <?php if ($this->_tpl_vars['max_limit']): ?><?php echo $this->_tpl_vars['max_files']; ?>
<?php else: ?>100<?php endif; ?>,
    <?php echo '
            file_queue_limit : 0,
            custom_settings : {
                progressTarget : "fsUploadProgress",
                cancelButtonId : "btnCancel"
            },
            debug: false,

            // Button settings
            button_image_url: "/includes/swfupload/uploadbtn199x36.png",
            button_width: "199",
            button_height: "36",
            button_placeholder_id: "spanButtonPlaceHolder",

            // The event handler functions are defined in handlers.js
            file_queued_handler : fileQueued,
            file_queue_error_handler : fileQueueError,
            file_dialog_complete_handler : fileDialogComplete,
            upload_start_handler : uploadStart,
            upload_progress_handler : uploadProgress,
            upload_error_handler : uploadError,
            upload_success_handler : uploadSuccess,
            upload_complete_handler : uploadComplete,
            queue_complete_handler : queueComplete	// Queue plugin event
        };

        swfu = new SWFUpload(settings);
    };

    function queueComplete(numFilesUploaded) {
        if (numFilesUploaded>0){
            uploadedCount += numFilesUploaded;
            $(\'#divStatus\').show();
            $(\'#continue\').show();
            $("#files_count").html(uploadedCount);
        }
    }

    '; ?>

</script>

<form id="usr_photos_upload_form" action="" method="post" enctype="multipart/form-data">

    <?php if ($this->_tpl_vars['max_limit']): ?>
    <p class="usr_photos_add_limit"><?php echo $this->_tpl_vars['LANG']['YOU_CAN_UPLOAD']; ?>
 <strong><?php echo $this->_tpl_vars['max_files']; ?>
</strong> <?php echo $this->_tpl_vars['LANG']['PHOTO_SHORT']; ?>
</p>
    <?php endif; ?>

        <div class="fieldset flash" id="fsUploadProgress" style="display:none">
            <span class="legend"><?php echo $this->_tpl_vars['LANG']['UPLOAD_QUEUE']; ?>
</span>
        </div>

        <div>
            <span id="spanButtonPlaceHolder"></span>
            <input id="btnCancel" type="button" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 36px;" />
        </div>

        <div id="divStatus" style="display:none">
            <?php echo $this->_tpl_vars['LANG']['UPLOADED']; ?>
 <span id="files_count"><strong>0</strong></span> <?php echo $this->_tpl_vars['LANG']['PHOTO_SHORT']; ?>
.
            <a href="/users/<?php echo $this->_tpl_vars['user_login']; ?>
/photos/submit" id="continue"><?php echo $this->_tpl_vars['LANG']['CONTINUE']; ?>
</a>
        </div>

</form>
        <p class="usr_photos_add_st"><?php echo $this->_tpl_vars['LANG']['TEXT_TO_NO_FLASH']; ?>
 <a href="/users/addphotosingle.html"><?php echo $this->_tpl_vars['LANG']['PHOTO_ST_UPLOAD']; ?>
.</a></p>
    <?php elseif ($this->_tpl_vars['uload_type'] == 'single'): ?>
        <?php if ($this->_tpl_vars['max_limit']): ?>
         <p class="usr_photos_add_limit"><?php echo $this->_tpl_vars['LANG']['YOU_CAN_UPLOAD']; ?>
 <strong><?php echo $this->_tpl_vars['max_files']; ?>
</strong> <?php echo $this->_tpl_vars['LANG']['PHOTO_SHORT']; ?>
</p>
        <?php endif; ?>

        <form id="usr_photos_upload_form" enctype="multipart/form-data" action="/users/photos/upload" method="POST">
            <p><?php echo $this->_tpl_vars['LANG']['SELECT_UPLOAD_FILE']; ?>
: </p>
            <input name="Filedata" type="file" id="picture" size="30" />
            <input name="upload" type="hidden" value="1"/>
            <div style="margin-top:5px">
                <strong><?php echo $this->_tpl_vars['LANG']['TYPE_FILE']; ?>
:</strong> gif, jpg, jpeg, png
            </div>

            <p>
                <input type="submit" value="<?php echo $this->_tpl_vars['LANG']['UPLOAD']; ?>
">
                <input type="button" onclick="window.history.go(-1);" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
"/>
            </p>
        </form>
		<p class="usr_photos_add_st"><?php echo $this->_tpl_vars['LANG']['TEXT_TO_TO_FLASH']; ?>
 <a href="/users/addphoto.html"><?php echo $this->_tpl_vars['LANG']['PHOTO_FL_UPLOAD']; ?>
.</a></p>
    <?php endif; ?>
<?php else: ?>
<p class="usr_photos_add_limit"><?php echo $this->_tpl_vars['LANG']['FOR_ADD_PHOTO_TEXT']; ?>
</p>
<?php endif; ?>