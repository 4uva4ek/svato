<?php


    header('Content-Type: text/html; charset=utf-8');
    Error_Reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

    session_start();

	define('PATH', dirname(__FILE__));
	define("VALID_CMS", 1);

	include(PATH.'/core/cms.php');

    cmsCore::getInstance();

    if(!cmsConfig::getConfig('is_change_lang')){
        cmsCore::halt();
    }

    $set_lang = cmsCore::request('lang', 'str', 'ru');

    $langs = cmsCore::getDirsList('/languages');

    if(!in_array($set_lang, $langs)){
        cmsCore::halt();
    }

    $_SESSION['lang'] = $set_lang;

    cmsCore::redirectBack();

?>