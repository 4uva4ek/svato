<div class="con_heading">{$pagetitle}</div>

{if $cfg.is_on}

    {if $cfg.reg_type == 'invite' && !$correct_invite}

        <p style="margin-bottom:15px; font-size: 14px">{$LANG.INVITES_ONLY}</p>

        <form id="regform" name="regform" method="post" action="/registration">
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td><strong>{$LANG.INVITE_CODE}:</strong></td>
                <td style="padding-left:15px">
                    <input type="text" name="invite_code" class="text-input" value="" style="width:300px"/>
                </td>
                <td style="padding-left:5px">
                    <input type="submit" name="show_invite" value="{$LANG.SHOW_INVITE}" />
                </td>
            </tr>
        </table>
        </form>

        {else}

        {add_js file='components/registration/js/check.js'}

		 
        <form id="regform" name="regform" method="post" action="/registration/add">
            <input type="hidden" name="csrf_token" value="{csrf_token}" />
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
                        <div><strong>{$LANG.LOGIN}:</strong></div>
                        <div><small>{$LANG.USED_FOR_AUTH}<br/>{$LANG.ONLY_LAT_SYMBOLS}</small></div>
                    </td>
                    <td valign="top" class="">
                        <input name="login" id="logininput" class="text-input" type="text" style="width:300px" value="{$item.login|escape:'html'}" onchange="checkLogin()" autocomplete="off"/>
                        <span class="regstar">*</span>
                        <div id="logincheck"></div>
                    </td>
                </tr>



                <tr>
                    <td valign="top" class=""><strong>{$LANG.PASS}:</strong></td>
                    <td valign="top" class="">
                        <input name="pass" id="pass1input" class="text-input" type="password" style="width:300px" onchange="$('#passcheck').html('');"/>
                        <span class="regstar">*</span>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class=""><strong>{$LANG.REPEAT_PASS}: </strong></td>
                    <td valign="top" class="">
                        <input name="pass2" id="pass2input" class="text-input" type="password" style="width:300px" onchange="checkPasswords()" />
                        <span class="regstar">*</span>
                        <div id="passcheck"></div>
                    </td>
                </tr>

                <tr>
                    <td valign="top" class="" width="269">
                        <div><strong>{$LANG.NICKNAME}:</strong></div>

                    </td>
                    <td valign="top" class="">
                        <input name="nickname" id="nickinput" class="text-input" type="text" style="width:300px" value="{$item.nickname|escape:'html'}" />
                        <span class="regstar">*</span>
                    </td>
                </tr>


                {if $cfg.ask_birthdate}
                    <tr>
                        <td valign="top" class="">
                            <div><strong>{$LANG.BIRTH}:</strong></div>

                        </td>
                        <td valign="top" class="">{dateform seldate=$item.birthdate}</td>
                    </tr>
                {/if}

                    <tr>
                        <td valign="top" class=""><strong>{$LANG.CITY}:</strong></td>
                        <td valign="top" class="">
                            {city_input value=$item.city name="city" width="300px"}
                        </td>
                    </tr>

                <tr>
                    <td valign="top" class=""><strong>{$LANG.RESIDENCE}:</strong></td>
                    <td valign="top" class="">
                        <input name="residence" type="text" class="text-input" id="residence" value="{$item.residence|escape:'html'}" style="width:300px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class=""><strong>{$LANG.PHONES}:</strong></td>
                    <td valign="top" class="">
                        <input name="phones" type="text" class="text-input" id="phones" value="{$item.phones|escape:'html'}" style="width:300px"/>
                    </td>
                </tr>


                <tr>
                    <td valign="top" class="">
                        <div><strong>{$LANG.EMAIL}:</strong></div>

                    </td>
                    <td valign="top" class="">
                        <input name="email" type="text" class="text-input" style="width:300px" value="{$item.email}"/>
                        <span class="regstar">*</span>
                    </td>
                </tr>



                {* поля для волонтера *}
              <tbody id="volonters" style="display:none" >
                <tr  >
                    <td valign="top"><strong>{$LANG.EDUCATION}:</strong></td>
                    <td valign="top"><textarea name="education" class="text-input" style="width:300px" rows="4" id="education">{$item.education|escape:'html'}</textarea></td>
                </tr>

                <tr  >
                    <td valign="top"><strong>{$LANG.ATOHELPED}:</strong></td>
                    <td valign="top">
                        <p ><input type="radio" name="atohelped" value="Організаційна робота" id="org_works" cheked /><label for="org_works">Організаційна робота</label><Br>
                            <input type="radio" name="atohelped" value="Фінансова допомога" id="fin_works" /><label for="fin_works">Фінансова допомога</label><Br>
                            <input type="radio" name="atohelped" value="Матеріально-технічна допомога" id="mat_works" /><label for="mat_works">Матеріально-технічна допомога</label><Br>
                            <input type="radio" name="atohelped" value="Інший вид допомоги" id="atohelpedother"  /><label for="atohelpedother">Інший вид допомоги:</label></p>
                        <textarea name="atohelpedother" class="text-input" style="width:300px; display:none;" rows="3" id="atohelpedother">{$item.atohelpedother|escape:'html'}</textarea>
                    </td>

                </tr>
                <tr  >
                    <td valign="top"><strong>{$LANG.ATOHELPING}:</strong></td>

                    <td valign="top">
                        <p><input type="radio" name="atohelping" value="Організаційна робота" cheked id="org_works2" /><label for="org_works2">Організаційна робота</label><Br>
                            <input type="radio" name="atohelping" value="Фінансова допомога"  id="fin_works2" /><label for="fin_works2">Фінансова допомога</label><Br>
                            <input type="radio" name="atohelping" value="Матеріально-технічна допомога"  id="mat_works2" /><label for="mat_works2">Матеріально-технічна допомога</label><Br>
                            <input type="radio" name="atohelping" value="Інший вид допомоги" id="atohelpingother"   /><label for="atohelpingother">Інший вид допомоги:</label> </p>
                        <textarea name="atohelpingother" style="width:300px; display:none;" class="text-input" rows="3" id="atohelpingother">{$item.atohelpingother|escape:'html'}</textarea>
                    </td>

                </tr>

                    </tbody>
                {* // поля для волонтера *}


                {* поля для учасника АТО *}
              <tbody id="atos" style="display:none" >

                <tr >
                    <td valign="top"><strong>{$LANG.KINSCONTACTS}:</strong></td>
                    <td valign="top"><textarea name="kinscontacts" class="text-input" style="width:300px" rows="2" id="kinscontacts">{$item.kinscontacts|escape:'html'}</textarea></td>
                </tr>
 
				 <tr>
                    <td valign="top"><strong>{$LANG.ARMEDGROUP}:</strong></td>
                    <td valign="top">
                  <select name="armedgroup"  id="armedgroup" >
                            <option disabled selected>Виберіть зі списку:</option>
							
							
					 {foreach key=id item=armedgroup from=$armedlist}
					
                      <option value="{$armedgroup}" >{$armedgroup}</option>
					  {if $armedgroup}{/if}
                     {/foreach}
                      <option value="" >---===Вказати інше формування===---</option>
                  </select>

                </tr>
			 
				
				<tr class="tr-otharmedgroup">
                    <td valign="top"  >
                        <div><strong>{$LANG.OTHARMEDGROUP}:</strong></div>

                    </td>
                    <td valign="top"  >
                        <input name="otharmedgroup" type="text" class="text-input" style="width:300px"  />
                        
                    </td>
                </tr>
				
                 <tr >
                  <td valign="top"><strong>{$LANG.ATOSPECIALTY}:</strong></td>
                  <td valign="top"><textarea name="atospecialty" class="text-input" style="width:300px" rows="2" id="atospecialty">{$item.atospecialty|escape:'html'}</textarea></td>
                 </tr>
                <tr >
                    <td valign="top"><strong>{$LANG.PREATOSPECIALTY}:</strong></td>
                    <td valign="top"><textarea name="preatospecialty" class="text-input" style="width:300px" rows="2" id="preatospecialty">{$item.preatospecialty|escape:'html'}</textarea></td>
                </tr>
                </tbody>
                {* // поля для учасника АТО *}

                {*   {if $private_forms}
                      {foreach key=tid item=field from=$private_forms}
                      <tr>
                          <td valign="top">
                              <strong>{$field.title}:</strong>
                              {if $field.description}
                                  <div><small>{$field.description}</small></div>
                              {/if}
                          </td>
                          <td valign="top">
                              {$field.field} <span class="regstar">*</span>
                          </td>
                      </tr>
                      {/foreach}
                  {/if}

                 {if $cfg.ask_icq}
                      <tr>
                          <td valign="top" class=""><strong>ICQ:</strong></td>
                          <td valign="top" class="">
                              <input name="icq" type="text" class="text-input" id="icq" value="{$item.icq|escape:'html'}" style="width:300px"/>
                          </td>
                      </tr>
                  {/if} *}

              {*   <tr>
                    <td valign="top" class="">
                        <div><strong>{$LANG.SECUR_SPAM}: </strong></div>
                        <div><small>{$LANG.SECUR_SPAM_TEXT}</small></div>
                    </td>
                    <td valign="top" class="">{captcha}</td>
                </tr> *}
                <tr>
                    <td valign="top" class="">&nbsp;</td>
                    <td valign="top" class="">
                        <input name="do" type="hidden" value="register" />
                        <input name="save" type="submit" id="save" value="{$LANG.REGISTRATION}" />
                    </td>
                </tr>
				
				

            </table>
        </form>

    {/if}

{else}

    <div style="margin-top:10px">{$cfg.offmsg}</div>

{/if}

{literal}
    <script type="text/javascript">
        $(function(){
            $( '#tabs li' ).click( function(){
                rel = $( this ).attr( "rel" );
                if(!rel){
                    $('#submitform').show();
                } else {
                    $('#submitform').hide();
                }
            });
			 
			
        });


        $('input[name=atohelped]').click(function(){


            if ($(this).attr('id') === 'atohelpedother'  ) {
                $('textarea[name=atohelpedother]')
                 .show();

            } else  { $('textarea[name=atohelpedother]')
                 .hide();
            };

        });

        $('input[name=atohelping]').click(function(){

            if ($(this).attr('id') === 'atohelpingother'  ) {
                $('textarea[name=atohelpingother]')
                    .show();

            } else  { $('textarea[name=atohelpingother]')
                    .hide();
            };

        });

        $('input[name=group_id]').click(function(){

            if ($(this).attr('id') === 'vol_group'  ) {
                $('#volonters')
                        .show();

            } else { $('#volonters')
                        .hide();
            };

            if ($(this).attr('id') === 'atos_group'  ) {
                $('#atos')
                        .show();

            } else { $('#atos')
                    .hide();
            };

        });

		 if ($('#atos_group').is(':checked') ) {
             $('#atos').show();
             $('#volonters').hide();
             
             };
		 $('.tr-otharmedgroup').hide();
     	$('select#armedgroup').change(function(){ 
		 
		 if ( $(this).val() == '') {
		 
		 $('.tr-otharmedgroup').show();
	 
        
		 } else {
		  $('.tr-otharmedgroup').hide();
		 
		 }
		 
		 
		});

    </script>
{/literal}