<?php /* Smarty version 2.6.28, created on 2015-06-02 16:20:14
         compiled from com_clubs_view_propos.tpl */ ?>
<div class="con_heading"><?php echo $this->_tpl_vars['club']['title']; ?>
</div>
 
                <div class="description">
                    <?php echo $this->_tpl_vars['club']['propos']; ?>

                </div>
				
				
       <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder']): ?>
	  <a  href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/edit/propos.html">Редагувати</a>
	  <?php endif; ?>