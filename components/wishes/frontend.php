<?php
 
if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

function wishes(){

    $inCore = cmsCore::getInstance();
    $inPage = cmsPage::getInstance();
    $inDB   = cmsDatabase::getInstance();
    $inUser = cmsUser::getInstance();

	$user_id=$inUser->id;
	//$inPage->addHeadJS('');
	//$inPage->addHeadJS('');

    global $_LANG;



    $inCore->loadModel('wishes');
    $model = new cms_model_wishes();

		
	//Загрузка настроек встреч
	$cfg = $inCore->loadComponentConfig('wishes');
	// Проверяем включени ли компонент

	if(!$cfg['component_enabled']) { cmsCore::error404(); }
	
		if(!isset($cfg['perpage'])) { $cfg['perpage'] = 10; }
		if(!isset($cfg['on_main'])) { $cfg['on_main'] = 5; }

	//Получаем параметры
	$id    = $inCore->request('id', 'int', 0);	
	$do    = $inCore->request('do', 'str', 'view');
	$page  = $inCore->request('page', 'int', 1);
	$pagetitle="Потрібно - Допоможу";
	$inPage->addPathway($pagetitle, '/wishes/all.html');
		
	$types=array();
	$sql="select * from `cms_wishes_cat`";
	$result=$inDB->query($sql);
	$j=1;
	while($tinfo = $inDB->fetch_assoc($result))
	{
	$types[$j]["1"]=$tinfo['class'];
	$types[$j]["2"]=$tinfo['title'];
	$j++;
	}
	

	
$inPage->addHead('<link rel="stylesheet" href="/components/wishes/css/style.css">');

/***********************************************************/
if($do=='load')
{
	$n    = $inCore->request('n', 'int', 1);
	$page    = $inCore->request('page', 'int', 1);	
//echo $page." ".$n." дозагрузка данных<br/>";
$t=$types[$n];
$inf = $model->wish_type($n,$t,$user_id,$page,$active=0,$types=array(),$cfg['on_main']);
echo $inf;
exit;	
}
if($do=='delete')
{
	 if($model->is_author($user_id,$id) or $inUser->is_admin)
		{
		$sql="DELETE FROM `cms_wishes` WHERE `id` = ".$id.";";
		$result = $inDB->query($sql) ;
		cmsCore::addSessionMessage("Успішно видалено!", 'success');

		}
		
	 
	 cmsCore::redirect('/wishes/');
}
if($do=='wish_item')
{
$sql="select * from `cms_wishes` where `published`='1' and `id`='".$id."' ";
		//echo $sql;
		$result=$inDB->query($sql);
		$sinfo = $inDB->fetch_assoc($result);
		$us=$inUser->loadUser($sinfo['user_id']);
		$t=$types[$sinfo['type']];
		$inPage->addPathway($t[2], '/wishes/type'.$sinfo['type'].'.html');
		$inPage->addPathway($sinfo['title'], '');
	$inPage->setTitle($sinfo['title']);
		
		echo "<h2><a href='/wishes/type".$sinfo['type'].".html'>".$t[2]."</a> &raquo; ".$sinfo['title']."</h2>";
		echo "<div style='font-size:11px;'><a href='/users/".$us['login']."'>".$us['nickname']."</a> | ".$inCore->dateformat($sinfo['datetime'])."</div>";
		
		if($model->is_author($user_id,$id) or $inUser->is_admin)
		{
			echo "<div style='float:right;'><a href='/wishes/delete".$id.".html'>Видалити</a></div>";
		}
		
		echo "
			<table width='100%'><tr><td valign='top' width='10%'>
			<a href='/users/".$us['login']."'><img src='".$us['imageurl']."' style='float:left;border-radius:10px;margin:0px 10px 10px 0px;' border='0' /></a>
			</td>
			<td>
			<div style='padding:10px;margin-bottom:50px; background-color:#f2f0f0; border-bottom: 1px solid #DDDDDD;border-top: 1px solid #DDDDDD;'>
			".$sinfo['info']."</div>
			</td>
				</tr>
			</table>
		";
		
		if($inCore->isComponentInstalled('comments')){
        cmsCore::includeComments();
        comments('wishes', $sinfo['id']);
    }
}

/***********************************************************/
if($do=='add_item')
{
	$title    = $inCore->request('title', 'str', '');
	$info    = $inCore->request('info', 'str', '');
	
	$send    = $inCore->request('send', 'str', '');
	
	$type = $id;

	$guest_info = $inUser->getGuestInfo();
	$user_access=$inUser->id;
	
	if($user_access>0)
	{
		/**//**//**//**/
	
	$inf="0";
	$success="0";
	$tr=strlen($title);
	if($send=="ok")
	{
	if($tr>0)
	{
		$ip=$_SERVER['REMOTE_ADDR'];
		$browser=$_SERVER['HTTP_USER_AGENT'];
			$sql="INSERT INTO `cms_wishes` (`id` ,
`title` ,
`info` ,
`published` ,
`datetime` ,
`user_id` ,
`rate` ,
`type` ,
`ip` ,
`browser` 
)
VALUES (NULL , '".$title."', '".$info."', '1', NOW(), '".$user_id."', '0', '".$type."', '".$ip."', '".$browser."'
);";

			$inDB->query($sql);
		
		$msg="<span style='font-size:10px;'>Інформація успішно додана</span>";
	 cmsCore::addSessionMessage($msg, 'success');
	 $inf="1";
	 $success="1";
	 
	 cmsCore::redirect('/wishes/');
		
	}
	else
	{
		$msg="<span style='font-size:10px;'>Ви не ввели заголовок!</span>";
	 cmsCore::addSessionMessage($msg, 'error');
	 $inf="1";
	}
	}
	
	if($inf!="1")
	{
	$msg="<span style='font-size:10px;'>Заповніть поля Заголовок та Інформація.</span>";
	 cmsCore::addSessionMessage($msg, 'info');
	}
	$pagetitle="Додання в розділ &laquo;".$types[$id][2]."&raquo;";
	$inPage->addPathway($pagetitle, '');
	
	
	if($success=="0")
	{
	echo "<h2>Додання в розділ &laquo;".$types[$id][2]."&raquo;</h2>";

	echo "<form action='' method='post'>
		Заголовок:<br/>
		<input type='text' name='title' style='width:400px;' /><br/>
		Інформація &laquo;".$types[$id][2]."&raquo;<br/>
			<textarea name='info' style='width:400px;height:150px;'></textarea><br/>
				<input type='hidden' name='type' value='".$id."' />
				<input type='hidden' name='send' value='ok' />
				<input type='submit' value='Відправити'> <input type='button' value='Відміна' onclick='window.history.back()' />
					
		
	</form>
	";
	}
	else
	{
		echo "<a href='/wishes/all.html'>Перейти на початок</a>";
	}
	
		/**//**//**//**/
	}
	else
	{
			$msg="<span style='font-size:10px;'>Доступно тільки зареєстрованим користувачам</span> <input type='button' value='Вернуться' onclick='window.history.back()' />";
	 cmsCore::addSessionMessage($msg, 'error');
	}
	
}
/***********************************************************/
if($do=='type')
{
	$n=$id;
	$t=$types[$n];
	$active='1';
	$inf = $model->wish_type($n,$t,$user_id,$page,$active,$types,$cfg['perpage']);
	if($n==0)
	{
		$total=$inDB->rows_count("cms_wishes","`published`=1");
	}
	else
	{
		$total=$inDB->rows_count("cms_wishes","`type`='".$n."' and `published`=1");
	}

		if($user_id<=0)
		{$model->modal();}
		$name=$t[2];
		if($n==0)
		{
			$name="Все";
		}
		
		$inPage->addPathway($name, '');
echo "<h3><a href='/wishes/all.html'>На початок</a> &raquo; ".$name."</h3>";
echo "<a href='/wishes/add".$n.".html' class='usr_wall_addlink ".$t["1"]."'>Допомогти</a>";
	echo $inf;
	if($n==0)
	{
	$pagination = cmsPage::getPagebar($total, $page, $cfg['perpage'], '/wishes/all-page%page%.html');
	}
	else
	{
		$pagination = cmsPage::getPagebar($total, $page, $cfg['perpage'], '/wishes/type'.$n.'-page%page%.html');
	}
	echo $pagination;
}
/***********************************************************/

