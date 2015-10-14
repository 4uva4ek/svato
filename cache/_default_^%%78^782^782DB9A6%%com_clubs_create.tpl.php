<?php /* Smarty version 2.6.28, created on 2015-05-27 12:44:49
         compiled from com_clubs_create.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'csrf_token', 'com_clubs_create.tpl', 8, false),)), $this); ?>
<p>
	<strong><?php echo $this->_tpl_vars['LANG']['CLUBS']; ?>
</strong> <?php echo $this->_tpl_vars['LANG']['CLUBS_DESC']; ?>

</p>
<?php if ($this->_tpl_vars['can_create']): ?>
	<script type="text/javascript" src="/includes/jquery/jquery.form.js"></script>
    <form action="/clubs/create.html" method="post" id="create_club">
        <input type="hidden" name="create" value="1" />
        <input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
        <table border="0" cellspacing="0" cellpadding="0" align="left">
          <tr>
            <td width="120">
              <strong><?php echo $this->_tpl_vars['LANG']['CLUB_NAME']; ?>
: </strong>
            </td>
            <td>
              <input name="title" type="text" id="title" class="text-input" style="width:300px" />
          </td>
          </tr>
          <tr>
            <td><strong><?php echo $this->_tpl_vars['LANG']['CLUB_TYPE']; ?>
: </strong></td>
            <td>
                <select name="clubtype" id="clubtype" style="width:300px">
                  <option value="public"><?php echo $this->_tpl_vars['LANG']['PUBLIC']; ?>
 (public)</option>
                  <option value="private"><?php echo $this->_tpl_vars['LANG']['PRIVATE']; ?>
 (private)</option>
                </select>
            </td>
          </tr>
		  <tr>
            <td><strong>Тип спільноти за змістом: </strong></td>
            <td>
                <select name="typeofclub" id="typeofclub" style="width:300px">
                  <option value="m">Для бійців</option>
                  <option value="v">Для волонтерів</option>
                </select>
            </td>
          </tr>
        </table>
    </form>
    <?php echo '
    <script type="text/javascript">
        $(document).ready(function(){
            $(\'#title\').focus();
        });
    </script>
    '; ?>

<?php endif; ?>
<div class="sess_messages" <?php if (! $this->_tpl_vars['last_message']): ?>style="display:none"<?php endif; ?>>
  <div class="message_info" id="error_mess"><?php echo $this->_tpl_vars['last_message']; ?>
</div>
</div>