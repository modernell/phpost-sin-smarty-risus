                	<div class="post-autor vcard">
                    	<div class="box_title">
                        	<div class="box_txt post_autor">Posteado por:</div>
                            <div class="box_rss">
                            	<a href="<? echo $tsConfig['url'].'/rss/posts-usuario/'.$tsAutor['user_name']; ?>">
                                    <span style="position:relative;">
                                    <img border="0" title="RSS con posts de <? echo $tsAutor['user_name']; ?>" alt="RSS con posts de Usuario" style="position:absolute; top:-354px; clip:rect(352px 16px 368px 0px);" src="<? echo $tsConfig['images']; ?>/big1v12.png"/>
                                    <img border="0" style="width:14px;height:12px" src="<? echo $tsConfig['images']; ?>/space.gif"/>
                                    </span>
                                 </a>
                            </div>
                        </div>
                        <div class="box_cuerpo">
                        	<div class="avatarBox">
                                <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $tsAutor['user_name']; ?>">
                                    <img title="Ver perfil de <? echo $tsAutor['user_name']; ?>" alt="Ver perfil de <? echo $tsAutor['user_name']; ?>" class="avatar" src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $tsAutor['user_id']; ?>_120.jpg"/>
                                </a>
							</div>
                            <li class="rango_perfil_user "align="center" style="margin-top:-20px;border:1px dashed #CCC;padding:4px;position:relative;color:#<? echo $tsInfo['stats']['r_color']; ?>;background-color:#FFF">
						<strong style="color:#228194">@<? echo $tsAutor['user_name']; ?></strong><br>
						<span style= "font-weight:bold;color:#<? echo $tsAutor['rango']['r_color'];?>" class="title"><? echo $tsAutor['rango']['r_name'];?></span>
                            </li>
                            <br />
                            <br />
				          <div align="center" class="info2">
					<img src="<? echo $tsConfig['default']; ?>/images/space.gif" class="status <? echo $tsAutor['status']['css']; ?>" title="<? echo $tsAutor['status']['t']; ?>"/>
                            </div> 

                            <div align="center" class="info3">
                            <img src="<? echo $tsConfig['default']; ?>/images/icons/ran/<? echo $tsAutor['rango']['r_image']; ?>" title="<? echo $tsAutor['rango']['r_name'] ?>" />
                            <img src="<? echo $tsConfig['default']; ?>/images/icons/<? if ($tsAutor.user_sexo == 0) echo 'female'; else echo 'male';?>.png" title="<? if ($tsAutor['user_sexo'] == 0) echo 'Mujer'; else echo 'Hombre'; ?>" />
                            <img src="<? echo $tsConfig['default']; ?>/images/flags/<? echo $tsAutor['pais']['icon']; ?>.png" style="padding:2px" title="<? echo $tsAutor['pais']['name']; ?>" />
                            <? if ($tsAutor['user_id'] != $tsUser->uid)
                            {
                            ?>                            
                            <a href="#" onclick="<? if(!$tsUser->is_member) echo 'registro_load_form();'; else { ?>mensaje.nuevo('<? echo $tsAutor['user_name'];  ?>','','',''); <? } ?>return false">
                                <img title="Enviar mensaje privado" src="<? echo $tsConfig['images'];?>/icon-mensajes-recibidos.gif"/>
                            </a>
                            <?                            
                            } 
                            ?>
                            </div>
                            <?
                            if (!$tsUser->is_member)
                            {    
                            ?>
                            <hr class="divider"/>
                            <a class="btn_g follow_user_post" href="#" onclick="registro_load_form(); return false">
                                <span class="icons follow">Seguir Usuario</span>
                            </a>
                            <?
                            }
                            elseif ($tsAutor['user_id'] != $tsUser->uid)
                            {
                            ?>
                            <hr class="divider"/>
                            <a class="btn_g unfollow_user_post" onclick="notifica.unfollow('user', <? echo $tsAutor['user_id']; ?>, notifica.userInPostHandle, $(this).children('span'))" <? if (!$tsAutor['follow']) echo 'style="display: none;"';  ?>>
                               <span class="icons unfollow">Dejar de seguir</span></a>
                            <a class="btn_g follow_user_post" onclick="notifica.follow('user', <? echo $tsAutor['user_id']; ?>, notifica.userInPostHandle, $(this).children('span'))"<? if (!$tsAutor['follow']> 0) echo 'style="display: none;"';  ?>>
                               <span class="icons follow">Seguir Usuario</span></a>
                            <?                            
                            }
                            ?>
                            <hr class="divider"/>
                            <div class="metadata-usuario">
                            	<span class="nData user_follow_count"><? echo $tsAutor['user_seguidores']; ?></span>
                                <span class="txtData">Seguidores</span>
                                <span class="nData" style="color: #0196ff"><? echo $tsAutor['user_puntos']; ?></span>
                                <span class="txtData">Puntos</span>
                                <span class="nData"><? echo $tsAutor['user_posts']; ?></span>
                                <span class="txtData">Posts</span>
                                <span style="color: #456c00" class="nData"><? echo $tsAutor['user_comentarios'] ?></span>
                                <span class="txtData">Comentarios</span>
                            </div>
                            
                            <?
                            if ($tsUser->is_admod || $tsUser->permisos['modu'] || $tsUser->permisos['modu']) 
                            {
                            ?>
                                    <hr class="divider"/>
                                    <div class="mod-actions">
                                        <b>Herramientas</b>
                                        <a href="<? echo $tsConfig['url'];?>/moderacion/buscador/1/1/<? echo $tsPost['post_ip']; ?>" class="geoip" target="_blank"><? echo $tsPost['post_ip']; ?></a>
                                        <? if ($tsUser->is_admod == 1)
                                        {
                                        ?>                                
                                        <a href="<? echo $tsConfig['url'];?>/admin/users?act=show&amp;uid=<? echo $tsAutor['user_id']; ?>" class="edituser">Editar Usuario</a>
                                        <?
                                        }
                                        if ($tsAutor['user_id'] != $tsUser->uid) 
                                        {
                                        
                                        ?>
                                            <a href="#" onclick="mod.users.action(<? echo $tsAutor['user_id']; ?>, 'aviso', false); return false;" class="alert">Enviar Aviso</a>
                                        <?
                                        }                                
                                        if ($tsAutor['user_id'] != $tsUser->uid && $tsUser->is_admod || $tsUser->permisos['modu'] || $tsUser->permisos['modu'])
                                        {        
                                            if ($tsAutor['user_baneado'])
                                            {        
                                                if ($tsUser->is_admod || $tsUser->permisos['modu'])
                                                {                                                    
                                                ?>
                                                  <a href="#" onclick="mod.reboot(<? echo $tsAutor['user_id']; ?>, 'users', 'unban', false); $(this).remove(); return false;" class="unban">Desuspender Usuario</a>
                                                <?                                                
                                                }
                                                else
                                                {
                                                    if ($tsUser->is_admod || $tsUser->permisos.mosu)
                                                    {        
                                                    ?>
                                                        <a href="#" onclick="mod.users.action(<? echo $tsAutor['user_id']; ?>, 'ban', false); $(this).remove(); return false;" class="ban">Suspender Usuario</a>
                                                    <?
                                                    }
                                                }    
                                            }
                                        }
                                        ?>
                                    </div>
                            <? } ?>
                                    
                        </div>
                            
			<br />
			<div class="categoriaList estadisticasList"<? if ($tsPost['m_total'] == 0){ echo 'style="display:none;"'; } ?>>
                        <h6>Medallas</h6>
                         {if $tsPost.medallas}
			<ul style="margin-left:11px;">
                            <? foreach ($tsPost['medallas'] as $m)
                            {
                            ?>    
        			<img src="<? echo $tsConfig['url'];?>/images/icons/med/<? echo $m['m_image']; ?>_16.png" style="margin-left:1px;margin-bottom:2px;" class="qtip" title="<? echo $m['m_title'].'-'.$m['m_description']; ?>"/>
                            <?                                
                            }
                            ?>
                        </ul>
                            {else}
				<div class="emptyData">No tiene medallas</div>
                          {/if}
                        </div>

                            <? if ($tsPost['visitas'])
                            {      
                            ?>
                            <br />
                            <div class="categoriaList estadisticasList">
                            <h6>&Uacute;ltimos visitantes</h6> 
                            <ul style="margin-left:11px;">
                            <? foreach  ($tsPost['visitas'] as $v)
                            {
                            ?>       
        			<a href="<? echo $tsConfig['url'];?>/perfil/<? $v['user_name']; ?>" class="hovercard" uid="<? echo $v['user_id'];?>" style="display:inline-block;"><img src="<? echo $tsConfig['url'];?>/files/avatar/<? echo $v['user_id'];?>_50.jpg" class="vctip" title="<? echo modifier_hace($v['date']); ?>" width="32" height="32"/></a> 
                            <?                            
                            }
                            ?>
                            </ul>
                            </div>
                            <?                            
                            }
                            ?>
                    </div>