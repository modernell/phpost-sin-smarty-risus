<?php
/**
 * Resuelve para la home
 *
 * @name    index.php
 * @author  PHPost Team
 */

/*
 * -------------------------------------------------------------------
 *  Validamos que mostrar home/mi
 * -------------------------------------------------------------------
 */
    // Incluimos header
    include 'header.php';

    // Checamos...
    if($tsCore->settings['c_allow_portal'] == 1 && $tsUser->is_member == true && $_GET['do'] == 'portal')
    {
        // Portal/mi
        include('inc/php/portal.php');
        
    }       
    else 
    {    
        include('inc/php/posts.php');
    }    
//    if($smarty_next == true) include_once(TS_THEME."t.$tsPage.php");
//    else die("0: Lo sentimos, se produjo un error al cargar la plantilla. Contacte al administrador");
    ?>