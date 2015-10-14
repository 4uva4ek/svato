<div class="login_top">
<form action="/login" method="post" name="authform" target="_self" id="authform" >
 <input placeholder="Ім'я користувача" name="login" type="text" id="login"  autocomplete="off"/> 
 
 <input name="pass" placeholder="Пароль" type="password" id="pass" autocomplete="off"/> 
 <input id="login_btn" type="submit" name="Submit" value="{$LANG.AUTH_ENTER}" /></td>
 <input name="remember" type="checkbox" id="remember" value="1" checked="checked"  style="margin-right:0px"/> 
 <label for="remember"> {$LANG.AUTH_REMEMBER}</label>
                                               
 {if $cfg.passrem}
     <a href="/passremind.html">{$LANG.AUTH_FORGOT}</a>
 {/if}
    
</form>
</div>
<div class="go_reg">
 
   Вперше у нас? <span>Приєднуйтесь</span>  <a href="/registration">Реєстрація</a>
 
</div>