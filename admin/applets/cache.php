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

if(!defined('VALID_CMS_ADMIN')) { die('ACCESS DENIED'); }

function applet_cache(){

    $target    = cmsCore::request('target', 'str', '');
    $target_id = cmsCore::request('id', 'int', 0);

    if(!$target || !$target_id){
        cmsCore::error404();
    }

    cmsCore::deleteCache($target, $target_id);

	cmsCore::redirectBack();

}
?>