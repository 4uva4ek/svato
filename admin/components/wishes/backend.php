<?php
if(!defined('VALID_CMS_ADMIN')) { die('ACCESS DENIED'); }

	cpAddPathway('Хотелки', '?view=components&do=config&id='.(int)$_REQUEST['id']);
	echo '<h3>Хотелки</h3>';
	if (isset($_REQUEST['opt'])) { $opt = $_REQUEST['opt']; } else { $opt = 'list_items'; }
	
	
	function iconList(){
	if ($handle = opendir(PATH.'/images/menuicons')) {
		$n = 0;
		while (false !== ($file = readdir($handle))) {
			if ($file != '.' && $file != '..' && mb_strstr($file, '.gif')){
				$tag = str_replace('.gif', '', $file);
				$dir = '/images/menuicons/';
				echo '<a style="width:20px;height:20px;display:block; float:left; padding:2px" href="javascript:selectIcon(\''.$file.'\')"><img alt="'.$file.'"src="'.$dir.$file.'" border="0" /></a>';
 				$n++;
			}
		}
		closedir($handle);
	}

	if (!$n) { echo '<p>Папка "/images/menuicons" пуста!</p>'; }

	echo '<div align="right" style="clear:both">[<a href="javascript:selectIcon(\'\')">Без иконки</a>] [<a href="javascript:hideIcons()">Закрыть</a>]</div>';

	return;
}

