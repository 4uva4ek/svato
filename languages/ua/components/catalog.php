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

$_LANG['CATALOG']           ='Універсальний каталог';

$_LANG['ARTICLES']          ='Записи';
$_LANG['RATING']            ='Рейтинг';
$_LANG['VOTES']             ='Голосів';
$_LANG['YOUR_VOTE']         ='Ваша оцінка';
$_LANG['ORDER_ARTICLES']    ='Сортування записів';
$_LANG['ORDERBY_PRICE']     ='За ціною';
$_LANG['ORDERBY_TITLE']     ='За алфавітом';
$_LANG['ORDERBY_DATE']      ='За датою';
$_LANG['ORDERBY_RATING']    ='За рейтингом';
$_LANG['ORDERBY_HITS']      ='За переглядами';
$_LANG['ORDERBY_DESC']      ='за спаданням';
$_LANG['ORDERBY_ASC']       ='за зростанням';

$_LANG['NEW_RECORDS']       ='Нове в каталозі';

$_LANG['NO_MATCHING_FOUND'] ='Збігів не знайдено.';
$_LANG['SEARCH_IN_CAT']     ='Пошук у каталозі';
$_LANG['NO_CAT_IN_CATALOG'] ='В каталозі немає рубрик або всі рубрики порожні.';
$_LANG['SEARCH_RESULT']     ='Результати пошуку';
$_LANG['FOUNDED']           ='не Знайдено';
$_LANG['CANCEL_SEARCH']     ='Відмінити пошук';
$_LANG['SEARCH_BY_TAG']     ='Пошук по ключовому слову';
$_LANG['MATCHES']           ='збігів';
$_LANG['MATCHE']            ='збіг';
$_LANG['CAT_NOT_FOUND']     ='Рубрика каталога не знайдено.';

$_LANG['ADD_ITEM']          ='Додати запис';
$_LANG['EDIT_ITEM']         ='Редагування запису';
$_LANG['ADDED_BY']          ='Автор запису';
$_LANG['COMMA_SEPARATE']    ='Через кому, якщо кілька';
$_LANG['CAN_MANY']          ='Дозволити вибір кількості';
$_LANG['TYPE_LINK']         ='Введіть посилання';
$_LANG['ITEM_PREMOD_NOTICE'] ='Запис буде опублікована в каталозі після перевірки адміністратором.';
$_LANG['WAIT_MODERATION']   ='Запис очікує модерації';
$_LANG['MODERATION_ACCEPT'] ='Дозволити';
$_LANG['MODERATION_REJECT'] ='Видалити';
$_LANG['MSG_ITEM_SUBMIT']   ='Користувач %user% додав в каталог запис "<b>%link%</b>".'."\n".'Необхідна модерація.';
$_LANG['MSG_ITEM_EDITED']   ='Користувач %user% змінив запис "<b>%link%</b>" в каталозі.'."\n".'Необхідна модерація.';
$_LANG['MSG_ITEM_REJECTED'] ='Ваша запис "%item%" була не прийнята в каталог видалено';
$_LANG['MSG_ITEM_ACCEPTED'] ='Ваша запис "%link%" була опублікована в каталозі';

$_LANG['PRICE']       ='Ціна';
$_LANG['ADD_TO_CART'] ='Додати до кошику';

$_LANG['КОШИК']                  ='Кошик';
$_LANG['DEL_POSITION_FROM_CART'] ='Видалити позицію з кошика?';
$_LANG['CLEAR_CART']             ='Очистити кошик';
$_LANG['ITEM']                   ='Позиція';
$_LANG['CAT']                    ='Категорія';
$_LANG['КІЛЬКІСТЬ']              ='Кількість';
$_LANG['CART_TOTAL']             ='замовлення';
$_LANG['BACK_TO_SHOP']           ='Повернутися в магазин';
$_LANG['CART_ORDER']             ='Оформити замовлення';
$_LANG['NOITEMS_IN_CART']        ='В кошику немає товарів.';
$_LANG['CART_ORDERING']          ='Оформлення замовлення';
$_LANG['TOTAL_PRICE']            ='Підсумкова вартість замовлення';

$_LANG['INFO_CUSTOMER']          ='Інформація покупця';
$_LANG['FIO_CUSTOMER']           ='ПІБ покупця';
$_LANG['ORGANIZATION']           ='Організація';
$_LANG['CONTACT_PHONE']          ='Контактний телефон';
$_LANG['ADRESS_EMAIL']           ='Адреса e-mail';
$_LANG['CUSTOMER_COMMENT']       ='Додаткові відомості';
$_LANG['SUBMIT_ORDER']           ='Відправити замовлення';

$_LANG['EMPTY_NAME']             ="Вкажіть своє ім'я!";
$_LANG['EMPTY_PHONE']            ='Вкажіть контактний телефон!';
$_LANG['ERR_CAPTCHA']            ='Неправильно вказано код з картинки!';

$_LANG['GET_ORDER_FROM_CATALOG'] ='Отримано замовлення з каталогу';
$_LANG['CUSTOMER']               ='ПОКУПЕЦЬ';
$_LANG['FIO']                    ='ПІБ ';
$_LANG['COMPANY']                ='КОМПАНІЯ';
$_LANG['PHONE']                  ='ТЕЛЕФОН';
$_LANG['ПОРЯДОК_COMMENT']        ='ДОДАТКОВО';
$_LANG['ORDER']                  ='ЗАМОВЛЕННЯ';
$_LANG['ORDER_COMPLETE']         ='Замовлення прийнятий';
$_LANG['TOTAL_ORDER_PRICE']      ='Загальна сума замовлення';
$_LANG['EMAIL_SUBJECT']          ='{sitename}: ЗАМОВЛЕННЯ З КАТАЛОГУ';
$_LANG['CUSTOMER_EMAIL_SUBJECT'] ='Ваш замовлення вступив в обробку';
$_LANG['ADMIN_EMAIL_SUBJECT']    ='Новий замовлення';
$_LANG['CUSTOMER_EMAIL_TEXT']    ="Наші менеджери зв'яжуться з вами за вказаним телефоном в найближчий час.";
$_LANG['NEED_TITLE']             ='Необхідно вказати назву';

//Template
$_LANG['ADVICE']                 ='Рада';
$_LANG['ADVICE_TEXT']            ='Ви можете використовувати символи підстановки';
$_LANG['ANY_SEQ_LETTERS']        ='будь-яка послідовність символів';
$_LANG['ANY_ONE_LETTER']         ='один будь-який символ';
$_LANG['FILL_FIELDS']            ='Заповніть поля цілком або частково';
$_LANG['SEARCH_IN_CAT']          ='Знайти в каталозі';
$_LANG['SEARCH_BY_CAT']          ='Пошук по рубриці';
$_LANG['DETAILS']                ='Детальніше';
$_LANG['SEO_KEYWORDS']           ='SEO: Ключові слова';
$_LANG['SEO_KEYWORDS_HINT']      ='Якщо не вказано, буде братися з тегів';
$_LANG['SEO_DESCRIPTION']        ='SEO: Опис';
$_LANG['IS_COMMENTS']            ='Дозволити коментарі';
?>