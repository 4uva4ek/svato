<div class="con_heading">{$club.title}</div>
   <div class="con_heading">{$club.typeofclub}</div>
                <div class="description">
                    {$club.needs}
                </div>
				
				
       {if $is_admin || $is_moder }
	  <a  href="/clubs/{$club.id}/edit/needs.html">Редагувати</a>
	  {/if}