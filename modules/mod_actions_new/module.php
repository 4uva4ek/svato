<?php

function mod_actions_new($module_id){

        $inCore = cmsCore::getInstance();
        $inUser = cmsUser::getInstance();
        $inDB   = cmsDatabase::getInstance();

        global $_LANG;

        $cfg = $inCore->loadModuleConfig($module_id);

		if (!isset($cfg['show_target'])) { $cfg['show_target'] = 1; }
		if (!isset($cfg['limit'])) { $cfg['limit'] = 15; }
		if (!isset($cfg['show_link'])) { $cfg['show_link'] = 1; }
        if (!isset($cfg['action_types'])) { echo $_LANG['MODULE_NOT_CONFIGURED']; return true; }

        $inActions = cmsActions::getInstance();

        if (!$cfg['show_target']){ $inActions->showTargets(false); }

        $inActions->onlySelectedTypes($cfg['action_types']);
        $inActions->limitIs($cfg['limit']);

        $actions = $inActions->getActionsLog();


        $new_actions=array();

        foreach($actions as $action) {
            $user = $inUser->getuserByLogin($action['user_login']);
            $user_id=$user['id'];
            $action['user_online'] = $inUser->isOnline($user['id']);
            $action['user_ava'] = $inDB->get_field('cms_user_profiles', "user_id=$user_id", 'imageurl');

            $new_actions[]=$action;
        }



        $smarty = $inCore->initSmarty('modules', 'mod_actions_new.tpl');
        $smarty->assign('actions', $new_actions);
		$smarty->assign('cfg', $cfg);
        $smarty->display('mod_actions_new.tpl');
			
		return true;
        
}
?>
