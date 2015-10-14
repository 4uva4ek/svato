<?php /* Smarty version 2.6.28, created on 2015-05-25 12:20:51
         compiled from com_clubs_view_problem.tpl */ ?>
<div class="con_heading"><?php echo $this->_tpl_vars['club']['title']; ?>
</div>
   <div class="con_heading"><?php echo $this->_tpl_vars['club']['typeofclub']; ?>
</div>
                <div class="description">
                    <?php echo $this->_tpl_vars['club']['problems']; ?>

                </div>
				
				
       <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder']): ?>
	  <a  href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/edit/problem.html">Редагувати</a>
	  <?php endif; ?>