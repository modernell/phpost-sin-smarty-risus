<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * El footer permite mostrar la plantilla
 *
 * @name    footer.php
 * @author  PHPost Team
 */

/*
 * -------------------------------------------------------------------
 *  Realizamos tareas para mostrar la plantilla
 * -------------------------------------------------------------------
 */
    // P�gina solicitada
    $smarty->assign("tsPage",$tsPage);
    $tsPage=$tsPage;

    // 
    $smarty_next = false;
    
    
    // Verificamos si la plantilla existe 
    // Si no existe mostramos la que est� en default
    if(!$smarty->template_exists("t.$tsPage.tpl"))
    {
    	$smarty->template_dir = TS_ROOT.DIRECTORY_SEPARATOR.'themes'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'templates';
    	if($smarty->template_exists("t.$tsPage.tpl")) $smarty_next = true;
    } else $smarty_next = true;
    
    
    // Aqui vamos llamando el template segun la pagina solicitada - esta parte es como el enlace del script y el theme donde se meustra el resultado
    if($smarty_next == true) include_once(TS_THEME."t.$tsPage.php");
    else die("0: Lo sentimos, Error al cargar la plantilla del theme. Contacte al administrador");
        // Mostramos la plantilla
//    if($smarty_next == true) $smarty->display("t.$tsPage.tpl");
//    else die("0: Lo sentimos, se produjo un error al cargar la plantilla. Contacte al administrador");
    