if($do=='view')
{
	$st="";
	$cntt=count($types);
	foreach($types as $n=>$t)
	{
		 $links.="&nbsp;<span style='border-radius:3px;border:1px dotted #999;color:#333;'><a href='/wishes/type".intval($n).".html'>".$t[2]."</a></span>&nbsp;";
		 
		$inf = $model->wish_type($n,$t,$user_id,$page=1,$active=0,$types=array(),$cfg['on_main']);

		//print_r($t);
		$st.="<tr valign='top' ><div class='wish-type'><span style='font-size:20px;font-weight:bold;color:#333;'>
		<a href='/wishes/type".$n.".html'>".$t["2"]."</span> 
		<br/>
		<div  >
		<a href='/wishes/add".$n.".html' class='usr_wall_addlink ".$t["1"]."'>Допомогти</a>
		</div></div>
		<br/>
		".$inf."<br/>
		".$inf1."
		<div id='rrr".$n."'></div>
		<div id='temp".$n."' style='display:none;'></div>	
		<div style='text-align:center;'>
		<div id='imgload".$n."'></div>
		<input type='hidden' id='page".$n."' name='page".$n."' value='2'>
		</div>
		<input type='button' style='width:100%;' onclick='upload_wish(rrr".$n.",page".$n.", temp".$n.",".$n.")' value='Завантажити ще'>
		</tr>";
		 
	}
	
	}
	
	}
	 
	
	?>
	
	
	<script>
	function upload_wish(id,page,temp,n)
	{
		var i = Number( $(page).val())


	/*	$(img).html('<img src="/components/wishes/images/load.gif" border="0" />')*/
			
			$(temp).load("/wishes/load.html", {page: i, n: n}, function(){
			$(id).append($(temp).html());
			});
			i=i+1
			$(page).val(i);
	/*	$(img).html('')*/
		
	}	
	</script>
	<script>
	function wishplus(id)
	{
		alert("Плюс для " + id);
	}	
		function wishminus(id)
	{
		alert("Минус для " + id);
	}	
	</script>	

	 
		
<script language="JavaScript" type="text/javascript" src="/components/users/js/profile.js"></script>
		
		
 
