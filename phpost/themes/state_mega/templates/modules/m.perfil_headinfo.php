                <div class="perfil-user clearfix">
                	<div class="perfil-box clearfix">
                        <div class="perfil-data">
                        	<div class="perfil-avatar">
                            	<a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsInfo['nick']; ?>">
                                    <img alt="" src="<? echo $tsConfig['url']; ?>/files/avatar/<? if ($tsInfo['p_avatar']){ echo $tsInfo['uid']; ?>_120<? }else{ echo 'avatar'; }?>.jpg"/>
                                </a>
                            </div>
                            <div class="perfil-info">
                            	<h1 class="nick"><? echo $tsInfo['nick']; ?></h1>
                                    <span class="bio">
                                        <img src="<? echo $tsConfig['tema']['t_url']; ?>/images/<? if ($tsInfo['user_sexo']== 1) echo 'hombre'; else echo 'mujer'; ?>.png">
                                        <?
                                        if ($tsInfo['p_nombre'] != '')
                                        {        
                                         echo $tsInfo['p_nombre'].' es ';
                                        }
                                        else
                                        {    
                                        echo 'Es ';
                                        }
                                        if ($tsInfo['user_sexo'] == 1) echo 'un hombre'; else echo 'una mujer'.' .';
                                        ?>        
                                        <br>
                                        <img src="<? echo $tsConfig['tema']['t_url']; ?>/images/hogar.png"> Vive en 
                                        <span id="info_pais"><? echo $tsInfo['user_pais'];?></span>.<br>
                                        <?
                                        if ($tsInfo['p_empresa'])
                                        {
                                        ?>
                                        <img src="<? echo $tsConfig['tema']['t_url']; ?>/images/trabajo.png">
                                        Trabaja en <? echo $tsInfo['p_empresa']; ?>
                                        <?
                                        }
                                        ?>
                                    </span>
                                    <span style="padding-top:5px;position:absolute;">
                                        <span title="<? echo $tsInfo['status']['t']; ?>" style="float: left;" class="qtip status <? echo $tsInfo['status']['css']; ?>"> 
                                        </span>                                        
                                    </span>
                                <?
				if ($tsUser->uid != $tsInfo['uid'] && $tsUser->is_member)
                                {                                
                                ?>
                                <br />
                                <a class="btn_g unfollow_user_post" onclick="notifica.unfollow('user', <? echo $tsInfo['uid']; ?>, notifica.userInPostHandle, $(this).children('span'))" <? if ($tsInfo['follow'] == 0) echo 'style="display: none;"'; ?>>
                                   <span class="icons unfollow">Dejar de seguir</span></a>
                                <a class="btn_g follow_user_post" onclick="notifica.follow('user', <? echo $tsInfo['uid']; ?>, notifica.userInPostHandle, $(this).children('span'))" <? if ($tsInfo['follow'] == 1) echo 'style="display: none;"'; ?>>
                                   <span class="icons follow">Seguir Usuario</span></a>
                                <br />
                                    <span class="ex_opts">
                                    <a href="javascript:bloquear(<? echo $tsInfo['uid']; ?>, <? if ($tsInfo['block']['bid']) echo 'false'; else echo 'true';?>, 'perfil')" id="bloquear_cambiar">
                                        <? if ($tsInfo['block']['bid']) echo 'Desbloquear'; else echo 'Bloquear'; ?>
                                    </a>
                                    <a href="#" onclick="denuncia.nueva('usuario',<? echo $tsInfo['uid']; ?>, '', '<? echo $tsInfo[nick]; ?>'); return false">Denunciar</a>
                                    <?
                                    if (($tsUser->is_admod || $tsUser->permisos['mosu']) && !$tsInfo['user_baneado'])
                                    {
                                    ?>
                                        <a href="#" onclick="mod.users.action(<? echo $tsInfo['uid']; ?>, 'ban', true); return false;" style="background-color:#CE152E;">Suspender</a>
                                    <?    
                                    }
                                    if (!$tsInfo['user_activo'] || $tsInfo['user_baneado'])
                                    {
                                    ?>
                                    <span style="background-color:#CE152E;">
                                        Cuenta <? if (!$tsInfo['user_activo']) echo 'desactivada'; else 'baneada'; ?>
                                    </span>
                                    <?
                                    }
                                    ?>
                                    </span>
                               <?
                                }
                               ?>
                            </div>
                        </div>
                        <div class="user-level">
                            <ul class="clearfix">
                				<li style="position:relative;color:#<? echo $tsInfo['stats']['r_color']; ?>; background-color:#FFF">
                					<strong style="color:#<? echo $tsInfo['stats']['r_color']; ?>"><? echo $tsInfo['stats']['r_name']; ?></strong>
                					<span>Rango</span>
                				</li>
                				<li>
                					<strong><? echo $tsInfo['stats']['user_puntos'];?></strong>
                					<span>Puntos</span>
                				</li>
                				<li>
                					<strong><? echo $tsInfo['stats']['user_posts'];?></strong>
                					<span>Posts</span>
                				</li>
                				<li>
                					<strong><? echo $tsInfo['stats']['user_comentarios'];?></strong>
                					<span>Comentarios</span>
                				</li>
                				<li>
                					<strong><? echo $tsInfo['stats']['user_seguidores'];?></strong>
                					<span>Seguidores</span>
                				</li>
                				<li>
                					<strong><? echo $tsInfo['stats']['user_fotos'];?></strong>
                					<span>Fotos</span>
                				</li>
                
                			</ul>
                        </div>
                    </div>
                    <div class="menu-tabs-perfil clearfix">
                    	<ul id="tabs_menu">
                            <?
                            if ($tsType == 'news' || $tsType == 'story')
                            {
                            ?>
                            <li class="selected">
                                <a href="#" onclick="perfil.load_tab('news', this); return false">
                                    <? if ($tsType == 'story') echo 'Publicaci&oacute;n'; else echo 'Noticias'; ?>
                                </a>
                            </li>
                            <?
                            }
                            ?>
                            <li <? if ($tsType == 'wall') echo 'class="selected"'; ?>>
                            <a href="#" onclick="perfil.load_tab('wall', this); return false">Muro</a></li>
                            <li><a href="#" onclick="perfil.load_tab('info', this); return false" id="informacion">Perfil P&uacute;blico de <? echo $tsInfo['nick']; ?> </a></li>
                            <li><a href="#" onclick="perfil.load_tab('actividad', this); return false" id="actividad">Actividad</a></li>                            
                            <li><a href="#" onclick="perfil.load_tab('posts', this); return false">Posts</a></li>
                            <li><a href="#" onclick="perfil.load_tab('seguidores', this); return false" id="seguidores">Seguidores</a></li>
                            <li><a href="#" onclick="perfil.load_tab('siguiendo', this); return false" id="siguiendo">Siguiendo</a></li>
                            <li><a href="#" onclick="perfil.load_tab('medallas', this); return false">Medallas</a></li>
                            <?
                            if ($tsUser->uid != $tsInfo['uid'])
                            {
                            ?>
                            <li class="enviar-mensaje">
                                <?
                                if ($tsUser->is_member)
                                {
                                ?>
                                <a href="#" onclick="mensaje.nuevo('<? echo $tsInfo[nick]; ?>','','',''); return false">
                                    <span style="float:none; height:14px;width:16px;" class="systemicons mensaje"></span></a>
                                <?
                                }
                                ?>
                            </li>
                            <?
                            }                            
                            if ($tsInfo['p_socials']['f'])
                            {    
                            ?>
                            <li style="float:right!important;" class="floatR">
            					<a target="_blank" href="http://www.facebook.com/<? echo $tsInfo['p_socials']['f']; ?>" title="Facebook">
                                                    <img height="14" width="14" src="<? echo $tsConfig['default']; ?>/images/icons/facebook.png"/></a>
            				</li>
                            <?
                            }
                            if ($tsInfo['p_socials']['t'])
                            {
                            ?>
                            <li style="float:right!important;" class="floatR">
            					<a target="_blank" href="http://www.twitter.com/<? echo $tsInfo['p_socials']['t']; ?>" title="Twitter">
                                                    <img height="14" width="14" src="<? echo $tsConfig['default']; ?>/images/icons/twitter.png"/></a>
            				</li>
                            <?
                            }                            
                            if ($tsUser->is_admod == 1)
                            {
                            ?>
                            <li style="float:right!important;" class="floatR">
				<a href="#" onclick="location.href = '<? echo $tsConfig['url']; ?>/admin/users?act=show&amp;uid=<? echo $tsInfo[uid]; ?>'">
                                    <img title="Editar a <? echo $tsInfo['nick']; ?>" src="<? echo $tsConfig['url']; ?>/themes/default/images/icons/editar.png"  class="vctip"/>
                                </a>
                            </li>
                            <?
                            }
                            ?>
                        </ul>
                    </div>
                </div>