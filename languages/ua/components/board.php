<?php
/******************************************************************************/
//                                                                            //
//                           InstantCMS v1.10.3                               //
//                        http://www.instantcms.ru/                           //
//                                                                            //
//                   written by InstantCMS Team, 2007-2013                    //
//                produced by InstantSoft, (www.instantsoft.ru)               //
//                                                                            //
//                        LICENSED BY GNU/GPL v2                              //
//                                                                            //
/******************************************************************************/

if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }
/*
 * Created by Firs Yuriy
 * e-mail: firs.yura@gmail.com
 * site: firs.org.ua
 */
$_LANG['BOARD']                 ='Дошка оголошень';
$_LANG['ADD_ADV']               ='Додати оголошення';
$_LANG['CAT_NOT_FOUND']         ='Рубрику не знайдено';
$_LANG['CAT_BOARD']             ='Категорія';
$_LANG['MAX_VALUE_OF_ADD_ADV']  ='Досягнута межа додавань за добу. Ви зможете додати оголошення в цю рубрику через 24 години.';
$_LANG['YOU_CANT_ADD_ADV']      ='Ви не можете додавати оголошення до цієї рубрики';
$_LANG['YOU_CANT_ADD_ADV_ANY']  ='Ви не можете додавати оголошення';

$_LANG['NEED_TITLE']            ='Необхідно вказати заголовок оголошення!';
$_LANG['NEED_TEXT_ADV']         ='Необхідно вказати текст оголошення!';
$_LANG['NEED_CAT_ADV']          ='Необхідно вибрати рубрику!';
$_LANG['NEED_CITY']             ='Необхідно вказати місто!';
$_LANG['ERR_CAPTCHA']           ='Неправильно вказано код з картинки!';
$_LANG['INFO_CAT_NO_PHOTO']     ='До оголошень цієї рубрики заборонено прикріплювати фотоматеріали';

$_LANG['ADV_IS_ADDED']          ='Оголошення успішно додано.';
$_LANG['ADV_PREMODER_TEXT']     ='Оголошення буде опубліковано після перевірки адміністратором.';

$_LANG['MSG_ADV_SUBMIT']   ='Користувач %user% додав оголошення "<b>%link%</b>".'."\n".'Необхідна модерація.';
$_LANG['MSG_ADV_EDITED']   ='Користувач %user% змінив оголошення "<b>%link%</b>".'."\n".'Необхідна модерація.';
$_LANG['MSG_ADV_ACCEPTED'] ='Ваше оголошення "%link%" пройшло модерацію та опубліковане.';

$_LANG['ADV_IS_MODER']    ='Оголошення знаходиться на модерації';
$_LANG['ADV_IS_EXTEND']   ='Оголошення протерміноване';
$_LANG['ADV_IS_EXTEND']   ='Оголошення протерміноване';
$_LANG['ADV_IS_ACCEPTED'] ='Оголошення опубліковане';
$_LANG['WAIT_MODER']      ='Очікує модерації';
$_LANG['ADV_EXTEND_INFO'] ='Протерміноване';

$_LANG['EDIT_ADV']               ='Редагувати оголошення';
$_LANG['REPEAT_EDIT']            ='Повторити редагування';
$_LANG['ADV_MODIFIED']           ='Оголошення змінено.';
$_LANG['ADV_EXTEND']             ='Ви можете продовжити оголошення на';
$_LANG['ADV_EXTEND_SROK']        ='Натиснувши "зберегти оголошення", ви продовжите термін публікації на';
$_LANG['ADV_EDIT_PREMODER_TEXT'] ='Оголошення приховано і буде знову опубліковано після перевірки адміністратором.';

$_LANG['DELETE_ADV']             ='Видалити оголошення';
$_LANG['DELETING_ADV']           ='Видалення оголошення';
$_LANG['YOU_SURE_DELETE_ADV']    ='Ви дійсно бажаєте видалити оголошення';
$_LANG['ADV_IS_DELETED']         ='Оголошення успішно видалено.';
//Template
$_LANG['BOARD_GUEST']            ='Гість';
$_LANG['TITLE']                  ='Заголовок';
$_LANG['CITY']                   ='Місто';
$_LANG['TEXT_ADV']               ='Текст оголошення';
$_LANG['PERIOD_PUBL']            ='Термін публікації';
$_LANG['DAYS']                   ='днів';
$_LANG['DAYS_TO']                ='починаючи з';
$_LANG['PHOTO']                  ='Малюнок';
$_LANG['DEL_PHOTO']              ='Видалити фотографію';
$_LANG['SELECT_CAT']             ='оберіть рубрику';
$_LANG['SAVE_ADV']               ='Зберегти оголошення';
$_LANG['WRITE_MESS_TO_AVTOR']    ='Написати повідомлення автору';
$_LANG['ALL_AVTOR_ADVS']         ='Всі оголошення автора';
$_LANG['ADVS_NOT_FOUND']         ='Оголошення не знайдені.';
$_LANG['ADD_ADV_TO_CAT']         ='Додати оголошення до цієї рубрики';
$_LANG['TYPE']                   ='Тип';
$_LANG['ALL_TYPE']               ='Всі типи';
$_LANG['ALL_CITY']               ='міста';
$_LANG['ORDER']                  ='Сортувати';
$_LANG['ORDERBY_TITLE']          ='За алфавітом';
$_LANG['ORDERBY_DATE']           ='За датою';
$_LANG['ORDERBY_HITS']           ='За переглядами';
$_LANG['ORDERBY_TYPE']           ='За типом';
$_LANG['ORDERBY_AVTOR']          ='За автором';
$_LANG['ORDERBY_DESC']           ='за спаданням';
$_LANG['ORDERBY_ASC']            ='за зростанням';
$_LANG['FILTER']                 ='Фільтр';
$_LANG['MARK_AS_VIP']            ='Зробити VIP на';
$_LANG['EXTEND_MARK_AS_VIP']     ='Продовжити VIP на';
$_LANG['DELETE_MARK_AS_VIP']     ='видалити VIP-статус';
$_LANG['VIP_STATUS']             ='VIP-статус';
$_LANG['VIP_STATUS_HINT']        ='VIP-оголошення виділяються кольором і завжди знаходяться на початку списку';
$_LANG['VIP_BUY_ERROR']          ='На вашому балансі не достатньо коштів для покупки VIP-статусу на зазначений термін';
$_LANG['VIP_ITEM']               ='VIP-оголошення';
$_LANG['SECUR_SPAM']             ='Захист від спаму';
$_LANG['SECUR_SPAM_TEXT']        ='Введіть символи, зображені на картинці';
$_LANG['DO_NOT_DO']              ='не робити';
$_LANG['LEAVE_AS_IS']            ='залишити як є';
?>