$GLOBALS['cp_page_head'][] = '<script language="JavaScript" type="text/javascript" src="js/menu.js"></script>';
	$toolmenu = array();
	if($opt != 'config'){

		$toolmenu[1]['icon'] = 'liststuff.gif';
		$toolmenu[1]['title'] = 'Все хотелки';
		$toolmenu[1]['link'] = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_items';

		$toolmenu[2]['icon'] = 'newfolder.gif';
		$toolmenu[2]['title'] = 'Новая категория';
		$toolmenu[2]['link'] = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=add_category';

		$toolmenu[3]['icon'] = 'folders.gif';
		$toolmenu[3]['title'] = 'Категории';
		$toolmenu[3]['link'] = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_cats';

	

		$toolmenu[15]['icon'] = 'config.gif';
		$toolmenu[15]['title'] = 'Настройки';
		$toolmenu[15]['link'] = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=config';
	}
		if($opt == 'list_items' || $opt == 'show_item' || $opt == 'hide_item'){

			$toolmenu[12]['icon'] = 'show.gif';
			$toolmenu[12]['title'] = 'Публиковать выбранные';
			$toolmenu[12]['link'] = "javascript:checkSel('?view=components&do=config&id=".(int)$_REQUEST['id']."&opt=show_item&multiple=1');";
	
			$toolmenu[13]['icon'] = 'hide.gif';
			$toolmenu[13]['title'] = 'Скрыть выбранные';
			$toolmenu[13]['link'] = "javascript:checkSel('?view=components&do=config&id=".(int)$_REQUEST['id']."&opt=hide_item&multiple=1');";
	}
	if($opt == 'list_items')
	{
		
		
		$toolmenu[4]['icon'] = 'delete.gif';
		$toolmenu[4]['title'] = 'Удалить выбранные';
		$toolmenu[4]['link'] = "javascript:checkSel('?view=components&do=config&id=".(int)$_REQUEST['id']."&opt=delete_item&multiple=1');";
	}
	
	if($opt == 'config'){
		$toolmenu[16]['icon'] = 'save.gif';
		$toolmenu[16]['title'] = 'Сохранить';
		$toolmenu[16]['link'] = 'javascript:document.optform.submit();';
	}

	if($opt != 'list_items' && $opt != 'list_cats'){
		$toolmenu[17]['icon'] = 'cancel.gif';
		$toolmenu[17]['title'] = 'Отмена';
		$toolmenu[17]['link'] = '?view=components&do=config&id='.(int)$_REQUEST['id'];
	}

	cpToolMenu($toolmenu);

	//LOAD CURRENT CONFIG
	$cfg = $inCore->loadComponentConfig('wishes');


		if(!isset($cfg['perpage'])) { $cfg['perpage'] = 10; }
		if(!isset($cfg['on_main'])) { $cfg['on_main'] = 5; }
		
		
		
	
	
	if($opt=='saveconfig'){	
	

		$cfg['on_main']=(int)$_REQUEST['on_main'];
		$cfg['perpage']=(int)$_REQUEST['perpage'];


		$inCore->saveComponentConfig('wishes', $cfg);
		$msg = 'Настройки сохранены!';
		$opt = 'config';
	}

	if (@$msg) { echo '<p class="success">'.$msg.'</p>'; }


	if ($opt=='config') {
	

		cpAddPathway('Настройки', '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=config');

		?>
	
	
	<form action="index.php?view=components&do=config&id=<?php echo (int)$_REQUEST['id'];?>&opt=config" method="post" name="optform" target="_self" id="form1">
		<table width="680" border="0" cellpadding="10" cellspacing="0" class="proptable">
				<tr>
				<td>
					<strong>Сколько пунктов на главной компонента:</strong><br />
			<span class="hinttext">
			</span>
				</td>
				<td valign="top">
			<input type='text' name='on_main' value='<?=$cfg['on_main'];?>'>
		
				</td>
			</tr>
				<tr>
				<td>
					<strong>Сколько пунктов внутри постраничной навигации:</strong><br />
			<span class="hinttext">
			</span>
				</td>
				<td valign="top">
			<input type='text' name='perpage' value='<?=$cfg['perpage'];?>'>
		
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
	
	if ($opt == 'show_item'){
		if (!isset($_REQUEST['item'])){
			if (isset($_REQUEST['item_id'])){ dbShow('cms_wishes', (int)$_REQUEST['item_id']);  }
			echo '1'; exit;
		} else {
			dbShowList('cms_wishes', $_REQUEST['item']);				
			$opt = 'list_items';				
		}			
	}

	if ($opt == 'hide_item'){
		if (!isset($_REQUEST['item'])){
			if (isset($_REQUEST['item_id'])){ dbHide('cms_wishes', (int)$_REQUEST['item_id']);  }
			echo '1'; exit;
		} else {
			dbHideList('cms_wishes', $_REQUEST['item']);				
			$opt = 'list_items';				
		}			
	}
	
	
	
if($opt=='special')
{
	
	?>
	<br/>
	<input name="back3" type="button" id="back3" value="Пересчёт файлов &raquo;" onclick="window.location.href='index.php?view=components&do=config&id=<?php echo $_REQUEST['id']; ?>&opt=pereschet';"/><br/><br/>
		<input name="back3" type="button" id="back3" value="Отмена" onclick="window.location.href='index.php?view=components&do=config&id=<?php echo $_REQUEST['id']; ?>';"/>
	<?
}	
	
if($opt=='update_cat')
{
	$category_name  = (string)$_REQUEST['category_name'];
	$icon  = (string)$_REQUEST['icon'];
	$class  = (string)$_REQUEST['class'];
	$published = (int)$_REQUEST['published'];
	$instruction  = $_REQUEST['instruction'];
	$item_id = (int)$_REQUEST['item_id'];
	$sql="UPDATE `cms_wishes_cat` SET `title` = '".$category_name."', `descr`='".$instruction."',
`published` = '".$published."', `icon`='".$icon."', `class`='".$class."' WHERE `id` =".$item_id.";";

	$result = $inDB->query($sql) ;
	
header('location:?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_cats');	
	
}	






if($opt=='edit_cat')
{	$id=(int)$_REQUEST['item_id'];
		$sql="SELECT * from `cms_wishes_cat` WHERE `id` = ".$id." LIMIT 1;";
		$result = $inDB->query($sql) ;
		if ($inDB->num_rows($result)){	
			$sq = $inDB->fetch_assoc($result);
	?>
	<form action="index.php?view=components&do=config&id=<?php echo $_REQUEST['id'];?>" method="post" enctype="multipart/form-data" name="addform" ><br/>Наименование:<br/>
	 <input name="category_name" type="text" size="30" value='<?=$sq[title];?>' /><br/><br/>
	 	 Отображение:<br/>
	 	 <select name='published'>
	 	 <option value='1' <?php if ($sq['published']==1) { echo 'selected'; } ?> >Показывать </option>
	 	 <option value='0' <?php if ($sq['published']==0) { echo 'selected'; } ?> >Скрыть </option>
	 	 </select>
	 	 <br/>Описание<br/>
	 		 	 	<?php
                $inCore->insertEditor('instruction', $sq['descr'], '300', '700');
			?>
			<br/><br/>Стиль (класс) кнопки: <br/>
	 <input name="class"  type="text" size="30" value='<?=$sq['class'];?>' /><br/>Иконка:(папка /images/menuicons) <br/>Иконка: <br/>
	 			<input name="icon" id="iconurl" type="text" value='<?=$sq[icon];?>' size="30" /><br/>
	 			 <div style='width:700px;'>
                    <a id="iconlink" style="display:block;" href="javascript:showIcons()"> Выбрать иконку</a>
                        <div id="icondiv" style="display:none; padding:6px;border:solid 1px gray;background:#FFF">
                            <div><?php iconList(); ?></div>
                        </div>
                 </div>
	 	 
	 	 
	 	 <input name="add_mod" type="submit" id="add_mod" value="Сохранить &raquo;" />
            <input name="back3" type="button" id="back3" value="Отмена" onclick="window.location.href='index.php?view=components&do=config&opt=list_cats&id=<?php echo $_REQUEST['id']; ?>';"/>
            	<input name="item_id" type="hidden" value="<?=$id;?>" />
            <input name="opt" type="hidden" id="opt" value="update_cat" />
	</form>
	<?
		}
}	
if($opt=='create_category')
{
	$category_name  = (string)$_REQUEST['category_name'];
	$instruction  = $_REQUEST['instruction'];
	$type  = (string)$_REQUEST['type'];
	$icon  = (string)$_REQUEST['icon'];
	$class  = (string)$_REQUEST['class'];
	$published = (int)$_REQUEST['published'];

	
	$sql="INSERT INTO `cms_wishes_cat` (
`id` ,
`title` ,
`descr` ,
`published` ,
`date` ,
`who_create` ,
`icon`,
`class`		 
)
VALUES (
NULL , '".$category_name."', '".$instruction."', '".$published."', NOW(), '".$_SESSION[user][id]."', '".$icon."', '".$class."'
);";
	
	
		$result = $inDB->query($sql);
	

header('location:?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_cats');
}

