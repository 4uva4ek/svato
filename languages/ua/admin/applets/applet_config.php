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

$_LANG['AD_CONFIG_SITE_ERROR']                      = 'Файл /includes/config.inc.php недоступний для запису';
$_LANG['AD_SITE']                                   = 'Сайт';
$_LANG['AD_DESIGN']                                 = 'Дизайн';
$_LANG['AD_TIME']                                   = 'Час';
$_LANG['AD_DB']                                     = 'База даних';
$_LANG['AD_POST']                                   = 'Пошта';
$_LANG['AD_PATHWAY']                                = 'Глибиномір';
$_LANG['AD_SECURITY']                               = 'Безпека';
$_LANG['AD_SITENAME']                               = 'Назва сайту';
$_LANG['AD_USE_HEADER']                             = 'Використовується в заголовках сторінок';
$_LANG['AD_TAGE_ADD']                               = 'Додавати заголовок сторінки (тег title) назву сайту:';
$_LANG['AD_TAGE_ADD_PAGINATION']                    = 'Додавати заголовок сторінки (тег title) при пагинации номери сторінок:';
$_LANG['AD_SITE_LANGUAGE_CHANGE']                   = 'Зміна мови інтерфейсу на сайті:';
$_LANG['AD_VIEW_FORM_LANGUAGE_CHANGE']              = 'Показ форми і можливість зміни мови інтерфейсу на сайті';
$_LANG['AD_SITE_ON']                                = 'Сайт працює:';
$_LANG['AD_ONLY_ADMINS']                            = 'Відключений сайт видно тільки адміністраторам';
$_LANG['AD_DEBUG_ON']                               = 'Включити режим відладки:';
$_LANG['AD_WIEW_DB_ERRORS']                         = 'Показує помилки бази даних і тексти запитів';
$_LANG['AD_WHY_STOP']                               = 'Причина зупинки роботи:';
$_LANG['AD_VIEW_WHY_STOP']                          = 'Відображається на головній сторінці<br/>при відключенні сайту';
$_LANG['AD_WATERMARK']                              = 'Водяний знак для фотографій:';
$_LANG['AD_WATERMARK_NAME']                         = 'Назва зображення в папці /images/';
$_LANG['AD_QUICK_CONFIG']                           = 'Швидка настройка:';
$_LANG['AD_MODULE_CONFIG']                          = 'Якщо увімкнуто, на сайті заголовки модулів забезпечуються посиланнями &quot;Налаштувати&quot;.';
$_LANG['AD_MAIN_PAGE']                              = 'Заголовок сторінки:';
$_LANG['AD_MAIN_SITENAME']                          = 'Якщо не вказано, буде збігатися з назвою сайту';
$_LANG['AD_BROWSER_TITLE']                          = 'Показується в заголовку вікна браузера';
$_LANG['AD_KEY_WORDS']                              = 'Ключові слова:';
$_LANG['AD_WHAT_KEY_WORDS']                         = 'Як підібрати ключові слова?';
$_LANG['AD_DESCRIPTION']                            = 'Опис:';
$_LANG['AD_WHAT_DESCRIPTION']                       = 'Як правильно скласти опис?';
$_LANG['AD_MAIN_PAGE_COMPONENT']                    = 'Компонент на головній сторінці:';
$_LANG['AD_ONLY_MODULES']                           = '-- Без компонента, тільки модулі --';
$_LANG['AD_GATE_PAGE']                              = 'Вхідна сторінка:';
$_LANG['AD_FIRST_VISIT']                            = 'Показується при першому відвідуванні сайту';
$_LANG['AD_FIRST_VISIT_TEMPLATE']                   = 'Файл: <strong>/templates/&lt;ваш шаблон&gt;/splash/splash.php</strong>';
$_LANG['AD_TEMPLATE_FOLDER']                        = 'Вміст папки &quot;/templates&quot;';
$_LANG['AD_TEMPLATE_INFO']                          = 'Автор шаблона: "%s";<br>шаблонизатор - "%s";<br>розширення файлів - "%s"';
$_LANG['AD_SEARCH_RESULT']                          = 'Підсвічування результатів пошуку';
$_LANG['AD_TIME_ARREA']                             = 'Часова зона:';
$_LANG['AD_TIME_SLIP']                              = 'Зміщення у годинах:';
$_LANG['AD_MYSQL_CONFIG']                           = 'Всі реквізити MySQL налаштовуються у файлі /includes/config.inc.php';
$_LANG['AD_DB_SIZE']                                = 'Розмір бази даних (приблизно)';
$_LANG['AD_DB_SIZE_ERROR']                          = 'Неможливо визначити';
$_LANG['AD_SITE_EMAIL']                             = 'E-mail сайту:';
$_LANG['AD_SITE_EMAIL_POST']                        = 'Адресу від імені якого будуть розсилатися повідомлення користувачам';
$_LANG['AD_SENDER_EMAIL']                           = 'Назва відправника:';
$_LANG['AD_IF_NOT_HANDLER']                         = 'Якщо не вказано, вказується назва сайту';
$_LANG['AD_SEND_METHOD']                            = 'Спосіб відправки:';
$_LANG['AD_PHP_MAILER']                             = 'Функція mail в PHP';
$_LANG['AD_SEND_MAILER']                            = 'Sendmail';
$_LANG['AD_SMTP_MAILER']                            = 'SMTP - сервер';
$_LANG['AD_ENCRYPTING']                             = 'Кодування:';
$_LANG['AD_SMTP_LOGIN']                             = 'SMTP авторизація:';
$_LANG['AD_SMTP_USER']                              = 'SMTP користувач:';
$_LANG['AD_IF_CHANGE_USER']                         = "ім'я користувача ви можете змінити у файлі /includes/config.inc.php";
$_LANG['AD_SMTP_PASS']                              = 'SMTP пароль:';
$_LANG['AD_IF_CHANGE_PASS']                         = 'пароль ви можете змінити у файлі /includes/config.inc.php';
$_LANG['AD_SMTP_HOST']                              = 'хост SMTP:';
$_LANG['AD_SOME_HOST']                              = 'Можна вказати кілька, через крапку з комою, в порядку пріоритету';
$_LANG['AD_SMTP_PORT']                              = 'SMTP порт:';
$_LANG['AD_VIEW_PATHWAY']                           = 'Показувати глибиномір?';
$_LANG['AD_PATH_TO_CATEGORY']                       = 'Відтворюєє шлях до розділу, <br/>в якому знаходиться відвідувач';
$_LANG['AD_MAINPAGE_PATHWAY']                       = 'Глибиномір на головній сторінці:';
$_LANG['AD_PAGE_PATHWAY']                           = 'Поточна сторінка в глибиномірі :';
$_LANG['AD_PAGE_PATHWAY_LINK']                      = 'Посиланням';
$_LANG['AD_PAGE_PATHWAY_TEXT']                      = 'Текстом';
$_LANG['AD_IP_ADMIN']                               = 'IP адреси, з яких дозволений доступ в адмінку:';
$_LANG['AD_IP_COMMA']                               = 'Введіть ip адреси розділені комами, з яких дозволений доступ в адмінку. Якщо не задані, доступ дозволено всім.';
$_LANG['AD_ONLINESTATS']                            = 'Облік online користувачів';
$_LANG['AD_NO_ONLINESTATS']                         = 'не вести облік';
$_LANG['AD_YES_ONLINESTATS']                        = 'очищати статистику при кожному оновленні сторінки';
$_LANG['AD_CRON_ONLINESTATS']                       = 'очищати статистику по CRON (завдання "clearOnlineUsers")';
$_LANG['AD_ATTENTION']                              = '<strong>Увага:</strong> після конфігурування в цілях безпеки необхідно змінити власника файла /includes/config.inc.php і виставити права доступу на нього 644.<br /> Так само звертаємо Вашу увагу: після повної установки сайту на сервері необхідно виставити права доступу <strong>644 для всіх файлів</strong> і <strong>755 для всіх каталогів,</strong> крім директорій завантаження файлів. Крім того, переконайтеся, що власник файлів сайту - користувач, відмінний від того, під яким працює web-сервер і інтерпретатор php.';

?>