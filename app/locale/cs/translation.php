<?php

// formulář login do administrace
define("ADMIN_LOGIN_HEADER", 'Přihlášení');
define("ADMIN_LOGIN_EMAIL", 'Email');
define("ADMIN_LOGIN_EMAIL_REQ", 'Prosím vyplňte Váš login.');
define("ADMIN_LOGIN_PASS", 'Heslo');
define("ADMIN_LOGIN_PASS_REQ", 'Prosím vyplňte heslo');
define("ADMIN_LOGIN_REMEMBER_ME", 'Zapamatuj si mě');
define("ADMIN_LOGIN_LOGIN", 'Přihlásit');
define("ADMIN_LOGIN_EMAIL_PLACEHOLDER", 'Email');
define("ADMIN_LOGIN_PASS_PLACEHOLDER", 'Heslo');
define("ADMIN_LOGIN_FAILED", 'Neplatné jméno nebo heslo');
define("ADMIN_LOGIN_UNLOGGED", 'Odhlášení proběhlo v pořádku.');

// položky menu
define("MENU_TITLE", 'Hlavní nabídka');
define("MENU_DASHBOARD", 'Dashboard');
define("MENU_HEADER", 'Hlavička');
define("MENU_LOGO", 'Slider');
define("MENU_MENU", 'Nabídka');
define("MENU_BLOCK", 'Bloky');
define("MENU_FOOTER", 'Patička');
define("MENU_USERS", 'Uživatelé');
define("MENU_SETTINGS", 'Nastavení');

// admin - users list
define("USER_TITLE", 'Uživatelé');
define("USER_INFO_TEXT", "Zde je možné spravovat přístup uživatelů do systému. Je možmé uživatele přidávat, odebírat, aktivaovat nebo odebírat. <br /><br />
							Přihlašovací jméno uživatele je jeho emailová adresa, tím se zaručí jedinečnost bez duplicit uživatelů. Mějte prosím, na
							paměti, že veškeré změny jsou nevratné!");
define("USER_TABLE_HEADER_LOGIN", "Login");
define("USER_TABLE_HEADER_ROLE", "Role");
define("USER_TABLE_HEADER_ACTIVE", "Aktivní");
define("USER_TABLE_HEADER_LAST_LOGIN", "Poslední přihlášení");
define("USER_TABLE_HEADER_REGISTERED_DATE", "Datum registrace");
define("USER_DELETED", "Uživatel byl smazán");
define("USER_ADDED", "Uživatel přidán");
define("USER_EDITED", "Uživatel upraven");
define("USER_DELETED_FAILED", "Uživatele se nepovedlo smazat, opakujte později.");
define("USER_DELETE", 'Odstranit uživatele');
define("USER_EDIT", 'Editovat uživatele');
define("USER_ADD_USER", 'Přidat uživatele');
define("USER_CONFIRM_DELETE_TITLE", 'Smazání uživatele');
define("USER_CONFIRM_DELETE", 'Opravdu smazat uživatele?');
define("USER_CONFIRM_DELETE_CANCEL", 'Zpět');
define("USER_CONFIRM_DELETE_OK", 'Smazat');
define("USER_ERROR_ACTIVE_SWITCH", 'Došlo k chybě při komunikaci ze serverem, opakujte prosím později.');
// admin - user edit
define("USER_EDIT_FORM_ADD", 'Přidání nového uživatele');
define("USER_EDIT_FORM_EDIT", 'Editace uživatele %s');
define("USER_EDIT_EMAIL_LABEL", 'Email');
define("USER_EDIT_EMAIL_REQ", 'Položka email je povinná!');
define("USER_EDIT_EMAIL_VALIDATION", 'Vložte platnou emailovou adresu!');
define("USER_EDIT_PASS_LABEL", 'Heslo');
define("USER_EDIT_PASS_REQ", 'Položka heslo je povinná!');
define("USER_EDIT_PASS_AGAIN_LABEL", 'Potvrzení hesla');
define("USER_EDIT_PASS_AGAIN_REQ", 'Položka potvrzení hesla je povinná!');
define("USER_EDIT_ROLE_LABEL", 'Role');
define("USER_EDIT_ACTIVE_LABEL", 'Aktivní');
define("USER_EDIT_SAVE_BTN_LABEL", 'Uložit');
define("USER_EDIT_BACK_BTN_LABEL", 'Zpět');
define("USER_EDIT_SAVE_FAILED", 'Nepovedlo se zpracovat změny, opakujte prosím později');

// user roles - select
define("USER_ROLE_LAYOUT_CHANGER", "Plná práva");
define("USER_ROLE_CONTENT_CHANGER", "Uživatel může měnit obsah");
define("USER_ROLE_GUEST", "Host");
define("USER_ROLE_ADMINISTRATOR", "Administrátor");

// webconfig
define("WEBCONFIG_TITLE", "Nastavení webu");
define("WEBCONFIG_TITLE_INFO", "Zde je možné konfigurovat rozložená webu, jeho šířku, případně vložení Google Analitics. ");
define("WEBCONFIG_WEB_NAME", "Název webu");
define("WEBCONFIG_WEB_NAME_INFO", "Tento název bude zobrazen v hlavičce prohlížeče. Je taktéž důležitý pro vyhledavače");
define("WEBCONFIG_WEB_WIDTH", "Šířka webu");
define("WEBCONFIG_WEB_WIDTH_INFO", "Určuje šířku webu v prohlížeči. Tento údaj nemá vliv na responzivitu webu.");
define("WEBCONFIG_WEB_FAVICON", "Ikona webu");
define("WEBCONFIG_WEB_FAVICON_INFO", "Ikona se zobrazuje v adresním řádku, na panelu se stránkou a v nabídce záložek/oblíbených položek.
										Ikona musí mít, pro správné zobrazení, určitá pravidla. nejčastěji jde o ikonu 16x16 pixelů.
										Formát musí být ICO (ikona).");
define("WEBCONFIG_WEB_FAVICON_FORMAT", "Obrázek musí být ikona, formát ICO!");
define("WEBCONFIG_WEB_GOOGLE_ANALYTICS", "Google Analytics");
define("WEBCONFIG_WEB_GOOGLE_ANALYTICS_INFO", "Google Analytics Vám pomáhá identifikovat odkad přišel návštěvník Vaěich stránek,
												jak dlouho se zdržel a co ho na Vašich stránkách zajímalo nejvíce. Kód Google Analytics je
												Javascriptový kód, který se vkládá přímo do každé stránky. Více o registraci a použití se
												můžete dočíst zde:
												<a target='_blank' href='https://www.google.com/analytics/'>https://www.google.com/analytics/</a>");
define("WEBCONFIG_WEB_SAVE_SUCCESS", "Změny byly v pořádku uloženy");
define("WEBCONFIG_WEB_BACKGROUND_COLOR", "Barva pozadí");
define("WEBCONFIG_WEB_BACKGROUND_COLOR_INFO", "Zde můžete vybrat barvu pozadí pro Váš web. Barva bude použita na celý podklad webu.
												Pro bílou (žádnou barvu) smažte hodnotu z pole.");

// modal window
define("MODAL_BUTTON_OK", 'OK');
define("MODAL_WINDOWS_WARNING_TITLE", 'Varování');





