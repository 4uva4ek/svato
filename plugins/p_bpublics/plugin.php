<?php
/******************************************************************************/
//                                                                            //
//                           InstantCMS v1.10.3                               //
//                        http://www.instantcms.ru/                           //
//                                                                            //
//                   written by InstantCMS Team, 2007-2013                    //
//                produced by InstantSoft, (www.instantsoft.ru)               //
//                                                                            //
//                        LICENSED BY GNU/GPL v2                              //
//                                                                            //
/******************************************************************************/

class p_bpublics extends cmsPlugin {

// ==================================================================== //

    public function __construct(){

        parent::__construct();

        // Информация о плагине

        $this->info['plugin']           = 'p_bpublics';
        $this->info['title']            = 'Історії та публікації';
        $this->info['description']      = 'Виводить записи с блогу автора';
        $this->info['author']           = 'promodigy';
        $this->info['version']          = '1.0';

        // Настройки по-умолчанию

        $this->config['text']           = 'Історії та публікації';
        $this->config['Кількість записів'] = '10';

        
        // События, которые будут отлавливаться плагином

        $this->events[]                 = 'GET_ITEM_UC';

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
     * @param mixed $item
     * @return mixed
     */
  


  public function execute($event='', $item=array()){
  parent::execute();
   
	$inCore = cmsCore::getInstance();
    $inPage = cmsPage::getInstance();
    $inDB   = cmsDatabase::getInstance();
    $inUser = cmsUser::getInstance();

	cmsCore::loadClass('blog');
	$inBlog = cmsBlogs::getInstance();
	$inBlog->owner = 'user';

    global $_LANG;

    $model = new cms_model_blogs();

	//Получаем параметры
	$id 	   = cmsCore::request('id', 'int', 0);
	$post_id   = cmsCore::request('post_id', 'int', 0);
	$bloglink  = cmsCore::request('bloglink', 'str', '');
	$seolink   = cmsCore::request('seolink', 'str', '');
    $do = $inCore->do;
	$page      = cmsCore::request('page', 'int', 1);
	$cat_id    = cmsCore::request('cat_id', 'int', 0);
	$ownertype = cmsCore::request('ownertype', 'str', '');

	
	// всего постов
	$total = $inBlog->getPostsCount($inUser->is_admin);

    //устанавливаем сортировку
    $inDB->orderBy('p.pubdate', 'DESC');

    $inDB->limitPage($page, $model->config['perpage']);

	// сами посты
	$posts = $inBlog->getPosts($inUser->is_admin, $model);
	if(!$posts && $page > 1){ cmsCore::error404(); }

	cmsPage::initTemplate('components', 'com_blog_view_posts')->
            assign('pagetitle', $pagetitle)->
            assign('ownertype', $ownertype)->
            assign('total', $total)->
            assign('posts', $posts)->
    
            assign('cfg', $model->config)->
            display('p_bpublics.tpl');
		
		
		
		
		
  /*       $mode   =  'BY pubdate DESC';
	 //  $mode   =  'BY RAND ()';
		
		
    //  $price   =  '<1000000000000';
		$price   =  '=0';
	//	$price   =  '!=0';
        parent::execute();
		$inCore     = cmsCore::getInstance();

        $catalogs   = array();
        $user_id =  "{$item['user_id']}";

		

        $sql        = "SELECT id, title, published, imageurl, price FROM cms_uc_items
                       WHERE user_id = {$user_id} AND on_moderate=0  AND published=1 AND price{$price}
                       ORDER {$mode}
                       LIMIT {$limit}";

        $result     = $this->inDB->query($sql);
        $text      = $this->config['text'];
        $total      = $this->inDB->num_rows($result);

        if ($total){

            while($catalog = $this->inDB->fetch_assoc($result)){
                $catalog['url'] = '/catalog/item'.$catalog['id'].'.html';
                $catalogs[] = $catalog;
            }
            
        }

        ob_start();
		$smarty= $this->inCore->initSmarty('plugins', 'p_bpublics.tpl');
		$smarty->assign('text', $text);	
        $smarty->assign('total', $total);
        $smarty->assign('catalogs', $catalogs);
        $smarty->display('p_bpublics.tpl');
 //$this->saveConfig();
        return $item; */
		
		
		

    }

	
	


// ==================================================================== //

}

?>
