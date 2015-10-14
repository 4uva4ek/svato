<?php /* Smarty version 2.6.28, created on 2015-05-19 20:42:15
         compiled from com_registration.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'add_js', 'com_registration.tpl', 25, false),array('function', 'csrf_token', 'com_registration.tpl', 29, false),array('function', 'dateform', 'com_registration.tpl', 90, false),array('function', 'city_input', 'com_registration.tpl', 97, false),array('modifier', 'escape', 'com_registration.tpl', 48, false),)), $this); ?>
<div class="con_heading"><?php echo $this->_tpl_vars['pagetitle']; ?>
</div>

<?php if ($this->_tpl_vars['cfg']['is_on']): ?>

    <?php if ($this->_tpl_vars['cfg']['reg_type'] == 'invite' && ! $this->_tpl_vars['correct_invite']): ?>

        <p style="margin-bottom:15px; font-size: 14px"><?php echo $this->_tpl_vars['LANG']['INVITES_ONLY']; ?>
</p>

        <form id="regform" name="regform" method="post" action="/registration">
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td><strong><?php echo $this->_tpl_vars['LANG']['INVITE_CODE']; ?>
:</strong></td>
                <td style="padding-left:15px">
                    <input type="text" name="invite_code" class="text-input" value="" style="width:300px"/>
                </td>
                <td style="padding-left:5px">
                    <input type="submit" name="show_invite" value="<?php echo $this->_tpl_vars['LANG']['SHOW_INVITE']; ?>
" />
                </td>
            </tr>
        </table>
        </form>

        <?php else: ?>

        <?php echo cmsSmartyAddJS(array('file' => 'components/registration/js/check.js'), $this);?>


		 
        <form id="regform" name="regform" method="post" action="/registration/add">
            <input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
            <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
			  <tr>
						<td valign="top" class=""><strong>Тип користувача:</strong></td>
						<td valign="top" class="usertypeinput">

                            <span  ><input id="atos_group" type="radio" name="group_id" value="11" checked /><label class="regtypelabel"  for="atos_group" >Учасник АТО</label></span>
							
							
                            <span  ><input id="vol_group"  type="radio" name="group_id" value="10" /><label class="regtypelabel" for="vol_group" >Волонтер</label></span>

						</td>
				</tr>
                <tr>
                    <td width="269" valign="top" class="">
                        <div><strong><?php echo $this->_tpl_vars['LANG']['LOGIN']; ?>
:</strong></div>
                        <div><small><?php echo $this->_tpl_vars['LANG']['USED_FOR_AUTH']; ?>
<br/><?php echo $this->_tpl_vars['LANG']['ONLY_LAT_SYMBOLS']; ?>
</small></div>
                    </td>
                    <td valign="top" class="">
                        <input name="login" id="logininput" class="text-input" type="text" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['login'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onchange="checkLogin()" autocomplete="off"/>
                        <span class="regstar">*</span>
                        <div id="logincheck"></div>
                    </td>
                </tr>



                <tr>
                    <td valign="top" class=""><strong><?php echo $this->_tpl_vars['LANG']['PASS']; ?>
:</strong></td>
                    <td valign="top" class="">
                        <input name="pass" id="pass1input" class="text-input" type="password" style="width:300px" onchange="$('#passcheck').html('');"/>
                        <span class="regstar">*</span>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class=""><strong><?php echo $this->_tpl_vars['LANG']['REPEAT_PASS']; ?>
: </strong></td>
                    <td valign="top" class="">
                        <input name="pass2" id="pass2input" class="text-input" type="password" style="width:300px" onchange="checkPasswords()" />
                        <span class="regstar">*</span>
                        <div id="passcheck"></div>
                    </td>
                </tr>

                <tr>
                    <td valign="top" class="" width="269">
                        <div><strong><?php echo $this->_tpl_vars['LANG']['NICKNAME']; ?>
:</strong></div>

                    </td>
                    <td valign="top" class="">
                        <input name="nickname" id="nickinput" class="text-input" type="text" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
                        <span class="regstar">*</span>
                    </td>
                </tr>


                <?php if ($this->_tpl_vars['cfg']['ask_birthdate']): ?>
                    <tr>
                        <td valign="top" class="">
                            <div><strong><?php echo $this->_tpl_vars['LANG']['BIRTH']; ?>
:</strong></div>

                        </td>
                        <td valign="top" class=""><?php echo smarty_function_dateform(array('seldate' => $this->_tpl_vars['item']['birthdate']), $this);?>
</td>
                    </tr>
                <?php endif; ?>

                    <tr>
                        <td valign="top" class=""><strong><?php echo $this->_tpl_vars['LANG']['CITY']; ?>
:</strong></td>
                        <td valign="top" class="">
                            <?php echo smarty_function_city_input(array('value' => $this->_tpl_vars['item']['city'],'name' => 'city','width' => '300px'), $this);?>

                        </td>
                    </tr>

                <tr>
                    <td valign="top" class=""><strong><?php echo $this->_tpl_vars['LANG']['RESIDENCE']; ?>
:</strong></td>
                    <td valign="top" class="">
                        <input name="residence" type="text" class="text-input" id="residence" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['residence'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" style="width:300px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class=""><strong><?php echo $this->_tpl_vars['LANG']['PHONES']; ?>
:</strong></td>
                    <td valign="top" class="">
                        <input name="phones" type="text" class="text-input" id="phones" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['phones'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" style="width:300px"/>
                    </td>
                </tr>


                <tr>
                    <td valign="top" class="">
                        <div><strong><?php echo $this->_tpl_vars['LANG']['EMAIL']; ?>
:</strong></div>

                    </td>
                    <td valign="top" class="">
                        <input name="email" type="text" class="text-input" style="width:300px" value="<?php echo $this->_tpl_vars['item']['email']; ?>
"/>
                        <span class="regstar">*</span>
                    </td>
                </tr>



                              <tbody id="volonters" style="display:none" >
                <tr  >
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['EDUCATION']; ?>
:</strong></td>
                    <td valign="top"><textarea name="education" class="text-input" style="width:300px" rows="4" id="education"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['education'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea></td>
                </tr>

                <tr  >
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['ATOHELPED']; ?>
:</strong></td>
                    <td valign="top">
                        <p ><input type="radio" name="atohelped" value="Організаційна робота" id="org_works" cheked /><label for="org_works">Організаційна робота</label><Br>
                            <input type="radio" name="atohelped" value="Фінансова допомога" id="fin_works" /><label for="fin_works">Фінансова допомога</label><Br>
                            <input type="radio" name="atohelped" value="Матеріально-технічна допомога" id="mat_works" /><label for="mat_works">Матеріально-технічна допомога</label><Br>
                            <input type="radio" name="atohelped" value="Інший вид допомоги" id="atohelpedother"  /><label for="atohelpedother">Інший вид допомоги:</label></p>
                        <textarea name="atohelpedother" class="text-input" style="width:300px; display:none;" rows="3" id="atohelpedother"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['atohelpedother'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
                    </td>

                </tr>
                <tr  >
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['ATOHELPING']; ?>
:</strong></td>

                    <td valign="top">
                        <p><input type="radio" name="atohelping" value="Організаційна робота" cheked id="org_works2" /><label for="org_works2">Організаційна робота</label><Br>
                            <input type="radio" name="atohelping" value="Фінансова допомога"  id="fin_works2" /><label for="fin_works2">Фінансова допомога</label><Br>
                            <input type="radio" name="atohelping" value="Матеріально-технічна допомога"  id="mat_works2" /><label for="mat_works2">Матеріально-технічна допомога</label><Br>
                            <input type="radio" name="atohelping" value="Інший вид допомоги" id="atohelpingother"   /><label for="atohelpingother">Інший вид допомоги:</label> </p>
                        <textarea name="atohelpingother" style="width:300px; display:none;" class="text-input" rows="3" id="atohelpingother"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['atohelpingother'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
                    </td>

                </tr>

                    </tbody>
                

                              <tbody id="atos" style="display:none" >

                <tr >
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['KINSCONTACTS']; ?>
:</strong></td>
                    <td valign="top"><textarea name="kinscontacts" class="text-input" style="width:300px" rows="2" id="kinscontacts"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['kinscontacts'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea></td>
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
					
                      <option value="<?php echo $this->_tpl_vars['armedgroup']; ?>
" ><?php echo $this->_tpl_vars['armedgroup']; ?>
</option>
					  <?php if ($this->_tpl_vars['armedgroup']): ?><?php endif; ?>
                     <?php endforeach; endif; unset($_from); ?>
                      <option value="" >---===Вказати інше формування===---</option>
                  </select>

                </tr>
			 
				
				<tr class="tr-otharmedgroup">
                    <td valign="top"  >
                        <div><strong><?php echo $this->_tpl_vars['LANG']['OTHARMEDGROUP']; ?>
:</strong></div>

                    </td>
                    <td valign="top"  >
                        <input name="otharmedgroup" type="text" class="text-input" style="width:300px"  />
                        
                    </td>
                </tr>
				
                 <tr >
                  <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['ATOSPECIALTY']; ?>
:</strong></td>
                  <td valign="top"><textarea name="atospecialty" class="text-input" style="width:300px" rows="2" id="atospecialty"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['atospecialty'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea></td>
                 </tr>
                <tr >
                    <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['PREATOSPECIALTY']; ?>
:</strong></td>
                    <td valign="top"><textarea name="preatospecialty" class="text-input" style="width:300px" rows="2" id="preatospecialty"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['preatospecialty'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea></td>
                </tr>
                </tbody>
                
                
                              <tr>
                    <td valign="top" class="">&nbsp;</td>
                    <td valign="top" class="">
                        <input name="do" type="hidden" value="register" />
                        <input name="save" type="submit" id="save" value="<?php echo $this->_tpl_vars['LANG']['REGISTRATION']; ?>
" />
                    </td>
                </tr>
				
				

            </table>
        </form>

    <?php endif; ?>

<?php else: ?>

    <div style="margin-top:10px"><?php echo $this->_tpl_vars['cfg']['offmsg']; ?>
</div>

<?php endif; ?>

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


            if ($(this).attr(\'id\') === \'atohelpedother\'  ) {
                $(\'textarea[name=atohelpedother]\')
                 .show();

            } else  { $(\'textarea[name=atohelpedother]\')
                 .hide();
            };

        });

        $(\'input[name=atohelping]\').click(function(){

            if ($(this).attr(\'id\') === \'atohelpingother\'  ) {
                $(\'textarea[name=atohelpingother]\')
                    .show();

            } else  { $(\'textarea[name=atohelpingother]\')
                    .hide();
            };

        });

        $(\'input[name=group_id]\').click(function(){

            if ($(this).attr(\'id\') === \'vol_group\'  ) {
                $(\'#volonters\')
                        .show();

            } else { $(\'#volonters\')
                        .hide();
            };

            if ($(this).attr(\'id\') === \'atos_group\'  ) {
                $(\'#atos\')
                        .show();

            } else { $(\'#atos\')
                    .hide();
            };

        });

		 if ($(\'#atos_group\').is(\':checked\') ) {
             $(\'#atos\').show();
             $(\'#volonters\').hide();
             
             };
		 $(\'.tr-otharmedgroup\').hide();
     	$(\'select#armedgroup\').change(function(){ 
		 
		 if ( $(this).val() == \'\') {
		 
		 $(\'.tr-otharmedgroup\').show();
	 
        
		 } else {
		  $(\'.tr-otharmedgroup\').hide();
		 
		 }
		 
		 
		});

    </script>
'; ?>