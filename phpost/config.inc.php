<?php if ( ! defined('TS_HEADER')) exit('No direct script access allowed'); 
/*
| -------------------------------------------------------------------
| AJUSTES DE BASE DE DATOS
| -------------------------------------------------------------------
| Esta variable contendrá los ajustes necesarios para acceder a su base de datos.
| -------------------------------------------------------------------
| EXPLICACIÓN DE VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
*/
$db['hostname'] = 'localhost';
$db['username'] = 'root';
$db['password'] = 'admin';
$db['database'] = 'risus';


/*
 * -------------------------------------------------------------------
 *  Constantes
 * -------------------------------------------------------------------
 */
define('TSCookieName','PPCook');
define('RC_PUK',"6LcXvL0SAAAAAPJkBrro96lnXGZ56TBRExEmVM3L"); //public key recaptcha aqui
define('RC_PIK',"6LcXvL0SAAAAAEg1zizOxJPTjlD0ZtbbzubF2NjE"); //private key recaptcha aqui