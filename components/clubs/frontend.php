<?php
 

if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

function clubs(){

    $inCore = cmsCore::getInstance();
    $inPage = cmsPage::getInstance();
    $inDB   = cmsDatabase::getInstance();
    $inUser = cmsUser::getInstance();

    global $_LANG;

    $model = new cms_model_clubs();

	$inPhoto = $model->initPhoto();

    define('IS_BILLING', $inCore->isComponentInstalled('billing'));
    if (IS_BILLING) { cmsCore::loadClass('billing'); }

	// js только авторизованным
	if($inUser->id){
		$inPage->addHeadJS('components/clubs/js/clubs.js');
	}

	$pagetitle = $inCore->getComponentTitle();

	$id   = cmsCore::request('id', 'int', 0);
	$do   = $inCore->do;
	$page = cmsCore::request('page', 'int', 1);

	$inPage->setTitle($pagetitle);
	$inPage->addPathway($pagetitle, '/clubs');
    $inPage->addHeadJsLang(array('NO_PUBLISH','EDIT_PHOTO','YOU_REALLY_DELETE_PHOTO','YOU_REALLY_DELETE_ALBUM','RENAME_ALBUM','ALBUM_TITLE','ADD_PHOTOALBUM','REALY_EXIT_FROM_CLUB','JOINING_CLUB','SEND_MESSAGE','CREATE','CREATE_CLUB','SEND_INVITE_CLUB','YOU_NO_SELECT_USER'));

//////////////////////// КЛУБЫ ПОЛЬЗОВАТЕЛЯ/////////////////////////////////////
if ($do == 'user_clubs') {

    if(!cmsCore::isAjax()) { return false; }

    $inPage->displayLangJS(array('CREATE','CREATE_CLUB'));

    $user_id = cmsCore::request('user_id', 'int', $inUser->id);

    $user = cmsUser::getShortUserData($user_id);
    if (!$user) { return false; }

    // получаем клубы, в которых пользователь админ
    $model->whereAdminIs($user['id']);
   	$inDB->orderBy('c.pubdate', 'DESC');
    $clubs = $model->getClubs();

    // получаем клубы, в которых состоит пользователь
    $inDB->addSelect('uc.role');
    $inDB->addJoin("INNER JOIN cms_user_clubs uc ON uc.club_id = c.id AND uc.user_id = '{$user['id']}'");
   	$inDB->orderBy('uc.role', 'DESC, uc.pubdate DESC');
    $inclubs = $model->getClubs();

	cmsPage::initTemplate('components', 'com_clubs_user')->
            assign('can_create', (($inUser->id == $user['id']) && ($model->config['cancreate'] || $inUser->is_admin)))->
            assign('clubs', array_merge($clubs, $inclubs))->
            assign('user', $user)->
            assign('my_profile', $user['id'] == $inUser->id)->
            display('com_clubs_user.tpl');

}
//////////////////////// ВСЕ КЛУБЫ /////////////////////////////////////////////
if ($do=='view'){

	$inDB->orderBy('is_vip', 'DESC, rating DESC');
	$inDB->limitPage($page, $model->config['perpage']);

	$total = $model->getClubsCount();

    $clubs = $model->getClubs();
    if(!$clubs && $page > 1){ return false; }
	
	

	cmsPage::initTemplate('components', 'com_clubs_view')->
            assign('pagetitle', $pagetitle)->
            assign('can_create', ($inUser->id && $model->config['cancreate'] || $inUser->is_admin))->
            assign('clubs', $clubs)->
            assign('total', $total)->
            assign('pagination', cmsPage::getPagebar($total, $page, $model->config['perpage'], '/clubs/page-%page%'))->
            display('com_clubs_view.tpl');

}


/////////////////////// ПРОСМОТР КЛУБА /////////////////////////////////////////
if ($do=='club'){

	$club = $model->getClub($id);
	if(!$club){	return false; }

	if (!$club['published'] && !$inUser->is_admin) { return false; }

    $inPage->setTitle($club['title']);
    $inPage->addPathway($club['title']);
    $inPage->addHeadJsLang(array('NEW_POST_ON_WALL','CONFIRM_DEL_POST_ON_WALL'));

	// meta description
	switch ($model->config['seo_club']){
		case 'deskr': 	$inPage->setDescription(strip_tags(($club['description'])));
						break;
		case 'title': 	$inPage->setDescription($club['title']);
						break;
	}

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');
    $is_member = $model->checkUserRightsInClub('member');
	$is_premember = in_array($inUser->id, $model->getClubPreMembersIds());
	
	

	// Приватный или публичный клуб
    $is_access = true;
    if ($club['clubtype']=='private' && (!$is_admin && !$is_moder && !$is_member)){
        $is_access = false;
    }

	// Общее количество участников
    $club['members'] = $model->club_total_members;
	// Общее количество участников
    $club['moderators'] = $model->club_total_moderators;

	// Массив членов клуба
	if($club['members']){
		$inDB->limit($model->config['club_perpage']);
		$club['members_list'] = $model->getClubMembers($club['id'], 'member');
	} else { $club['members_list'] =  array(); }

	// Массив модераторов клуба
	if($club['moderators']){
		$club['moderators_list'] = $model->getClubMembers($club['id'], 'moderator');
	}
	
	//prem
			
	 // Массив ПреЧленов клуба
     $club['premembers_list'] = $model->getClubPreMembers($club['id'], 'member', 'is_onmodern');
  
	// foreach($club['premembers_list'] as $key=>$premember){
	//	 
	//		 $vote_points = $model->VotePointsPremember($club['id'], $premember['user_id'], $from_id='');		
	//		  
	//		$club['premembers_list']['$premember']['vote_points'] = $vote_points;
	//		  
	//	}
			 
			 

	// Стена клуба
	// количество записей на стене берем из настроек
	$inDB->limitPage(1, $model->config['wall_perpage']);
    $club['wall_html'] = cmsUser::getUserWall($club['id'], 'clubs', ($is_moder || $is_admin), ($is_moder || $is_admin));

	/////////////////////////////////////////////
	//////////// ПОСТЫ БЛОГА КЛУБА //////////////
	/////////////////////////////////////////////
	if ($club['enabled_blogs']){

		$inBlog = $model->initBlog();

		$inBlog->whereBlogUserIs($club['id']);

		$club['total_posts'] = $inBlog->getPostsCount($is_admin || $is_moder);

		$inDB->addSelect('b.user_id as bloglink');

		$inDB->orderBy('p.pubdate', 'DESC');

		$inDB->limit($model->config['club_posts_perpage']);

		$club['blog_posts'] = $inBlog->getPosts(($is_admin || $is_moder), $model, true);

	}

	/////////////////////////////////////////////
	//////////// ФОТОАЛЬБОМЫ КЛУБА //////////////
	/////////////////////////////////////////////
	if ($club['enabled_photos']){

		// Общее количество альбомов
		$club['all_albums'] = $inDB->rows_count('cms_photo_albums', "NSDiffer = 'club{$club['id']}' AND user_id = '{$club['id']}' AND parent_id > 0");

		// получаем альбомы
		if($club['all_albums']){
			$inDB->limit($model->config['club_album_perpage']);
			$inDB->orderBy('f.pubdate', 'DESC');
			$club['photo_albums'] = $inPhoto->getAlbums(0, 'club'.$club['id']);
		} else {
			$club['photo_albums'] = array();
		}

	}

	// Получаем плагины
	$plugins = $model->getPluginsOutput($club);

	cmsPage::initTemplate('components', 'com_clubs_view_club')->
            assign('club', $club)->
            assign('is_access', $is_access)->
            assign('user_id', $inUser->id)->
			//assign('premembers_list', $premembers_list)->
			//assign('premembers', $premembers)->
	        assign('is_admin', $is_admin)->
            assign('is_moder', $is_moder)->
            assign('plugins', $plugins)->
            assign('is_member', $is_member)->
			assign('is_premember', $is_premember)->
            assign('is_photo_karma_enabled', ((($inUser->karma >= $club['photo_min_karma']) && $is_member) ? true : false))->
            assign('is_blog_karma_enabled', ((($inUser->karma >= $club['blog_min_karma']) && $is_member) ? true : false))->
            assign('cfg', $model->config)->
            display('com_clubs_view_club.tpl');

}
 

///////////////////////// СОЗДАНИЕ КЛУБА ///////////////////////////////////////
if ($do == 'create'){

	if(!cmsCore::isAjax()) { return false; }

	if(!$inUser->id){ return false; }

    $can_create = $model->canCreate();

	// показываем форму
    if (!cmsCore::inRequest('create') ){

        cmsPage::initTemplate('components', 'com_clubs_create')->
                assign('can_create', $can_create)->
                assign('last_message', $model->last_message)->
                display('com_clubs_create.tpl');

		cmsCore::jsonOutput(array('error' => false,
								  'can_create' => (bool)$can_create,
								  'html' => ob_get_clean()));
    }

    if (cmsCore::inRequest('create')){

		if (!$can_create){ return false; }

        $title    = $inCore->request('title', 'str');
        $clubtype = $inCore->request('clubtype', 'str');
		$typeofclub = $inCore->request('typeofclub', 'str');
 

        if (!$title || !in_array($clubtype, array('public','private'))){
			cmsCore::jsonOutput(array('error' => true, 'text' => $_LANG['CLUB_REQ_TITLE']));
		}

		if ($inDB->get_field('cms_clubs', "LOWER(title) = '".mb_strtolower($title)."'", 'id')){
			cmsCore::jsonOutput(array('error' => true, 'text' => $_LANG['CLUB_EXISTS']));
		}

		if(!cmsUser::checkCsrfToken()) { return false; }

		$club_id = $model->addClub(array('admin_id'=>$inUser->id,
										 'title'=>$title,
										 'clubtype'=>$clubtype,
										 'typeofclub'=>$typeofclub,
										 'create_karma'=>$inUser->karma,
										 'enabled_blogs'=>$model->config['enabled_blogs'],
										 'enabled_photos'=>$model->config['enabled_photos']));

		if($club_id){
			//регистрируем событие
			cmsActions::log('add_club', array(
						'object' => $title,
						'object_url' => '/clubs/'.$club_id,
						'object_id' => $club_id,
						'target' => '',
						'target_url' => '',
						'target_id' => 0,
						'description' => ''
			));
		}

		cmsCore::addSessionMessage($_LANG['CLUB_IS_CREATED'], 'success');

		cmsCore::jsonOutput(array('error' => false,
								'club_id' => $club_id));

    }

}

///////////////////////// НАСТРОЙКИ КЛУБА //////////////////////////////////////
if ($do == 'config'){

	if (!$inUser->id){ return false; }

	$club = $model->getClub($id);
	if(!$club){	return false; }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
  
	$moderators = $model->getClubMembersIds('moderator');
	
	if(in_array($inUser->id, $moderators)){ $is_moder = true; }
   
	// настраивать клуб могут только администраторы
    $is_admin = $inUser->is_admin || ($inUser->id == $club['admin_id']);
	if (!($is_moder || $is_admin)){return false; }

    if (cmsCore::inRequest('save')){

        if(!cmsUser::checkCsrfToken()) { return false; }

        $description = cmsCore::badTagClear(cmsCore::request('description', 'html', ''));
        $new_club['description'] 	 = $inDB->escape_string($description);
		$new_club['title']           = cmsCore::request('title', 'str', '');
        $new_club['clubtype']		 = cmsCore::request('clubtype', 'str', 'public');
		$new_club['typeofclub']		 = cmsCore::request('typeofclub', 'str', 'm');
        $new_club['maxsize'] 		 = cmsCore::request('maxsize', 'int', 0);
        $new_club['blog_min_karma']	 = cmsCore::request('blog_min_karma', 'int', 0);
        $new_club['photo_min_karma'] = cmsCore::request('photo_min_karma', 'int', 0);
        $new_club['album_min_karma'] = cmsCore::request('album_min_karma', 'int', 0);

        $new_club['blog_premod']	 = cmsCore::request('blog_premod', 'int', 0);
        $new_club['photo_premod']	 = cmsCore::request('photo_premod', 'int', 0);

        $new_club['join_karma_limit'] = cmsCore::request('join_karma_limit', 'int', 0);
        $new_club['join_min_karma']	  = cmsCore::request('join_min_karma', 'int', 0);

		// загружаем изображение клуба
		$new_imageurl = $model->uploadClubImage($club['imageurl']);
		$new_club['imageurl'] = @$new_imageurl['filename'] ? $new_imageurl['filename'] : $club['imageurl'];

		// Сохраняем
        $model->updateClub($club['id'], $new_club);

		// Обновляем ленту активности
		cmsActions::updateLog('add_club', array('object' => $new_club['title']), $club['id']);
		cmsActions::updateLog('add_club_user', array('object' => $new_club['title']), $club['id']);


       $moders  = cmsCore::request('moderslist', 'array_int', array());
       $members = cmsCore::request('memberslist', 'array_int', array());

	   $all_users = array_merge($members, $moders);
	
   
		// Сохраняем пользователей
                
		$allreadymem = $model->getClubMembersIds();
	 
		if(in_array($members,$allreadymem)){
		$model->clubSaveUsers($club['id'], $all_users);
		}
		else {
		$model->clubSaveUpdateUsers($club['id'], $members);
		}
		
		//$model->clubSavePreUsers($club['id'], $preusers);
		
		if(is_array($moders)){ 
		
		$model->clubSetRole($club['id'], $moders, 'moderator');
		
		}
 

		// Кешируем количество
		$model->setClubMembersCount($club['id']);

		cmsCore::addSessionMessage($_LANG['CONFIG_SAVE_OK'], 'info');

        cmsCore::redirect('/clubs/'.$club['id']);

    }

    if (!cmsCore::inRequest('save')){

        // Заголовки и пафвей
        $inPage->addPathway($club['title'], '/clubs/'.$club['id']);
        $inPage->addPathway($_LANG['CONFIG_CLUB']);
        $inPage->setTitle($_LANG['CONFIG_CLUB']);

	
		// Список друзей, отсутствующих в клубе
		$friends_list = '';
		// массив id друзей не в клубе
		$friends_ids  = array();

		// Получаем список друзей
		$friends = cmsUser::getFriends($inUser->id);
		// Получаем список участников
		$members = $model->getClubMembersIds();
		
		
	     
		// Формируем список друзей, которые еще не в клубе
		foreach($friends as $key=>$friend){
			if (!in_array($friend['id'], $members) && $friend['id'] != $club['admin_id']){
				$friends_list .= '<option value="'.$friend['id'].'">'.$friend['nickname'].'</option>';
				$friends_ids[] = $friend['id'];
			}
		}
		 
		
 
		// Получаем модераторов клуба
		$moderators = $model->getClubMembersIds('moderator');
		 
		// формируем список друзья не в клубе + участники клуба кроме модераторов
		$fr_plus_members = $members ? array_merge($friends_ids, $members) : $friends_ids;
		// Убираем модераторов если они есть
		$fr_plus_members = $moderators ? array_diff($fr_plus_members, $moderators) : $fr_plus_members;

		// Формируем список option друзей (которые еще не в этом клубе) и участников
		if ($fr_plus_members) { $fr_members_list = cmsUser::getAuthorsList($fr_plus_members); } else { $fr_members_list = ''; }
	 	
		// Формируем список option участников клуба
        if ($moderators) { $moders_list = cmsUser::getAuthorsList($moderators); } else { $moders_list = ''; }
        if ($members) { $members_list = cmsUser::getAuthorsList($members); } else { $members_list = ''; }
			
//prem

			$premembers = $model->getClubPreMembersIds();
			$premembers_list = cmsUser::getAuthorsList($premembers);  
 
	 

        cmsPage::initTemplate('components', 'com_clubs_config')->
                assign('club', $club)->
                assign('moders_list', $moders_list)->
                assign('members_list', $members_list)->
				assign('premembers_list', $premembers_list)->
                assign('friends_list', $friends_list)->
                assign('fr_members_list', $fr_members_list)->
                assign('is_billing', IS_BILLING)->
                assign('is_admin', $inUser->is_admin)->
                display('com_clubs_config.tpl');
			 
			

    }

}
///////////////////////// ВЫХОД ИЗ КЛУБА ///////////////////////////////////////////
if ($do == 'leave'){

    if(!$inUser->id) { return false; }

    if(!cmsCore::isAjax()) { return false; }

	$club = $model->getClub($id);
	if(!$club){	cmsCore::halt(); }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// Выйти из клуба могут только его участники
    $is_admin  = $inUser->id == $club['admin_id'];
    $is_member = $model->checkUserRightsInClub();
	if ($is_admin || !$is_member){ cmsCore::halt(); }

    if (cmsCore::inRequest('confirm')){

		if(!cmsUser::checkCsrfToken()) { cmsCore::halt(); }

		cmsCore::callEvent('LEAVE_CLUB', $club);

        $model->removeUserFromClub($club['id'], $inUser->id);
		// Пересчитываем рейтинг
        $model->setClubRating($club['id']);
		// Кешируем (пересчитываем) количество участников
		$model->setClubMembersCount($club['id']);
		// Добавляем событие в ленте активности
		cmsActions::removeObjectLog('add_club_user', $club['id'], $inUser->id);
		cmsCore::addSessionMessage($_LANG['YOU_LEAVE_CLUB'].'"'.$club['title'].'"', 'success');

		cmsCore::jsonOutput(array('error' => false, 'redirect'  => '/clubs/'.$club['id']));

    }

}
///////////////////////// ВСТУПЛЕНИЕ В КЛУБ ////////////////////////////////////
if ($do == 'join'){

	if (!$inUser->id){ cmsCore::halt(); }

	$club = $model->getClub($id);
	if(!$club){	cmsCore::halt(); }

	// В приватный клуб участников добавляет администратор
    if ($club['clubtype']=='private'){ cmsCore::halt(); }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// проверяем наличие пользователя в клубе
    $is_admin  = $inUser->id == $club['admin_id'];
    $is_member = $model->checkUserRightsInClub();
	if ($is_admin || $is_member){ cmsCore::halt(); }

    // Проверяем ограничения на количество участников
    if ($club['maxsize'] && ($model->club_total_members >= $club['maxsize']) && !$inUser->is_admin){
        cmsCore::jsonOutput(array('error' => true, 'text'  => $_LANG['CLUB_SIZE_LIMIT']));
    }
    // Проверяем ограничения по карме на вступление
    if($club['join_karma_limit'] && ($inUser->karma < $club['join_min_karma']) && !$inUser->is_admin){

        cmsCore::jsonOutput(array('error' => true, 'text'  => '<p><strong>'.$_LANG['NEED_KARMA_TEXT'].'</strong></p><p>'.$_LANG['NEEDED'].' '.$club['join_min_karma'].', '.$_LANG['HAVE_ONLY'].' '.$inUser->karma.'.</p><p>'.$_LANG['WANT_SEE'].' <a href="/users/'.$inUser->id.'/karma.html">'.$_LANG['HISTORY_YOUR_KARMA'].'</a>?</p>'));

    }

    //
    // Обработка заявки
    //
    if (cmsCore::inRequest('confirm')){

		cmsCore::callEvent('JOIN_CLUB', $club);

        //списываем оплату если клуб платный
        if (IS_BILLING && $club['is_vip'] && $club['join_cost'] && !$inUser->is_admin){
            if ($inUser->balance >= $club['join_cost']){
                //если средств на балансе хватает
                cmsBilling::pay($inUser->id, $club['join_cost'], sprintf($_LANG['VIP_CLUB_BUY_JOIN'], $club['title']));
            } else {
                //недостаточно средств, создаем тикет
                //и отправляем оплачивать
                $billing_ticket = array(
                    'action' => sprintf($_LANG['VIP_CLUB_BUY_JOIN'], $club['title']),
                    'cost'   => $club['join_cost'],
                    'amount' => $club['join_cost'] - $inUser->balance,
                    'url'    => $_SERVER['REQUEST_URI'].'?confirm=1'
                );
                cmsUser::sessionPut('billing_ticket', $billing_ticket);
				cmsCore::jsonOutput(array('error' => false, 'redirect'  => '/billing/pay'));
            }
        }

        //добавляем пользователя в клуб
        $model->addUserToClub($club['id'], $inUser->id);
		// Пересчитываем рейтинг клуба
        $model->setClubRating($club['id']);
		// Кешируем (пересчитываем) количество участников
		$model->setClubMembersCount($club['id']);

		//регистрируем событие
		cmsActions::log('add_club_user', array(
						'object' => $club['title'],
						'object_url' => '/clubs/'.$club['id'],
						'object_id' => $club['id'],
						'target' => '',
						'target_url' => '',
						'target_id' => 0,
						'description' => ''
		));

		cmsCore::addSessionMessage($_LANG['YOU_JOIN_CLUB'].'"'.$club['title'].'"', 'success');

		if($_SERVER['REQUEST_URI'] != '/clubs/'.$club['id'].'/join.html'){
			cmsCore::redirect('/clubs/'.$club['id']);
		} else {
	        cmsCore::jsonOutput(array('error' => false, 'redirect'  => '/clubs/'.$club['id']));
		}

    }

    //
    // Форма подтверждения заявки
    //
    if (!cmsCore::inRequest('confirm')){

        $text = '<p>'.$_LANG['YOU_REALY_JOIN_TO'].' <strong>"'.$club['title'].'"</strong>?</p>';
        if ($club['is_vip'] && $club['join_cost'] && !$inUser->is_admin){
            $text .= '<p>'.$_LANG['VIP_CLUB_JOIN_COST'].' &mdash; <strong>'.$club['join_cost'].' '.$_LANG['BILLING_POINT10'].'</strong></p>';
        }

        cmsCore::jsonOutput(array('error' => false, 'text'  => $text));

    }

}




////////////////// ГОЛОСОВАНИЕ за участие ////////

if ($do == 'voteforjoin'){
  
	$club_id = cmsCore::request('id', 'int', 0);
	$prem_id = cmsCore::request('prem_id', 'int', 0);
	$from_id = cmsCore::request('from_id', 'int', 0);
	 
	$vote_points = $model->VotePointsPremember($id, $prem_id, $from_id);
	 
   $is_already_voted =  $model->VoteLimit($id, $prem_id, $from_id);

	
	if ($is_already_voted) {
				
				if (!cmsCore::inRequest('confirm')){
				
				$text = '<p>Ваш голос за цього користувача вже прийнято! Голосувати можна лише один раз!</p>';
				
				cmsCore::jsonOutput(array('error' => false, 'text'  => $text));
				cmsCore::jsonOutput(array('error' => false, 'redirect'  => '/clubs/'.$id));
				
				}
					
				if (cmsCore::inRequest('confirm')){
				 
				cmsCore::addSessionMessage('Голос не надано', 'error');
				cmsCore::jsonOutput(array('error' => false, 'redirect'  => '/clubs/'.$id));
				
				}
				
	}
	
	elseif ($vote_points < 4 && !$is_already_voted){
	
	
				// если еще нет подтверждения 
				if (!cmsCore::inRequest('confirm')){
				
					$text = '<p>Ви дійсно бажаєте прийняти цього учасника до спільноти?</p>';
					
					cmsCore::jsonOutput(array('error' => false, 'text'  => $text));
				
				}
				 
				// при подтверждении голоса
				if (cmsCore::inRequest('confirm')){
				
				// добавляем голос
				$model->VoteForPremember($id, $prem_id, $from_id);
				
				cmsCore::addSessionMessage('Ви проголосували успішно', 'success');
				
				cmsCore::jsonOutput(array('error' => false, 'redirect'  => '/clubs/'.$id));
				
				}
				 
	} elseif ($vote_points >= 4 && !$is_already_voted) {
 
				if (!cmsCore::inRequest('confirm')){
				
				$text = '<p>Ваш голос стане вирішальним. Ви дійсно бажаєте прийняти цього учасника до спільноти?</p>';
				
				cmsCore::jsonOutput(array('error' => false, 'text'  => $text));
				
				}
					
				if (cmsCore::inRequest('confirm')){
				
				$model->VoteForPremember($id, $prem_id, $from_id);
				$model->VoteUpdateUserToClub($club_id, $prem_id);
				
				cmsCore::addSessionMessage('Вітайте нового користувача в спільноті', 'success');
				
				cmsCore::jsonOutput(array('error' => false, 'redirect'  => '/clubs/'.$id));
					 
				}
			 
	}  

}





//////////////======= ПРЕДВАРИТЕЛЬНОЕ ВСТУПЛЕНИЕ В КЛУБ ////////////////////////////////////
if ($do == 'prejoin'){

	if (!$inUser->id){ cmsCore::halt(); }

	$club = $model->getClub($id);
	if(!$club){	cmsCore::halt(); }

	// В приватный клуб участников добавляет администратор
   // if ($club['clubtype']=='private'){ cmsCore::halt(); }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// проверяем наличие пользователя в клубе
    $is_admin  = $inUser->id == $club['admin_id'];
    $is_member = $model->checkUserRightsInClub();
	if ($is_admin || $is_member){ cmsCore::halt(); }

    // Проверяем ограничения на количество участников
    if ($club['maxsize'] && ($model->club_total_members >= $club['maxsize']) && !$inUser->is_admin){
        cmsCore::jsonOutput(array('error' => true, 'text'  => $_LANG['CLUB_SIZE_LIMIT']));
    }

    //
    // Обработка заявки
    //
    if (cmsCore::inRequest('confirm')){

		cmsCore::callEvent('JOIN_CLUB', $club);
 
        //добавляем пользователя в список заявителей
        $model->PreAddUserToClub($club['id'], $inUser->id);
		 
		 
		 
		////////// приватное уведомление всем членам клуба
		
		$message = 'До вашої спільноти <a href="/clubs/'.$club['id'].'">'.$club['title'].'</a>'.' Бажає приєднатися новий учасник. Проголосуйте за його участь!';

		$members_list    = $model->getClubMembersIds();
		$result_list 	 = $members_list;

		$message = str_replace('%club%', '<a href="/clubs/'.$club['id'].'">'.$club['title'].'</a>', $_LANG['MESSAGE_FROM ADMIN']).$message;
  
		$msg_id = cmsUser::sendMessages(USER_UPDATER, $result_list, $message);
		  
		foreach ($members_list as $usr){
				 $model->sendClubsEmail($usr, USER_UPDATER, $msg_id);
								
			}
		 
		//регистрируем событие
		cmsActions::log('add_club_user', array(
						'object' => $club['title'],
						'object_url' => '/clubs/'.$club['id'],
						'object_id' => $club['id'],
						'target' => '',
						'target_url' => '',
						'target_id' => 0,
						'description' => ''
		));

		cmsCore::addSessionMessage('Ви подали заявку на участь в спільноті '.'"'.$club['title'].'"'.' Очікуйте.' , 'success');

		if($_SERVER['REQUEST_URI'] != '/clubs/'.$club['id'].'/prejoin.html'){
			cmsCore::redirect('/clubs/'.$club['id']);
		} else {
	        cmsCore::jsonOutput(array('error' => false, 'redirect'  => '/clubs/'.$club['id']));
		}
		
		 
	}
		
	

    //
    // Форма подтверждения заявки
    //
    if (!cmsCore::inRequest('confirm')){

        $text = '<p>'.$_LANG['YOU_REALY_JOIN_TO'].' <strong>"'.$club['title'].'"</strong>?</p>';
        if ($club['is_vip'] && $club['join_cost'] && !$inUser->is_admin){
            $text .= '<p>'.$_LANG['VIP_CLUB_JOIN_COST'].' &mdash; <strong>'.$club['join_cost'].' '.$_LANG['BILLING_POINT10'].'</strong></p>';
        }

        cmsCore::jsonOutput(array('error' => false, 'text'  => $text));

    }

}




///////////////////// РАССЫЛКА СООБЩЕНИЯ УЧАСТНИКАМ ////////////////////////////
if ($do == 'send_message'){

    if(!$inUser->id) { return false; }

    if(!cmsCore::isAjax()) { return false; }

	$club = $model->getClub($id);
	if(!$club){	cmsCore::halt(); }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// Расылать могут только участники и администраторы
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
	if (!$is_admin){ cmsCore::halt(); }

	if (!cmsCore::inRequest('gosend')){

        $inPage->setRequestIsAjax();

		cmsPage::initTemplate('components', 'com_clubs_messages_member')->
                assign('club', $club)->
                assign('bbcodetoolbar', cmsPage::getBBCodeToolbar('message'))->
                assign('smilestoolbar', cmsPage::getSmilesPanel('message'))->
                display('com_clubs_messages_member.tpl');

		cmsCore::jsonOutput(array('error' => false,'html'  => ob_get_clean()));

	} else {

		// Здесь не эскейпим, в методе sendMessage эскейпится
		$message = cmsCore::parseSmiles(cmsCore::request('content', 'html', ''), true);

		$moderators_list = $model->getClubMembersIds('moderator');
		$members_list    = $model->getClubMembersIds();
		$result_list 	 = cmsCore::inRequest('only_mod') ? $moderators_list : $members_list;

		if (mb_strlen($message)<3){
			cmsCore::jsonOutput(array('error' => true, 'text'  => $_LANG['ERR_SEND_MESS']));
		}
		if (!$result_list){
			cmsCore::jsonOutput(array('error' => true, 'text'  => $_LANG['ERR_SEND_MESS_NO_MEMBERS']));
		}

        if(!cmsUser::checkCsrfToken()) { return false; }

		$message = str_replace('%club%', '<a href="/clubs/'.$club['id'].'">'.$club['title'].'</a>', $_LANG['MESSAGE_FROM ADMIN']).$message;

		cmsUser::sendMessages(USER_UPDATER, $result_list, $message);

		$info = cmsCore::inRequest('only_mod') ? $_LANG['SEND_MESS_TO_MODERS_OK'] : $_LANG['SEND_MESS_TO_MEMBERS_OK'];

		cmsCore::jsonOutput(array('error' => false, 'text' => $info));

	}

}

///////////////////////// ПРИГЛАСИТЬ ДРУЗЕЙ В КЛУБ /////////////////////////////
if ($do == 'join_member'){

    if(!$inUser->id) { return false; }

    if(!cmsCore::isAjax()) { return false; }

	$club = $model->getClub($id);
	if(!$club){	cmsCore::halt(); }

	if (!$club['published'] && !$inUser->is_admin) { cmsCore::halt(); }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// Расылать могут только участники и администраторы
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_member = $model->checkUserRightsInClub();
	if (!$is_admin && !$is_member){ cmsCore::halt(); }
	// В приватный клуб приглашения не рассылаем
    if ($club['clubtype']=='private'){ cmsCore::halt(); }

	// Получаем список друзей
	$friends = cmsUser::getFriends($inUser->id);
	// Получаем список участников
	$members = $model->getClubMembersIds();
	// Проверяем наличие друга в списке участников клуба или является ли он администратором
	foreach($friends as $key=>$friend){
		if (in_array($friend['id'], $members) || $friend['id'] == $club['admin_id']) { unset($friends[$key]); }
	}
	// Если нет друзей или все друзья уже в этом клубе, то выводим ошибку и возвращаемся назад
	if (!$friends){
		cmsCore::jsonOutput(array('error' => true, 'text'  => $_LANG['SEND_INVITE_ERROR']));
	}

	// показываем форму для приглашения
	if (!cmsCore::inRequest('join')){

		// Выводим шаблон
		cmsPage::initTemplate('components', 'com_clubs_join_member')->
                assign('club', $club)->
                assign('friends', $friends)->
                display('com_clubs_join_member.tpl');

		cmsCore::jsonOutput(array('error' => false,'html'  => ob_get_clean()));

	} else { // Приглашаем

	  	$users = cmsCore::request('users', 'array_int', array());

		if ($users){

			$club_link = '<a href="/clubs/'.$club['id'].'">'.$club['title'].'</a>';
			$user_link = cmsUser::getProfileLink($inUser->login, $inUser->nickname);
			$link_join = '<a href="/clubs/'.$club['id'].'">'.$_LANG['JOIN_CLUB'] .'</a>';

			$message   = str_replace(array('%user%','%club%','%link_join%'),
                                     array($user_link,$club_link,$link_join), $_LANG['INVITE_CLUB_TEXT']);

			cmsUser::sendMessages(USER_UPDATER, $users, $message);

		}

		cmsCore::jsonOutput(array('error' => false, 'text' => $_LANG['SEND_INVITE_OK']));

	}

}
///////////////////////// ПРОСМОТР УЧАСТНИКОВ //////////////////////////////////
if ($do=='members'){

	$club = $model->getClub($id);
	if(!$club){	return false; }

	if (!$club['published'] && !$inUser->is_admin) { return false; }

    $inPage->setTitle($_LANG['CLUB_MEMBERS'].' - '.$club['title']);
	$inPage->addPathway($club['title'], '/clubs/'.$club['id']);
    $inPage->addPathway($_LANG['CLUB_MEMBERS'].' - '.$club['title']);

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');
    $is_member = $model->checkUserRightsInClub();

	// Приватный или публичный клуб
    if ($club['clubtype']=='private' && (!$is_admin && !$is_moder && !$is_member)){
        return false;
    }

	// Общее количество участников
    $total_members = $model->club_total_members;

	// Массив членов клуба
	if($total_members){
		$inDB->limitPage($page, $model->config['member_perpage']);
		$members = $model->getClubMembers($club['id']);
		if(!$members) { return false; }
	} else { return false; }

	$pagebar = cmsPage::getPagebar($total_members, $page, $model->config['member_perpage'], '/clubs/%id%/members-%page%', array('id'=>$club['id']));

	cmsPage::initTemplate('components', 'com_clubs_view_member')->
            assign('pagebar', $pagebar)->
            assign('page', $page)->
            assign('members', $members)->
            assign('club', $club)->
            assign('total_members', $total_members)->
            display('com_clubs_view_member.tpl');

}
////////////////////////////// ВСЕ АЛЬБОМЫ КЛУБА  //////////////////////////////
if ($do=='view_albums'){

	$club = $model->getClub($id);
	if(!$club){	return false; }

	if (!$club['published'] && !$inUser->is_admin) { return false; }

	$pagetitle = $_LANG['PHOTOALBUMS'].' - '.$club['title'];

    $inPage->setTitle($pagetitle);
	$inPage->addPathway($club['title'], '/clubs/'.$club['id']);
    $inPage->addPathway($_LANG['PHOTOALBUMS']);

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
 
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');
    $is_member = $model->checkUserRightsInClub('member');

    $is_karma_enabled = (($inUser->karma >= $club['photo_min_karma']) && $is_member) ? true : false;

	// Приватный или публичный клуб
    if ($club['clubtype']=='private' && (!$is_admin && !$is_moder && !$is_member)){
        return false;
    }

	$inDB->orderBy('f.pubdate', 'DESC');
	$club['photo_albums'] = $inPhoto->getAlbums(0, 'club'.$club['id']);
	if(!$club['photo_albums']) { return false; }

	cmsPage::initTemplate('components', 'com_clubs_albums')->
            assign('club', $club)->
            assign('is_admin', $is_admin)->
            assign('is_moder', $is_moder)->
            assign('is_karma_enabled', $is_karma_enabled)->
            assign('show_title', true)->
            assign('pagetitle', $pagetitle)->
            display('com_clubs_albums.tpl');

}
///////////////////////// ПРОСМОТР АЛЬБОМА КЛУБА ///////////////////////////////
if ($do=='view_album'){

	// Получаем альбом
	$album = $inDB->getNsCategory('cms_photo_albums', cmsCore::request('album_id', 'int', 0), null);
	if (!$album) { return false; }

	// Неопубликованные альбомы показываем только админам
	if (!$album['published'] && !$inUser->is_admin) { return false; }

	// получаем клуб
	$club = $model->getClub($album['user_id']);
	if(!$club) { return false; }

	if (!$club['published'] && !$inUser->is_admin) { return false; }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');
    $is_member = $model->checkUserRightsInClub();

	// Приватный или публичный клуб
    if ($club['clubtype']=='private' && (!$is_admin && !$is_moder && !$is_member)){
        return false;
    }

	$hidden = (bool)($is_admin || $is_moder);

	// Устанавливаем альбом
	$inPhoto->whereAlbumIs($album['id']);

    // Общее количество фото по заданным выше условиям
    $total = $inPhoto->getPhotosCount($hidden);

    //устанавливаем сортировку
    $inDB->orderBy('f.id', 'DESC');

    //устанавливаем номер текущей страницы и кол-во фото на странице
    $inDB->limitPage($page, $model->config['photo_perpage']);

	$photos = $inPhoto->getPhotos($hidden);

    $inPage->addPathway($club['title'], '/clubs/'.$club['id']);
	$inPage->addPathway($album['title'], '/clubs/photoalbum'.$album['id']);
	$inPage->setTitle($album['title']);
	$inPage->setDescription($album['title'].' - '.$_LANG['CLUB_PHOTO_ALBUM'].' "'.$club['title'].'"');

    cmsPage::initTemplate('components', 'com_clubs_view_album')->
            assign('club', $club)->
            assign('total', $total)->
            assign('album', $album)->
            assign('photos', $photos)->
            assign('is_admin', $is_admin)->
            assign('is_moder', $is_moder)->
            assign('is_member', $is_member)->
            assign('cfg', $model->config)->
            assign('pagebar', cmsPage::getPagebar($total, $page, $model->config['photo_perpage'], '/clubs/photoalbum'.$album['id'].'/page-%page%'))->
            display('com_clubs_view_album.tpl');

}
///////////////////////// УДАЛЕНИЕ АЛЬБОМА /////////////////////////////////////
if ($do=='delete_album'){

    if(!$inUser->id) { return false; }

    if(!cmsCore::isAjax()) { return false; }

    if(!cmsUser::checkCsrfToken()) { return false; }

	$album = $inDB->getNsCategory('cms_photo_albums', cmsCore::request('album_id', 'int', 0), null);
	if (!$album) { cmsCore::halt(); }

	$club = $model->getClub($album['user_id']);
	if(!$club) { cmsCore::halt(); }

	$model->initClubMembers($club['id']);

    $is_admin = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder = $model->checkUserRightsInClub('moderator');

	if(!$is_admin && !$is_moder) { cmsCore::halt(); }

	$inPhoto->deleteAlbum($album['id'], 'club'.$club['id'], $model->initUploadClass());

	cmsCore::addSessionMessage($_LANG['ALBUM_DELETED'], 'success');

	cmsCore::jsonOutput(array('error' => false, 'redirect' => '/clubs/'.$club['id']));

}
//////////////////////////////// ПРОСМОТР ФОТО /////////////////////////////////
if ($do=='view_photo'){

	// Получаем фото
	$photo = $inPhoto->getPhoto(cmsCore::request('photo_id', 'int', 0));
	if (!$photo) { return false; }

	$photo = cmsCore::callEvent('VIEW_CLUB_PHOTO', $photo);

	// получаем клуб
	$club = $model->getClub($photo['auser_id']);
	if(!$club) { return false; }

	if (!$club['published'] && !$inUser->is_admin) { return false; }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');
    $is_member = $model->checkUserRightsInClub();
	$is_author = $photo['user_id'] == $inUser->id;

	if (!$photo['published'] && !$is_admin && !$is_moder) { return false; }

	// Фото приватного клуба показываем только участникам
    if ($club['clubtype']=='private' && !$is_member && !$is_admin){ return false; }

    $inPage->addPathway($club['title'], '/clubs/'.$club['id']);
	$inPage->addPathway($photo['cat_title'], '/clubs/photoalbum'.$photo['album_id']);
	$inPage->addPathway($photo['title']);
	$inPage->setTitle($photo['title']);

	// ссылки вперед назад
	$photo['nextid'] = $inDB->get_fields('cms_photo_files', 'id<'.$photo['id'].' AND album_id = '.$photo['album_id'], 'id, file, title', 'id DESC');
	$photo['previd'] = $inDB->get_fields('cms_photo_files', 'id>'.$photo['id'].' AND album_id = '.$photo['album_id'], 'id, file, title', 'id ASC');

	// кнопки голосования
	$photo['karma_buttons'] = cmsKarmaButtons('club_photo', $photo['id'], $photo['rating'], $is_author);

	// Обновляем кол-во просмотров
	if(!$is_author){
		$inDB->setFlag('cms_photo_files', $photo['id'], 'hits', $photo['hits']+1);
	}

	// выводим в шаблон
    cmsPage::initTemplate('components', 'com_clubs_view_photo')->
            assign('club', $club)->
            assign('photo', $photo)->
            assign('is_admin', $is_admin)->
            assign('is_moder', $is_moder)->
            assign('is_author', $is_author)->
            display('com_clubs_view_photo.tpl');

	//если есть, выводим комментарии
	if($photo['comments'] && $inCore->isComponentInstalled('comments')){
		cmsCore::includeComments();
		comments('club_photo', $photo['id']);
	}

}
////////////////////////////// УДАЛИТЬ ФОТО ////////////////////////////////////
if ($do=='delete_photo'){

    if(!$inUser->id) { return false; }

    if(!cmsCore::isAjax()) { return false; }

	if(!cmsUser::checkCsrfToken()) { return false; }

	$photo = $inPhoto->getPhoto(cmsCore::request('photo_id', 'int', 0));
	if (!$photo) { cmsCore::halt(); }

	// получаем клуб
	$club = $model->getClub($photo['auser_id']);
	if(!$club) { cmsCore::halt(); }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder = $model->checkUserRightsInClub('moderator');

	// удалять могут только модераторы и администраторы
	if(!$is_admin && !$is_moder) { cmsCore::halt(); }

	$inPhoto->deletePhoto($photo, $model->initUploadClass());

	cmsCore::addSessionMessage($_LANG['PHOTO_DELETED'], 'success');

	cmsCore::jsonOutput(array('error' => false, 'redirect' => '/clubs/photoalbum'.$photo['album_id']));

}
///////////////////////// РЕДАКТИРОВАТЬ ФОТО ///////////////////////////////////
if ($do=='edit_photo'){

    if(!$inUser->id) { return false; }

    if(!cmsCore::isAjax()) { return false; }

	$photo = $inPhoto->getPhoto(cmsCore::request('photo_id', 'int', 0));
	if (!$photo) { cmsCore::halt(); }

	// получаем клуб
	$club = $model->getClub($photo['auser_id']);
	if(!$club) { cmsCore::halt(); }

	if (!$club['published'] && !$inUser->is_admin) { return false; }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');
	$is_author = $photo['user_id'] == $inUser->id;

	if(!$is_admin && !$is_moder && !$is_author) { cmsCore::halt(); }

	if (!cmsCore::inRequest('edit_photo')){

		cmsPage::initTemplate('components', 'com_photos_edit')->
                assign('photo', $photo)->
                assign('form_action', '/clubs/editphoto'.$photo['id'].'.html')->
                assign('no_tags', true)->
                assign('is_admin', ($is_admin || $is_moder))->
                display('com_photos_edit.tpl');

		cmsCore::jsonOutput(array('error' => false, 'html' => ob_get_clean()));

	} else {

		$mod['title']       = cmsCore::request('title', 'str', '');
		$mod['title']       = $mod['title'] ? $mod['title'] : $photo['title'];
		$mod['description'] = cmsCore::request('description', 'str', '');
		$mod['comments']    = ($is_admin || $is_moder) ? cmsCore::request('comments', 'int') : $photo['comments'];

		$file = $model->initUploadClass()->uploadPhoto($photo['file']);
		$mod['file'] = $file['filename'] ? $file['filename'] : $photo['file'];

		$inPhoto->updatePhoto($mod, $photo['id']);

		$description = '<a href="/clubs/photo'.$photo['id'].'.html" class="act_photo"><img border="0" src="/images/photos/small/'.$mod['file'].'" /></a>';

		cmsActions::updateLog('add_photo_club', array('object' => $mod['title'], 'description' => $description), $photo['id']);

		cmsCore::addSessionMessage($_LANG['PHOTO_SAVED'], 'success');

		cmsCore::jsonOutput(array('error' => false, 'redirect' => '/clubs/photo'.$photo['id'].'.html'));

	}

}
/////////////////////////////// PHOTO PUBLISH //////////////////////////////////
if ($do=='publish_photo'){

    if(!$inUser->id) { return false; }

    if(!cmsCore::isAjax()) { return false; }

	$photo = $inPhoto->getPhoto(cmsCore::request('photo_id', 'int', 0));
	if (!$photo) { cmsCore::halt(); }

	// получаем клуб
	$club = $model->getClub($photo['auser_id']);
	if(!$club) { cmsCore::halt(); }

	if (!$club['published'] && !$inUser->is_admin) { return false; }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');

	if(!$is_admin && !$is_moder) { cmsCore::halt(); }

	$inPhoto->publishPhoto($photo['id']);

	$description = $club['clubtype']=='private' ? '' :
				   '<a href="/clubs/photo'.$photo['id'].'.html" class="act_photo"><img border="0" src="/images/photos/small/'.$photo['file'].'" /></a>';

	cmsActions::log('add_photo_club', array(
		  'object' => $photo['title'],
		  'object_url' => '/clubs/photo'.$photo['id'].'.html',
		  'object_id' => $photo['id'],
          'user_id' => $photo['user_id'],
		  'target' => $club['title'],
		  'target_id' => $photo['album_id'],
		  'target_url' => '/clubs/'.$club['id'],
		  'description' => $description
	));

	cmsCore::halt('ok');

}
///////////////////////// ЗАГРУЗКА ФОТО ////////////////////////////////////////
if ($do=='add_photo'){

	// Неавторизованных просим авторизоваться
	if (!$inUser->id) { cmsUser::goToLogin(); }

	$do_photo = cmsCore::request('do_photo', 'str', 'addphoto');

	$album = $inDB->getNsCategory('cms_photo_albums', cmsCore::request('album_id', 'int', 0), null);
	if (!$album) { return false; }

	if (!$album['published'] && !$inUser->is_admin) { return false; }

	$club = $model->getClub($album['user_id']);
	if(!$club) { return false; }

	// если фотоальбомы запрещены
	if(!$club['enabled_photos']){ return false; }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');
    $is_member = $model->checkUserRightsInClub('member');

    $is_karma_enabled = (($inUser->karma >= $club['photo_min_karma']) && $is_member) ? true : false;

    if(!$is_karma_enabled && !$is_admin && !$is_moder) {
        cmsCore::addSessionMessage('<p><strong>'.$_LANG['NEED_KARMA_PHOTO'].'</strong></p><p>'.$_LANG['NEEDED'].' '.$club['photo_min_karma'].', '.$_LANG['HAVE_ONLY'].' '.$inUser->karma.'.</p><p>'.$_LANG['WANT_SEE'].' <a href="/users/'.$inUser->id.'/karma.html">'.$_LANG['HISTORY_YOUR_KARMA'].'</a>?</p>', 'error');
        cmsCore::redirectBack();
    }

    $inPage->addPathway($club['title'], '/clubs/'.$club['id']);
	$inPage->addPathway($album['title'], '/clubs/photoalbum'.$album['id']);

	include 'components/clubs/add_photo.php';

}
///////////////////////// БЛОГИ КЛУБОВ /////////////////////////////////////////
if ($do=='club_blogs'){

	$bdo     = cmsCore::request('bdo', 'str', 'view_clubs_posts');
	$post_id = cmsCore::request('post_id', 'int', 0);
	$cat_id  = cmsCore::request('cat_id', 'int', 0);
	$seolink = cmsCore::request('seolink', 'str', '');
	$on_moderate = cmsCore::request('on_moderate', 'int', 0);

	$inBlog = $model->initBlog();
    $inPage->addHeadJsLang(array('NEW_CAT','RENAME_CAT','YOU_REALY_DELETE_CAT','YOU_REALY_DELETE_POST','NO_PUBLISHED'));

	include 'components/clubs/club_blogs.php';

}



///////////////////////// ПРОБЛЕМИ СПІЛЬНОТ /////////////////////////////////////////
if ($do=='problem_view'){
 
	$club = $model->getClub($id);
	
	
	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');
    
	
	if(!$club){	return false; }
  
	$pagetitle = 'Проблеми'; 
	
    $inPage->setTitle($pagetitle);
	 
    $inPage->addPathway($pagetitle );
	  
	cmsPage::initTemplate('components', 'com_clubs_view_club')->
            assign('club', $club)->
		    assign('is_admin', $is_admin)->
            assign('is_moder', $is_moder)->
            display('com_clubs_view_problem.tpl');	
		 
}

 if ($do=='problem_edit'){
  
	if (!$inUser->id){ return false; }

	$club = $model->getClub($id);
	if(!$club){	return false; }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	
	 
	// настраивать клуб могут только администраторы
    $is_admin = $inUser->is_admin || ($inUser->id == $club['admin_id']);
	
    $is_moder  = $model->checkUserRightsInClub('moderator');
  
	if (!$is_admin && !$is_moder ){ return false; }
	 
    if (cmsCore::inRequest('save')){

        if(!cmsUser::checkCsrfToken()) { return false; }

        $problems = cmsCore::badTagClear(cmsCore::request('problems', 'html', ''));
        $new_club['problems'] 	 = $inDB->escape_string($problems);
		 
		// Сохраняем
        $model->updateClub($club['id'], $new_club);
 
         

		// Кешируем количество
		$model->setClubMembersCount($club['id']);

		cmsCore::addSessionMessage($_LANG['CONFIG_SAVE_OK'], 'info');

        cmsCore::redirect('/clubs/'.$club['id']);

    }

    if (!cmsCore::inRequest('save')){

        // Заголовки и пафвей
        $inPage->addPathway($club['title'], '/clubs/'.$club['id']);
        $inPage->addPathway($_LANG['CONFIG_CLUB']);
        $inPage->setTitle($_LANG['CONFIG_CLUB']);
 
        cmsPage::initTemplate('components', 'com_clubs_config')->
                assign('club', $club)->
                assign('is_admin', $inUser->is_admin)->
                display('com_clubs_edit_problem.tpl');

    }

	
}




///////////////////////// ПОТРЕБИ СПІЛЬНОТ /////////////////////////////////////////
if ($do=='needs_view'){
 
	$club = $model->getClub($id);
	
	
	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');
    
	
	if(!$club){	return false; }
  
	$pagetitle = 'Потреби'; 
	
    $inPage->setTitle($pagetitle);
	 
    $inPage->addPathway($pagetitle );
	  
	cmsPage::initTemplate('components', 'com_clubs_view_club')->
            assign('club', $club)->
		    assign('is_admin', $is_admin)->
            assign('is_moder', $is_moder)->
            display('com_clubs_view_needs.tpl');	
		 
}

 if ($do=='needs_edit'){
  
	if (!$inUser->id){ return false; }

	$club = $model->getClub($id);
	if(!$club){	return false; }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// настраивать клуб могут только администраторы
    $is_admin = $inUser->is_admin || ($inUser->id == $club['admin_id']);
	
    $is_moder  = $model->checkUserRightsInClub('moderator');
  
	if (!$is_admin && !$is_moder ){ return false; }
	 
    if (cmsCore::inRequest('save')){

        if(!cmsUser::checkCsrfToken()) { return false; }

        $needs = cmsCore::badTagClear(cmsCore::request('needs', 'html', ''));
        $new_club['needs'] 	 = $inDB->escape_string($needs);
		 
		// Сохраняем
        $model->updateClub($club['id'], $new_club);
 
         

		// Кешируем количество
		$model->setClubMembersCount($club['id']);

		cmsCore::addSessionMessage($_LANG['CONFIG_SAVE_OK'], 'info');

        cmsCore::redirect('/clubs/'.$club['id']);

    }

    if (!cmsCore::inRequest('save')){

        // Заголовки и пафвей
        $inPage->addPathway($club['title'], '/clubs/'.$club['id']);
        $inPage->addPathway($_LANG['CONFIG_CLUB']);
        $inPage->setTitle($_LANG['CONFIG_CLUB']);
 
        cmsPage::initTemplate('components', 'com_clubs_config')->
                assign('club', $club)->
                assign('is_admin', $inUser->is_admin)->
                display('com_clubs_edit_needs.tpl');

    }

	
}


 


///////////////////////// ПРОПОЗИЦІЇ СПІЛЬНОТ /////////////////////////////////////////
if ($do=='propos_view'){
 
	$club = $model->getClub($id);
	
	
	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');
    
	
	if(!$club){	return false; }
  
	$pagetitle = 'Пропозиції'; 
	
    $inPage->setTitle($pagetitle);
	 
    $inPage->addPathway($pagetitle );
	  
	cmsPage::initTemplate('components', 'com_clubs_view_club')->
            assign('club', $club)->
		    assign('is_admin', $is_admin)->
            assign('is_moder', $is_moder)->
            display('com_clubs_view_propos.tpl');	
		 
}

 if ($do=='propos_edit'){
  
	if (!$inUser->id){ return false; }

	$club = $model->getClub($id);
	if(!$club){	return false; }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// настраивать клуб могут только администраторы
    $is_admin = $inUser->is_admin || ($inUser->id == $club['admin_id']);
	
    $is_moder  = $model->checkUserRightsInClub('moderator');
  
	if (!$is_admin && !$is_moder ){ return false; }
	 
    if (cmsCore::inRequest('save')){

        if(!cmsUser::checkCsrfToken()) { return false; }

        $propos = cmsCore::badTagClear(cmsCore::request('propos', 'html', ''));
        $new_club['propos'] 	 = $inDB->escape_string($propos);
		 
		// Сохраняем
        $model->updateClub($club['id'], $new_club);
 
         

		// Кешируем количество
		$model->setClubMembersCount($club['id']);

		cmsCore::addSessionMessage($_LANG['CONFIG_SAVE_OK'], 'info');

        cmsCore::redirect('/clubs/'.$club['id']);

    }

    if (!cmsCore::inRequest('save')){

        // Заголовки и пафвей
        $inPage->addPathway($club['title'], '/clubs/'.$club['id']);
        $inPage->addPathway($_LANG['CONFIG_CLUB']);
        $inPage->setTitle($_LANG['CONFIG_CLUB']);
 
        cmsPage::initTemplate('components', 'com_clubs_config')->
                assign('club', $club)->
                assign('is_admin', $inUser->is_admin)->
                display('com_clubs_edit_propos.tpl');

    }

	
}
  

///////////////////////// Допомога волонтерів /////////////////////////////////////////
if ($do=='volhelp_view'){
 
	$club = $model->getClub($id);
	 
	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// права доступа
    $is_admin  = $inUser->is_admin || ($inUser->id == $club['admin_id']);
    $is_moder  = $model->checkUserRightsInClub('moderator');
     
	if(!$club){	return false; }
  
	$pagetitle = 'Чим можемо допомогти'; 
	
    $inPage->setTitle($pagetitle);
	 
    $inPage->addPathway($pagetitle );
	  
	cmsPage::initTemplate('components', 'com_clubs_view_club')->
            assign('club', $club)->
		    assign('is_admin', $is_admin)->
            assign('is_moder', $is_moder)->
            display('com_clubs_view_volhelp.tpl');	
		 
}

 if ($do=='volhelp_edit'){
  
	if (!$inUser->id){ return false; }

	$club = $model->getClub($id);
	if(!$club){	return false; }

	// Инициализируем участников клуба
	$model->initClubMembers($club['id']);
	// настраивать клуб могут только администраторы
    $is_admin = $inUser->is_admin || ($inUser->id == $club['admin_id']);
	
    $is_moder  = $model->checkUserRightsInClub('moderator');
  
	if (!$is_admin && !$is_moder ){ return false; }
	 
    if (cmsCore::inRequest('save')){

        if(!cmsUser::checkCsrfToken()) { return false; }

        $volhelp = cmsCore::badTagClear(cmsCore::request('volhelp', 'html', ''));
        $new_club['volhelp'] 	 = $inDB->escape_string($volhelp);
		 
		// Сохраняем
        $model->updateClub($club['id'], $new_club);
  
		// Кешируем количество
		$model->setClubMembersCount($club['id']);

		cmsCore::addSessionMessage($_LANG['CONFIG_SAVE_OK'], 'info');

        cmsCore::redirect('/clubs/'.$club['id']);

    }

    if (!cmsCore::inRequest('save')){

        // Заголовки и пафвей
        $inPage->addPathway($club['title'], '/clubs/'.$club['id']);
        $inPage->addPathway($_LANG['CONFIG_CLUB']);
        $inPage->setTitle($_LANG['CONFIG_CLUB']);
 
        cmsPage::initTemplate('components', 'com_clubs_config')->
                assign('club', $club)->
                assign('is_admin', $inUser->is_admin)->
                display('com_clubs_edit_volhelp.tpl');

    }

	
}




}