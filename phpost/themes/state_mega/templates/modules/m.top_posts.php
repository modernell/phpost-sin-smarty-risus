	<div style="float: left; margin-left: 10px; width: 775px;" class="right">
                <!--PUNTOS-->
                    <div class="boxy xtralarge">
                    	<div class="boxy-title">
                            <h3>Top post con m&aacute;s puntos</h3>
                            <span class="icon-noti puntos-n"></span>
                        </div>
                        <div class="boxy-content">
                        <?    
                       	if (!$tsTops['puntos'])
                        {
                        ?>    
                        <div class="emptyData">Nada por aqui</div>
                        <?
                        }
                        else
                        {
                        ?>     
                            <ol>
                               <? 
                            	foreach ($tsTops['puntos'] as $p)
                                {
                                ?>
                            	<li class="categoriaPost clearfix" style="background-image:url(<? echo $tsConfig['tema']['t_url']; ?>/images/icons/cat/<? echo $p['c_img']; ?>)">
                                    <a href="<? echo $tsConfig['url']; ?>/posts/<? echo $p['c_seo']; ?>/<? echo $p['post_id']; ?>/<? echo modifier_hace($p['post_title']);?>.html"><? echo string_truncate($p['post_title'], 45); ?></a>
                                    <span><? echo $p['post_puntos']; ?></span>
                                </li>
                                <?
                                }
                                ?>
                            </ol>
                            <?
                            }
                            ?>
                        </div>
                    </div>
                    <!--SEGUIDORES-->
                	<div class="boxy xtralarge">
                    	<div class="boxy-title">
                            <h3>Top post m&aacute;s favoritos</h3>
                            <span class="icon-noti favoritos-n"></span>
                        </div>
                        <div class="boxy-content">
                          <?  
                            if (!$tsTops['favoritos'])
                            {
                            ?>
                                <div class="emptyData">Nada por aqui</div>
                            <?    
                            }    
                            else
                            {
                            ?>    
                            <ol>
                               <? 
                            	foreach ($tsTops['favoritos'] as $p)
                                {
                                ?>
                            	<li class="categoriaPost clearfix" style="background-image:url(<? echo $tsConfig['tema']['t_url']; ?>/images/icons/cat/<? echo $p['c_img']; ?>)">
                                    <a href="<? echo $tsConfig['url']; ?>/posts/<? echo $p['c_seo']; ?>/{$p.post_id}/<? echo $p['post_title']; ?>.html"><? echo string_truncate($p['post_title'],45); ?></a>
                                    <span><? echo $p['post_favoritos']; ?></span>
                                </li>
                                <?
                                }
                                ?>
                            </ol>
                            <?    
                            }
                            ?>
                        </div>
                    </div>
                    <!--COMENTARIOS-->
                	<div class="boxy xtralarge">
                    	<div class="boxy-title">
                            <h3>Top post m&aacute;s comentado</h3>
                            <span class="icon-noti comentarios-n"></span>
                        </div>
                        <div class="boxy-content">
                       <?     
                        if (!$tsTops['comments'])
                        {
                       ?>     
                            <div class="emptyData">Nada por aqui</div>
                       <?     
                        }    
                        else
                        {
                        ?>    
                        <ol>
                            <?
                            	foreach ($tsTops['comments'] as $p)
                                {
                                ?>
                            	<li class="categoriaPost clearfix" style="background-image:url(<? echo $tsConfig['tema']['t_url']; ?>/images/icons/cat/<? echo $p['c_img']; ?>)">
                                    <a href="<? echo $tsConfig['url']; ?>/posts/<? echo $p['c_seo']; ?>/<? echo $p['post_id']; ?>/<? echo string_seo($p['post_title']);?>.html"><? echo string_truncate($p['post_title'], 45); ?></a>
                                    <span><? echo $p['post_comments']; ?></span>
                                </li>
                                <?
                                }
                                ?>
                            </ol>
                          <?  
                          }
                          ?>  
                        </div>
                    </div>                    
                    <!--SEGUIDORES-->
                	<div class="boxy xtralarge">
                    	<div class="boxy-title">
                            <h3>Top post con m&aacute;s seguidores</h3>
                            <span class="icon-noti follow-n"></span>
                        </div>
                        <div class="boxy-content">
                        <?    
                        if (!$tsTops['seguidores'])
                        {
                        ?>
                        <div class="emptyData">Nada por aqui</div>
                        <?
                        }
                        else
                        {    
                        ?>    
                            <ol>
                               <? 
                            	foreach ($tsTops['seguidores']  as $p)
                                {
                                ?>
                            	<li class="categoriaPost clearfix" style="background-image:url(<? echo $tsConfig['tema']['t_url']; ?>/images/icons/cat/<? echo $p['c_img']; ?>)">
                                    <a href="<? echo $tsConfig['url']; ?>/posts/<? echo $p['c_seo']; ?>/<? echo $p['post_id']; ?>/<? echo string_seo($p['post_title']); ?>.html"><? echo string_truncate($p['post_title'],45); ?></a>
                                    <span><? echo $p['post_seguidores']; ?></span>
                                </li>
                                <?                                
                                }
                                ?>
                            </ol>
                         <?                         
                         }
                         ?>
                        </div>
                    </div>
                </div>