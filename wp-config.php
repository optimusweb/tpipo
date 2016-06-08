<?php
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Skrypt wp-config.php używa tego pliku podczas instalacji.
 * Nie musisz dokonywać konfiguracji przy pomocy przeglądarki internetowej,
 * możesz też skopiować ten plik, nazwać kopię "wp-config.php"
 * i wpisać wartości ręcznie.
 *
 * Ten plik zawiera konfigurację:
 *
 * * ustawień MySQL-a,
 * * tajnych kluczy,
 * * prefiksu nazw tabel w bazie danych,
 * * ABSPATH.
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/** Nazwa bazy danych, której używać ma WordPress */
define('DB_NAME', 'izing_tpipo');

/** Nazwa użytkownika bazy danych MySQL */
define('DB_USER', 'izing_tpipo');

/** Hasło użytkownika bazy danych MySQL */
define('DB_PASSWORD', 'w1jk8139');

/** Nazwa hosta serwera MySQL */
define('DB_HOST', 'localhost');

/** Kodowanie bazy danych używane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8mb4');

/** Typ porównań w bazie danych. Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',0T_Uz$U -lxf!y-5o{zd|X]cG#?Meh,k%{T4bLnCMFe0cV$xzJ3s-7Y(xwpn*y[');
define('SECURE_AUTH_KEY',  'px4cIns1)SFtV0$sg`sou9vX@_J-/BWM2Xo*TfCt2ce#2+tEE$}6t{OP$t]sKTdH');
define('LOGGED_IN_KEY',    'J$=hffE$.H.>V/5I:#ut;/SX*04=>2Z_r)LSeYg*=OFwzH&, s2%Am%.4<SS[IDU');
define('NONCE_KEY',        '/>/_V9b7l~bsp>9e7F1U)BpzA`u`hDNeM`4!:aT3PU~4|%&dS8jar}E6xBB(~ZG7');
define('AUTH_SALT',        'f KNg&[9Vo~o14_*bts]_?+mT8Yts;xylZf=a kx(Vy FVkLVY}us1W!A5F;{7(w');
define('SECURE_AUTH_SALT', 'Nk+}xw5FmY.=N3*f}-v?eQ/![pP^5fuE=Onb7F.vsBt_0R1|IV T],?$CA(e~-,P');
define('LOGGED_IN_SALT',   '(8.N?><hFZuK8PvhI[ vR9[B(*Ip}S.{_!dO?L)!1;_Vo6QA1Too5<$Eg}- )!e5');
define('NONCE_SALT',       'TSL;tTu*C)w]Ay?a#MIL3V7.tC^,sDN=?x{)a[_d?D.Sn;|~2/(,]W!|E>jWfn-:');

/**#@-*/

/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */
$table_prefix  = 'wp_';

/**
 * Dla programistów: tryb debugowania WordPressa.
 *
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie
 * ostrzeżeń podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG podczas pracy nad nimi.
 *
 * Aby uzyskać informacje o innych stałych, które mogą zostać użyte
 * do debugowania, przejdź na stronę Kodeksu WordPressa.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/** Absolutna ścieżka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Ustawia zmienne WordPressa i dołączane pliki. */
require_once(ABSPATH . 'wp-settings.php');
