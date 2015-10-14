<?php


if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

class cms_model_wishes{

	function __construct(){
        $this->inDB = cmsDatabase::getInstance();
        $this->inUser = cmsUser::getInstance();
        $this->inCore = cmsCore::getInstance();
    }

    public function install(){

        return true;

    }

/* ==================================================================================================== */


   //
   // этот метод вызывается компонентом comments при создании нового комментария
   //
   // метод должен вернуть массив содержащий ссылку и заголовок поста, к которому
   // добавляется комментарий
   //
   public function getCommentTarget($target, $target_id) {

        $result = array();

        switch($target){

            case 'wishes': $sql = "SELECT * FROM `cms_wishes` WHERE id={$target_id} LIMIT 1";
                         $res = $this->inDB->query($sql);
                         if (!$this->inDB->num_rows($res)){ return false; }
                         $post = $this->inDB->fetch_assoc($res);
                         $result['link']  = "/wishes/wish_item".$post[id].".html";
                         if(!empty($post['title']))
                         {
                         $result['title'] = $post['title'];
                         }
                         else
                         {
                         	 $result['title'] = "Позиция ".$post['id'];
                         }
                         break;

        }

        return ($result ? $result : false);

    }
/* ==================================================================================================== */
public function is_author($user_id,$id)
{
 $sql="select * from `cms_wishes` where `id`='".$id."' and `user_id`='".$user_id."'";
 $result=$this->inDB->query($sql);
		if($this->inDB->num_rows($result)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
}
/* ==================================================================================================== */
  public function wish_type($n,$t,$user_id,$page=1,$active=0,$types=array(),$perpage)
  {
  	 
		$inf="";
		if($n>0)
		{
		$sql="select * from `cms_wishes` where `type`='".intval($n)."' and `published`='1' order by datetime desc LIMIT ".(($page-1)*$perpage).", $perpage ";
		}
		else if($n==0)
		{
		$sql="select * from `cms_wishes` where `published`='1' order by datetime desc LIMIT ".(($page-1)*$perpage).", $perpage ";
		}
		//echo $sql;
		$result=$this->inDB->query($sql);
		if($this->inDB->num_rows($result))
		{
		while($sinfo = $this->inDB->fetch_assoc($result)){
			$us=$this->inUser->loadUser($sinfo['user_id']);
		$inf.="<div style='border-top: 1px solid #DDDDDD;'>
		<div style='float: left;padding-left: 5px;padding-right: 5px;padding-top: 15px;vertical-align: top;'>
			<a href='/users/".$us['login']."'><img src='".$us['imageurl']."' style='border-radius:10px;' border='0' /></a>
			</div>
		<div style='padding: 10px 5px 8px;'>
				<a href='/users/".$us['login']."' style='font-size:11px;'>".$us['nickname']."</a>
				<div style='float:right;text-align:right;font-size:10px;'>
				<span style='border-radius:3px;border:1px dotted #999;color:#333;'>";
			if($user_id>0)
			{
				if($user_id!=$us['id'])
				{
			$inf.="<a class='ajaxlink' href='javascript:void(0)' title='Написати повідомлення: ".$us['nickname']."' onclick=\"users.sendMess('".$us['id']."', 0, this);return false;\">Особисте повідомлення</a>";
				}
				else
				{
					$inf.="Ваше";
				}
			}
			else
			{
				$inf.="<a href=\"#openModal\">Написать</a>";
			}
			$cnt=$this->inCore->getCommentsCount('wishes', $sinfo['id']);
			$inf.='</span>';
			if($user_id>0)
			{
				if($user_id!=$us['id'])
				{
		//	$inf.='<div id="plusminus'.$sinfo['id'].'" style="margin-top:3px;"><a href="javascript:void(0)" onclick="wishminus('.$sinfo['id'].')"><img border="0" alt="-" src="/templates/_simple_/images/icons/comments/vote_down.gif" style="margin-left:2px"/></a><span style="color:gray;">0</span><a href="javascript:void(0)" onclick="wishplus('.$sinfo['id'].')"><img border="0" alt="+" src="/templates/_simple_/images/icons/comments/vote_up.gif" /> </div> ';  
				}
				else
				{
			//	$inf.='<div id="plusminus'.$sinfo['id'].'" style="margin-top:3px;"><span style="color:gray;">0</span> </div>'; 
				}
				
			}
			else
			{
			//	$inf.='<div id="plusminus'.$sinfo['id'].'" style="margin-top:3px;"><span style="color:gray;">0</span> </div>';
			}
				if($active==1){$addlink="class='shortc-button small ".$types[$n]["1"]."'";
				$inf.="<br/>[".$this->inCore->dateformat($sinfo['datetime'])."]<br/><a href='/wishes/wish_item".$sinfo['id'].".html'  ".$addlink.">Коментарів: ".$cnt."</a>";
				}
			
				$inf.="
				</div>
					<div style='min-height:60px;'>
				<a href='/wishes/wish_item".$sinfo['id'].".html' style='text-decoration:none;color:#000;'><strong>".$sinfo['title']."</strong><br/>
				".$sinfo['info']."</a>
					</div>
					<div style=''>";
					if($active==1){}else {$addlink="style='color:#333;font-size:11px;'";
		$inf.="<a href='/wishes/wish_item".$sinfo['id'].".html'  ".$addlink.">Коментарів: ".$cnt."</a>";
			$inf.="<div style='float:right;color:#333;font-size:11px;'>";
	$inf.="[".$this->inCore->dateformat($sinfo['datetime'])."]</div>";
					}
				

		
		$inf.="</div>
				</div>
		</div>";
		}
		}
		else
		{
			$inf.="<div style='color:red;font-size:11px;'>Записи відсутні!</div>";
		}
		return $inf;
  }
/* ==================================================================================================== */
  public function modal()
  {

	?>
<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Закрыть" class="close">X</a>
		<h2>Необходима регистрация!</h2>
		<p>Здравствуйте. Спасибо, что Вы воспользовались нашим сервисом. </p>
		<p>Для того, чтобы написать автору, нужно <a href='/registration'>зарегистрироваться</a> на сайте или <a href='/login'>авторизироваться</a></p>
	</div>
</div>
			<?php
}

/* ==================================================================================================== */
}