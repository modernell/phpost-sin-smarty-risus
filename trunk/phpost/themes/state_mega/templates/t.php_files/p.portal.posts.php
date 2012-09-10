                    <div class="body">
                    	<ul>
                            <?
                            if ($tsPosts)
                            {
                            foreach ($tsPosts as $p)
                            {
                            ?>
                            <li class="categoriaPost" style="background-image:url(<? echo $tsConfig['default']; ?>/images/icons/cat/<? echo $p['c_img']; ?>)">
                                <a class="title {if $p.post_private}categoria privado{/if}" title="{$p.post_title}" target="_self" href="<? echo $tsConfig['url']; ?>/posts/{$p.c_seo}/{$p.post_id}/{$p.post_title|seo}.html"><? echo string_seo($p['post_title'],55); ?></a>
                                <span><? echo modifier_hace($p['post_date']); ?> &raquo; 
                                    <a href="<? echo $tsConfig['url']; ?>/perfil/<? echo $p['user_name']; ?>">
                                        <strong><? echo $p['user_name']; ?></strong>
                                    </a> &middot; Puntos 
                                    <strong><? echo $p['post_puntos']; ?></strong> &middot; Comentarios 
                                    <strong><? echo $p['post_comments']; ?></strong>
                                </span>
                                <span class="floatR">
                                    <a href="<? echo $tsConfig['url']; ?>/posts/<? echo $p['c_seo']; ?>/"><? echo $p['c_nombre']; ?>
                                    </a>
                                </span>
                            </li>
                            <?
                            }                            
                            ?>
                            <li class="emptyData">
                                No hay posts aqu&iacute;,
                                <?
                                if ($tsType == 'posts')
                                {
                                ?>
                                <a onclick="$('#config_posts').slideDown();">configura</a> tus categor&iacute;as preferidas.
                                <?
                                }
                                elseif ($tsType == 'favs') 
                                {
                                ?>
                                puedes agregar un post a tus favoritos para visitarlo m&aacute;s tarde.
                                <?
                                }
                                elseif ($tsType == 'shared')
                                {
                                ?>    
                                los usuarios que sigues podr&aacute;n recomentarte posts.
                                <?
                                }
                                ?>
                            </li>
                            <?
                            }
                            ?>
                        </ul>
                        <br clear="left"/>
                    </div>
                    <div class="footer size13">
                                <?
                		if ($tsPages['prev'] != 0)
                                {
                                ?>
                                <div style="text-align:left" class="floatL">
                                    <a onclick="portal.posts_page('<? echo $tsType; ?>', <? echo $tsPages['prev']; ?>, true); return false">&laquo; Anterior</a></div>
                                <?
                                }
                		if ($tsPages['next'] != 0)
                                {
                                ?>
                                <div style="text-align:right" class="floatR">
                                    <a onclick="portal.posts_page('<? echo $tsType; ?>', <? echo $tsPages['next']; ?>, true); return false">Siguiente &raquo;</a></div>
                                <?
                                }
                                ?>
                    </div>
                    <div class="clearBoth"></div>