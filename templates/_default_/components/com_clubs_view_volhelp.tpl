<div class="con_heading">{$club.title}</div>
 
                <div class="description">
                    {$club.volhelp}
                </div>
				
				
       {if $is_admin || $is_moder }
	  <a  href="/clubs/{$club.id}/edit/volhelp.html">Редагувати</a>
	  {/if}