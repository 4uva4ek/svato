<?php

    function info_component_battleways(){

        //Описание компонента

        $_component['title']        = 'Бойовий шлях';
        $_component['description']  = 'Компонент бойового шляху';
        $_component['link']         = 'battleways';
        $_component['author']       = 'promodigy';
        $_component['internal']     = '0';
        $_component['version']      = '1';
		$_component['config'] = array(
            'perpage'=>'10',
            'images'=>'0'
            );
        return $_component;

    }

// ========================================================================== //

    function install_component_battleways(){

        $inCore     = cmsCore::getInstance();       //подключаем ядро
        $inDB       = cmsDatabase::getInstance();   //подключаем базу данных
        $inConf     = cmsConfig::getInstance();

        include($_SERVER['DOCUMENT_ROOT'].'/includes/dbimport.inc.php');

        dbRunSQL($_SERVER['DOCUMENT_ROOT'].'/components/battleways/install.sql', $inConf->db_prefix);

        return true;

    }

// ========================================================================== //

?>
