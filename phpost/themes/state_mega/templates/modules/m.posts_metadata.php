                	<div class="post-metadata floatL">
                    	<div style="padding: 12px">
                        	<div style="display:none" class="mensajes"></div>
                            <?    
                            if (($tsUser->is_admod || $tsUser->permisos['godp']) && $tsUser->is_member == 1 && $tsPost['post_user'] != $tsUser->uid && $tsUser->info['user_puntosxdar'] >= 1)
                            {
                            ?>
                            <div class="dar-puntos">
                                                        <?
							if ($tsPunteador['rango'] >= 50)
                                                        {
                                                        ?>
							<center>
							<div align="center" style="background: #F2F2F2;width: 58px;padding: 2px;border: 1px solid #DDD;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;">
							<input type="text" id="points" style="width:50px;height:15px;" value="<? echo $tsPunteador['rango']; ?>"> 	
							<input type="submit" onclick="votar_post(document.getElementById('points').value); return false;" value="Votar" class="btn_g" style="width: 55px;">  
							</div>
							</center>
							<?
                                                        }
                                                        else
                                                        {    
                                                        ?>
                                                        
                                <span>Dar Puntos:</span>
                                <?
                                for ($i=1; $i<$tsPunteador['rango']; $i++) 
                                {
                                //{section name=puntos start=1 loop=$tsUser->info.user_puntosxdar+1 max=$tsPunteador.rango}
                                ?>
                                <a href="#" onclick="votar_post(<? echo $i;?>); return false;"><? echo $i; ?></a>
                                <?
                                  if ($i < $tsPunteador['rango']) echo '-'; 
                                  // {if $smarty.section.puntos.index < $tsPunteador.rango}-{/if}
                                  //  {/section}
                                }
                                                        }
                                ?>                               
				
                                (de <? echo $tsUser->info['user_puntosxdar']; ?> Disponibles)
                            </div>
                            <hr class="divider"/>
                            <?
                            }
                            ?>
                            <div class="post-acciones">
                            	<ul>
                                    <?
                                    if (!$tsUser->is_member)
                                    {
                                    ?>
                                    <li><a class="btn_g follow_user_post" href="#" onclick="registro_load_form(); return false">
                                            <span class="icons follow_post follow">Seguir Post</span></a></li>
                                    <?
                                    }
                                    elseif ($tsPost['post_user'] != $tsUser->uid)
                                    {
                                    ?>
                                    <li<? if (!$tsPost['follow']) echo 'style="display: none;"'; ?>>
                                    <a class="btn_g unfollow_post" onclick="notifica.unfollow('post', <? echo $tsPost['post_id']; ?>, notifica.inPostHandle, $(this).children('span'))">
                                            <span class="icons follow_post unfollow">Dejar de seguir</span></a>
                                    </li>
                                    <li<? if ($tsPost['follow']>0) echo 'style="display: none;"'; ?>>
                                    <a class="btn_g follow_post" onclick="notifica.follow('post', <? echo $tsPost['post_id']; ?>, notifica.inPostHandle, $(this).children('span'))">
                                        <span class="icons follow_post follow">Seguir Post</span></a>
                                    </li>
                                    <li><a href="#" onclick="<? if (!$tsUser->is_member){ ?>registro_load_form()<?}else {?> add_favoritos()<?}?>; return false" class="btn_g">
                                            <span class="icons agregar_favoritos">Agregar a Favoritos</span></a></li>
                                    <li><a href="#" onclick="denuncia.nueva('post',<? echo $tsPost['post_id']; ?>, '<? echo $tsPost[post_title]; ?>', '<? echo $tsPost[user_name]; ?>'); return false;" class="btn_g">
                                            <span class="icons denunciar_post">Denunciar </span></a></li>
                                    <?
                                    }
                                    ?>
                                    </ul>
                            </div>
                            <ul class="post-estadisticas">
				<li><span class="icons medallas"><? echo $tsPost['m_total']; ?></span><br />Medalla<? if ($tsPost['m_total'] >1) echo 's'; ?></li>
                            	<li><span class="icons favoritos_post"><? echo $tsPost['post_favoritos']; ?></span><br />Favoritos</li>
                                <li><span class="icons visitas_post"><? echo $tsPost['post_hits']; ?></span><br />Visitas</li>
                                <li><span id="puntos_post" class="icons puntos_post"><? echo $tsPost['post_puntos']; ?></span><br />Puntos</li>
                                <li><span class="icons monitor"><? echo $tsPost['post_seguidores']; ?></span><br />Seguidores</li>
                            </ul>
                            <div class="clearfix"></div>
                            <hr class="divider"/>
                            <div class="tags-block">
                            	<span class="icons tags_title">Tags:</span>
                                <?
                                foreach ($tsPost['post_tags'] as $i =>$tag)
                                {
                                ?>
                                <a rel="tag" href="<? echo $tsConfig['url']; ?>/buscador/?q=<? echo string_seo($tag);?>&e=tags"><? echo $tag; ?></a> <? if ($i < $tsPost['n_tags']) echo '-'; ?>
                                <?
                                }
                                ?>
                            </div>
                            <ul class="post-cat-date">
                            	<li><strong>Categor&iacute;a:</strong> 
                                    <a href="<? echo $tsConfig['url'];?>/posts/<? echo $tsPost['categoria']['c_seo']; ?>/"><? echo $tsPost['categoria']['c_nombre']; ?></a></li>
                                <li><strong>Creado:</strong><span> <? echo $tsPost['post_date']; ?>.</span></li>
                            </ul>
                            <div class="clearfix"></div>
										
						</div>
					
                        </div>
                    </div>