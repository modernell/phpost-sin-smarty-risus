                <div class="clearbeta lastPosts">
                <? 
                    if ($tsPostsStickys)
                       {
                   ?> 
                	<div class="header">
                    	<div class="box_txt2 ultimos_posts">Posts importantes en <? echo $tsConfig['titulo']; ?></div>
                        <div class="clearBoth"></div>
                    </div>
                    <div class="body">
                        <ul>
                            <? foreach($tsPostsStickys as $p)
                            {
                            ?>
                            <li <? if ($p['post_status'] == 3) echo 'style="background-color:#f1f1f1;"'; elseif ($p['post_status'] == 1) echo 'style="background-color:coral;"'; elseif ($p['post_status'] == 2) echo 'style="background-color:rosyBrown;"'; elseif ($p['user_activo'] == 0) echo 'style="background-color:burlyWood;"'; elseif ($p['user_baneado'] == 1) echo 'style="background-color:orange;"'; ?> class="categoriaPost sticky<? if ($p['post_sponsored'] == 1) echo 'patrocinado'; ?>">
                                <a <? if ($p['post_status'] == 3){ echo 'class="qtip"'; ?> title="El post est&aacute; en revisi&oacute;n"<?} elseif ($p['post_status'] == 1 ){ echo 'class="qtip"'; ?> title="El post se encuentra en revisi&oacute;n por acumulaci&oacute;n de denuncias"<? } elseif ($p['post_status'] == 2) { echo 'class="qtip"'; ?> title="El post est&aacute; eliminado"<? } elseif ($p.user_activo == 0) { echo 'class="qtip"'; ?> title="La cuenta del usuario est&aacute; desactivada" <? } ?>  href="<? echo $tsConfig['url'].'/posts/'.$p['c_seo'].'/'.$p['post_id'].'/'.string_seo($p['post_title']).'.html'; ?>" style="background:url(<? echo $tsConfig['tema']['t_url'].'/images/icons/cat/'.$p['c_img']; ?>) no-repeat 5px center" title="<? echo $p['post_title']; ?>" target="_self" class="title"><? echo string_truncate($p['post_title'],55);?></a>
                            </li>
                            <?
                            }
                            ?>
                        </ul>
                    </div>
                    <?                    
                    }
                    ?>
                	<div class="header">
                    	<div class="box_txt3 ultimos_posts">&Uacute;ltimos posts en <? echo $tsConfig['titulo']; ?></div>
                        <div class="box_rss">
                        </div>
                        <div class="clearBoth"></div>
                    </div>
                    <div class="body">
                    	<ul>
                            <? if ($tsPosts) 
                            { 
                            foreach ($tsPosts as $p)
                            {                            
                            ?>
                            <li class="categoriaPost" style="background-image:url(<? echo $tsConfig['tema']['t_url'].'/images/icons/cat2/'.$p['c_img']; ?>); {if $p.post_status == 3} background-color:#f1f1f1; {elseif $p.post_status == 1}background-color:coral;{elseif $p.post_status == 2} background-color:rosyBrown;{elseif $p.user_activo == 0} background-color:burlyWood;{elseif $p.user_baneado == 1} background-color:orange;{/if}" >
                                <a style="margin-left:10px;" {if $p.post_status == 3}class="qtip" title="El post est&aacute; en revisi&oacute;n"{elseif $p.post_status == 1}class="qtip" title="El post se encuentra en revisi&oacute;n por acumulaci&oacute;n de denuncias"{elseif $p.post_status == 2}class="qtip" title="El post est&aacute; eliminado"{elseif $p.user_activo == 0}class="qtip" title="La cuenta del usuario est&aacute; desactivada"{elseif $p.user_baneado == 1}class="qtip" title="La cuenta del usuario est&aacute; suspendida"{/if} class="title {if $p.post_private}categoria privado{/if}" alt="<? echo $p['post_title']; ?>" title="<? echo $p['post_title']; ?>" target="_self" href="<? echo $tsConfig['url'].'/posts/'.string_seo($p['c_seo']).'/'.$p['post_id'].'/'.string_seo($p['post_title']).'.html';?>"><? echo string_truncate($p['post_title'],50) ;?></a>
                                <span style="margin-left:10px;"><? echo modifier_hace($p['post_date']); ?> &raquo; <a href="<? echo $tsConfig['url'].'/perfil/'.$p['user_name']; ?>" class="hovercard" uid="{$p.post_user}"><strong>@<? echo $p['user_name'];?></strong></a> &middot; Puntos <strong><? echo $p['post_puntos']; ?></strong> &middot; Comentarios <strong><? echo $p['post_comments'];?></strong></span>
                                <span class="floatR"><a href="<? echo $tsConfig['url'].'/posts/'.$p['c_seo']; ?>/"><? echo $p['c_nombre']; ?></a></span>
                            </li>
                            
                            <?                            
                            }
                            }
                            else 
                            { ?>
                            <li class="emptyData">No hay posts aqu&iacute;</li>
                            <?                            
                            } 
                            ?>
                        </ul>
                        <br clear="left"/>
                    </div>
                    <div class="footer size13">
                        <? if ($tsPages['prev'] >0 && $tsPages['max'] == false) { ?><a href="pagina<? echo $tsPages['prev']; ?>" class="floatL">&laquo; Anterior</a><? } ?>
                        <? if ($tsPages['next'] <= $tsPages['pages']){ ?><a href="pagina<? echo $tsPages['next']; ?>" class="floatR">Siguiente &raquo;</a>
                        <? } elseif ($tsPages['max'] == true) { ?><a href="pagina2">Siguiente &raquo;</a><? } ?>
                    </div>
                 </div>