if($opt=='list_cats')
{
		cpAddPathway('Категории хотелок', '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_cats');
		echo '<h3>Категории хотелок</h3>';
		
		//TABLE COLUMNS
		$fields = array();

		$fields[0]['title'] = 'id';			
		$fields[0]['field'] = 'id';			
		$fields[0]['width'] = '30';

		$fields[1]['title'] = 'Категория';		
		$fields[1]['field'] = 'title';		
		$fields[1]['width'] = '';
		$fields[1]['link'] = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=edit_cat&item_id=%id%';
		$fields[1]['filter'] = 15;
		$fields[1]['maxlen'] = 80;
		
		$fields[5]['title'] = 'Стиль';	
		$fields[5]['field'] = 'class'; 
		$fields[5]['width'] = '300';
		
		
		$fields[2]['title'] = 'Показ';		
		$fields[2]['field'] = 'published';	
		$fields[2]['width'] = '100';
		$fields[2]['do'] = 'opt'; 
		$fields[2]['do_suffix'] = '_cat';
		//ACTIONS
		$actions = array();
		$actions[0]['title'] = 'Редактировать';
		$actions[0]['icon']  = 'edit.gif';
		$actions[0]['link']  = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=edit_cat&item_id=%id%';
		$actions[1]['title'] = 'Удалить';
		$actions[1]['icon']  = 'delete.gif';
		$actions[1]['confirm'] = 'Удалить категорию?';
		$actions[1]['link']  = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=delete_cat_item&item_id=%id%';
				
		//Print table
		cpListTable('cms_wishes_cat', $fields, $actions, '', 'id DESC');	
}
if($opt=='add_category')
{
	?>
	<form action="index.php?view=components&do=config&id=<?php echo $_REQUEST['id'];?>" method="post" enctype="multipart/form-data" name="addform" id="addform"><br/>Наименование:<br/>
	 <input name="category_name" type="text" size="30" /><br/>
	 	 	 	 Отображение:<br/>
	 	 <select name='published'>
	 	 <option value='1' selected >Показывать </option>
	 	 <option value='0' >Скрыть </option>
	 	 </select><br/>
	 	<br/>
	 	 Описание<br/>
	 	 	<?php
                $inCore->insertEditor('instruction', '', '300', '700');
			?>
	 	 <br/><br/>Стиль (класс) кнопки: <br/>
	 <input name="class"  type="text" size="30" /><br/>Иконка:(папка /images/menuicons) <br/>
	 <input name="icon" id="iconurl" type="text" size="30" /><br/>
	 			 <div style='width:700px;'>
                    <a id="iconlink" style="display:block;" href="javascript:showIcons()"> Выбрать иконку</a>
                        <div id="icondiv" style="display:none; padding:6px;border:solid 1px gray;background:#FFF">
                            <div><?php iconList(); ?></div>
                        </div>
                 </div>
	 	 
	 	 <input name="add_mod" type="submit" id="add_mod" value="Создать &raquo;" />
            <input name="back3" type="button" id="back3" value="Отмена" onclick="window.location.href='index.php?view=components&do=config&id=<?php echo $_REQUEST['id']; ?>';"/>
            <input name="opt" type="hidden" id="opt" value="create_category" />
	</form>
	<?
}
	if($opt == 'delete_item'){
	
		if (!isset($_REQUEST['item'])){
			if (isset($_REQUEST['item_id'])){ 
		
		$sql="SELECT * from `cms_wishes` WHERE `id` = ".$_REQUEST['item_id']." LIMIT 1;";
		$result = $inDB->query($sql) ;
		if ($inDB->num_rows($result)){	
		$post = $inDB->fetch_assoc($result);
		$sql2="DELETE FROM `cms_wishes` WHERE `id` = ".$_REQUEST['item_id'].";";
		$result2 = $inDB->query($sql2) ;
		}
			}
		} else {
		//массовое удаление
		foreach($_REQUEST['item'] as $i=>$e)
		{
		$sql="SELECT * from `cms_wishes` WHERE `id` = ".$e." LIMIT 1;";
		$result = $inDB->query($sql) ;
		if ($inDB->num_rows($result)){	
			$post = $inDB->fetch_assoc($result);
			
			$sql2="DELETE FROM `cms_wishes` WHERE `id` = ".$e.";";
		$result2 = $inDB->query($sql2) ;
		
		}
		}
				
	}
		header('location:?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_items');
	}




	if ($opt == 'show_cat'){
		if(isset($_REQUEST['item_id'])) { 
			$id = (int)$_REQUEST['item_id'];
			$sql = "UPDATE `cms_wishes_cat` SET `published` = '1' WHERE `id` = $id";
			dbQuery($sql) ;
			echo '1'; exit;
		}
	}

	if ($opt == 'hide_cat'){
		if(isset($_REQUEST['item_id'])) { 
			$id = (int)$_REQUEST['item_id'];
			$sql = "UPDATE `cms_wishes_cat` SET `published` = '0' WHERE `id` = $id";
			dbQuery($sql) ;
			echo '1'; exit;
		}
	}
	
	if($opt == 'delete_cat_item'){
		if (!isset($_REQUEST['item'])){
			if (isset($_REQUEST['item_id'])){ 
		
		$sql="SELECT * from `cms_wishes_cat` WHERE `id` = ".$_REQUEST['item_id']." LIMIT 1;";
		$result = $inDB->query($sql) ;
		if ($inDB->num_rows($result)){	
			$sq = $inDB->fetch_assoc($result);
			$sql2="DELETE FROM `cms_wishes_cat` WHERE `id` = ".$_REQUEST['item_id'].";";
		$result2 = $inDB->query($sql2) ;
		}
		
			}
		} else {
		//массовое удаление
		foreach($_REQUEST['item'] as $i=>$e)
		{
		$sql="SELECT * from `cms_wishes_cat` WHERE `id` = ".$e." LIMIT 1;";
		$result = $inDB->query($sql) ;
		if ($inDB->num_rows($result)){	
			$sq = $inDB->fetch_assoc($result);
			$sql2="DELETE FROM `cms_wishes_cat` WHERE `id` = ".$e.";";
		$result2 = $inDB->query($sql2) ;
		}
		}
				
	}
		header('location:?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_cats');
	}

	if ($opt == 'list_items'){
		cpAddPathway('Список - Хотелки', '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=list_items');
		echo '<h3>Хотелки</h3>';
		
		//TABLE COLUMNS
		$fields = array();

		$fields[0]['title'] = 'id';			
		$fields[0]['field'] = 'id';			
		$fields[0]['width'] = '30';

		$fields[1]['title'] = 'Наименование хотелки';		
		$fields[1]['field'] = 'title';		
		$fields[1]['width'] = '';
	
		$fields[1]['filter'] = 15;
		$fields[1]['maxlen'] = 80;
		
	
		$fields[4]['title'] = 'Показ';		
		$fields[4]['field'] = 'published';	
		$fields[4]['width'] = '100';
		$fields[4]['do'] = 'opt'; 
		$fields[4]['do_suffix'] = '_item';
		
		$fields[5]['title'] = 'Категория';	
		$fields[5]['field'] = 'type'; 
		$fields[5]['width'] = '300';
		$fields[5]['filter'] = 1;  
		



		//ACTIONS
		$actions = array();
		$actions[0]['title'] = 'Перейти к хотелке';
		$actions[0]['icon']  = 'next.gif';
		$actions[0]['link']  = '../wishes/wish_item%id%.html ';
		
		$actions[1]['title'] = 'Редактировать';
		$actions[1]['icon']  = 'edit.gif';
		$actions[1]['link']  = '../wishes/edit_item%id%.html';
		

		$actions[2]['title'] = 'Удалить';
		$actions[2]['icon']  = 'delete.gif';
		$actions[2]['confirm'] = 'Удалить хотелку?';
		$actions[2]['link']  = '?view=components&do=config&id='.(int)$_REQUEST['id'].'&opt=delete_item&item_id=%id%';
				
		//Print table
	//	cpListTable('cms_wishes', $fields, $actions, '', 'id DESC');
}	
