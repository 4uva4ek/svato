<?php
if(!defined('VALID_CMS_ADMIN')) { die('ACCESS DENIED'); }

	cpAddPathway('Минизаписки', '?view=components&do=config&id='.(int)$_REQUEST['id']);
	echo '<h3>Минизаписки</h3>';
	if (isset($_REQUEST['opt'])) { $opt = $_REQUEST['opt']; } else { $opt = 'config'; }
	
	$toolmenu = array();

		
		$toolmenu[1]['icon'] = 'config.gif';
		$toolmenu[1]['title'] = 'Настройки';
		$toolmenu[1]['link'] = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=config';
	if($opt == 'config'){
		$toolmenu[2]['icon'] = 'save.gif';
		$toolmenu[2]['title'] = 'Сохранить';
		$toolmenu[2]['link'] = 'javascript:document.optform.submit();';
	}
		
		$toolmenu[3]['icon'] = 'color_swatch.png';
		$toolmenu[3]['title'] = 'Цвет';
		$toolmenu[3]['link'] = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_color';
		
	if($opt == 'list_color' || $opt == 'show_color' || $opt == 'hide_color'){
		$toolmenu[0]['icon'] = 'newstuff.gif';
		$toolmenu[0]['title'] = 'Новый цвет метки';
		$toolmenu[0]['link'] = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=add_color';
			$toolmenu[12]['icon'] = 'show.gif';
			$toolmenu[12]['title'] = 'Публиковать выбранные';
			$toolmenu[12]['link'] = "javascript:checkSel('?view=components&do=config&id=".(int)$_REQUEST['id']."&opt=show_color&multiple=1');";
	
			$toolmenu[13]['icon'] = 'hide.gif';
			$toolmenu[13]['title'] = 'Скрыть выбранные';
			$toolmenu[13]['link'] = "javascript:checkSel('?view=components&do=config&id=".(int)$_REQUEST['id']."&opt=hide_color&multiple=1');";
			
			
			
	}	

	cpToolMenu($toolmenu);

	//LOAD CURRENT CONFIG
	$cfg = $inCore->loadComponentConfig('notes');


		if(!isset($cfg['perpage'])) { $cfg['perpage'] = 10; }
		if(!isset($cfg['images'])) { $cfg['images'] = 0; }

		 
	
	if($opt=='saveconfig'){	
	


		$cfg['perpage']=(int)$_REQUEST['perpage'];
		$cfg['images']=(int)$_REQUEST['images'];
	
		
		$inCore->saveComponentConfig('notes', $cfg);
		$msg = 'Настройки сохранены!';
		$opt = 'config';
	}

	if (@$msg) { echo '<p class="success">'.$msg.'</p>'; }


	if ($opt == 'show_color'){
		if (!isset($_REQUEST['item'])){
			if (isset($_REQUEST['item_id'])){ dbShow('cms_notes_color', (int)$_REQUEST['item_id']);  }
			echo '1'; exit;
		} else {
			dbShowList('cms_notes_color', $_REQUEST['item']);				
			$opt = 'list_color';				
		}			
	}

	if ($opt == 'hide_color'){
		if (!isset($_REQUEST['item'])){
			if (isset($_REQUEST['item_id'])){ dbHide('cms_notes_color', (int)$_REQUEST['item_id']);  }
			echo '1'; exit;
		} else {
			dbHideList('cms_notes_color', $_REQUEST['item']);				
			$opt = 'list_color';				
		}			
	}

	if($opt == 'delete_color_item'){
		if (isset($_REQUEST['item_id']))
		{ 
		$sql="DELETE FROM `cms_notes_color` WHERE `id` = ".intval($_REQUEST['item_id'])." LIMIT 1";
		$inDB->query($sql);
		}
	
		header('location:?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_color');
	}
	
	if ($opt=='list_color') {
		cpAddPathway('Выбор цвета для меток', '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=config');
		
		
		echo '<h3>Цвета меток</h3>';
		
		//TABLE COLUMNS
		$fields = array();

		$fields[0]['title'] = 'id';			
		$fields[0]['field'] = 'id';			
		$fields[0]['width'] = '30';

		$fields[1]['title'] = 'Название цвета';		
		$fields[1]['field'] = 'title';		
		$fields[1]['width'] = '300';
	
				
		$fields[3]['title'] = "Код цвета";		
		$fields[3]['field'] = 'color';	
		$fields[3]['width'] = '100';
		
		$fields[4]['title'] = "Название цвета текста";		
		$fields[4]['field'] = 'font_color_title';	
		$fields[4]['width'] = '200';
		
		$fields[5]['title'] = "Код цвета";		
		$fields[5]['field'] = 'font_color';	
		$fields[5]['width'] = '100';
		
		

		$fields[6]['title'] = 'Показ';		
		$fields[6]['field'] = 'published';	
		$fields[6]['width'] = '100';
		$fields[6]['do'] = 'opt'; 
		$fields[6]['do_suffix'] = '_color';

		
		
		//ACTIONS
	
		$actions[1]['title'] = 'Удалить';
		$actions[1]['icon']  = 'delete.gif';
		$actions[1]['confirm'] = 'Удалить цвет?';
		$actions[1]['link']  = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=delete_color_item&item_id=%id%';

	
		
		//Print table
		cpListTable('cms_notes_color', $fields, $actions, '', 'id DESC');	
		
		
}	


	if ($opt=='config') {
	

		cpAddPathway('Настройки', '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=config');

		?>
	
	<form action="index.php?view=components&do=config&id=<?php echo (int)$_REQUEST['id'];?>&opt=config" method="post" name="optform" target="_self" id="form1">
		<table width="680" border="0" cellpadding="10" cellspacing="0" class="proptable">
			<tr>
				<td>
					<strong>Сколько пунктов на странице:</strong><br />
			<span class="hinttext">
			</span>
				</td>
				<td valign="top">
			<input type='text' name='perpage' value='<?=$cfg['perpage'];?>'>
		
				</td>
			</tr>
			
			<tr>
				<td>
					<strong>Возможность загружать изображения:</strong><br />
			<span class="hinttext">
			</span>
				</td>
				<td valign="top">
			<select name='images' >
				<option value='0' <?php if ($cfg['images']==0) {echo "selected";} ?> >Нет</option>
				<option value='1' <?php if ($cfg['images']==1) {echo "selected";} ?> >Да</option>
				</select>
		
				</td>
			</tr>
		
			

		</table>
		<p>
			<input name="opt" type="hidden" value="saveconfig" />
			<input name="save" type="submit" id="save" value="Сохранить" />
			<input name="back" type="button" id="back" value="Отмена" onclick="window.location.href='index.php?view=components&do=config&id=<?php echo $_REQUEST['id']; ?>';"/>
		</p>
	</form>	
	
	<?php } 


