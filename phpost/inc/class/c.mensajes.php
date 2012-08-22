<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Modelo para el control de los mensajes privados
 *
 * @name    c.mensajes.php
 * @author  PHPost Team
 */
class tsMensajes {
    
    var $mensajes = 0; // SIN LEER

	// INSTANCIA DE LA CLASE
	function tsMensajes(){
		global $tsUser;
		// VISITANTE?
		if(empty($tsUser->is_member)) return false;
		// MENSAJES
		$query = mysql_query('SELECT COUNT(mp_id) AS total FROM u_mensajes WHERE mp_to = '.$tsUser->uid.'  AND mp_read_mon_to = 0');
		$data = mysql_fetch_assoc($query);
		
        $this->mensajes = $data['total'];
        // RESPUESTAS
        $query = mysql_query('SELECT COUNT(mp_id) AS total FROM u_mensajes WHERE mp_answer = 1 AND mp_from = '.$tsUser->uid.' AND mp_read_mon_from = 0');
		$data = mysql_fetch_assoc($query);
		
		$this->mensajes = $this->mensajes + $data['total'];
        //
	}
	
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*\
	                           MENSAJES PERSONALES
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /*
        getValid() // Comprobamos si el usuario ingresado es válido para enviar el mensaje.
    */
    function getValid(){
        global $tsCore, $tsUser;
        //
        $para = $tsCore->setSecure(strtolower($_POST['para']));
        //
        if($para == strtolower($tsUser->nick)) return '1';
        //
		$query = mysql_query('SELECT user_id FROM u_miembros WHERE LOWER(user_name) = \''.$tsCore->setSecure($para).'\' LIMIT 1');        
		$exists = mysql_num_rows($query);        
		
        //
        if(empty($exists)) return '2';
        else return '0';
    }
    /**
     * @name newMensaje
     * @access public
     * @param string
     * @return string;
     * @info ENVIA UN NUEVO MENSAJE
    */
    function newMensaje(){
        global $tsCore, $tsUser, $tsCuenta;
        #
		if($tsUser->is_member && $tsUser->info['user_baneado'] == 0 && $tsUser->info['user_activo'] == 1) {
		//ANTI FLOOD ._.
		$antiflood = $tsUser->permisos['goaf']*5;
		$mensajito = $tsCore->setSecure(substr($_POST['mensaje'],0,75), true);
		if(mysql_num_rows(mysql_query('SELECT mp_id FROM `u_mensajes` WHERE (mp_date > \''.(time()-$antiflood).'\' && mp_from = \''.$tsUser->uid.'\') OR (mp_date > \''.(time()-$antiflood*3600).'\' && mp_from = \''.$tsUser->uid.'\' && mp_preview = \''.$mensajito.'\' && `mp_subject` = \''.$tsCore->setSecure($_POST['asunto']).'\') ORDER BY mp_id DESC LIMIT 1'))) die('Espere '.$antiflood.' segundos para continuar'); 
		$tsCore->antiFlood(true, 'mps');
		//
        $para = $tsCore->setSecure($_POST['para'], true);
        $asunto = empty($_POST['asunto']) ? '(sin asunto)' : $tsCore->setSecure($tsCore->parseBadWords($_POST['asunto']), true);
        $mensaje = $tsCore->setSecure(substr($_POST['mensaje'],0,1000), true);
        if(str_replace(array("\n","\t",' '),'',$mensaje) == '') die('Debes ingresar el contenido de tu mensaje.');
        //
        $user_id = $tsUser->getUserID($para);
		// BLOQUEADO
		$block = mysql_num_rows(mysql_query('SELECT bid FROM u_bloqueos WHERE b_user = \''.(int)$user_id.'\' AND b_auser = \''.$tsUser->uid.'\' LIMIT 1'));
		if($block && !$tsUser->is_admod) die('No puedes enviarle mensajes a '.$para);
        //
        if(!empty($user_id) && !empty($mensaje)){
            $preview = substr($mensaje,0,75); 

		$com = mysql_fetch_assoc(mysql_query('SELECT user_activo, user_baneado FROM u_miembros WHERE LOWER(user_name) = \''.$tsCore->setSecure($para).'\''));
		if($com['user_activo'] != 0 && $com['user_baneado'] != 1){
		
		$comp = mysql_fetch_assoc(mysql_query('SELECT (SELECT COUNT(follow_id) FROM u_follows WHERE f_id = \''.(int)$user_id.'\' AND f_user = \''.(int)$tsUser->uid.'\' AND f_type = \'1\' LIMIT 1) as lesigo, (SELECT COUNT(follow_id) FROM u_follows WHERE f_id = \''.(int)$tsUser->uid.'\' AND f_user = \''.(int)$user_id.'\' AND f_type = \'1\' LIMIT 1) as mesigue, (SELECT COUNT(user_id) FROM u_miembros WHERE user_id = \''.$user_id.'\' AND user_rango < \'2\' LIMIT 1) as noesunadmin'));
		if(!$comp['noesunadmin']){ // SI EL RECEPTOR ES DEL GRUPO ADMINISTRADORES PRINCIPALES SALTAMOS LA COMPROBACIÓN
		
		// COMPROBACIONES DE LA PRIVACIDAD
		$query= mysql_query('SELECT p_configs FROM u_perfil WHERE user_id = \''.(int)$user_id.'\' LIMIT 1');
        $data = mysql_fetch_assoc($query);
        mysql_free_result($query);
        $data['p_configs'] = unserialize($data['p_configs']);

		switch($data['p_configs']['rmp']){
        case 0:
		case 8:
		if($data['p_configs']['rmp'] == 0 && !$tsUser->is_admod) {
		return '0: Lo sentimos, pero '.$para.' no permite recibir mensajes';
		}elseif($data['p_configs']['rmp'] == 8 && !$tsUser->is_admod)
		return '0: Lo sentimos, pero '.$para.' no puede utilizar la mensajer&iacute;a privada en estos momentos ';
		break;
		case 1:
		case 2:
		case 3:
		case 4:
		if($comp['mesigue'] == 0 && $comp['lesigo'] == 0) $lesigoomesigue = false; else $lesigoomesigue = true;
		if($comp['mesigue'] == 1 && $comp['lesigo'] == 1) $lesigoymesigue = true; else $lesigoymesigue = false;
		if($data['p_configs']['rmp'] == 1 && !$lesigoymesigue && !$tsUser->is_admod) {
		return '0: Debes seguir a '.$para.' y &eacute;ste debe seguirte para poder enviarle un mensaje.';
		}elseif($data['p_configs']['rmp'] == 2 && !$lesigoomesigue && !$tsUser->is_admod) {
		return '0: Debes seguir a '.$para.' o &eacute;ste debe seguirte para poder enviarle un mensaje.';
		}elseif($data['p_configs']['rmp'] == 3 && !$comp['lesigo'] && !$tsUser->is_admod) {
		return '0: Debes seguir a '.$para.' para poder enviarle un mensaje.';
		}elseif($data['p_configs']['rmp'] == 4 && !$comp['mesigue'] && !$tsUser->is_admod)
		return '0: '.$para.' debe seguirte para que puedas enviarle un mensaje';
		break;
		}
		}

		
			if(mysql_query('INSERT INTO `u_mensajes` (`mp_to`, `mp_from`, `mp_subject`, `mp_preview`, `mp_date`) VALUES ('.$user_id.', '.$tsUser->uid.', \''.$asunto.'\', \''.$preview.'\',\''.time().'\')')) {

                $mp_id = mysql_insert_id();
                if(empty($mp_id)) return 'Error al enviar el mensaje.';
                $_SERVER['REMOTE_ADDR'] = $_SERVER['X_FORWARDED_FOR'] ? $_SERVER['X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
                if(!filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)) { die('0: Su ip no se pudo validar.'); }
				if(mysql_query('INSERT INTO `u_respuestas` (`mp_id`, `mr_from`, `mr_body`, `mr_ip`, `mr_date`) VALUES (\''.(int)$mp_id.'\', \''.$tsUser->uid.'\', \''.$mensaje.'\',  \''.$_SERVER['REMOTE_ADDR'].'\', \''.time().'\')')) {
                   return 'El mensaje ha sido enviado a <a href="'.$tsCore->settings['url'].'/perfil/'.$para.'">'.$para.'</a>. <br /><br /> <center><a class="btn_g resp" href="'.$tsCore->settings['url'].'/mensajes/leer/'.$mp_id.'">Ver el mensaje enviado</a></center>';
                } else return mysql_error();
            } else return 'Ocurri&oacute; un error. Int&eacute;ntalo nuevamente.';
		} else return 'El usuario no puede recibir nuevos mensajes.';
		} else return 'El usuario no existe. Int&eacute;ntalo nuevamente.';
		} else return 'Debe tener una cuenta activa para realizar esta operaci&oacute;n';

    }
    /*
        newRespuesta()
    */
    function newRespuesta(){
        global $tsCore, $tsUser;
        //
        $mp_id = intval($_POST['id']);
        $mp_body = $tsCore->setSecure(substr($_POST['body'],0,1000), true);
        if(str_replace(array("\n","\t",' '),'',$mp_body) == '') die('0: Debes ingresar tu respuesta.');
        //
        $query = mysql_query('SELECT `mp_to`, `mp_from`, `mp_answer` FROM `u_mensajes` WHERE `mp_id` = \''.intval($mp_id).'\'');
        $msg = mysql_fetch_assoc($query);
        
        // 
        if(!empty($msg)){
			$tsCore->antiFlood(true, 'mps');
            $preview = substr($mp_body,0,75);
            if(mysql_query('INSERT INTO `u_respuestas` (`mp_id`, `mr_from`, `mr_body`, `mr_ip`, `mr_date`) VALUES (\''.intval($mp_id).'\', \''.$tsUser->uid.'\', \''.$mp_body.'\', \''.$_SERVER['REMOTE_ADDR'].'\', \''.time().'\')')){
            // CUANDO RESPONDA EL DESTINATARIO...
                if($msg['mp_from'] != $tsUser->uid){
                    if($msg['mp_answer'] == 0) $update = ', mp_answer = 1';
                    $update .= ', mp_read_to = 1, mp_read_mon_to = 1';
                    $update .= ', mp_read_from = 0, mp_read_mon_from = 0';
                    $update .= ', mp_del_from = 0';
                }
                else {
                    $update .= ', mp_read_to = 0, mp_read_mon_to = 0';
                    $update .= ', mp_read_from = 1, mp_read_mon_from = 1';
                    $update .= ', mp_del_to = 0';
                }
                // ACTUALIZAMOS EL MENSAJE
                mysql_query('UPDATE `u_mensajes` SET `mp_preview` = \''.$preview.'\', `mp_date` = \''.time().'\' '.$update.' WHERE `mp_id` = \''.(int)$mp_id.'\'');
                //
                $return['mp_date'] = time();
				$return['mp_ip'] = $_SERVER['REMOTE_ADDR'];
                $return['mp_body'] = $tsCore->parseBadWords($tsCore->parseSmiles($tsCore->parseBBCode($mp_body)), true);
                //
                return $return;
            }
        } else return die('0: El mensaje no existe.');
    }
    /*
        getMensajes($type)
        :: FALTA LA PAGINACION :/
    */
    function getMensajes($type = 1, $unread = false){
		global $tsCore, $tsUser;
		// MONITOR DE MENSAJES SOLO SI HAY MAS  DE 5 NUEVOS
        if($type == 1) {
            // SI HAY MAS DE 5 MENSAJES NUEVOS SOLO LEEMOS LOS NUEVOS
            if($this->mensajes > 0 || $unread == true) {
                $funread = "AND mp_read_mon_to = 0";
                $sunread = "AND mp_read_mon_from = 0";
                $limit = "";
            } else {
                $limit = "LIMIT 5";
            }
            $sql = 'SELECT mp_id, mp_to, mp_from, mp_read_to, mp_read_mon_to, mp_subject, mp_preview, mp_date, user_name FROM u_mensajes AS m LEFT JOIN u_miembros AS u ON mp_from = user_id WHERE mp_to = '.$tsUser->uid.' AND mp_del_to = 0 '.$funread.' UNION (SELECT mp_id, mp_to, mp_from, mp_read_from, mp_read_mon_from, mp_subject, mp_preview, mp_date, user_name user_name FROM u_mensajes AS m LEFT JOIN u_miembros AS u ON mp_to = user_id WHERE mp_from = '.$tsUser->uid.' AND mp_del_from = 0 AND mp_answer = 1 '.$sunread.') ORDER BY mp_id DESC '.$limit.'';
			// CONSULTA
            $query = mysql_query($sql);
            $data['total'] = 0;
            while($row = mysql_fetch_assoc($query)){
                $row['mp_from'] = ($row['mp_from'] == $tsUser->uid) ? $row['mp_to'] : $row['mp_from'];
                $data['data'][$row['mp_date']] = $row;
                // AHORA ACTUALIZAMOS PARA QUE NO SE VUELVAN A NOTIFICAR EN EL MONITOR
                if($tsUser->uid == $row['mp_to']) $update = 'mp_read_mon_to = 1';
                else $update = 'mp_read_mon_from = 1';
                mysql_query('UPDATE `u_mensajes` SET '.$update.' WHERE mp_id  = \''.(int)$row['mp_id'].'\'');
                //
                $data['total']++;
            }
			
        // RECIBIDOS
		} elseif($type == 2){
            // MOSTRAR LOS NO LEÍDOS
            if($unread == true){
                $funread = "AND mp_read_to = 1";
                $sunread = "AND mp_read_from = 1";
            }
            // CONSULTA
            $sql = 'SELECT mp_id, mp_to, mp_from, mp_read_to, mp_subject, mp_preview, mp_date, user_name FROM `u_mensajes` AS m LEFT JOIN `u_miembros` AS u ON mp_from = user_id WHERE mp_to = '.$tsUser->uid.' AND mp_del_to = 0 '.$funread.' UNION (SELECT mp_id, mp_to, mp_from, mp_read_from, mp_subject, mp_preview, mp_date, user_name user_name FROM u_mensajes AS m LEFT JOIN u_miembros AS u ON mp_to = user_id WHERE mp_from = '.$tsUser->uid.' AND mp_del_from = 0 AND mp_answer = 1 '.$sunread.') ORDER BY mp_id DESC';
            // PAGINAR
            $total = mysql_num_rows(mysql_query($sql));
            $pages = $tsCore->getPagination($total, 12);
            $data['pages'] = $pages;
			// CONSULTA
			$query = mysql_query($sql.' LIMIT '.$pages['limit']);
            while($row = mysql_fetch_assoc($query)){
                // PARA SABER SI ES RESPUESTA O MENSAJE NORMAL
                $row['mp_type'] = ($row['mp_from'] != $tsUser->uid) ? 1 : 2;
                $row['mp_from'] = ($row['mp_from'] == $tsUser->uid) ? $row['mp_to'] : $row['mp_from'];
                $data['data'][$row['mp_date']] = $row;
            }
			
        // ENVIADOS POR MI
		}elseif($type == 3){
            $sql = 'SELECT m.mp_id, m.mp_to, m.mp_read_to, m.mp_subject, m.mp_preview, m.mp_date, u.user_name FROM `u_mensajes` AS m LEFT JOIN `u_miembros` AS u ON m.mp_to = u.user_id WHERE m.mp_from = '.$tsUser->uid.' ORDER BY m.mp_id DESC';
            // PAGINAR
            $total = mysql_num_rows(mysql_query($sql));
            $pages = $tsCore->getPagination($total, 12);
            $data['pages'] = $pages;
			// CONSULTA
			$query = mysql_query($sql.' LIMIT '.$pages['limit']);
            while($row = mysql_fetch_assoc($query)){
                $row['mp_type'] = 2;
                $row['mp_from'] = $row['mp_to'];
                $row['mp_read_to'] = 1;
                $data['data'][$row['mp_date']] = $row;
            }
			
        // RESPONDIDOS POR MI
		}elseif($type == 4){
            $sql = 'SELECT m.mp_id, m.mp_from, m.mp_read_from, m.mp_subject, m.mp_preview, m.mp_date, u.user_name FROM `u_mensajes` AS m LEFT JOIN `u_miembros` AS u ON m.mp_from = u.user_id WHERE m.mp_to = '.$tsUser->uid.' AND m.mp_answer = 1 ORDER BY m.mp_id DESC';
            // PAGINAR
            $total = mysql_num_rows(mysql_query($sql));
            $pages = $tsCore->getPagination($total, 12);
            $data['pages'] = $pages;
			// CONSULTA
			$query = mysql_query($sql.' LIMIT '.$pages['limit']);
            while($row = mysql_fetch_assoc($query)){
                $row['mp_type'] = 1;
                $row['mp_read_to'] = 1;
                $data['data'][$row['mp_date']] = $row;
            }
			
		// BUSCADOR
		} elseif($type == 5){
            // CONSULTA
            $sql = 'SELECT mp_id, mp_to, mp_from, mp_read_to, mp_subject, mp_preview, mp_date, user_name FROM `u_mensajes` AS m LEFT JOIN `u_miembros` AS u ON mp_from = user_id WHERE mp_to = '.$tsUser->uid.' AND mp_del_to = \'0\' AND `mp_subject` LIKE \'%'.$tsCore->setSecure($_GET['qm']).'%\'  UNION (SELECT mp_id, mp_to, mp_from, mp_read_from, mp_subject, mp_preview, mp_date, user_name user_name FROM u_mensajes AS m LEFT JOIN u_miembros AS u ON mp_to = user_id WHERE mp_from = '.$tsUser->uid.' AND mp_del_from = \'0\' AND mp_answer = 1) ORDER BY mp_id DESC';
            // PAGINAR
            $total = mysql_num_rows(mysql_query($sql));
            $pages = $tsCore->getPagination($total, 12);
            $data['pages'] = $pages;
			// CONSULTA
			$query = mysql_query($sql.' LIMIT '.$pages['limit']);
            while($row = mysql_fetch_assoc($query)){
                // PARA SABER SI ES RESPUESTA O MENSAJE NORMAL
                $row['mp_type'] = ($row['mp_from'] != $tsUser->uid) ? 1 : 2;
                $row['mp_from'] = ($row['mp_from'] == $tsUser->uid) ? $row['mp_to'] : $row['mp_from'];
                $data['data'][$row['mp_date']] = $row;
            }
			
			$data['texto']= $_GET['qm'];
		}
        // ORDENAR Y RETORNAR
        krsort($data['data']);
        return $data;
    }
    /*
        readMensaje()
    */
    function readMensaje(){
        global $tsCore, $tsUser;
        //
        if(!ctype_digit($_GET['id'])){
          die('No existe ning&uacute;n mensaje as&iacute; mijo ._.');
        }
        $mp_id = intval($_GET['id']);
        //
		$query = mysql_query('SELECT m.*, u.user_name FROM `u_mensajes` AS m LEFT JOIN `u_miembros` AS u ON m.mp_from = u.user_id WHERE m.mp_id = \''.intval($mp_id).'\'');
		$data = mysql_fetch_assoc($query);
		
        // NO PUEDE LEER MENSAJES DE OTROS USUARIOS NI RESPUESTAS POR SEPARADO, SI SOY MODERADOR NO PUEDO LEER MENSAJES A MENOS QUE ESTÉN REPORTADOS Y SI SOY ADMINISTRADOR LOS VEO TODOS :B
	    if(mysql_num_rows(mysql_query('SELECT obj_id FROM `w_denuncias` WHERE obj_id = \''.(int)$mp_id.'\' AND `d_type` = \'2\''))){ $canview = true; }else{ $canview = false; }
			
        if($data['mp_to'] != $tsUser->uid && $data['mp_from'] != $tsUser->uid && !$canview && !$tsUser->is_admod == 1) $tsCore->redirectTo($tsCore->settings['url'].'/mensajes/');
        // MENSAJE
        $history['msg'] = $data;
        // RESPUESTAS
        $query = mysql_query('SELECT r.*, u.user_name FROM u_respuestas AS r LEFT JOIN u_miembros AS u ON r.mr_from = u.user_id WHERE r.mp_id = \''.intval($mp_id).'\' ORDER BY mr_id');
		//$history['res'] = result_array($query);
        while($row = mysql_fetch_assoc($query)){
        $row['mr_body'] = $tsCore->parseBadWords($tsCore->parseSmiles($tsCore->parseBBCode($row['mr_body'])), true);
            $history['res'][] = $row;
        }
		
        // ACTUALIZAR
        $resp = count($history['res']);
        $from = $history['res'][$resp-1]['mr_from']; // ULTIMO EN RESPONDER
        //
        if($tsUser->uid == $data['mp_to']) {$update = 'mp_read_to = 1, mp_read_mon_to = 1'; $history['msg']['mp_type'] = 1;} // PARA MI
        elseif($from == $data['mp_to'] && $data['mp_from'] == $tsUser->uid) {$update = 'mp_read_from = 1, mp_read_mon_from = 1'; $history['msg']['mp_type'] = 2;} // ME RESPONDIERON
        elseif($from == $data['mp_from']) {$update = 'mp_read_from = 1, mp_read_mon_from = 1'; $history['msg']['mp_type'] = 2;}
//
		// LEIDO
		mysql_query('UPDATE `u_mensajes` SET '.$update.' WHERE `mp_id` = \''.intval($mp_id).'\'');

		// BLOQUEADO
        $user_id = ($data['mp_from'] != $tsUser->uid) ? $data['mp_from'] : $data['mp_to'];
        $query = mysql_query('SELECT bid AS block FROM `u_bloqueos` WHERE b_user = '.$tsUser->uid.' AND b_auser = \''.intval($user_id).'\' LIMIT 1');
        $history['ext'] = mysql_fetch_assoc($query);
        
        $history['ext']['uid'] = $user_id;
        $history['ext']['user'] = $tsUser->getUserName($user_id);
        //
        return $history;
    }

