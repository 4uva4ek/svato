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

function mod_auth($module_id, $cfg){

    $inUser = cmsUser::getInstance();

    if ($inUser->id){ return false; }

    cmsUser::sessionPut('auth_back_url', cmsCore::getBackURL());

    cmsPage::initTemplate('modules', 'mod_auth')->
            assign('cfg', $cfg)->
            display('mod_auth.tpl');

    return true;

}
?>