                        <div class="mpRContent">
                            <div class="mpHeader">
                                <h2><? echo $tsMensajes['msg']['mp_subject']; ?></h2>
                            </div>
                            <div class="mpUser">
                                <span class="info">Entre <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsUser->nick; ?>">T&uacute;</a> 
                                    y 
                                    <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsMensajes['ext']['user']; ?>">
                                        <? echo $tsMensajes['ext']['user']; ?></a>
                                </span>
                            </div>
                            <ul class="mpHistory" id="historial">
                              <?  
                                if($tsMensajes['res'])
                                {    
                                foreach ($tsMensajes['res'] as $mp)
                                {
                                ?>
                                <li>
                                    <div class="main clearBoth">
                                        <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $mp['user_name']; ?>" class="autor-image">
                                            <img src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $mp['mr_from']; ?>_50.jpg" /></a>
                                        <div class="mensaje">
                                            <div class="rbody">
                                            <div>
                                                <a href="<? echo $tsConfig['url']; ?>/perfil/{$mp.user_name}" class="autor-name"><? echo $mp['user_name']; ?></a>
                                                <?
                                                if ($tsUser->is_admod)
                                                {
                                                ?>
                                                <a href="<? echo $tsConfig['url']; ?>/moderacion/buscador/1/1/<? echo $mp['mr_ip'];?>">
                                                    <span class="mp-date"><? echo $mp['mr_ip'];?></span>
                                                </a> <br />
                                                <?
                                                }
                                                ?>
                                                <span class="mp-date"><? echo date_formatter($mp['mr_date']); ?></span>
                                            </div>
                                            <div><? echo nl2br($mp['mr_body']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?
                                }
                                }
                                else
                                {  
                                ?>    
                                <li class="emptyData">No se pudieron cargar los mensajes.</li>
                                <?
                                }
                                ?>
                            </ul>
                            <div class="mpForm">
                                <div class="form">
                                <textarea id="respuesta" onfocus="onfocus_input(this)" onblur="onblur_input(this)" title="Escribe una respuesta..." class="autogrow onblur_effect">Escribe una respuesta...</textarea>
                                <input type="hidden" id="mp_id" value="<? echo $tsMensajes['msg']['mp_id']; ?>" />
                                <a class="btn_g resp" onclick="mensaje.responder(); return false;">Responder</a>
                                </div>
                            </div>
                        </div>
                        <div class="mpOptions">
                            <div class="info"><h2>Acciones</h2></div>
                            <ul class="actions-list">
                                <li><a href="#" onclick="mensaje.marcar('<? echo $tsMensajes[msg][mp_id]; ?>:<? echo $tsMensajes[msg][mp_type]; ?>', 1, 2, this); return false;">Marcar como no le&iacute;do</a></li>
                                <li class="div"></li>
                                <li><a href="#" onclick="mensaje.eliminar('<? echo $tsMensajes[msg][mp_id]; ?>:<? echo $tsMensajes[msg][mp_type]; ?>',2); return false;">Eliminar</a></li>
                                <li><a href="#" onclick="denuncia.nueva('mensaje',<? echo $tsMensajes['msg']['mp_id']; ?>, '', ''); return false;">Marcar como correo no deseado...</a></li>
                                <li class="div"></li>
                                <li>
                                    <a href="#" onclick="denuncia.nueva('usuario',<? if ($tsMensajes['msg']['mp_from'] != $tsUser->uid) echo $tsMensajes['msg']['mp_from']; else echo $tsMensajes['msg']['mp_to']; ?>, '', '<? if ($tsMensajes[msg][mp_from] != $tsUser->uid) echo $tsMensajes[msg][user_name]; else echo $tsUser->getUsername($tsMensajes[msg][mp_to]); ?>'); return false">Denunciar a este usuario...</a></li>
                                <li><a href="javascript:bloquear(<? echo $tsMensajes['ext']['uid']; ?>, <? if ($tsMensajes['ext']['block']) echo 'false'; else echo 'true'; ?>, 'mensajes')" id="bloquear_cambiar"><? if ($tsMensajes['ext']['block']) echo 'Desbloquear'; else echo 'Bloquear'; ?> a <u><? echo $tsMensajes['ext']['user']; ?></u>...</a></li>
                                <li class="div"></li>
                                <li><a href="<? echo $tsConfig['url']; ?>/mensajes/">&laquo; Volver a mensajes</a></li>
                            </ul>
                        </div>
                        <div class="clearBoth"></div>
