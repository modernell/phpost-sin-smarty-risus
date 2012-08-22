<?php
/**
 * Cargar resultados
 */
function result_array($result)
{
	if(!is_resource($result)) return false;
	while($row = mysql_fetch_assoc($result)) $array[] = $row;
	return $array;
}

/**
 * Nueva forma de conectar a la base de datos
 */
// Conectamos al servidor
$db_link = mysql_connect($db['hostname'], $db['username'], $db['password']);

// Seleccionar base de datos
if($db_link)
{
    if(!mysql_select_db($db['database'], $db_link))
    {
        exit('<title>Error</title><body style="clear: both;background: #F6F6F6;padding: 2em 2em 1em;border: 1px solid #E7E7E7;-moz-border-radius: 5px;-webkit-border-radius: 5px;-o-border-radius: 5px;border-radius: 5px;"><h2 align="center" style="color:#222; font-size:25px; font-family:Century Gothic;">Error <br /><br />No se ha podido seleccionar la base de datos ' . $db['database'] .' </h2></body>');
    }
    
	// Asignar codificación
	mysql_query("set names 'utf8'", $db_link);
	mysql_query("set character set utf8", $db_link);

}
else
{
    exit('<title>Error</title><body style="clear: both;background: #F6F6F6;padding: 2em 2em 1em;border: 1px solid #E7E7E7;-moz-border-radius: 5px;-webkit-border-radius: 5px;-o-border-radius: 5px;border-radius: 5px;"><h2 align="center" style="color:#222; font-size:25px; font-family:Century Gothic;">Error <br /><br />No se pudo establecer la conexi&oacute;n a la base de datos </h2></body>');
}
// Borramos la variable por seguridad
unset($db);