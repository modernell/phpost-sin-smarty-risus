					<div id="lastCommBox">
                        <div class="box_title">
                            <div class="box_txt estadisticas">&Uacute;ltimos comentarios</div>
                            <div class="box_rss">
                            	<a onclick="actualizar_comentarios('-1','0'); return false;" class="size9" href="#"><span class="systemicons actualizar"></span></a>
                            </div>
                        </div>
                        <div class="box_cuerpo" id="ult_comm" style="padding: 0pt; height: 330px;">
                            <ol id="filterByTodos" class="filterBy cleanlist" style="display:block;">
                            	<? foreach ($tsComments as $key=>$c)
                                {                                    
                                ?>
                                    <li>
                                    <? if ($i+1 < 10) { echo 0; }  $i+1; 
                                    if ($c['post_status'] != 0 || $c['user_activo'] == 0 || $c['user_baneado'] || $c['c_status'] != 0)
                                    {        
                                    ?>
                                    <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $c['user_name']; ?>/">
                                        <strong style="color: <? if ($c['post_status'] == 3){ echo '#BBB'; } elseif ($c['post_status'] == 1){ echo 'purple'; } elseif($c[post_status] == 2){ echo 'rosyBrown';} elseif ($c.c_status == 1){ echo 'coral';} elseif( $c['user_activo'] == 0){ echo 'brown'; } elseif ($c['user_baneado'] == 1){ echo 'orange'; } ?>" class="qtip" title="<? if ($c['post_status'] == 3) { echo 'El post se encuentra en revisi&oacute;n' ; } elseif ($c['post_status'] == 1){ echo 'El post se encuentra oculto por acumulaci&oacute;n de denuncias'; } elseif ($c['post_status'] == 2){ echo 'El post se encuentra eliminado'; } elseif( $c['c_status'] == 1){ echo 'El comentario est&aacute; oculto'; } elseif ($c['user_activo'] == 0 ){ echo 'El autor del comentario tiene la cuenta desactivada'; }elseif ($c['user_baneado'] == 1){ echo 'El autor del comentario tiene la cuenta suspendida'; } ?>"><? echo $c['user_name']; ?></strong>
                                    </a>
                                    <?    
                                    }
                                    else
                                    {
                                    ?>
                                    <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $c['user_name']; ?>/">
                                        <strong><? echo $c['user_name']; ?></strong>
                                    </a> 
                                      <? } ?> 
                                    <a href="<? echo $tsConfig['url']; ?>/posts/<? echo $c['c_seo'].'/'.$c['post_id'].'/'.string_seo($c['post_title']).'.html#comentarios-abajo';?>" class="size10">
                                    <? echo string_truncate($c['post_title'],55); ?></a>
                                </li>
                                <?
                                }
                                ?>
                            </ol>
                        </div>
                        <br class="space"/>
                    </div>