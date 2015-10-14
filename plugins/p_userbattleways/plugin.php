<?php

class p_userbattleways extends cmsPlugin {

// ==================================================================== //

     public function __construct(){
        
        parent::__construct();

        // Информация о плагине

        $this->info['plugin']           = 'p_userbattleways';
        $this->info['title']            = 'Бойовий шлях';
        $this->info['description']      = 'Бойовий шлях';
        $this->info['author']           = 'promodigy';
        $this->info['version']          = '1';

        $this->info['tab']              = 'Бойовий шлях'; //-- Заголовок закладки в профиле

        // Настройки по-умолчанию
        $this->config['Кількість записів'] = 10;

        // События, которые будут отлавливаться плагином

        $this->events[]                 = 'USER_PROFILE';

    }

// ==================================================================== //

    /**
     * Процедура установки плагина
     * @return bool
     */
    public function install(){

        return parent::install();

    }

// ==================================================================== //

    /**
     * Процедура обновления плагина
     * @return bool
     */
    public function upgrade(){

        return parent::upgrade();

    }

// ==================================================================== //

    /**
     * Обработка событий
     * @param string $event
     * @param array $user
     * @return html
     */
    public function execute($event, $user){

        parent::execute();

        $inCore	= cmsCore::getInstance();
        $inDB	= cmsDatabase::getInstance();
        $inUser	= cmsUser::getInstance();
        
    	$inCore->loadModel('battleways');
    	$model = new cms_model_battleways();
    	$select_tag=0;
    	$page	= 1;
    	$t="";
    	$color="";	
    	$cfg = $inCore->loadComponentConfig('battleways');
    	
	if (!isset($id)) {
		$login = $inCore->request('login', 'str', '');
		$login = urldecode($login);
		$id    = $inDB->get_field('cms_users', "login='{$login}' ORDER BY is_deleted ASC", 'id');
	}
	$myprofile  = ($inUser->id == $id);

	//if(!$myprofile) {
	//	return;
	//}


		
		ob_start();
		
///////////////////////////////
	if(!isset($cfg['perpage'])) { $cfg['perpage'] = 10; }

 //$posts_list = $model->getAllPosts($page, $cfg['perpage'],$select_tag,$t,$color);
 $posts_list = $model->getAllPosts($page, $cfg['perpage'],$select_tag,$t,$color, $id);
     
	if ($posts_list){
    foreach($posts_list as $post){
     $post['datetime']	= $inCore->dateFormat($post['datetime'],1,0,1);
     
     if(!empty($post['type']))
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
     }
     $posts[]            = $post;
            }
    }
	
		$smarty = $inCore->initSmarty('plugins', 'p_userbattleways.tpl');
	$smarty->assign('is_posts', (bool)sizeof($posts_list));

	$smarty->assign('pagetitle', "Ваш бойовий шлях");
	if ($posts) { $smarty->assign('posts', $posts); }
    $smarty->display('p_userbattleways.tpl');






///////////////////////////////
        $html = ob_get_clean();

        return $html;

    }

// ==================================================================== //

}

?>
