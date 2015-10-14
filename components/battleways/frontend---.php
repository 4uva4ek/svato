<?php
if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

function battleways(){

    $inCore = cmsCore::getInstance();
    $inPage = cmsPage::getInstance();
    $inDB   = cmsDatabase::getInstance();
	$inUser = cmsUser::getInstance();

    global $_LANG;

    $inCore->loadModel('battleways');
    $model = new cms_model_battleways();

$usr = cmsCore::request('id', 'int', 0);
	
	$cfg = $inCore->loadComponentConfig('battleways');
	// Проверяем включени ли компонент
	if(!$cfg['component_enabled']) { cmsCore::error404(); }

	$id 	= $inCore->request('id', 'int', 0);
	$do		= $inCore->request('do', 'str', 'view');
	
	$tag		= $inCore->request('tag', 'str', '');
	$color		= $inCore->request('color', 'str', '');
	$page	= $inCore->request('page', 'int', 1);
	$select_tag=0;
	
	$t = urldecode($tag);

	if(!empty($t))
	{
	
	$sql="SELECT * 
FROM `cms_battleways` 
WHERE `type` LIKE '%".$t."%'";

	if($inDB->query($sql))
	{
		$select_tag=1;
	}
    
    }
     	 
     	 
		if(!isset($cfg['perpage'])) { $cfg['perpage'] = 10; }
		if(!isset($cfg['images'])) { $cfg['images'] = 0; }


		
if ($_SESSION['user']['id']==0)
{
	echo "Гостям запрещено просматривать данный раздел";
}
else
{
if ($do=='view_battleway'){
	
	
	
	 $battleway=$model->getBattleway($id);
	
	$smarty = $inCore->initSmarty('components', 'com_battleways_view.tpl');
	$smarty->assign('is_posts_view', (bool)sizeof($battleway));
	$smarty->assign('pagetitle', $battleway['title']);
	$smarty->assign('content', $battleway['content']); 
    $smarty->display('com_battleways_view.tpl');
	
	
	
	
	/*
	if($model->authorBattleway($id))
	{
	$battleway=$model->getBattleway($id);
	
	$smarty = $inCore->initSmarty('components', 'com_battleways_view.tpl');
	$smarty->assign('is_posts_view', (bool)sizeof($battleway));
	$smarty->assign('pagetitle', $battleway['title']);
	$smarty->assign('content', $battleway['content']); 
    $smarty->display('com_battleways_view.tpl');
   }
   else
   {
 	cmsCore::error404();
    }
	*/
	
}





if ($do=='del'){
	
	$del=$model->delBattleway($id);
	
		$inCore->redirect('/battleways/');

}

if ($do=='view'){
	
	
	
	if($select_tag==0)
	{
	$total_battleways=$model->totalPosts();

	$pagination = cmsPage::getPagebar($total_battleways, $page, $cfg['perpage'], '/battleways/page%page%.html');
	}
	

	 //GET ENTRIES
     $posts_list = $model->getAllPosts($page, $cfg['perpage'],$select_tag,$t,$color,$user_id);
     
	
	if ($posts_list){
    foreach($posts_list as $post){
     $post['datetime']	= $inCore->dateFormat($post['datetime'],1,0,1);
     
   /*   if(!empty($post['type']))
     {
     $sql="select * from `cms_battleways_color` where `id`='".$post['color']."';";
     
     
     $result = $inDB->query($sql);
     if ($inDB->num_rows($result)){
     	 
	     $color = $inDB->fetch_assoc($result);
	     $post['status']	= "<a href='/battleways/".$post['type']."/".$post['color']."/' style='background: ".$color['color'].";border-radius: 3px;color: ".$color['font_color'].";display: inline-block;height: 19px;margin: 5px 3px 2px 2px;outline: #FFFFFF 0px;padding: 1px 4px;text-decoration: none;text-indent: 0px;vertical-align: middle;white-space: nowrap;'>".$post['type']."</a>";
	     }
	     else
	     {
	     	 $post['status']	= "<a href='/battleways/".$post['type']."/' style='background: #E6E6E6;border:1px solid #e1e1e1;padding:5px;border-radius: 8px;border-radius: 3px;color:#333333;text-shadow: #FFFFFF 1px 1px 0px;display: inline-block;height: 19px;margin: 5px 3px 2px 2px;outline: #FFFFFF 0px;padding: 1px 4px;text-decoration: none;text-indent: 0px;vertical-align: middle;white-space: nowrap;cursor:pointer;'>".$post['type']."</a>";
	     	 
	     }
     } */
	 
	 
	 
	 
     $posts[]            = $post;
            }
    }
	
	$smarty = $inCore->initSmarty('components', 'com_battleways_view.tpl');
	$smarty->assign('is_posts', (bool)sizeof($posts_list));
	if($select_tag==0)
	{
	$smarty->assign('pagination', $pagination);
	}
	
	$smarty->assign('mark', $model->getMarks());
	$smarty->assign('pagetitle', "Бойовий шлях");
	if ($posts) { $smarty->assign('posts', $posts); }
    $smarty->display('com_battleways_view.tpl');
	
	
	
}


if ($do=='add_battleway'){
		$user_id 		= $inUser->id;
		
		$title   = $inCore->request('title', 'str', '');
		$type   = $inCore->request('type', 'str', '');
		$color   = $inCore->request('color', 'int', '');
		if(!empty($title))
		{
		$describe_full   = $inCore->request('full', 'html', '');
		//парсим bb-код перед записью в базу
        $describe_full_html   = $inCore->parseSmiles($describe_full, true);
		// Экранируем специальные символы
        $describe_full_html   = $inDB->escape_string($describe_full_html);
        

		$sql="INSERT INTO `cms_battleways` (
		`id` ,
		`datetime` ,
		`title` ,
		`content` ,
		`user` ,
		`type` ,
		`color` 
		)
		VALUES (
		NULL , NOW(), '".$title."', '".$describe_full_html."', '".$user_id."', '".$type."', '".$color."'
		);";

		
	   $result = $inDB->query($sql);
	   
	   $inCore->redirect('/battleways/');
	    }
	    
    $inPage->addHeadJS('components/battleways/js/battleways.js');
    
	
	$bb_toolbar = cmsPage::getBBCodeToolbar('message',$cfg['images'], 'battleways');
    $smilies    = cmsPage::getSmilesPanel('message');
	$smarty = $inCore->initSmarty('components', 'com_battleways_add.tpl');
	
	$smarty->assign('mark_insert', $model->getAutoMark());
	
	$smarty->assign('select_color', $model->getColors());
	$smarty->assign('title', "Добавление записки");
	$smarty->assign('bb_toolbar', $bb_toolbar);
    $smarty->assign('smilies', $smilies);
    $smarty->display('com_battleways_add.tpl');
}






			if ($do=='edit_battleway'){
			
			
			
			
				$battleway=$model->getBattleway($id);
	
			 	$smarty = $inCore->initSmarty('components', 'com_battleways_edit.tpl');
				$smarty->assign('is_posts_view', (bool)sizeof($battleway));
				$smarty->assign('pagetitle', $battleway['title']);
				$smarty->assign('content', $battleway['content']); 
			 
			
				$user_id 		= $inUser->id;
				
				$title   = $inCore->request('title', 'str', '');
				$type   = $inCore->request('type', 'str', '');
				$color   = $inCore->request('color', 'int', '');
				if(!empty($title))
				{
				$describe_full   = $inCore->request('full', 'html', '');
				//парсим bb-код перед записью в базу
				$describe_full_html   = $inCore->parseSmiles($describe_full, true);
				// Экранируем специальные символы
				$describe_full_html   = $inDB->escape_string($describe_full_html);
				
				
				$sql="INSERT INTO `cms_battleways` (
					`id` ,
					`datetime` ,
					`title` ,
					`content` ,
					`user` ,
					`type` ,
					`color` 
					)
					VALUES (
					NULL , NOW(), '".$title."', '".$describe_full_html."', '".$user_id."', '".$type."', '".$color."'
					);";
					
							
						$result = $inDB->query($sql);
						
						$inCore->redirect('/battleways/');
							}
							
						$inPage->addHeadJS('components/battleways/js/battleways.js');
						
						
						$bb_toolbar = cmsPage::getBBCodeToolbar('message',$cfg['images'], 'battleways');
						$smilies    = cmsPage::getSmilesPanel('message');
						$smarty = $inCore->initSmarty('components', 'com_battleways_edit.tpl');
						
						$smarty->assign('mark_insert', $model->getAutoMark());
						
						$smarty->assign('select_color', $model->getColors());
						$smarty->assign('title', "Добавление записки");
						$smarty->assign('bb_toolbar', $bb_toolbar);
						$smarty->assign('smilies', $smilies);
						$smarty->display('com_battleways_edit.tpl');
					}
					

		
}




/////////////////////////////////////////////////

} //function
?>