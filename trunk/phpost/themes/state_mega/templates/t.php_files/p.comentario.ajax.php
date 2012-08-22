                            <?
                            if ($tsComments['num'] > 0)                        	
                            {
                                
							foreach ($tsComments['data'] as $c)
                                                        {
                                                          ?>      
                                                        
							<div id="div_cmnt_<? echo $c['cid']; ?>" class="<? if ($tsPost.autor == $c['c_user'])echo 'especial1'; elseif ($c['c_user'] == $tsUser->uid) echo 'especial3'; ?>">                            	
								<span id="citar_comm_<? echo $c['cid']; ?>" style="display:none"><? echo $c['c_body']; ?></span>                                
								<div class="comentario-post clearbeta">                                	
									<div class="avatar-box" style="z-index: 99;">
                                    	
										<a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $c['user_name']; ?>">											
											<img width="48" height="48" title="Avatar de <? echo $c['user_name']; ?> en <? echo $tsConfig['titulo']; ?>" src="<? echo $tsConfig['url']; ?>/files/avatar/<? echo $c['c_user'];?>_50.jpg" class="avatar-48 lazy" style="position: relative; z-index: 1; display: inline;">
										</a>
                                        
										<? 
                                                                                if ($tsUser->is_member && $tsUser->info['user_id'] != $c['c_user'])
                                                                                {
                                                                                ?>                                        
										<ul style="display: none;">                                          
											<li class="enviar-mensaje">
                                                                                            <a href="#" onclick="mensaje.nuevo('<? echo $c[user_name]; ?>','','',''); return false">Enviar Mensaje <span></span></a>
                                                                                        </li>                                            
											<li class="bloquear <? if ($tsComments['block'])echo 'des';?>bloquear_1">
                                                                                            <a href="javascript:bloquear(<? echo $c['c_user']; ?>, <? if ($tsComments['block']) echo 'false'; else echo 'true'; ?>, 'comentarios')">
                                                                                                <? 
                                                                                                if ($tsComments['block'])
                                                                                                echo 'Desbloquear';
                                                                                                else
                                                                                                echo 'Bloquear';
                                                                                                ?>
                                                                                            </a>
                                                                                        </li>										
										</ul>                                        
										<?                                                                                 
                                                                                }
                                                                                ?>
									</div>                                    
									<div class="comment-box" id="pp_<? echo $c['cid']; ?>" <? if ($c['c_status'] == 1 || !$c['user_activo'] && $tsUser->is_admod) echo 'style="opacity:0.5"'; ?> >
                                    	
										<div class="dialog-c"></div>                                        
										<div class="comment-info clearbeta">                                        	
											<div class="floatL">                                            	
												<a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $c['user_name']; ?>" class="nick"><? echo $c['user_name']; ?></a> 
                                                                                                <? if ($tsUser->is_admod)
                                                                                                {
                                                                                                  ?>  
                                                                                                (<span style="color:red;">IP:</span> 
                                                                                                <a href="<? echo $tsConfig['url']; ?>/moderacion/buscador/1/1/<? echo $c['c_ip'] ?>" class="geoip" target="_blank"><? echo $c['c_ip'] ?>
                                                                                                </a>)
                                                                                                <? }  ?>dijo                                                
												<span><? echo modifier_hace($c['c_date']); ?></span> :                                            
											</div>
                                                                                        <?
											if ($tsUser->is_member)
                                                                                        {
                                                                                        ?>                                            
											<div class="floatR answerOptions" id="opt_<? echo $c['cid']; ?>">                                            	
												<ul id="ul_cmt_<? echo $c['cid']; ?>">													
                                                                                                    <? 
													if ($tsUser->info['user_rango'] || $tsUser->info['user_rango_post'] != 3)
                                                                                                        {
                                                                                                        ?>
                                                                                                                <li class="numbersvotes" <? if ($c['c_votos'] == 0)echo 'style="display: none"'; ?>>                            							
                                                                                                                        <div class="overview">                            								
                                                                                                                                <span class="<? if ($c['c_votos'] >= 0) echo 'positivo'; else echo 'negativo'; ?>" id="votos_total_<? echo $c['cid'] ?>">
                                                                                                                                    <?
                                                                                                                                    if ($c['c_votos'] != 0)
                                                                                                                                    {      
                                                                                                                                        if ($c['c_votos'] >= 0)
                                                                                                                                        {        
                                                                                                                                         echo '+';
                                                                                                                                        }
                                                                                                                                     echo $c['c_votos'];
                                                                                                                                    }
                                                                                                                                   ?> 
                                                                                                                                </span>                            							
                                                                                                                        </div>                            						
                                                                                                                </li>
                                                                                                                <?
                                                                                                                if ($tsUser->uid != $c['c_user'] && $c['votado'] == 0 && ($tsUser->permisos['govpp'] || $tsUser->permisos['govpn'] || $tsUser->is_admod))
                                                                                                                {                                                                                                                              
                                                                                                                        if ($tsUser->permisos['govpp'] || $tsUser->is_admod)                                                    
                                                                                                                        {
                                                                                                                        ?>
                                                                                                                            <li class="icon-thumb-up">                                                        
                                                                                                                                    <a onclick="comentario.votar(<? echo $c['cid']; ?>,1)">                                                            
                                                                                                                                            <span class="voto-p-comentario"></span>                                                        
                                                                                                                                    </a>                                                    
                                                                                                                            </li>                                                    
                                                                                                                        <? }                                                    
                                                                                                                        if ($tsUser->permisos['govpn'] || $tsUser->is_admod)                                                    
                                                                                                                        {
                                                                                                                        ?>
                                                                                                                            <li class="icon-thumb-down">                                                        
                                                                                                                                    <a onclick="comentario.votar(<? echo $c['cid']; ?>,-1)">                                                            
                                                                                                                                            <span class="voto-n-comentario"></span>                                                        
                                                                                                                                    </a>                                                    
                                                                                                                            </li>                                                    
                                                                                                                    <?                                                                                                                     
                                                                                                                        }
                                                                                                                    } 
                                                                                                                                                                        
													}
                                                                                                        
													if ($tsUser->is_member)
                                                                                                        {
                                                                                                         ?>       
                                                                                                            <li class="answerCitar">                                                    	
                                                                                                                        <a onclick="citar_comment('<? echo $c['cid']; ?>', '<? echo $c['user_name']; ?>')" title="Citar">                                                            
                                                                                                                                <span class="citar-comentario"></span>                                                        
                                                                                                                        </a>                                                    
                                                                                                                </li>                                                    
                                                                                                                    <? if( ($c['c_user'] == $tsUser->uid && $tsUser->permisos['goepc']) || $tsUser->is_admod || $tsUser->permisos['moedcopo'])                                                	
                                                                                                                    {
                                                                                                                    ?>       
                                                                                                                    <li>                                                    	
                                                                                                                            <a onclick="comentario.editar(<? echo $c['cid']; ?>, 'show')" title="Editar comentario">
                                                                                                                                    <span class="<? if ($c['c_user'] == $tsUser->uid) echo 'editar'; else echo 'moderar';?>-comentario"></span>                                                        
                                                                                                                            </a>                                                    
                                                                                                                    </li>                                                    
                                                                                                                    <?                                                                                                                    
                                                                                                                    }                                                    
                                                                                                                    if (($c['c_user'] == $tsUser->uid && $tsUser->permisos['godpc']) || $tsUser->is_admod || $tsUser->permisos['moecp'])
                                                                                                                    {
                                                                                                                    ?>
                                                                                                                        <li class="iconDelete">                                                    	
                                                                                                                                <a onclick="borrar_com(<? echo $c['cid']; ?>, <? echo $c['c_user']; ?>, <? echo $c['c_post_id']; ?>)" title="Borrar">
                                                                                                                                        <span class="borrar-comentario"></span>														
                                                                                                                                </a>                                                    
                                                                                                                        </li>													
                                                                                                                        <? if ($tsUser->is_admod || $tsUser->permisos['moaydcp'])
                                                                                                                        {      
                                                                                                                        ?>        
                                                                                                                        <li class="iconHide">                                                    	
                                                                                                                                <a onclick="ocultar_com(<? echo $c['cid']; ?>, <? echo $c['c_user']; ?>);" title="<? if ($c['c_status'] == 1)echo 'Mostrar/Ocultar'; else 'Ocultar/Mostrar';?>">
                                                                                                                                        <span class="moderar-comentario"></span>														
                                                                                                                                </a>                                                   
                                                                                                                        </li>													
                                                                                                                     <? 
                                                                                                                        }                                                    
                                                                                                                    }                                                    
                                                                                                                    
													} // end if member
                                                                                                        ?>
												</ul>                                            
											</div>
                                                                                        <?
                                                                                        } // ebd if member
                                                                                        ?>
                                        
										</div>
                                        
										<div id="comment-body-<? echo $c['cid']; ?>" class="comment-content">
                                        	
											<? if ($c['c_votos'] <= -3 || $c['c_status'] == 1 || !$c['user_activo'] || $c['user_baneado'])
                                                                                        {   
                                                                                           ?>     
                                                                                        <div>
                                                                                            Escondido 
                                                                                            <? if ($c['c_status'] == 1)
                                                                                                echo 'por un moderador';
                                                                                            elseif ($c['c_votos'] <= -3)
                                                                                                echo 'por un puntaje bajo';
                                                                                            elseif ($c['user_activo'] == 0)
                                                                                                echo 'por pertener a una cuenta desactivada';
                                                                                            else
                                                                                                echo 'por pertenecer a una cuenta';                                                                                             
                                                                                             ?>.
                                                                                            <a href="#" onclick="<? echo "$('#hdn_".$c['cid']."').slideDown(); $(this).parent().slideUp(); return false;"; ?>">Click para verlo</a>.
                                                                                        </div>
                                            
											<div id="hdn_<? echo $c['cid']; ?>" style="display:none">
                                                                                        <?                                                                                        
                                                                                        } 
                                                                                         echo $c['c_html']; 
											 if ($c['c_votos'] <= -3 || $c['c_status'] == 1 || !$c['user_activo'])
                                                                                         {      
                                                                                         ?>
                                                                                        </div>
                                                                                        <? } ?>
                                                                                </div>                                    
									</div>                                
								</div>                            
							</div>                            
							<?                                                        
                                                        } 
                                                        }
							else
                                                        {   
                                                         ?>                                                        
                                                            <div id="no-comments">Este post no tiene comentarios, S&eacute; el primero!</div>
							<?                                                        
                                                        }
                                                        ?>
							<!---->                            
							<div id="nuevos"></div>							                            
							<script type="text/javascript">                            
							$(function(){                            
							var zIndexNumber = 99;                                	
									$('div.avatar-box').each(function(){                                		
										$(this).css('zIndex', zIndexNumber);                                		
										zIndexNumber -= 1;                               	
									});                            
							});                            
							</script>