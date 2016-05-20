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
define("MENU_MENU_BLOCK", 'Nabídka vs bloky');
define("MENU_CONTACT_FORM", 'Kontaktní formulář');
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
define("WEBCONFIG_WEBMUTATION", "Jazyková mutace");
define("WEBCONFIG_WEBMUTATION_INFO", "Právě editované nastavení bude použito pro zvolenou jazykovou mutaci. Pokud máte více jazykových mutací
										je nutné provést toto nastavení pro všechny jazykové mutace.");
define("WEBCONFIG_TITLE", "Nastavení webu");
define("WEBCONFIG_TITLE_INFO", "Zde je možné konfigurovat rozložená webu, jeho šířku, případně vložení Google Analitics. ");
define("WEBCONFIG_WEB_NAME", "Název webu");
define("WEBCONFIG_WEB_NAME_INFO", "Tento název bude zobrazen v hlavičce prohlížeče. Je taktéž důležitý pro vyhledavače");
define("WEBCONFIG_WEB_KEYWORDS", "Klíčová slova");
define("WEBCONFIG_WEB_KEYWORDS_INFO", "Jednotlivá klíčová slova od sebe oddělujte čárkou (,).
										<b>Poznámka:</b> klíčová slova v meta tagu keywords dnešní vyhledávače ignorují, ale i tak se
										doporučuje klíčova slova použít");

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
define("WEBCONFIG_WEB_MENU_SHOW", "Zobrazit hlavní nabídku");
define("WEBCONFIG_WEB_MENU_SHOW_INFO", "Určuje zda bude zobrazena hlavní nabídka (menu).");
define("WEBCONFIG_WEB_MENU_BACKGROUND_COLOR", "Barva hlavní nabídky");
define("WEBCONFIG_WEB_MENU_BACKGROUND_COLOR_INFO", "Zde můžete vybrat barvu hlavní nabídky (menu). Pro výchozí hodnotu smažte.");
define("WEBCONFIG_WEB_MENU_LINK_COLOR", "Barva odkazů v hlavní nabídce");
define("WEBCONFIG_WEB_MENU_LINK_COLOR_INFO", "Zde můžete vybrat barvu pro odkazy v nabídce. Pro výchozí hodnotu smažte.");

define("WEBCONFIG_SETTINGS_SHOW_HOME", 'Zobrazovat odkaz domů');
define("WEBCONFIG_SETTINGS_SHOW_HOME_INFO", 'Na první pozici v menu zobrazí domeček, který bude odkazovat na úvodní stránku.');
define("WEBCONFIG_SETTINGS_LANG_DEPENDS", 'Nastavení závislé na jazyku');
define("WEBCONFIG_SETTINGS_LANG_COMMON", 'Obecné nástavení');

// modal window
define("MODAL_BUTTON_OK", 'OK');
define("MODAL_WINDOWS_WARNING_TITLE", 'Varování');

// slider
define("SLIDER_SETTINGS", "Nastavení obrázku (slider)");
define("SLIDER_SETTINGS_INFO", "Slider může být buď jeden obrázek nebo několik obrázků, které se budou náhodně střídat v záhlaví webové stránky. <br />
								<b>Důležité: </b> Pokud bude nahráváno více obrázků je <b>nutné</b>, aby byly všechny obrázky ve stejném rozlišení.");
define("SLIDER_SETTINGS_PICS", "Nahrát obrázky slideru");
define("SLIDER_SETTINGS_PICS_INFO", "Obrázky je možné nahrávat po jednom nebo po více najednou.");
define("SLIDER_SETTINGS_CURRENT_PICS", "Nynější obrázky slideru");
define("SLIDER_SETTINGS_SAVE_BTN_LABEL", 'Uložit');
define("SLIDER_SETTINGS_PIC_FORMAT", "Jsou podporovány jen obrázky (BMP, JPG, PNG)! Nahrajte prosím obrázky v tomto formátu.");
define("SLIDER_SETTINGS_CONFIRM_MODAL_DELETE_TITLE", 'Smazaní položky slideru');
define("SLIDER_SETTINGS_CONFIRM_MODAL_DELETE_MSG", 'Opravdu chcete smazat položku slideru?');
define("SLIDER_SETTINGS_CONFIRM_MODAL_OK", 'Smazat');
define("SLIDER_SETTINGS_CONFIRM_MODAL_CANCEL", 'Zpět');
define("SLIDER_SETTINGS_DELETE_TITLE", 'Smazání obrázku');
define("SLIDER_SETTINGS_SLIDER_ACTIVE_LABEL", 'Zapnout slider');
define("SLIDER_SETTINGS_SLIDER_ACTIVE_INFO", 'Zapíná nebo vypíná slider v záhlaví stránky.');
define("SLIDER_SETTINGS_SLIDER_SLIDING_LABEL", 'Zapnout slideshow');
define("SLIDER_SETTINGS_SLIDER_SLIDING_INFO", 'Pokud bude slideshow zapnuta budou se obrázky náhodně střídat ve Vámi zvoleném intervalu.
											Pokud zůstane slideshow vypnuta, bude vždy zobrazen staticky jen jeden obrázek. Ovšem pokud
											bude ve slideru nahráno více obrázku bude při každém obnovení stránky zobrazen obrázek jiný.');
define("SLIDER_SETTINGS_SLIDER_ARROWS_LABEL", 'Zobrazit ovládání slideru');
define("SLIDER_SETTINGS_SLIDER_ARROWS_INFO", 'Zobrazí šipky na krajích slideru, se kterými je možné přpínat obrázky ručně.');

define("SLIDER_SETTINGS_SLIDER_WITDH", 'Šířka slideru');
define("SLIDER_SETTINGS_SLIDER_WITDH_INFO", 'Udává hodnotu jak široký má být slider vůči obsahu. <br />
											100% = bude zabírat celou šírku těla stránek <br />
											50%  = bude zabírat polovinu šířky stránek <br />
											<b>Poznámka:</b> 100% je výchozí a nejvíce chtěné nastavení pro většinu uživatelů');
define("SLIDER_SETTINGS_TIMING", 'Časování slideru (s)');
define("SLIDER_SETTINGS_TIMING_INFO", 'Číslo určuje jak často se bude vyměnovat obrázek ve slideru. Hodnota je udávána ve vteřinách.');
define("SLIDER_SETTINGS_SAVE_OK", "Změny byly úspěšně uloženy.");


// menu
define("MENU_SETTINGS_TITLE", 'Konfigurace menu');
define("MENU_SETTINGS_INFO", 'V této sekci je možno nakonfigurovat menu a jeho položky. Z hlediska přehlednosti není možné vnořovat do více
								než dvou úrovní.');
define("MENU_SETTINGS_ITEM_NAME", 'Název položky v menu');
define("MENU_SETTINGS_ITEM_LINK", 'Odkaz v URL');
define("MENU_SETTINGS_ITEM_LINK_ADDED", 'Položka byla úspěšně vložena');
define("MENU_SETTINGS_ITEM_LINK_INFO", 'Název položky menu v URL. <b>DŮLEŽITÉ pro SEO</b>.');

// constact form
define("CONTACT_FORM_SETTING_TITLE", 'Nastavení kontakního formuláře');
define("CONTACT_FORM_SETTING_TITLE_INFO", 'Zde je možné nastavit některé vlastnosti kontakního fomuláře.');
define("CONTACT_FORM_NAME", 'Vaše jméno');
define("CONTACT_FORM_NAME_REQ", 'Pole jméno nesmí být prázdné!');
define("CONTACT_FORM_EMAIL", 'Kontaktní email');
define("CONTACT_FORM_EMAIL_REQ", 'Pole email nesmí být prázdné!');
define("CONTACT_FORM_SUBJECT", 'Předmět');
define("CONTACT_FORM_SUBJECT_REQ", 'Pole předmět nesmí být prázdné');
define("CONTACT_FORM_ATTACHMENT", 'Příloha');
define("CONTACT_FORM_ATTACHMENT_INFO", 'Umožní do kontaktního fomuláře vložit uživateli přílohu a odeslat ji spolu s emailem.');
define("CONTACT_FORM_IN_MENU", 'Zobrazit odkaz na formulář v menu');
define("CONTACT_FORM_IN_MENU_INFO", 'V menu stránek bude zobrazena položka "kontaktní formulář, odkazující na stránku s kontakním formulářem.');
define("CONTACT_FORM_TEXT", 'Vaše zpráva');
define("CONTACT_FORM_TEXT_REQ", 'Tělo zprávy nesmí být prázdné');
define("CONTACT_FORM_BUTTON_CONFIRM", 'Odeslat');

define("CONTACT_FORM_SETTING_BACKGROUND_COLOR", 'Barva pozadí kontaktního formuláře');
define("CONTACT_FORM_SETTING_COLOR", 'Barva textu kontaktního formuláře');
define("CONTACT_FORM_SETTING_ATTACHMENT", 'Umožnit poslat přílohu');
define("CONTACT_FORM_SETTING_SAVE", 'Uložit');
define("CONTACT_FORM_SETTING_COMPLETE_SAVE", 'Nastavení kontaktního formuláře bylo uloženo');

// footer
define("FOOTER_CONTENT", 'Obsah patičky');
define("FOOTER_BUTTON_SAVE", "Uložit");
define("FOOTER_TITLE", "Nastavení patičky");
define("FOOTER_INFO", "Patička slouží k zobrazení určitého obsahu na každé stránce. ");
define("FOOTER_CONTACT", "Zobrazit kontaktní formulář v poatičce stránek");
define("FOOTER_CONTENT_TEXT", 'Obsah patičky můžete naformátovat pomocí WYSIWYG editoru. Pokud bude chtít zobrazit v patičce zobrazit obrázky
								je nutné je prvně nahrát a následně vložit URL obrázku do editoru.');
define("FOOTER_CONTENT_PICS", 'Zde nahrajde obrázky, které byste rádi vložily do patičky.');
define("FOOTER_BACKGROUND_COLOR", 'Barva pozadí patičky');
define("FOOTER_SETTING_COLOR", 'Barva textu patičky');
define("FOOTER_SETTING_SAVED", 'Nastavení patičky bylo uloženo');
define("FOOTER_PIC_FORMAT", "Jsou podporovány jen obrázky (BMP, JPG, PNG)! Nahrajte prosím obrázky v tomto formátu.");
define("FOOTER_PIC_DELETE", 'Odstranění obrázku');
define("FOOTER_PIC_DELETED", 'Obrázek byl úspěšně odstraněn');
define("FOOTER_CONFIRM_DELETE_TITLE", 'Smazání obrázku');
define("FOOTER_CONFIRM_DELETE", 'Opravdu smazat obrázek?');
define("FOOTER_CONFIRM_DELETE_CANCEL", 'Zpět');
define("FOOTER_CONFIRM_DELETE_OK", 'Smazat');