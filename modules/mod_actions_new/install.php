<?php

    function info_module_mod_actions_new(){

        //
        // �������� ������
        //

        //��������� (�� �����)
        $_module['title']        = '����� ���������� �����';

        //�������� (� �������)
        $_module['name']         = '����� ����������';

        //��������
        $_module['description']  = '���������� ������ ��������� �������� ������������� �� �����';
        
        //������ (�������������)
        $_module['link']         = 'mod_actions_new';
        
        //�������
        $_module['position']     = 'maintop';

        //�����
        $_module['author']       = 'Yurik';

        //������� ������
        $_module['version']      = '1.7';

        //
        // ��������� ��-���������
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