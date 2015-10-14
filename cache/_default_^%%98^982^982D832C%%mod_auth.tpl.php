<?php /* Smarty version 2.6.28, created on 2015-08-07 02:20:41
         compiled from mod_auth.tpl */ ?>
<div class="login_top">
<form action="/login" method="post" name="authform" target="_self" id="authform" >
 <input placeholder="Ім'я користувача" name="login" type="text" id="login"  autocomplete="off"/> 
 
 <input name="pass" placeholder="Пароль" type="password" id="pass" autocomplete="off"/> 
 <input id="login_btn" type="submit" name="Submit" value="<?php echo $this->_tpl_vars['LANG']['AUTH_ENTER']; ?>
" /></td>
 <input name="remember" type="checkbox" id="remember" value="1" checked="checked"  style="margin-right:0px"/> 
 <label for="remember"> <?php echo $this->_tpl_vars['LANG']['AUTH_REMEMBER']; ?>
</label>
                                               
 <?php if ($this->_tpl_vars['cfg']['passrem']): ?>
     <a href="/passremind.html"><?php echo $this->_tpl_vars['LANG']['AUTH_FORGOT']; ?>
</a>
 <?php endif; ?>
    
</form>
</div>
<div class="go_reg">
 
   Вперше у нас? <span>Приєднуйтесь</span>  <a href="/registration">Реєстрація</a>
 
</div>