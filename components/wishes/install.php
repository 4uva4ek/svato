<?php

    function info_component_wishes(){

        //Описание компонента

        $_component['title']        = 'Пожелания. Хотелки - Умелки';
        $_component['description']  = 'Компонент Пожелания';
        $_component['link']         = 'wishes';
        $_component['author']       = '<a href="http://svb28.ru">Amurland</a>';
        $_component['internal']     = '0';
        $_component['version']      = '1.2';

        return $_component;

    }

// ========================================================================== //

    function install_component_wishes(){

        $inCore     = cmsCore::getInstance();       //подключаем ядро
        $inDB       = cmsDatabase::getInstance();   //подключаем базу данных
        $inConf     = cmsConfig::getInstance();

        include($_SERVER['DOCUMENT_ROOT'].'/includes/dbimport.inc.php');

        dbRunSQL($_SERVER['DOCUMENT_ROOT'].'/components/wishes/install.sql', $inConf->db_prefix);
        
        	$sql="select * from `cms_comment_targets` where `target`='wishes';";
        	$result = $inDB->query($sql);
		if (!$inDB->num_rows($result)){
        $inDB->query("INSERT INTO `cms_comment_targets` (`id`, `target`, `component`, `title`) VALUES (NULL, 'wishes', 'wishes', 'Хотелки-Умелки');");
		}
 

        return true;

    }
// ========================================================================== //

    function upgrade_component_wishes(){

        $inDB = cmsDatabase::getInstance();
        	$sql="select * from `cms_comment_targets` where `target`='wishes';";
        	$result = $inDB->query($sql);
		if (!$inDB->num_rows($result)){
        $inDB->query("INSERT INTO `cms_comment_targets` (`id`, `target`, `component`, `title`) VALUES (NULL, 'wishes', 'wishes', 'Хотелки-Умелки');");
		}
     
        
        return true;

    }
// ========================================================================== //

?>
