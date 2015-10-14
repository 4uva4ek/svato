<div class="con_heading">{$club.title}</div>
 
                <div class="description">
                    {$club.propos}
                </div>
				
				
       {if $is_admin || $is_moder }
	  <a  href="/clubs/{$club.id}/edit/propos.html">Редагувати</a>
	  {/if}