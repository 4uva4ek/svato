<?php
/******************************************************************************/
//                                                                            //
//                           InstantCMS v1.10.4                               //
//                        http://www.instantcms.ru/                           //
//                                                                            //
//                   written by InstantCMS Team, 2007-2014                    //
//                produced by InstantSoft, (www.instantsoft.ru)               //
//                                                                            //
//                        LICENSED BY GNU/GPL v2                              //
//                                                                            //
/******************************************************************************/

class p_bloges extends cmsPlugin {

// ==================================================================== //

    public function __construct(){

        parent::__construct();

        // Информация о плагине
        $this->info['plugin']      = 'p_bloges';
        $this->info['title']       = 'Блоги';
        $this->info['description'] = 'Пример плагина - Добавляет вкладку "Блоги" в профили всех пользователей';
        $this->info['author']      = 'Instant';
        $this->info['version']     = '1';

        // Настройки по-умолчанию
        $this->config['PU_LIMIT'] = 10;

        // События, которые будут отлавливаться плагином
        $this->events[] = 'USER_PROFILE';

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
    public function execute($event='', $user=array()){

        global $_LANG;
         $this->info['tab']       = $_LANG['PU_TAB_NAME']; //-- Заголовок закладки в профиле
        // Загружать вкладку по ajax
      $this->info['ajax_link'] = '/plugins/'.__CLASS__.'/get.php?user_id='.$user['id'];

        parent::execute();

     return '';

  }

   public function viewBloges($user_id){
	
	
		$inDB = cmsDatabase::getInstance();

		cmsCore::loadClass('blog');
	cmsCore::loadModel('blogs');
	$inBlog = cmsBlogs::getInstance();
	$model = new cms_model_blogs();
	
	$model->whereUserIs($user_id);

		$total = $inBlog->getPostsCount($inUser->is_admin);
		 $inDB->orderBy('p.pubdate', 'DESC');
		$inDB->limitPage(1, (int)$this->config['PU_LIMIT']);

		$posts = $inBlog->getPosts($inUser->is_admin, $model);

        ob_start();

        cmsPage::initTemplate('plugins', 'p_bloges.tpl')->
              
                assign('posts', $posts)->
                display('p_bloges.tpl');

        return ob_get_clean();

    }
// ==================================================================== //

}

?>