    /*
        editMensajes();
    */
    function editMensajes(){
        global $tsCore, $tsUser;
        //
        $ids = explode(',',$tsCore->setSecure($_POST['ids']));
        // ARMAR IDS
        foreach($ids as $nid){
            $id = explode(':',$nid);
            $nids[$id[1]][] = $id[0];
        }
        if(empty($nids)) return false;
        $act = htmlspecialchars($_POST['act']);
        // HMM SI NO LE ENTIENDES A ESTO NTP YO TAMPOCO xD PERO FUNCIONA :D
        switch($act){
            case 'read':
                mysql_query('UPDATE u_mensajes SET mp_read_to = 1 WHERE mp_id IN('.implode(',',$nids[1]).') AND mp_to = '.$tsUser->uid.'');
                 mysql_query('UPDATE u_mensajes SET mp_read_from = 1 WHERE mp_id IN('.implode(',',$nids[2]).') AND mp_from = '.$tsUser->uid.'');
                 break;
                 case 'unread':
                 mysql_query('UPDATE u_mensajes SET mp_read_to = 0 WHERE mp_id IN('.implode(",",$nids[1]).') AND mp_to = '.$tsUser->uid.'');
                 mysql_query('UPDATE u_mensajes SET mp_read_from = 0 WHERE mp_id IN('.implode(",",$nids[2]).') AND mp_from = '.$tsUser->uid.'');
            break;
            case 'delete':
                mysql_query('UPDATE u_mensajes SET mp_del_to = 1 WHERE mp_id IN('.implode(",",$nids[1]).') AND mp_to = '.$tsUser->uid.'');
                mysql_query('UPDATE u_mensajes SET mp_del_from = 1 WHERE mp_id IN('.implode(",",$nids[2]).') AND mp_from = '.$tsUser->uid.'');
                // BORRAMOS SOLO SI LOS DOS LO HAN DECIDIDO :D
               $query = mysql_query('SELECT `mp_id`, `mp_del_to` = 1 AND `mp_del_from` = 1 AND (mp_to =  '.$tsUser->uid.' OR `mp_from` =  '.$tsUser->uid.')');
                while($row = mysql_fetch_assoc($query)){
                    if(mysql_query('DELETE FROM `u_mensajes` WHERE `mp_id` =  '.$row['mp_id'].'')){
                      mysql_query('DELETE FROM `u_respuestas` WHERE `mp_id` = '.$row['mp_id'].'');
                    }
                }
                
                //
            break;
        }
    }
}