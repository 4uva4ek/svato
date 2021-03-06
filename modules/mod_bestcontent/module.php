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

function mod_bestcontent($module_id, $cfg){

	$inDB = cmsDatabase::getInstance();

	cmsCore::loadModel('content');
	$model = new cms_model_content();

	if (!isset($cfg['shownum'])){ $cfg['shownum'] = 5; }
	if (!isset($cfg['subs'])) { $cfg['subs'] = 1; }
	if (!isset($cfg['cat_id'])) { $cfg['cat_id'] = 1; }

	$inDB->where("con.canrate = 1");

	if($cfg['cat_id']){

		if (!$cfg['subs']){

			//выбираем из категории
			$model->whereCatIs($cfg['cat_id']);

		} else {

			//выбираем из категории и подкатегорий
			$rootcat = $inDB->getNsCategory('cms_category', $cfg['cat_id']);
			if(!$rootcat) { return false; }
			$model->whereThisAndNestedCats($rootcat['NSLeft'], $rootcat['NSRight']);

		}

	}

	$inDB->orderBy('con.rating', 'DESC');
	$inDB->limitPage(1, $cfg['shownum']);

	$content_list = $model->getArticlesList();

	cmsPage::initTemplate('modules', 'mod_bestcontent')->
            assign('articles', $content_list)->
            assign('cfg', $cfg)->display('mod_bestcontent.tpl');

	return true;

}
?>