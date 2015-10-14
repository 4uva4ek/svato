{add_js file='includes/jquery/tabs/jquery.ui.min.js'}
{add_css file='includes/jquery/tabs/tabs.css'}

{literal}
	<script type="text/javascript">
		$(function(){$(".uitabs").tabs();});
	</script>
{/literal}

<div class="con_heading">{$LANG.CONFIG_PROFILE}</div>

<div id="profiletabs" class="uitabs">
    <ul id="tabs">
        <li><a href="#about"><span>{$LANG.ABOUT_ME}</span></a></li>
        <li><a href="#contacts"><span>{$LANG.CONTACTS}</span></a></li>
        <li><a href="#notices"><span>{$LANG.NOTIFIC}</span></a></li>
        <li><a href="#policy"><span>{$LANG.PRIVACY}</span></a></li>
        <li rel="hid"><a href="#change_password"><span>{$LANG.CHANGING_PASS}</span></a></li>
    </ul>

    <form id="editform" name="editform" enctype="multipart/form-data" method="post" action="">
        <input type="hidden" name="opt" value="save" />
        <input type="hidden" name="csrf_token" value="{csrf_token}" />
        <div id="about">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="300" valign="top">
                        <strong>{$LANG.YOUR_NAME}: </strong><br />
                        <span class="usr_edithint">{$LANG.YOUR_NAME_TEXT}</span>
                    </td>
                    <td valign="top"><input name="nickname" type="text" class="text-input" id="nickname" style="width:300px" value="{$usr.nickname|escape:'html'}"/></td>
                </tr>
                <tr>
                    <td valign="top"><strong>{$LANG.SEX}:</strong></td>
                    <td valign="top">
                        <select name="gender" id="gender" style="width:307px">
                            <option value="0" {if $usr.gender==0} selected {/if}>{$LANG.NOT_SPECIFIED}</option>
                            <option value="m" {if $usr.gender=='m'} selected {/if}>{$LANG.MALES}</option>
                            <option value="f" {if $usr.gender=='f'} selected {/if}>{$LANG.FEMALES}</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <strong>{$LANG.CITY}:</strong><br />
                        <span class="usr_edithint">{$LANG.CITY_TEXT}</span>
                    </td>
                    <td valign="top">
                        {city_input value=$usr.city name="city" width="300px"}
                    </td>
                </tr>
                <tr>
                    <td valign="top"><strong>{$LANG.BIRTH}:</strong> </td>
                    <td valign="top">
                        {dateform seldate=$usr.birthdate}
                    </td>
                </tr>
                <tr>
                    <td valign="top"><strong>{$LANG.PHONES}:</strong></td>
                    <td valign="top"><textarea name="phones" class="text-input" style="width:300px" rows="2" id="phones">{$usr.phones}</textarea></td>
                 </tr>
				 
				 <tr>
                    <td valign="top"><strong>{$LANG.RESIDENCE}:</strong></td>
                    <td valign="top"><textarea name="residence" class="text-input" style="width:300px" rows="2" id="residence">{$usr.residence}</textarea></td>
                 </tr>
				 
				 {if $usr.group_alias=='atos'}
				 <tr>
                    <td valign="top"><strong>{$LANG.KINSCONTACTS}:</strong></td>
                    <td valign="top"><textarea name="kinscontacts" class="text-input" style="width:300px" rows="2" id="kinscontacts">{$usr.kinscontacts}</textarea></td>
                 </tr>
				
				 <tr>
                    <td valign="top"><strong>{$LANG.ATOSPECIALTY}:</strong></td>
                    <td valign="top">
					
					
					<textarea name="atospecialty" class="text-input" style="width:300px" rows="2" id="atospecialty">{$usr.atospecialty}</textarea>
					</td>
                 </tr>
				  
				 
				 	 <tr>
                    <td valign="top"><strong>{$LANG.ARMEDGROUP}:</strong></td>
                    <td valign="top">
                  <select name="armedgroup"  id="armedgroup" >
                            <option disabled selected>Виберіть зі списку:</option>
							
							
					 {foreach key=id item=armedgroup from=$armedlist}
					  {if $armedgroup}
                      <option {if $usr.armedgroup==$armedgroup}selected{/if} value="{$armedgroup}" >{$armedgroup}</option>
					  {/if}
                     {/foreach}
                      <option value="" >---===Вказати інше формування===---</option>
                  </select>

     </tr>
				 
				<tr class="tr-otharmedgroup">
                    <td width="300" valign="top">
                        <strong>{$LANG.OTHARMEDGROUP}: </strong>
                    
                    </td>
                    <td valign="top"><input name="otharmedgroup" type="text" class="text-input" id="otharmedgroup" style="width:300px" value="{$usr.otharmedgroup|escape:'html'}"/></td>
                </tr>
				 
				 <tr>
                    <td valign="top"><strong>{$LANG.PREATOSPECIALTY}:</strong></td>
                    <td valign="top"><textarea name="preatospecialty" class="text-input" style="width:300px" rows="2" id="preatospecialty">{$usr.preatospecialty}</textarea></td>
                 </tr>
				 {/if}
				 {if $usr.group_alias=='volonters'}
				 <tr>
                    <td valign="top"><strong>{$LANG.EDUCATION}:</strong></td>
                    <td valign="top"><textarea name="education" class="text-input" style="width:300px" rows="2" id="education">{$usr.education}</textarea></td>
                 </tr>
				 
				 <tr>
                    <td valign="top"><strong>{$LANG.ATOHELPED}:</strong></td>
				<td valign="top">
				  <p><input type="radio" name="atohelped" value="Організаційна робота" {if $usr.atohelped=='Організаційна робота'}checked{/if}/>Організаційна робота<Br>
					 <input type="radio" name="atohelped" value="Фінансова допомога" {if $usr.atohelped=='Фінансова допомога'}checked{/if} />Фінансова допомога<Br> 
					 <input type="radio" name="atohelped" value="Матеріально-технічна допомога" {if $usr.atohelped=='Матеріально-технічна допомога'}checked{/if} />Матеріально-технічна допомога<Br> 
					 <input type="radio" name="atohelped" value="Інший вид допомоги" id="edithelpedother" {if $usr.atohelped=='Інший вид допомоги'}checked{/if} />Інший вид допомоги:</p>
					<textarea name="atohelpedother" class="text-input" style="width:300px; {if $usr.atohelped!=='Інший вид допомоги'}display:none;{else}display:block;{/if} " rows="2" >{$usr.atohelpedother}</textarea>
                  </td> 
                   
                 </tr>
				 <tr>
                    <td valign="top"><strong>{$LANG.ATOHELPING}:</strong></td>
					
					<td valign="top">
				  <p><input type="radio" name="atohelping" value="Організаційна робота" {if $usr.atohelping=='Організаційна робота'}checked{/if}/>Організаційна робота<Br>
					 <input type="radio" name="atohelping" value="Фінансова допомога" {if $usr.atohelping=='Фінансова допомога'}checked{/if} />Фінансова допомога<Br> 
					 <input type="radio" name="atohelping" value="Матеріально-технічна допомога" {if $usr.atohelping=='Матеріально-технічна допомога'}checked{/if} />Матеріально-технічна допомога<Br> 
					 <input type="radio" name="atohelping" value="Інший вид допомоги" id="edithelpingother"{if $usr.atohelping=='Інший вид допомоги'}checked{/if} />Інший вид допомоги:</p>
					<textarea  name="atohelpingother" style="width:300px; {if $usr.atohelping!=='Інший вид допомоги'}display:none;{else}display:block;{/if}" class="text-input" rows="2" >{$usr.atohelpingother}</textarea>
                  </td> 
					
                 </tr> 
				 
				 
				 
				 
				  {/if}
				 
                
                {if $private_forms}
                    {foreach key=tid item=field from=$private_forms}
                    <tr>
                        <td valign="top">
                            <strong>{$field.title}:</strong>
                            {if $field.description}
                                <br /><span class="usr_edithint">{$field.description}</span>
                            {/if}
                        </td>
                        <td valign="top">
                            {$field.field}
                        </td>
                    </tr>
                    {/foreach}
                {/if}
            </table>
        </div>

        <div id="contacts">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="300" valign="top">
                        <strong>E-mail:</strong><br />
                        <span class="usr_edithint">{$LANG.REALY_ADRESS_EMAIL}</span>
                    </td>
                    <td valign="top">
                        <input name="email" type="text" class="text-input" id="email" style="width:300px" value="{$usr.email}"/>
                    </td>
                </tr>
               
            </table>
        </div>

        <div id="notices">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="300" valign="top">
                        <strong>
                            {$LANG.NOTIFY_NEW_MESS}:
                        </strong><br/>
                        <span class="usr_edithint">
                            {$LANG.NOTIFY_NEW_MESS_TEXT}
                        </span>
                    </td>
                    <td valign="top">
                        <label><input name="email_newmsg" type="radio" value="1" {if $usr.email_newmsg}checked{/if}/> {$LANG.YES} </label>
                        <label><input name="email_newmsg" type="radio" value="0" {if !$usr.email_newmsg}checked{/if}/> {$LANG.NO}</label>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <strong>{$LANG.HOW_NOTIFY_NEW_MESS} </strong><br />
                        <span class="usr_edithint">{$LANG.WHERE_TO_SEND}</span>
                    </td>
                    <td valign="top">
                        <select name="cm_subscribe" id="cm_subscribe" style="width:307px">
                            <option value="mail" {if $usr.cm_subscribe=='mail'}selected{/if}>{$LANG.TO_EMAIL}</option>
                            <option value="priv" {if $usr.cm_subscribe=='priv'}selected{/if}>{$LANG.TO_PRIVATE_MESS}</option>
                            <option value="both" {if $usr.cm_subscribe=='both'}selected{/if}>{$LANG.TO_EMAIL_PRIVATE_MESS}</option>
                            <option value="none" {if $usr.cm_subscribe=='none'}selected{/if}>{$LANG.NOT_SEND}</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <div id="policy">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="300" valign="top">
                        <strong>{$LANG.SHOW_EMAIL}:</strong><br/>
                        <span class="usr_edithint">{$LANG.SHOW_EMAIL_TEXT}</span>
                    </td>
                    <td valign="top">
                        <label><input name="showmail" type="radio" value="1" {if $usr.showmail}checked{/if}/> {$LANG.YES} </label>
                        <label><input name="showmail" type="radio" value="0" {if !$usr.showmail}checked{/if}/> {$LANG.NO} </label>
                    </td>
                </tr>
                 
                <tr>
                    <td valign="top"><strong>{$LANG.SHOW_BIRTH}:</strong> </td>
                    <td valign="top">
                        <label><input name="showbirth" type="radio" value="1" {if $usr.showbirth}checked{/if}/> {$LANG.YES} </label>
                        <label><input name="showbirth" type="radio" value="0" {if !$usr.showbirth}checked{/if}/> {$LANG.NO} </label>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <strong>{$LANG.SHOW_PROFILE}:</strong><br/>
                        <span class="usr_edithint">{$LANG.WHOM_SHOW_PROFILE} </span>
                    </td>
                    <td valign="top">
                        <select name="allow_who" id="allow_who" style="width:307px">
                            <option value="all" {if $usr.allow_who=='all'}selected{/if}>{$LANG.EVERYBODY}</option>
                            <option value="registered" {if $usr.allow_who=='registered'}selected{/if}>{$LANG.REGISTERED}</option>
                            <option value="friends" {if $usr.allow_who=='friends'}selected{/if}>{$LANG.MY_FRIENDS}</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 12px;" id="submitform">
            <input style="font-size:16px" name="save" type="submit" id="save" value="{$LANG.SAVE}" />
            <input style="font-size:16px" name="delbtn2" type="button" id="delbtn2" value="{$LANG.DEL_PROFILE}" onclick="location.href='/users/{$usr.id}/delprofile.html';" />
        </div>
    </form>
    <div id="change_password">
        <form id="editform" name="editform" method="post" action="">
            <input type="hidden" name="opt" value="changepass" />
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="300" valign="top">
                        <strong>{$LANG.OLD_PASS}</strong>
                    </td>
                    <td valign="top">
                        <input name="oldpass" type="password" id="oldpass" class="text-input" size="30" />
                    </td>
                </tr>
                <tr>
                    <td valign="top"><strong>{$LANG.NEW_PASS}</strong></td>
                    <td valign="top"><input name="newpass" type="password" id="newpass" class="text-input" size="30" /></td>
                </tr>
                <tr>
                    <td valign="top"><strong>{$LANG.NEW_PASS_REPEAT}</strong></td>
                    <td valign="top"><input name="newpass2" type="password" class="text-input" id="newpass2" size="30" /></td>
                </tr>
            </table>
            <div style="margin-top: 12px;">
                <input style="font-size:16px" name="save2" type="submit" id="save2" value="{$LANG.CHANGE_PASSWORD}" />
            </div>
        </form>
    </div>
</div>

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


            if ($(this).attr('id') === 'edithelpedother'  ) {
                $('textarea[name=atohelpedother]')
                 .show();

            } else  { $('textarea[name=atohelpedother]')
                 .hide();
            };

        });

        $('input[name=atohelping]').click(function(){

            if ($(this).attr('id') === 'edithelpingother'  ) {
                $('textarea[name=atohelpingother]')
                    .show();

            } else  { $('textarea[name=atohelpingother]')
                    .hide();
            };

        });
		
				 
     	$('select#armedgroup').change(function(){ 
		 
		 if ( $(this).val() == '') {
		 
		 $('.tr-otharmedgroup').show();
	 
        
		 } else {
		  $('.tr-otharmedgroup').hide();
		 
		 }
		 
		 
		});
	  	

	</script>
{/literal}