<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
/******************************************************************************/
//                                                                            //
//                           InstantCMS v1.10.4                               //
//                        http://www.instantcms.ru/                           //
//                                                                            //
//                   written by InstantCMS Team, 2007-2014                    //
//                produced by InstantSoft, (www.instantsoft.ru)               //
//                                                                            //
//                        LICENSED BY GNU/GPL v2                              //
//                                                                            //
/******************************************************************************/
	defined('VALID_CMS_ADMIN') or die();
	$inDB = cmsDatabase::getInstance();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php cpHead(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/styles.css?17" rel="stylesheet" type="text/css" />
<link href="js/hmenu/hmenu.css" rel="stylesheet" type="text/css" />
<link href="/includes/jquery/tablesorter/style.css" rel="stylesheet" type="text/css" />
<link href="/includes/jqueryui/css/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/admin.js"></script>
<script type="text/javascript" src="/includes/jquery/jquery.columnfilters.js"></script>
<script type="text/javascript" src="/includes/jquery/tablesorter/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="/includes/jquery/jquery.preload.js"></script>
<script type="text/javascript" src="/includes/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="/includes/jqueryui/init-ui.js"></script>
<script type="text/javascript" src="/includes/jqueryui/i18n/jquery.ui.datepicker-<?php echo cmsConfig::getConfig('lang'); ?>.min.js"></script>
<script type="text/javascript" src="/includes/jquery/jquery.form.js"></script>
<script type="text/javascript" src="js/hltable.js"></script>
<script type="text/javascript" src="js/jquery.jclock.js"></script>
<style type="text/css">
	.hoverRow { color:#FF3300; background-color:#CFFFFF;}
	.clickedRow { color:#009900; background-color:#FFFFCC;}
</style>
</head>

<body>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%">
        <tr>
            <td valign="top">
                <div id="container">
                    <div id="header" style="height:69px">
                        <table width="100%" height="69" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="230" align="left" valign="middle" style="padding-left:20px; padding-top:5px;">
                                    <a href="/admin/" style="color: #fff;">
                                        SocAto
                                    </a>
                                </td>
                                <td width="120">
                                    <div class="jdate"><?php echo date('d') .' '. $_LANG['MONTH_'.date('m')]; ?></div>
                                    <div class="jclock">00:00:00</div>
                                </td>
                                <td>
                                    <?php
                                        $new_messages =	cmsUser::getNewMessages($inUser->id);
                                        if ($new_messages['total']){
                                            $msg_link = '<a href="/users/'.$inUser->id.'/messages.html" style="color:yellow">'.$_LANG['AD_NEW_MSG'].' ('.$new_messages['total'].')</a>';
                                        } else {
                                            $msg_link = '<span>'.$_LANG['NO'].' '.$_LANG['NEW_MESSAGES'].'</span>';
                                        }
                                    ?>
                                    <div class="juser"><?php echo $_LANG['AD_YOU']; ?> &mdash; <a href="<?php echo cmsUser::getProfileURL($inUser->login); ?>" target="_blank" title="<?php echo $_LANG['AD_GO_PROFILE']; ?>"><?php echo $inDB->get_field('cms_users', 'id='.$inUser->id, 'nickname'); ?></a>, ip: <?php echo $inUser->ip ?></div>
                                    <div class="jmessages"><?php echo $msg_link; ?></div>
                                </td>
                                <td width="120">
                                    <div class="jsite"><a href="/" target="_blank"><?php echo $_LANG['AD_OPEN_SITE']; ?></a></div>
                                    <div class="jlogout"><a href="/logout" target="" ><?php echo $_LANG['AD_EXIT']; ?></a></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="mainmenu" style="height:24px; background:url(js/hmenu/hmenubg.jpg) repeat-x">
                        <div style="padding-left:15px;height:24px"><?php cpMenu(); ?></div>
                    </div>
                    <div id="pathway" style="margin-top:4px;">
                        <?php cpPathway('&rarr;'); ?>
                    </div>
                    <?php $messages = cmsCore::getSessionMessages();
                    if ($messages) { ?>
                    <div class="sess_messages" style="margin:5px 5px 0 5px">
                        <?php foreach($messages as $message){
                                 echo $message;
                              }?>
                    </div>
                    <?php } ?>
                    <div id="body" style="padding:5px 10px 10px 10px;">
                        <?php cpBody(); ?>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td height="50">
                <div id="footer" style="text-align:center;background:#ECECEC;height:50px;line-height:50px;">
                    
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
