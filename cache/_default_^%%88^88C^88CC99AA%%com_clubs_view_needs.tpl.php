<?php /* Smarty version 2.6.28, created on 2015-06-02 14:25:03
         compiled from com_clubs_view_needs.tpl */ ?>
<div class="con_heading"><?php echo $this->_tpl_vars['club']['title']; ?>
</div>
   <div class="con_heading"><?php echo $this->_tpl_vars['club']['typeofclub']; ?>
</div>
                <div class="description">
                    <?php echo $this->_tpl_vars['club']['needs']; ?>

                </div>
				
				
       <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder']): ?>
	  <a  href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/edit/needs.html">Редагувати</a>
	  <?php endif; ?>