if($opt == 'add_color_ok')
{
	$title=$_REQUEST['title'];
	$color=$_REQUEST['color'];
	
	$font_color_title=$_REQUEST['font_color_title'];
	$font_color=$_REQUEST['font_color'];
	$sql="INSERT INTO `cms_notes_color` (
`id` ,
`color` ,
`published` ,
`title` ,
`font_color_title` ,
`font_color` 
)
VALUES (
NULL , '".$color."', '1', '".$title."', '".$font_color_title."', '".$font_color."'
);";
	

		$inDB->query($sql);
	
	header('location:?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_color');
	
}

	if ($opt == 'add_color' ){		
				
				 echo '<h3>Добавление цвета</h3>';
	 	 		 cpAddPathway('Добавление цвета', '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_cats');
		
			?>
		<form id="addform" name="addform" method="post" action="index.php?view=components&amp;do=config&amp;id=<?php echo (int)$_REQUEST['id'];?>">
			<table width="620" border="0" cellpadding="0" cellspacing="10" class="proptable">
			  <tr>
				<td><strong>Название цвета: </strong></td>
				<td width="220"><input name="title" type="text" id="title" style="width:220px" value=""/></td>
			  </tr>
			  <tr>
				<td><strong>цвет: </strong></td>
				<td width="220"><input name="color" type="text" id="title" style="width:220px" value="#"/></td>
			  </tr>
			  <tr>
				<td><strong>Название цвета текста: </strong></td>
				<td width="220"><input name="font_color_title" type="text" id="title" style="width:220px" value="Белый"/></td>
			  </tr>
			  <tr>
				<td><strong>цвет текста: </strong></td>
				<td width="220"><input name="font_color" type="text" id="title" style="width:220px" value="#ffffff"/></td>
			  </tr>
			    
			    
			    
			      </table>
			
			<p>
			  <label>
			  <input name="add_mod" type="submit" id="add_mod" value="Создать цвет" />
			    <input name="opt" type="hidden" id="do" value="add_color_ok" />
			  </label>
			  <label>
			  <input name="back3" type="button" id="back3" value="Отмена" onclick="window.location.href='index.php?view=components&do=config&id=<?php echo $_REQUEST['id']; ?>';"/>
			  </label>

			</p>
</form>
			<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="320" HEIGHT="240" id="ColorPicker" ALIGN="">  <PARAM NAME=movie VALUE="/admin/components/notes/ColorPicker.swf" /> <PARAM NAME=quality VALUE=high /> <PARAM NAME=bgcolor VALUE=#f8f8f8 /> <EMBED src="/admin/components/notes/ColorPicker.swf" quality=high bgcolor=#f8f8f8 WIDTH="560" HEIGHT="400" NAME="ColorPicker" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></embed> </object>	
				
				
		 <?php	
	}


?>