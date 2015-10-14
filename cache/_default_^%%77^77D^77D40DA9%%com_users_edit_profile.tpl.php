<?php /* Smarty version 2.6.28, created on 2015-05-26 18:02:39
         compiled from com_users_edit_profile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'add_js', 'com_users_edit_profile.tpl', 1, false),array('function', 'add_css', 'com_users_edit_profile.tpl', 2, false),array('function', 'csrf_token', 'com_users_edit_profile.tpl', 23, false),array('function', 'city_input', 'com_users_edit_profile.tpl', 49, false),array('function', 'dateform', 'com_users_edit_profile.tpl', 55, false),array('modifier', 'escape', 'com_users_edit_profile.tpl', 31, false),)), $this); ?>
<?php echo cmsSmartyAddJS(array('file' => 'includes/jquery/tabs/jquery.ui.min.js'), $this);?>

<?php echo cmsSmartyAddCSS(array('file' => 'includes/jquery/tabs/tabs.css'), $this);?>


<?php echo '
	<script type="text/javascript">
		$(function(){$(".uitabs").tabs();});
	</script>
'; ?>


<div class="con_heading"><?php echo $this->_tpl_vars['LANG']['CONFIG_PROFILE']; ?>
</div>

<div id="profiletabs" class="uitabs">
    <ul id="tabs">
        <li><a href="#about"><span><?php echo $this->_tpl_vars['LANG']['ABOUT_ME']; ?>
</span></a></li>
        <li><a href="#contacts"><span><?php echo $this->_tpl_vars['LANG']['CONTACTS']; ?>
</span></a></li>
        <li><a href="#notices"><span><?php echo $this->_tpl_vars['LANG']['NOTIFIC']; ?>
</span></a></li>
        <li><a href="#policy"><span><?php echo $this->_tpl_vars['LANG']['PRIVACY']; ?>
</span></a></li>
        <li rel="hid"><a href="#change_password"><span><?php echo $this->_tpl_vars['LANG']['CHANGING_PASS']; ?>
</span></a></li>
    </ul>

    <form id="editform" name="editform" enctype="multipart/form-data" method="post" action="">
        <input type="hidden" name="opt" value="save" />
        <input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
        <div id="about">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="300" valign="top">
                        <strong><?php echo $this->_tpl_vars['LANG']['YOUR_NAME']; ?>
: </strong><br />
                        <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['YOUR_NAME_TEXT']; ?>
</span>
                    </td>
                    <td valign="top"><input name="nickname" type="text" class="text-input" id="nickname" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/></td>
                </tr>
                <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['SEX']; ?>
:</strong></td>
                    <td valign="top">
                        <select name="gender" id="gender" style="width:307px">
                            <option value="0" <?php if ($this->_tpl_vars['usr']['gender'] == 0): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['NOT_SPECIFIED']; ?>
</option>
                            <option value="m" <?php if ($this->_tpl_vars['usr']['gender'] == 'm'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['MALES']; ?>
</option>
                            <option value="f" <?php if ($this->_tpl_vars['usr']['gender'] == 'f'): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['FEMALES']; ?>
</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <strong><?php echo $this->_tpl_vars['LANG']['CITY']; ?>
:</strong><br />
                        <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['CITY_TEXT']; ?>
</span>
                    </td>
                    <td valign="top">
                        <?php echo smarty_function_city_input(array('value' => $this->_tpl_vars['usr']['city'],'name' => 'city','width' => '300px'), $this);?>

                    </td>
                </tr>
                <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['BIRTH']; ?>
:</strong> </td>
                    <td valign="top">
                        <?php echo smarty_function_dateform(array('seldate' => $this->_tpl_vars['usr']['birthdate']), $this);?>

                    </td>
                </tr>
                <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['PHONES']; ?>
:</strong></td>
                    <td valign="top"><textarea name="phones" class="text-input" style="width:300px" rows="2" id="phones"><?php echo $this->_tpl_vars['usr']['phones']; ?>
</textarea></td>
                 </tr>
				 
				 <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['RESIDENCE']; ?>
:</strong></td>
                    <td valign="top"><textarea name="residence" class="text-input" style="width:300px" rows="2" id="residence"><?php echo $this->_tpl_vars['usr']['residence']; ?>
</textarea></td>
                 </tr>
				 
				 <?php if ($this->_tpl_vars['usr']['group_alias'] == 'atos'): ?>
				 <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['KINSCONTACTS']; ?>
:</strong></td>
                    <td valign="top"><textarea name="kinscontacts" class="text-input" style="width:300px" rows="2" id="kinscontacts"><?php echo $this->_tpl_vars['usr']['kinscontacts']; ?>
</textarea></td>
                 </tr>
				
				 <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['ATOSPECIALTY']; ?>
:</strong></td>
                    <td valign="top">
					
					
					<textarea name="atospecialty" class="text-input" style="width:300px" rows="2" id="atospecialty"><?php echo $this->_tpl_vars['usr']['atospecialty']; ?>
</textarea>
					</td>
                 </tr>
				  
				 
				 	 <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['ARMEDGROUP']; ?>
:</strong></td>
                    <td valign="top">
                  <select name="armedgroup"  id="armedgroup" >
                            <option disabled selected>Виберіть зі списку:</option>
							
							
					 <?php $_from = $this->_tpl_vars['armedlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['armedgroup']):
?>
					  <?php if ($this->_tpl_vars['armedgroup']): ?>
                      <option <?php if ($this->_tpl_vars['usr']['armedgroup'] == $this->_tpl_vars['armedgroup']): ?>selected<?php endif; ?> value="<?php echo $this->_tpl_vars['armedgroup']; ?>
" ><?php echo $this->_tpl_vars['armedgroup']; ?>
</option>
					  <?php endif; ?>
                     <?php endforeach; endif; unset($_from); ?>
                      <option value="" >---===Вказати інше формування===---</option>
                  </select>

     </tr>
				 
				<tr class="tr-otharmedgroup">
                    <td width="300" valign="top">
                        <strong><?php echo $this->_tpl_vars['LANG']['OTHARMEDGROUP']; ?>
: </strong>
                    
                    </td>
                    <td valign="top"><input name="otharmedgroup" type="text" class="text-input" id="otharmedgroup" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['otharmedgroup'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/></td>
                </tr>
				 
				 <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['PREATOSPECIALTY']; ?>
:</strong></td>
                    <td valign="top"><textarea name="preatospecialty" class="text-input" style="width:300px" rows="2" id="preatospecialty"><?php echo $this->_tpl_vars['usr']['preatospecialty']; ?>
</textarea></td>
                 </tr>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['usr']['group_alias'] == 'volonters'): ?>
				 <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['EDUCATION']; ?>
:</strong></td>
                    <td valign="top"><textarea name="education" class="text-input" style="width:300px" rows="2" id="education"><?php echo $this->_tpl_vars['usr']['education']; ?>
</textarea></td>
                 </tr>
				 
				 <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['ATOHELPED']; ?>
:</strong></td>
				<td valign="top">
				  <p><input type="radio" name="atohelped" value="Організаційна робота" <?php if ($this->_tpl_vars['usr']['atohelped'] == 'Організаційна робота'): ?>checked<?php endif; ?>/>Організаційна робота<Br>
					 <input type="radio" name="atohelped" value="Фінансова допомога" <?php if ($this->_tpl_vars['usr']['atohelped'] == 'Фінансова допомога'): ?>checked<?php endif; ?> />Фінансова допомога<Br> 
					 <input type="radio" name="atohelped" value="Матеріально-технічна допомога" <?php if ($this->_tpl_vars['usr']['atohelped'] == 'Матеріально-технічна допомога'): ?>checked<?php endif; ?> />Матеріально-технічна допомога<Br> 
					 <input type="radio" name="atohelped" value="Інший вид допомоги" id="edithelpedother" <?php if ($this->_tpl_vars['usr']['atohelped'] == 'Інший вид допомоги'): ?>checked<?php endif; ?> />Інший вид допомоги:</p>
					<textarea name="atohelpedother" class="text-input" style="width:300px; <?php if ($this->_tpl_vars['usr']['atohelped'] !== 'Інший вид допомоги'): ?>display:none;<?php else: ?>display:block;<?php endif; ?> " rows="2" ><?php echo $this->_tpl_vars['usr']['atohelpedother']; ?>
</textarea>
                  </td> 
                   
                 </tr>
				 <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['ATOHELPING']; ?>
:</strong></td>
					
					<td valign="top">
				  <p><input type="radio" name="atohelping" value="Організаційна робота" <?php if ($this->_tpl_vars['usr']['atohelping'] == 'Організаційна робота'): ?>checked<?php endif; ?>/>Організаційна робота<Br>
					 <input type="radio" name="atohelping" value="Фінансова допомога" <?php if ($this->_tpl_vars['usr']['atohelping'] == 'Фінансова допомога'): ?>checked<?php endif; ?> />Фінансова допомога<Br> 
					 <input type="radio" name="atohelping" value="Матеріально-технічна допомога" <?php if ($this->_tpl_vars['usr']['atohelping'] == 'Матеріально-технічна допомога'): ?>checked<?php endif; ?> />Матеріально-технічна допомога<Br> 
					 <input type="radio" name="atohelping" value="Інший вид допомоги" id="edithelpingother"<?php if ($this->_tpl_vars['usr']['atohelping'] == 'Інший вид допомоги'): ?>checked<?php endif; ?> />Інший вид допомоги:</p>
					<textarea  name="atohelpingother" style="width:300px; <?php if ($this->_tpl_vars['usr']['atohelping'] !== 'Інший вид допомоги'): ?>display:none;<?php else: ?>display:block;<?php endif; ?>" class="text-input" rows="2" ><?php echo $this->_tpl_vars['usr']['atohelpingother']; ?>
</textarea>
                  </td> 
					
                 </tr> 
				 
				 
				 
				 
				  <?php endif; ?>
				 
                
                <?php if ($this->_tpl_vars['private_forms']): ?>
                    <?php $_from = $this->_tpl_vars['private_forms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['field']):
?>
                    <tr>
                        <td valign="top">
                            <strong><?php echo $this->_tpl_vars['field']['title']; ?>
:</strong>
                            <?php if ($this->_tpl_vars['field']['description']): ?>
                                <br /><span class="usr_edithint"><?php echo $this->_tpl_vars['field']['description']; ?>
</span>
                            <?php endif; ?>
                        </td>
                        <td valign="top">
                            <?php echo $this->_tpl_vars['field']['field']; ?>

                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            </table>
        </div>

        <div id="contacts">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="300" valign="top">
                        <strong>E-mail:</strong><br />
                        <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['REALY_ADRESS_EMAIL']; ?>
</span>
                    </td>
                    <td valign="top">
                        <input name="email" type="text" class="text-input" id="email" style="width:300px" value="<?php echo $this->_tpl_vars['usr']['email']; ?>
"/>
                    </td>
                </tr>
               
            </table>
        </div>

        <div id="notices">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="300" valign="top">
                        <strong>
                            <?php echo $this->_tpl_vars['LANG']['NOTIFY_NEW_MESS']; ?>
:
                        </strong><br/>
                        <span class="usr_edithint">
                            <?php echo $this->_tpl_vars['LANG']['NOTIFY_NEW_MESS_TEXT']; ?>

                        </span>
                    </td>
                    <td valign="top">
                        <label><input name="email_newmsg" type="radio" value="1" <?php if ($this->_tpl_vars['usr']['email_newmsg']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['YES']; ?>
 </label>
                        <label><input name="email_newmsg" type="radio" value="0" <?php if (! $this->_tpl_vars['usr']['email_newmsg']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['NO']; ?>
</label>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <strong><?php echo $this->_tpl_vars['LANG']['HOW_NOTIFY_NEW_MESS']; ?>
 </strong><br />
                        <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['WHERE_TO_SEND']; ?>
</span>
                    </td>
                    <td valign="top">
                        <select name="cm_subscribe" id="cm_subscribe" style="width:307px">
                            <option value="mail" <?php if ($this->_tpl_vars['usr']['cm_subscribe'] == 'mail'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_EMAIL']; ?>
</option>
                            <option value="priv" <?php if ($this->_tpl_vars['usr']['cm_subscribe'] == 'priv'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_PRIVATE_MESS']; ?>
</option>
                            <option value="both" <?php if ($this->_tpl_vars['usr']['cm_subscribe'] == 'both'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_EMAIL_PRIVATE_MESS']; ?>
</option>
                            <option value="none" <?php if ($this->_tpl_vars['usr']['cm_subscribe'] == 'none'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['NOT_SEND']; ?>
</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <div id="policy">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="300" valign="top">
                        <strong><?php echo $this->_tpl_vars['LANG']['SHOW_EMAIL']; ?>
:</strong><br/>
                        <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['SHOW_EMAIL_TEXT']; ?>
</span>
                    </td>
                    <td valign="top">
                        <label><input name="showmail" type="radio" value="1" <?php if ($this->_tpl_vars['usr']['showmail']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['YES']; ?>
 </label>
                        <label><input name="showmail" type="radio" value="0" <?php if (! $this->_tpl_vars['usr']['showmail']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['NO']; ?>
 </label>
                    </td>
                </tr>
                 
                <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['SHOW_BIRTH']; ?>
:</strong> </td>
                    <td valign="top">
                        <label><input name="showbirth" type="radio" value="1" <?php if ($this->_tpl_vars['usr']['showbirth']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['YES']; ?>
 </label>
                        <label><input name="showbirth" type="radio" value="0" <?php if (! $this->_tpl_vars['usr']['showbirth']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['NO']; ?>
 </label>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <strong><?php echo $this->_tpl_vars['LANG']['SHOW_PROFILE']; ?>
:</strong><br/>
                        <span class="usr_edithint"><?php echo $this->_tpl_vars['LANG']['WHOM_SHOW_PROFILE']; ?>
 </span>
                    </td>
                    <td valign="top">
                        <select name="allow_who" id="allow_who" style="width:307px">
                            <option value="all" <?php if ($this->_tpl_vars['usr']['allow_who'] == 'all'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['EVERYBODY']; ?>
</option>
                            <option value="registered" <?php if ($this->_tpl_vars['usr']['allow_who'] == 'registered'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['REGISTERED']; ?>
</option>
                            <option value="friends" <?php if ($this->_tpl_vars['usr']['allow_who'] == 'friends'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['MY_FRIENDS']; ?>
</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 12px;" id="submitform">
            <input style="font-size:16px" name="save" type="submit" id="save" value="<?php echo $this->_tpl_vars['LANG']['SAVE']; ?>
" />
            <input style="font-size:16px" name="delbtn2" type="button" id="delbtn2" value="<?php echo $this->_tpl_vars['LANG']['DEL_PROFILE']; ?>
" onclick="location.href='/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/delprofile.html';" />
        </div>
    </form>
    <div id="change_password">
        <form id="editform" name="editform" method="post" action="">
            <input type="hidden" name="opt" value="changepass" />
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="300" valign="top">
                        <strong><?php echo $this->_tpl_vars['LANG']['OLD_PASS']; ?>
</strong>
                    </td>
                    <td valign="top">
                        <input name="oldpass" type="password" id="oldpass" class="text-input" size="30" />
                    </td>
                </tr>
                <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['NEW_PASS']; ?>
</strong></td>
                    <td valign="top"><input name="newpass" type="password" id="newpass" class="text-input" size="30" /></td>
                </tr>
                <tr>
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['NEW_PASS_REPEAT']; ?>
</strong></td>
                    <td valign="top"><input name="newpass2" type="password" class="text-input" id="newpass2" size="30" /></td>
                </tr>
            </table>
            <div style="margin-top: 12px;">
                <input style="font-size:16px" name="save2" type="submit" id="save2" value="<?php echo $this->_tpl_vars['LANG']['CHANGE_PASSWORD']; ?>
" />
            </div>
        </form>
    </div>
</div>

<?php echo '
	<script type="text/javascript">
        $(function(){
            $( \'#tabs li\' ).click( function(){
                rel = $( this ).attr( "rel" );
                if(!rel){
                    $(\'#submitform\').show();
                } else {
                    $(\'#submitform\').hide();
                }
            });
        });
		
		
	 
	   $(\'input[name=atohelped]\').click(function(){


            if ($(this).attr(\'id\') === \'edithelpedother\'  ) {
                $(\'textarea[name=atohelpedother]\')
                 .show();

            } else  { $(\'textarea[name=atohelpedother]\')
                 .hide();
            };

        });

        $(\'input[name=atohelping]\').click(function(){

            if ($(this).attr(\'id\') === \'edithelpingother\'  ) {
                $(\'textarea[name=atohelpingother]\')
                    .show();

            } else  { $(\'textarea[name=atohelpingother]\')
                    .hide();
            };

        });
		
				 
     	$(\'select#armedgroup\').change(function(){ 
		 
		 if ( $(this).val() == \'\') {
		 
		 $(\'.tr-otharmedgroup\').show();
	 
        
		 } else {
		  $(\'.tr-otharmedgroup\').hide();
		 
		 }
		 
		 
		});
	  	

	</script>
'; ?>