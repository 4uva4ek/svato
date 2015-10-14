<?php


if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

class cms_model_battleways{

	function __construct(){
        $this->inDB = cmsDatabase::getInstance();
    }

    public function install(){

        return true;

    }

/* ==================================================================================================== */
/* ==================================================================================================== */

   public function delBattleway($id){ 
   	   
   	   $inUser = cmsUser::getInstance();
		$user_id = $inUser->id;
   	   $sql = "DELETE FROM `cms_battleways` WHERE `id` = '".$id."' and `user` = '".$user_id."' LIMIT 1;";
   	   

   	    $result = $this->inDB->query($sql);
		
        if ($this->inDB->num_rows($result)){
        	return true;
        }
        else
        {
        	return false;
        }
   	   
   }



   public function getBattleway($id,$user_id){ 
   	   
   	//  $inUser = cmsUser::getInstance();
	//   $user_id = $inUser->id;
   	   $sql = "SELECT * FROM cms_battleways WHERE `user` = '".$user_id."' and `id`='".$id."';";

   	    $result = $this->inDB->query($sql);
		$post="";
		
        if ($this->inDB->num_rows($result)){
         $post = $this->inDB->fetch_assoc($result);
        }
   	   return $post;
   }
   
   
   
   
   public function getAllPosts($page, $perpage,$select_tag,$t,$color,$user_id ){ 
        $list = array();

	//	$inUser = cmsUser::getInstance();
	//	$user_id = $inUser->id;
		
		if($select_tag==1)
		{
			if(!empty($color))
			{
         $sql = "SELECT * 
FROM cms_battleways 
WHERE `user` = '".$user_id."' and `type` LIKE '%".$t."%' and `color`='".$color."' ORDER BY datetime DESC;";
		    }
		    else
		    {
		    	$sql = "SELECT * 
FROM cms_battleways 
WHERE `user` = '".$user_id."' and `type` LIKE '%".$t."%' ORDER BY datetime DESC;";
		    }
		}
		else
		{
			$sql = "SELECT * 
FROM cms_battleways 
WHERE `user` = '".$user_id."' ORDER BY datetime DESC LIMIT ".(($page-1)*$perpage).", $perpage ;";
		}

        $result = $this->inDB->query($sql);

        if ($this->inDB->num_rows($result)){
        
            while($post = $this->inDB->fetch_assoc($result)){
               
                $list[] = $post;
                
            }
        }

        return $list;
    }
    



public function authorBattleway($id){
		 $inUser = cmsUser::getInstance();
		 $user_id = $inUser->id;
		$sql = "SELECT * FROM `cms_battleways` where `user`='".$user_id."' and `id`='".$id."';";
        $result = $this->inDB->query($sql);
        if($this->inDB->num_rows($result))
        {return true;}else{return false;}
		
}

public function getAutoMark()
{
	
$inUser = cmsUser::getInstance();
		$user_id = $inUser->id;
		$sql = "SELECT distinct(`type`) FROM `cms_battleways` where `user`='".$user_id."';";
        $result = $this->inDB->query($sql);
        if($this->inDB->num_rows($result))
        {$mrk="";
	        while($mark = $this->inDB->fetch_assoc($result)){
	        	if(!empty($mark['type']) )
	        	{
	        		$mrk.="<span onclick=\"insert_label('".$mark['type']."')\" style='background: #E6E6E6;border:1px solid #e1e1e1;padding:5px;border-radius: 8px;border-radius: 3px;text-shadow: #FFFFFF 1px 1px 0px;display: inline-block;height: 19px;margin: 5px 3px 2px 2px;outline: #FFFFFF 0px;padding: 1px 4px;text-decoration: none;text-indent: 0px;vertical-align: middle;white-space: nowrap;cursor:pointer;'>".$mark['type']."</span> ";
	        	}
	        }
        }
        return $mrk;
}
	


public function getMarks()
{
	$inUser = cmsUser::getInstance();
		$user_id = $inUser->id;
		$sql = "SELECT distinct(`type`),`color` FROM `cms_battleways` where `user`='".$user_id."';";
        $result = $this->inDB->query($sql);
        if($this->inDB->num_rows($result))
        {$mrk="";
        while($mark = $this->inDB->fetch_assoc($result)){
        	if(!empty($mark['type']))
        	{ $sql_color="select * from `cms_battleways_color` where `id`='".$mark['color']."';";
        	$result_color = $this->inDB->query($sql_color);
        	
		        if($this->inDB->num_rows($result_color))
		        {
		        	$color= $this->inDB->fetch_assoc($result_color);
		        	
        $mrk.="<a href='/battleways/".$mark['type']."/".$mark['color']."/' style='background: ".$color['color'].";border-radius: 3px;color: ".$color['font_color'].";display: inline-block;height: 19px;margin: 0px 3px 2px 2px;outline: #FFFFFF 0px;padding: 1px 4px;text-decoration: none;text-indent: 0px;vertical-align: middle;white-space: nowrap;'>".$mark['type']."</a>";

        
        		}
        		else
        		{
        			        $mrk.="<a href='/battleways/".$mark['type']."/' style='background: #E6E6E6;border:1px solid #e1e1e1;padding:5px;border-radius: 8px;border-radius: 3px;color:#333333;text-shadow: #FFFFFF 1px 1px 0px;display: inline-block;height: 19px;margin: 0px 3px 2px 2px;outline: #FFFFFF 0px;padding: 1px 4px;text-decoration: none;text-indent: 0px;vertical-align: middle;white-space: nowrap;cursor:pointer;'>".$mark['type']."</a>";
        		}
        	
        	}
        }
        return $mrk;
        }
        	else
        {return "1";}
}


public function totalPosts(){
		$inUser = cmsUser::getInstance();
		$user_id = $inUser->id;
		$sql = "SELECT * FROM `cms_battleways` where `user`='".$user_id."';";
        $result = $this->inDB->query($sql);
		return $this->inDB->num_rows($result);
}





   public function getColors(){ 
		$cl="";
		$sql="select * from `cms_battleways_color` where `published`='1';";
        $result = $this->inDB->query($sql);

        if ($this->inDB->num_rows($result)){
        $cl.="<option value='0'>Без цвета</option>";
            while($color = $this->inDB->fetch_assoc($result)){
               
               $cl.="<option style='background:".$color['color'].";color:".$color['font_color'].";' value='".$color['id']."'>".$color['title']."</option>";
                
            }
        }

        return $cl;
    }
    
    /* ==================================================================================================== */

}