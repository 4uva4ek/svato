<?php
 
if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

class cms_model_armedlist{

	public function __construct(){
        $this->inDB = cmsDatabase::getInstance();
    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function getCommentTarget($target, $target_id) {

        $result = array();

        switch($target){

            case 'armedlist': $item = $this->inDB->get_fields('cms_armedlist_quests', "id={$target_id}", 'quest');
                        if (!$item) { return false; }
                        $result['link']     = '/armedlist/quest'.$target_id.'.html';
                        $result['title']    = (mb_strlen($item['quest'])<100 ? $item['quest'] : mb_substr($item['quest'], 0, 100).'...');
                        break;

        }

        return ($result ? $result : false);

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

	public function deleteQuest($id){

		$inCore = cmsCore::getInstance();

        $this->inDB->query("DELETE FROM cms_armedlist_quests WHERE id={$id}");

		$inCore->deleteComments('armedlist', $id);

        cmsActions::removeObjectLog('add_quest', $id);

        return true;
    }

/* ==================================================================================================== */
/* ==================================================================================================== */

    public function deleteQuests($id_list){
        foreach($id_list as $key=>$id){
            $this->deleteQuest($id);
        }
        return true;
    }

/* ==================================================================================================== */
/* ==================================================================================================== */

}