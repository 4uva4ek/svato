<?php

/* * *************************************************************************** */
//                                                                            //
//                           InstantCMS v1.10.3                               //
//                        http://www.instantcms.ru/                           //
//                                                                            //
//                   written by InstantCMS Team, 2007-2013                    //
//                produced by InstantSoft, (www.instantsoft.ru)               //
//                                                                            //
//                        LICENSED BY GNU/GPL v2                              //
//                                                                            //
/* * *************************************************************************** */

if (!defined('VALID_CMS')) {
    die('ACCESS DENIED');
}
/*
 * Created by Firs Yuriy
 * e-mail: firs.yura@gmail.com
 * site: firs.org.ua
 */
$_LANG['ERR_UNKNOWN_TARGET']        = "Помилка визначення об'єкта коментування!";
$_LANG['ERR_DEFINE_USER']           = 'Помилка визначення користувача!';
$_LANG['ERR_USER_NAME']             = "Ви не вказали своє ім'я!";
$_LANG['ERR_COMMENT_TEXT']          = 'Введіть текст коментаря!';
$_LANG['ERR_CAPTCHA']               = 'Неправильно вказано код з картинки! Спробуйте натиснути "оновити картинку".';
$_LANG['ERR_COMMENT_ADD']           = 'Помилка додавання коментаря!';
$_LANG['COMM_PREMODER_TEXT']        = 'Спасибі! Ваш коментар буде додано після перевірки адміністратором!';
$_LANG['COMM_PREMODER_ADMIN_TEXT']  = 'Користувач %user% додав коментар <a href="%targetlink%">%targetlink%</a>.<br>Необхідна <a href="/admin/index.php?view=components&do=config&link=comments&show_hidden=1">модерація.</a>.';
$_LANG['NEW_COMMENT']               = 'Новий коментар';
$_LANG['COMM_SUC_DELETE']           = 'Коментар успішно видалено';
$_LANG['COMMENTS']                  = 'Коментарі';
$_LANG['COMMENT']                   = 'коментар';
$_LANG['COMMENTS_ON_SITE']          = 'Коментарі на сайті';
$_LANG['WAIT_MODERING']             = 'Очікує модерації';

$_LANG['COMMENTS_MALE']   = 'прокоментував';
$_LANG['COMMENTS_FEMALE'] = 'прокоментувала';
$_LANG['COMMENTS_GENDER'] = 'коментує';

// Template
$_LANG['COMMENTS_CAN_ADD_ONLY']     = 'додавати Коментарі можуть тільки';
$_LANG['REGISTERED']                = 'зареєстровані';
$_LANG['USERS']                     = 'користувачі';
$_LANG['YOUR_NAME']                 = "ім'я";
$_LANG['INSERT_SMILE']              = 'Вставити смайл';
$_LANG['NOTIFY_NEW_COMM']           = 'Повідомляти про нові коментарі';
$_LANG['CONFIG_NOTIFY']             = 'Налаштування повідомлень';
$_LANG['YOU_NEED']                  = 'У вас не вистачає';
$_LANG['KARMS']                     = 'карми';
$_LANG['TO_ADD_COMM']               = 'додати коментар';
$_LANG['NEED']                      = 'Потрібно';
$_LANG['HAS']                       = 'є';
$_LANG['YOU_HAVENT_ACCESS_TEXT']    = 'У вас немає прав для додавання коментарів. Зверніться до адміністрації сайту.';
$_LANG['LINK_TO_COMMENT']           = 'Посилання на коментар';
$_LANG['BAD_COMMENT']               = 'Поганий коментар';
$_LANG['GOOD_COMMENT']              = 'Хороший коментар';
$_LANG['SHOW_COMMENT']              = 'показати коментар';
$_LANG['REPLY']                     = 'Відповісти';
$_LANG['DELETE_BRANCH']             = 'Видалити гілку';
$_LANG['NOT_COMMENT_TEXT']          = 'Немає коментарів. Ваш буде першим!';
$_LANG['RSS']                       = 'RSS-стрічка';
$_LANG['RSS_COMM']                  = 'RSS-стрічка коментарів';
$_LANG['LOADING_COMM']              = 'Завантаження коментарів';
$_LANG['ADD_COMM']                  = 'Додати коментар';
$_LANG['SUBSCRIBE_TO_NEW']          = 'Підписатися на нові';
$_LANG['UNSUBSCRIBE']               = 'Припинити підписку';
$_LANG['EDIT_COMMENT']              = 'Редагувати коментар';
$_LANG['CONFIRM_DEL_COMMENT']       = 'Видалити коментар?';
$_LANG['COMMENT_IN_LINK']           = 'Ви прийшли на сторінку за цим посиланням';
?>
