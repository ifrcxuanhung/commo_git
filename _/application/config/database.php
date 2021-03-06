<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = '210.211.109.27';
$db['default']['username'] = 'commo_user';
$db['default']['password'] = 'commodata';
$db['default']['database'] = 'data_commo';
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

$db['database3']['hostname'] = '210.211.109.27';
$db['database3']['username'] = 'vndmicom_user1';
$db['database3']['password'] = 'vndmicom';
$db['database3']['database'] = 'vndmicom_data';
$db['database3']['dbdriver'] = 'mysqli';
$db['database3']['dbprefix'] = '';
$db['database3']['pconnect'] = TRUE;
$db['database3']['db_debug'] = TRUE;
$db['database3']['cache_on'] = FALSE;
$db['database3']['cachedir'] = '';
$db['database3']['char_set'] = 'utf8';
$db['database3']['dbcollat'] = 'utf8_general_ci';
$db['database3']['swap_pre'] = '';
$db['database3']['autoinit'] = TRUE;
$db['database3']['stricton'] = FALSE;

$db['database5']['hostname'] = '210.211.109.27';
$db['database5']['username'] = 'imsrt_user1';
$db['database5']['password'] = 'imsrt_pass';
$db['database5']['database'] = 'imsrt_data';
$db['database5']['dbdriver'] = 'mysqli';
$db['database5']['dbprefix'] = '';
$db['database5']['pconnect'] = TRUE;
$db['database5']['db_debug'] = TRUE;
$db['database5']['cache_on'] = FALSE;
$db['database5']['cachedir'] = '';
$db['database5']['char_set'] = 'utf8';
$db['database5']['dbcollat'] = 'utf8_general_ci';
$db['database5']['swap_pre'] = '';
$db['database5']['autoinit'] = TRUE;
$db['database5']['stricton'] = FALSE;

/*Config DB Send Mail*/
$db['default']['hostname_db_mail'] = 'local.itvn.fr';
$db['default']['username_db_mail'] = 'local';
$db['default']['password_db_mail'] = 'ifrcvn';
$db['default']['database_db_mail'] = 'upmd_sendmail';
$db['default']['name_group_mail'] = 'EMAIL_SUBSCRIBE_NEWS';

/* End of file database.php */
/* Location: ./application/config/database.php */