<?php
 
    /*
     * Доступны объекты $inCore $inUser $inPage($this) $inConf $inDB
     */

    // Получаем количество модулей на нужные позиции
    $mod_count['top']     = $this->countModules('top');
    $mod_count['topmenu'] = $this->countModules('topmenu');
    $mod_count['sidebar'] = $this->countModules('sidebar');

    // подключаем jQuery и js ядра в самое начало
    $this->prependHeadJS('core/js/common.js');
    $this->prependHeadJS('includes/jquery/jquery.js');
    // Подключаем стили шаблона
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/reset.css');
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/text.css');
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/960.css');
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/styles.css');
    // Подключаем colorbox (просмотр фото)
    $this->addHeadJS('includes/jquery/colorbox/jquery.colorbox.js');
    $this->addHeadCSS('includes/jquery/colorbox/colorbox.css');
    $this->addHeadJS('includes/jquery/colorbox/init_colorbox.js');
    // LANG фразы для colorbox
    $this->addHeadJsLang(array('CBOX_IMAGE','CBOX_FROM','CBOX_PREVIOUS','CBOX_NEXT','CBOX_CLOSE','CBOX_XHR_ERROR','CBOX_IMG_ERROR', 'CBOX_SLIDESHOWSTOP', 'CBOX_SLIDESHOWSTART'));

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <?php $this->printHead(); ?>
    <?php if($inUser->is_admin){ ?>
	
        <script src="/admin/js/modconfig.js" type="text/javascript"></script>
        <script src="/templates/<?php echo TEMPLATE; ?>/js/nyromodal.js" type="text/javascript"></script>
        <link href="/templates/<?php echo TEMPLATE; ?>/css/modconfig.css" rel="stylesheet" type="text/css" />
        <link href="/templates/<?php echo TEMPLATE; ?>/css/nyromodal.css" rel="stylesheet" type="text/css" />
		
    <?php } ?>
</head>

<body  <?php if($_SERVER['REQUEST_URI'] != '/'){echo 'class="userbg"';} else {echo 'class="bodybg"'; }; ?> >
 
 
<?php if ($inConf->siteoff && $inUser->is_admin) { ?>
<div style="margin: 4px;
padding: 5px;
 
background: rgba(255, 250, 250, 0.5);
position: fixed;
opacity: 0.8;
z-index: 999;
width: 67px;
font-size: 9px;"><?php echo $_LANG['SITE_IS_DISABLE']; ?></div>
<?php } ?>
    <div id="wrapper">
		
		
		
		     <?php if($mod_count['topmenu']) { ?>
            <div class="container" id="topmenu">
                <div>
                    <?php $this->printModules('topmenu'); ?>
                </div>
            </div>
            <?php } ?>
		
	 	<?php if ( $inUser->id) { ?>
		
		<div class="fixedmenu">
		<?php $inPage->printModules('fixedmenu'); ?>
		</div>
		 
	    
		<?php } ?>

        <div id="page">
			<?php if($_SERVER['REQUEST_URI'] == '/') { ?>
			<div class="main-text">
				<p>
				Вітаємо Вас в першій українській незалежній соціальній мережі для учасників АТО, волонтерів
та усіх небайдужих. Якщо Ви хочете прочитати неупереджені новини, інформацію з перших уст,
долучитись до волонтерського руху, знайти того з ким були пліч-о-пліч в зоні АТО, то ми
пропонуємо вам зареєструватись і долучитись до нашого спільного проекту.
Ресурс знаходиться на стадії розвитку, тому якщо у вас є побажання, пропозиції, ідеї,
які б допомогли зробити його кращим, озвучте нам їх.
				</p>
			</div>
			<?php } ?>
			
			 
       

            <?php if ($mod_count['top']){ ?>
            <div class="clear"></div>

            <div id="topwide" class="container_12">
                <div class="grid_12" id="topmod"><?php $this->printModules('top'); ?></div>
            </div>
            <?php } ?>

            <div id="pathway" class="container_12">
                <div class="grid_12"><?php $this->printPathway('&rarr;'); ?></div>
            </div>

            <div class="clear"></div>

            <div id="mainbody" class="container_12">
                <div id="main" class="<?php if ($mod_count['sidebar']) { ?>grid_7<?php } else { ?>grid_12<?php } ?>">
                    <?php $this->printModules('maintop'); ?>

                    <?php $messages = cmsCore::getSessionMessages(); ?>
                    <?php if ($messages) { ?>
                    <div class="sess_messages" id="sess_messages">
                        <?php foreach($messages as $message){ ?>
                            <?php echo $message; ?>
                        <?php } ?>
                    </div>
                    <?php } ?>

                    <?php if($this->page_body){ ?>
                        <div class="component">
                             <?php $this->printBody(); ?>
                        </div>
                    <?php } ?>
                    <?php $this->printModules('mainbottom'); ?>
                </div>
                <?php if ($mod_count['sidebar']) { ?>
                    <div class="grid_5" id="sidebar"><?php $this->printModules('sidebar'); ?></div>
                <?php } ?>
            </div>

        </div>

    </div>

    <div id="footer">
        <div class="container_12">
            <div class="grid_8">
                <div id="copyright">Svato.org. Всі права захищено &copy; <?php echo date('Y'); ?></div>
            </div>
            <div class="grid_4 foot_right">
               
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function(){
            $('#sess_messages').hide().fadeIn();
            $('#topmenu .menu li').hover(
                function() {
                    $(this).find('ul:first').fadeIn('fast');
                    $(this).find('a:first').addClass("hover");
                },
                function() {
                    $(this).find('ul:first').hide();
                    $(this).find('a:first').removeClass("hover");
                }
            );
        });
    </script>
    <?php if($inConf->debug && $inUser->is_admin){
            $time = $inCore->getGenTime(); ?>
        <div class="debug_info">
            <div class="debug_time">
                <?php echo $_LANG['DEBUG_TIME_GEN_PAGE'].' '.number_format($time, 4).' '.$_LANG['DEBUG_SEC']; ?>
            </div>
            <div class="debug_memory">
                <?php echo $_LANG['DEBUG_MEMORY'].' '.round(@memory_get_usage()/1024/1024, 2).' '.$_LANG['SIZE_MB']; ?>
            </div>
            <div class="debug_query_count">
                <a href="#debug_query_dump" class="ajaxlink" onclick="$('#debug_query_dump').toggle();return false;"><?php echo $_LANG['DEBUG_QUERY_DB'].' '.$inDB->q_count; ?></a>
            </div>
            <div id="debug_query_dump">
                <?php echo $inDB->q_dump; ?>
            </div>
        </div>
    <?php } ?>
</body>
</html>