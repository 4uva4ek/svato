<?php

    function info_module_mod_actions_new(){

        //
        // Описание модуля
        //

        //Заголовок (на сайте)
        $_module['title']        = 'Лента активности новая';

        //Название (в админке)
        $_module['name']         = 'Лента активности';

        //описание
        $_module['description']  = 'Показывает список последних действий пользователей на сайте';
        
        //ссылка (идентификатор)
        $_module['link']         = 'mod_actions_new';
        
        //позиция
        $_module['position']     = 'maintop';

        //автор
        $_module['author']       = 'Yurik';

        //текущая версия
        $_module['version']      = '1.7';

        //
        // Настройки по-умолчанию
        //
        $_module['config'] = array();

        return $_module;

    }

// ========================================================================== //

    function install_module_mod_actions_new(){

        return true;

    }

// ========================================================================== //

    function upgrade_module_mod_actions_new(){

        return true;
        
    }

// ========================================================================== //

?>